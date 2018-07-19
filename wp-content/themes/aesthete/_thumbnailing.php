<?php
define ('THUMB_DEBUG',0);
/*
	This script is deeply rewritten TimThumb to fit WordPress requirements.
	http://code.google.com/p/timthumb/

	MIT License: http://www.opensource.org/licenses/mit-license.php

	Paramters
	---------
	w: width
	h: height
	zc: zoom crop (0 or 1)
	q: quality (default is 75 and max is 100)
	
*/

if ($_GET['thumbsrc']) echo_image(); // output image to browser without creating cache file.

// this function is called when the file is accessed directly like
// http://site.com/wp-content/themes/mytheme/_thumbnailing.php?imgsrc=/local/path/to/image/image.jpg&h=70&w=100&zc=1
function echo_image()
{
	if (THUMB_DEBUG) echo 'echo image <br/>';
	if (THUMB_DEBUG) echo 'Current file =' . __FILE__ . '<br/>';
	
	$src=(isset($_GET['thumbsrc']))?$_GET['thumbsrc']:'';
	$new_width=(isset($_GET['w']))?$_GET['w']:100;
	$new_height=(isset($_GET['h']))?$_GET['h']:100;
	$zoom_crop=(isset($_GET['zc']))?$_GET['zc']:1;
	$quality=(isset($_GET['q']))?$_GET['q']:80;
	$filters=(isset($_GET['filters']))?$_GET['filters']:'';
	
	$document_root = get_document_root($src);
	$src = $document_root . '/' . $src;
	
	create_cache_file($cache_dir . '/'. $cache_file, $src, $new_width, $new_height,$zoom_crop,$quality,$filters,true); //output to browser!
	
	die();
}

function get_thumb_image_url($src, $w=100,$h=100,$zc=0,$q=80,$f='')
{
	if (THUMB_DEBUG) echo 'inside get_thumb_image_url...............................<br/>';
	if (THUMB_DEBUG) echo 'Current file =' . __FILE__ . '<br/>';
	
	define ('CACHE_SIZE', 250);		// number of files to store before clearing cache
	define ('CACHE_CLEAR', 5);		// maximum number of files to delete on each cache clear
	define ('VERSION', '1.00');		// version number (to force a cache refresh)

	$imageFilters = array(
		"1" => array(IMG_FILTER_NEGATE, 0),
		"2" => array(IMG_FILTER_GRAYSCALE, 0),
		"3" => array(IMG_FILTER_BRIGHTNESS, 1),
		"4" => array(IMG_FILTER_CONTRAST, 1),
		"5" => array(IMG_FILTER_COLORIZE, 4),
		"6" => array(IMG_FILTER_EDGEDETECT, 0),
		"7" => array(IMG_FILTER_EMBOSS, 0),
		"8" => array(IMG_FILTER_GAUSSIAN_BLUR, 0),
		"9" => array(IMG_FILTER_SELECTIVE_BLUR, 0),
		"10" => array(IMG_FILTER_MEAN_REMOVAL, 0),
		"11" => array(IMG_FILTER_SMOOTH, 0),
	);

	$src = cleanSource($src);
	
	if (THUMB_DEBUG) echo 'src = '.$src.'<br/>';
	
	$rel_src = $src;
	
	$document_root = get_document_root($src);
	
	if (THUMB_DEBUG) echo 'document_root = '.$document_root.'<br/>';
	if ($document_root)	$src = $document_root . '/' . $src;
	// last modified time (for caching)
	$lastModified = filemtime($src);

	// get properties
	$new_width 		= $w;
	$new_height 	= $h;
	$zoom_crop 		= $zc;
	$quality 		= $q;
	$filters		= $f;

	$wud = wp_upload_dir();
	if (!$wud['basedir'])
		return get_bloginfo('template_url') . '/_thumbnailing.php?thumbsrc='. $rel_src . "&w=$new_width&h=$new_height&zc=$zoom_crop&q=$quality";
	$thumb_cache_dir = 'ThumbCache';
	
	$cache_dir = $wud['basedir'].'/'.$thumb_cache_dir;
	
	if (THUMB_DEBUG) echo "cache_dir = $cache_dir<br/>";

	
	$mime_type = mime_type($src);
	if(!valid_src_mime_type($mime_type)) 
	{
		displayError("Invalid src mime type: " .$mime_type);
		return '';
	}
	$ext = '.jpg';
	if ($mime_type == 'image/png') $ext = '.png';

	$cache_file = get_cache_file($src, $w,$h,$z,$q,$f,$lastModified, $ext);
	if (file_exists($cache_dir . '/'. $cache_file))
	{
		return $wud['baseurl'].'/'.$thumb_cache_dir.'/'.$cache_file;
	}
	
	// If we are here it means that we nead to generate new cache file

	if( !check_cache_is_writable( $cache_dir))
	{
		if (THUMB_DEBUG) echo "cache_dir is not writtable<br/>";
		//TODO: return timThumb url
		//die();
		return get_bloginfo('template_url') . '/_thumbnailing.php?thumbsrc='. $rel_src . "&w=$new_width&h=$new_height&zc=$zoom_crop&q=$quality";
	}
	
	// if not in cache then clear some space and generate a new file
	cleanCache($cache_dir);

	@ini_set('memory_limit', "30M");
		
	// check to see if GD function exist
	if(!function_exists('imagecreatetruecolor')) 
	{
		displayError("GD Library Error: imagecreatetruecolor does not exist");
		return '';
	}
	//echo __LINE__ . $cache_file. __LINE__ ;
	
	create_cache_file($cache_dir . '/'. $cache_file, $src, $new_width, $new_height,$zoom_crop,$quality,$filters);
	//echo __LINE__ . $wud['baseurl'].'/'.$thumb_cache_dir.'/'.$cache_file. __LINE__ ;
	return $wud['baseurl'].'/'.$thumb_cache_dir.'/'.$cache_file;
	
}

