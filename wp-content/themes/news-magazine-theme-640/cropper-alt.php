<?php

function c_alt_get_request( $property, $default = 0 ) {

	if( isset($_REQUEST[$property]) ) {
		return $_REQUEST[$property];
	} else {
		return $default;
	}

}

if( !isset( $_REQUEST[ "src" ] ) ) { die( "no image specified" ); }

if((isset($_REQUEST['src'])) && !empty($_REQUEST['src'])){
$cropthis = addslashes($_REQUEST['src']);
}

$new_width = preg_replace( "/[^0-9]+/", "", c_alt_get_request( 'w', 100 ) );
$new_height = preg_replace( "/[^0-9]+/", "", c_alt_get_request( 'h', 100 ) );


$getimagesize = @getimagesize($cropthis);
$width = $getimagesize[0];
$height = $getimagesize[1];

$imagebytype = @ImageCreateFromJPEG ($cropthis) or 
$imagebytype = @ImageCreateFromPNG ($cropthis) or 
$imagebytype = @ImageCreateFromGIF ($cropthis) or 
$imagebytype = false; 

	
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
	$canvas = @ImageCreateTrueColor ($new_width, $new_height);


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


	
	@ImageCopyResampled ($canvas, $imagebytype, 0, 0, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);
	@ImageJPEG ($canvas);

?>