function create_cache_file($cache_file, $src, $new_width = 100, $new_height=100,$zoom_crop=0,$quality=80,$filters='',$output_to_browser = false)
{
	$mime_type = mime_type($src);
	if(!valid_src_mime_type($mime_type)) 
	{
		displayError("Invalid src mime type: " .$mime_type);
		//if ($output_to_browser) die();
		return;
	}

	
	if(strlen($src) && file_exists($src)) 
	{

		// open the existing image
		$image = open_image($mime_type, $src);
		if($image === false) {
			displayError('Unable to open image : ' . $src);
			if ($output_to_browser) return;
		}
		//var_dump($image);
		// Get original width and height
		$width = imagesx($image);
		$height = imagesy($image);
		
		// don't allow new width or height to be greater than the original
		if( $new_width > $width ) {
			$new_width = $width;
		}
		if( $new_height > $height ) {
			$new_height = $height;
		}

		// generate new w/h if not provided
		if( $new_width && !$new_height ) {
			
			$new_height = $height * ( $new_width / $width );
			
		} elseif($new_height && !$new_width) {
			
			$new_width = $width * ( $new_height / $height );
			
		} elseif(!$new_width && !$new_height) {
			
			$new_width = $width;
			$new_height = $height;
			
		}
		
		// create a new true color image
		$canvas = imagecreatetruecolor( $new_width, $new_height );
		imagealphablending($canvas, false);
		// Create a new transparent color for image
		$color = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
		// Completely fill the background of the new image with allocated color.
		imagefill($canvas, 0, 0, $color);
		// Restore transparency blending
		imagesavealpha($canvas, true);

		if( $zoom_crop ) 
		{

			$src_x = $src_y = 0;
			$src_w = $width;
			$src_h = $height;

			$cmp_x = $width  / $new_width;
			$cmp_y = $height / $new_height;

			// calculate x or y coordinate and width or height of source

			if ( $cmp_x > $cmp_y ) {

				$src_w = round( ( $width / $cmp_x * $cmp_y ) );
				$src_x = round( ( $width - ( $width / $cmp_x * $cmp_y ) ) / 2 );

			} elseif ( $cmp_y > $cmp_x ) {

				$src_h = round( ( $height / $cmp_y * $cmp_x ) );
				$src_y = round( ( $height - ( $height / $cmp_y * $cmp_x ) ) / 2 );

			}
			
			imagecopyresampled( $canvas, $image, 0, 0, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h );

		} else {

			// copy and resize part of an image with resampling
			imagecopyresampled( $canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

		}
		
		if ($filters != "") {
			// apply filters to image
			$filterList = explode("|", $filters);
			foreach($filterList as $fl) {
				$filterSettings = explode(",", $fl);
				if(isset($imageFilters[$filterSettings[0]])) {
				
					for($i = 0; $i < 4; $i ++) {
						if(!isset($filterSettings[$i])) {
							$filterSettings[$i] = null;
						}
					}
					
					switch($imageFilters[$filterSettings[0]][1]) {
					
						case 1:
						
							imagefilter($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1]);
							break;
						
						case 2:
						
							imagefilter($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1], $filterSettings[2]);
							break;
						
						case 3:
						
							imagefilter($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1], $filterSettings[2], $filterSettings[3]);
							break;
						
						default:
						
							imagefilter($canvas, $imageFilters[$filterSettings[0]][0]);
							break;
							
					}
				}
			}
		}
		
		// output image to browser based on mime type
		if (!$output_to_browser) //save as file
		{
			switch ($mime_type)
			{
				case 'image/png':
					$quality = floor((100-$quality) * 0.09);
					imagepng($canvas, $cache_file, $quality);
					break;
				default:
					imagejpeg  ($canvas, $cache_file, $quality);
			}
		}
		else // output to browser without saving
		{
			switch ($mime_type)
			{
				case 'image/png': 
					header("Content-Type: image/png");
					header("Accept-Ranges: bytes");
					imagepng($canvas);
					break;
				default: 
					header("Content-Type: image/jpeg");
					header("Accept-Ranges: bytes");
					imagejpeg  ($canvas);
			}
		}
		imagedestroy($canvas);
		
	} else 
	{
		// Something wrong with image url
	}
	
}
/**
 * 
 */
function open_image($mime_type, $src) 
{
	//echo __LINE__ . $mime_type;
	if(stristr($mime_type, 'gif')) {
	
		$image = imagecreatefromgif($src);
		
	} elseif(stristr($mime_type, 'jpeg')) {
	
		@ini_set('gd.jpeg_ignore_warning', 1);
		$image = imagecreatefromjpeg($src);
		
	} elseif( stristr($mime_type, 'png')) {
	
		$image = imagecreatefrompng($src);
		
	}
	
	return $image;

}

/**
 * clean out old files from the cache
 * you can change the number of files to store and to delete per loop in the defines at the top of the code
 */
function cleanCache($cache_dir) 
{

	$files = glob($cache_dir. "/*", GLOB_BRACE);
	$yesterday = time() - (24 * 60 * 60);
	
	if (is_array($files) && count($files) > 0) {
		
		usort($files, "filemtime_compare");
		$i = 0;
		
		if (count($files) > CACHE_SIZE) 
		{
			
			foreach ($files as $file) 
			{
				
				$i ++;
				
				if ($i >= CACHE_CLEAR)	return;
				
				if (filemtime($file) > $yesterday) return;
				
				unlink($file);
			}
		}
	}
}

/**
 * compare the file time of two files
 */
function filemtime_compare($a, $b) {

	return filemtime($a) - filemtime($b);
	
}

/**
 * determine the file mime type
 */
function mime_type($file) {

	if (stristr(PHP_OS, 'WIN')) { 
		$os = 'WIN';
	} else { 
		$os = PHP_OS;
	}

	$mime_type = '';

	if (function_exists('mime_content_type')) {
		$mime_type = mime_content_type($file);
	}
	
	// use PECL fileinfo to determine mime type
	if (!valid_src_mime_type($mime_type)) {
		if (function_exists('finfo_open')) {
			$finfo = finfo_open(FILEINFO_MIME);
			$mime_type = finfo_file($finfo, $file);
			finfo_close($finfo);
		}
	}

	// try to determine mime type by using unix file command
	// this should not be executed on windows
    /*if (!valid_src_mime_type($mime_type) && $os != "WIN") {
		if (preg_match("/FREEBSD|LINUX/", $os)) {
			$mime_type = trim(@shell_exec('file -bi "' . $file . '"'));
		}
	}*/

	// use file's extension to determine mime type
	if (!valid_src_mime_type($mime_type)) {

		// set defaults
		$mime_type = 'image/png';
		// file details
		$fileDetails = pathinfo($file);
		$ext = strtolower($fileDetails["extension"]);
		// mime types
		$types = array(
 			'jpg'  => 'image/jpeg',
 			'jpeg' => 'image/jpeg',
 			'png'  => 'image/png',
 			'gif'  => 'image/gif'
 		);
		
		if (strlen($ext) && strlen($types[$ext])) {
			$mime_type = $types[$ext];
		}
		
	}
	//echo $mime_type;
	return $mime_type;

}

/**
 * 
 */
function valid_src_mime_type($mime_type) {

	if (preg_match("/jpg|jpeg|gif|png/i", $mime_type)) {
		return true;
	}
	
	return false;

}

/**
 * 
 */
function check_cache_is_writable($cache_dir) 
{
//	return false;
	// make sure cache dir exists
	if (!file_exists($cache_dir)) 
	{
		// give 777 permissions so that developer can overwrite
		// files created by web server user
		@mkdir($cache_dir);
		@chmod($cache_dir, 0777);
	}
	if (!is_writable($cache_dir)) 
		@chmod($cache_dir, 0777);
	else
		return true;
	return (is_writable($cache_dir));
	
	//show_cache_file($cache_dir, $mime_type);

}

/**
 * 
 */
function get_cache_file($src, $w=100,$h=100,$zc=0,$q=80,$f='',$lastModified, $ext) 
{
	//global $lastModified;
	$cachename = $src . $w . $h . $zc . $q . $f . VERSION . $lastModified;
	$cache_file = md5($cachename) . $ext;

	return $cache_file;
}

/**
 * check to if the url is valid or not
 */
function valid_extension ($ext) {

	if (preg_match("/jpg|jpeg|png|gif/i", $ext)) {
		return TRUE;
	} else {
		return FALSE;
	}
	
}

/**
 * tidy up the image source url
 */
function cleanSource($src) {

	// remove slash from start of string
	if(strpos($src, "/") == 0) {
		$src = substr($src, -(strlen($src) - 1));
	}
	return $src;
	
	// remove http/ https/ ftp
	$src = preg_replace("/^((ht|f)tp(s|):\/\/)/i", "", $src);
	// remove domain name from the source url
	$host = $_SERVER["HTTP_HOST"];
	$src = str_replace($host, "", $src);
	$host = str_replace("www.", "", $host);
	$src = str_replace($host, "", $src);

	// don't allow users the ability to use '../' 
	// in order to gain access to files below document root

	// src should be specified relative to document root like:
	// src=images/img.jpg or src=/images/img.jpg
	// not like:
	// src=../images/img.jpg
	$src = preg_replace("/\.\.+\//", "", $src);
	
	// get path to image on file system
	$src = get_document_root($src) . '/' . $src;

	return $src;

}

/**
 * 
 */
function get_document_root ($src) 
{

	//return '';
	if (THUMB_DEBUG) echo "<b>document_root src = ".$src."</b><br/>";
	if (THUMB_DEBUG) echo "_SERVER['DOCUMENT_ROOT'] = ".$_SERVER['DOCUMENT_ROOT']."<br/>";
	// check for unix servers
	if(@file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $src)) {
		return $_SERVER['DOCUMENT_ROOT'];
	}
	
	// check from script filename (to get all directories to timthumb location)
	if (THUMB_DEBUG) echo '_SERVER[SCRIPT_FILENAME] = ' . $_SERVER['SCRIPT_FILENAME'] . '<br/>';
	$parts = array_diff(explode('/', $_SERVER['SCRIPT_FILENAME']), explode('/', $_SERVER['DOCUMENT_ROOT']));
	if (THUMB_DEBUG) echo 'parts = ' . print_r($parts,true) . '<br/>';
	$path = $_SERVER['DOCUMENT_ROOT'] . '/';
	foreach ($parts as $part) {
		$path .= $part . '/';
		if (@file_exists($path . $src)) {
			return $path;
		}
	}	

	// check from script filename (to get all directories to timthumb location)
	$parts = explode('/', $_SERVER['SCRIPT_FILENAME']);
	if (THUMB_DEBUG) echo 'parts = ' . print_r($parts,true) . '<br/>';
	$path = '';
	foreach ($parts as $part) {
		$path .= $part . '/';
		if (@file_exists($path . $src)) {
			return $path;
		}
	}	
	
	// the relative paths below are useful if timthumb is moved outside of document root
	// specifically if installed in wordpress themes like mimbo pro:
	// /wp-content/themes/mimbopro/scripts/timthumb.php
	$paths = array(
		".",
		"..",
		"../..",
		"../../..",
		"../../../..",
		"../../../../..",
		"../../../../../..",
		"../../../../../../..",
		"../../../../../../../.."
	);
	
	foreach($paths as $path) {
		if(@file_exists($path . '/' . $src)) {
			return $path;
		}
	
	}
	if (THUMB_DEBUG)  echo "path = $path <br/>";
	// special check for microsoft servers
	//if(!isset($_SERVER['DOCUMENT_ROOT'])) {
    	$path = str_replace("/", "\\", $_SERVER['ORIG_PATH_INFO']);
    	$path = str_replace($path, "", $_SERVER['SCRIPT_FILENAME']);
    	
    	if( @file_exists( $path . '/' . $src ) ) {
    		return $path;
    	}
	//}	
	if ($src[0] === '~') return get_document_root (substr($src,1));
	
	//displayError('file not found ' . $src);
	if (THUMB_DEBUG) echo ('get_document root: file not found ' . $src  . '<br/>');
	return '';

}

/**
 * generic error message
 */
function displayError($errorString = 'displayError') 
{

	//header('HTTP/1.1 400 Bad Request');
	echo $errorString .'</br>';
	
}

function test_thumb_cache()
{
	$fc='';
	$message ='';
	$wud = wp_upload_dir();
	
	if (!$wud['basedir'])
	{
		$option_upload_dir = get_option( 'upload_path' );
		if ($option_upload_dir)
			$option_upload_dir = '<code>'.$option_upload_dir.'</code>';
		else
			$option_upload_dir = '(usually <code>wp-content/uploads</code>)';
		
		$message = "Don't you have <i>uploads</i> dir? (<a style=\"cursor:pointer;;\" id=\"thumb-id\">Details</a>)"
				. "<div id=\"thumb-err\">"
				. "Cannot find your <i>uploads</i> dir $option_upload_dir. <br/>"
				. 'Please either edit "Store uploads in this folder" option (Settigs -> Miscellaneous) or create the dir at your hosting'
				. "</div>";
		return $message;
	}
	$thumb_cache_dir = 'ThumbCache';
	
	$cache_dir = $wud['basedir'].'/'.$thumb_cache_dir;
	
	if (THUMB_DEBUG) echo "cache_dir = $cache_dir<br/>";
	
	if (!@check_cache_is_writable($cache_dir))
	{
		/*$message = "Thumbnailing does not work. (<a style=\"cursor:pointer;;\" id=\"thumb-id\">Details</a>)"
			. "<div id=\"thumb-err\">"
			. "To use thumbnailing you need to set write permissions (0777) to the dir <code>$cache_dir</code>"
			. "</div>";*/
		$message = "Thumbnail cache dir is not writtable (<a style=\"cursor:pointer;;\" id=\"thumb-id\">Details</a>)"
			. "<div id=\"thumb-err\">"
			. "To use thumbnail caching (highly recomended!) you need to set write permissions (0777) to the dir <code>$cache_dir</code>"
			. "</div>";
	}
	return $message;
}
function test_thumb_document_root()
{
	//return (get_document_root
}
?>