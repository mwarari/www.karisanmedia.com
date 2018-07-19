<?php
/*
Plugin Name: Stream Video Player
Version: 1.1.3
Plugin URI: http://rodrigopolo.com/about/wp-stream-video
Description: By far the best and most complete video-audio player plug-in for WordPress. iPhone, iPad and HD video compatible.
Author: Rodrigo Polo
Author URI: http://rodrigopolo.com

Copyright (C) 2009  Rodrigo J. Polo
  
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 any later version.
  
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
  
 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
 1) Includes Geoff Stearns' SWFObject Javascript Library v2.1 (MIT License) 
 Website: http://code.google.com/p/swfobject/
 License: http://www.opensource.org/licenses/mit-license.php
 
		
*/

// Normalize WWW urls between two URLs
class StreamVideo_nURI {
	function norm($s,$v){
		$s_hst = $this->getDomain($s);
		$v_hst = $this->getDomain($v);
		$s_isw = $this->isWww($s_hst);
		$v_isw = $this->isWww($v_hst);
		if($s_isw == $v_isw){
			return $v;
		}
		$s_nw = $this->noWww($s_hst);
		$v_nw = $this->noWww($v_hst);
		if($s_nw != $s_nw){
			return $v;
		}
		if($s_isw){
			$sv = explode('://',$v);
			return implode('://www.',$sv);
		}else{
			$sv = explode('://www.',$v);
			return implode('://',$sv);
		}
	}
	function noWww($h){
		if($this->isWww($h)){
			return substr($h, 4, strlen($h));
		}else{
			return '['.$h.']';
		}
	}
	function getDomain($url){
		$r = parse_url($url);
		return $r['host'];
	}
	function isWww($h){
		return (substr($h, 0, 4)=='www.');
	}
}

// The class to generate players
class rp_splayer {
	
	// Public vars
	var $swf, $flv, $mp4, $id, $name, $width, $height, $image, $opfix, $wrapper, $message;
	

	
	// Private vars, params and flashvars
	var $params;
	var $flashvars;
	var $mobile = false;
	var $fixmobilestyle = true;
	
	// init
	function rp_splayer(){
		$this->message='<div style="background-color:#ff9;padding:10px;">'.
		__('You need to install or upgrade Flash Player to view this content, install or upgrade by ', 'stream-video-player').
		'<a href="http://www.adobe.com/go/getflashplayer">'.
		__('clicking here', 'stream-video-player').
		'</a>.</div>';
	}

	// Set an object param
	function setParam($name,$val){
		$this->params[$name]=$val;
	}
	
	// Return a string with all params
	function getParams(){
		if(count($this->params)>0){
			foreach ($this->params as $key => $value){
				$para[]= '<param name="'.$key.'" value="'.$value.'" />';
			}
			return implode("\n",$para);
		}
	}
	
	// Set a Flash Var
	function setFv($name,$val){
		$this->flashvars[$name]=$val;
	}
	
	// Return a string with all Flash vars
	function getFv(){
		foreach ($this->flashvars as $key => $value){
			$flva[]=htmlspecialchars($key).'='.htmlspecialchars($value);
		}
		return implode('&amp;',$flva);
	}
	
	// remove breaklines
	function remove_breaklines($str){
		$str = ereg_replace("/\n\r|\r\n|\n|\r/", "", $str);
		return preg_replace("/\t/", "", $str);
	}
	
	// check if a URL is a YouTube URL
	function isYouTubeURL($url){
		if(empty($url)){
			return false;
		}
		if(substr($url, 0, 18)=='http://youtube.com'){
			return true;
		}
		if(substr($url, 0, 22)=='http://www.youtube.com'){
			return true;
		}
		return false;
	}
	
	// Return a YouTube ID
	function getYouTubeID($var){
		$var  = parse_url($var, PHP_URL_QUERY);
		$var  = html_entity_decode($var);
		$var  = explode('&', $var);
		$arr  = array();
		
		foreach($var as $val){
			$x = explode('=', $val);
			$arr[$x[0]] = $x[1];
		}
		unset($val, $x, $var);
		return $arr['v'];
	}
	
	// generate a YouTube Embed Code
	function genYouTubeEmbed($ytid){
		return '<object width="560" height="340"><param name="movie" value="http://www.youtube.com/v/'.$ytid.'&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'.$ytid.'&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="340"></embed></object>';
	}

	
	// Check if it is a mobile device.
	function is_mobile(){
		$container = $_SERVER['HTTP_USER_AGENT'];
		$useragents = array("iphone", "ipod", "aspen", "dream", "incognito", "webmate");
		foreach ($useragents as $useragent) {
			if (eregi($useragent, $container)) {
				return true;
			}
		}
		return false;
	}
	

	// Return a string with all the text of the code
	function getHTML($inc_js=true){
		
		// Mobile detector
		if($this->fixmobilestyle){
			$this->mobile = $this->is_mobile();
		}
		
		if(!empty($this->wrapper)){
			$vwrp = $this->wrapper;
			$to = strrpos($vwrp, "</");
			$wrp_a = substr($vwrp,0,$to);
			$wrp_b = substr($vwrp,$to,strlen($vwrp));
		}else{
			$wrp_a = '';
			$wrp_b = '';
		}
		
		// If a function is not empty returns it's html
		$swf = (empty($this->swf))?'':' data="'.$this->swf.'"';
		$swf_param = (empty($this->swf))?'':'<param name="movie" value="'.$this->swf.'" />';
		$width = (empty($this->width))?'':' width="'.$this->width.'"';
		$height = (empty($this->height))?'':' height="'.$this->height.'"';
		$id = (empty($this->id))?'':' id="'.$this->id.'"';
		$name = (empty($this->name))?'':' name="'.$this->name.'"';
		
		// If MP4 is declared it creates the nested object
		if(empty($this->mp4)){
			if(!$this->mobile){
				$last_object = $this->message;
			}else{
				// designed to show YouTube Video on his embed code for iPhone devices
				if(!empty($this->flv) && $this->isYouTubeURL(urldecode($this->flv))){
					$ytid = $this->getYouTubeID(urldecode($this->flv));
					$this->fixmobilestyle = false;
					echo "\n<style type=\"text/css\">\n.post object,.post embed{width:100% !important;height:auto;position:relative;z-index:0;}\n</style>\n";
					return $this->genYouTubeEmbed($ytid);
				}else{
					$last_object = __('(Video: Available only on a desktop browser)', 'stream-video-player');
				}
			}
		}else{
			$image_obj = (empty($this->image))?'':' data="'.$this->image.'"';
			$image_param = (empty($this->image))?'':'<param name="src" value="'.$this->image.'"/>';
			$last_object='<!--[if !IE]>--><object type="video/mp4"'.$image_obj.$width.$height.'>'."\n".
				'<param name="controller" value="false"/>'."\n".
				'<param name="target" value="myself"/>'."\n".
				'<param name="href" value="'.$this->mp4.'"/>'."\n".
				$image_param."\n".
				'<!--<![endif]-->';
				if(!$this->mobile){
					$last_object .= $this->message;
				}else{
					$last_object .= __('(video)', 'stream-video-player');
				}
				$last_object .= '<!--[if !IE]>-->'.
				'</object>'.
				'<!--<![endif]-->'.
				"\n";
		}
		
		// Set the default params
		$this->setParam('quality','high');
		
		// Set wmode to opaque to fix the overlaping elements with flash
		if($this->opfix==true){
			$this->setParam('wmode','opaque');
		}
		
		// Allow the fullscreen mode
		$this->setParam('allowfullscreen','true');
		
		// Allow the script access
		$this->setParam('allowscriptaccess','always');
		
		// Set the FLV parm for the player
		if(!empty($this->flv)){
			$this->setFv('file',$this->flv);
		}
		
		// Set the image
		$this->setFv('image',$this->image);
		
		
		// Set the param with all the flashvars
		$this->setParam('flashvars',$this->getFv());
		
		// Get all the params nitro a string
		$params = $this->getParams();
		
		// start generating all the HTML object
		
		$html=$wrp_a.'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'.$width.$height.$id.$name.'>'."\n".
		$swf_param."\n".
		$params."\n".
		'<!--[if !IE]>-->'."\n".
		'<object type="application/x-shockwave-flash"'.$swf.$width.$height.$name.'>'."\n".
		$params."\n".
		'<!--<![endif]-->'."\n".
		$last_object."\n".
		'<!--[if !IE]>-->'."\n".
		'</object>'."\n".
		'<!--<![endif]-->'."\n".
		'</object>'."\n";
		
		if($this->fixmobilestyle){
			if($this->mobile){
				$this->fixmobilestyle = false;
				echo "\n<style type=\"text/css\">\n.post object,.post embed{width:100% !important;height:auto;position:relative;z-index:0;}\n</style>\n";
			}
		}

		// Remove some spaces
		$html = $this->remove_breaklines($html);
		
		
		// For the SWFObject registrations
		if(!$this->mobile && $inc_js){
			$html .= "\n".'<script type="text/javascript">'."\n// <!--\n".'swfobject.registerObject("'.$this->id.'", "9.0.115");'."\n// -->\n</script>\n";
		}
		
		// make the final code
		$embedcode = $html.$wrp_b;
		
		// return the code
		return $embedcode;


	}
	
	// Restart the class
	function restart(){
		$this->swf=$this->flv=$this->mp4=$this->id=$this->name=$this->width=$this->height=$this->image=$this->opfix=$this->wrapper='';
		$this->flashvars=$this->params = array();
	}
	
}


// To clean up some texts
function StreamVideo_trim($str){
	return trim(preg_replace('/^(\xc2|\xa0|\x20|\x09|\x0a|\x0d|\x00|\x0B)|(\xc2|\xa0|\x20|\x09|\x0a|\x0d|\x00|\x0B)$/', '', $str)); 
}

// function to parse and edit the content
function StreamVideo_ViewPost($content){
	// finds the [stream /] tag and calls StreamVideo_ViewRender to parse.
	$content = preg_replace_callback("/\[stream ([^]]*)\/\]/i", "StreamVideo_ViewRender", $content);
	return $content;
}

// Replace x:/ with http:// for edition
function StreamVideo_ViewRender($matches){
	return  '[stream '.str_replace("x:/", "http://", $matches[1]).'/]';
}

// function to parse and save the content
function StreamVideo_SavePost($content){
	// finds the [stream /] tag and calls StreamVideo_SaveRender to parse.
	$content = preg_replace_callback("/\[stream ([^]]*)\/\]/i", "StreamVideo_SaveRender", $content);
	return $content;
}

// Replace http:// with x:/ to prevent issues with the rss feeds
function StreamVideo_SaveRender($matches){
	return  '[stream '.str_replace("http://", "x:/", $matches[1]).'/]';
}

// Parse content
function StreamVideo_Parse_content($c){
	global $svp_is_content;
	$svp_is_content = true;
	$r = StreamVideo_Parse($c);
	$svp_is_content = false;
	return $r;
	
}
// Parse the_excerpt
function StreamVideo_Parse_excerpt($c){
	global $svp_is_excerpt;
	$svp_is_excerpt = true;
	$r = StreamVideo_Parse($c);
	$svp_is_excerpt = false;
	return $r;
}
// Parse widget
function StreamVideo_Parse_widget($c){
	global $svp_is_widget;
	$svp_is_widget = true;
	$r = StreamVideo_Parse($c);
	$svp_is_widget = false;
	return $r;
}

// Replace the common excerpt function with this one in order to know when is running
function improved_trim_excerpt($text) {
	global $svp_is_excerpt;
	$svp_is_excerpt = true;
	
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = strip_shortcodes( $text );

		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
		}
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

// Parse the content to replace the tags with the player
function StreamVideo_Parse($content){
	global $StreamVideoSingle;
	// To show only on single pages
	$options = get_option('StreamVideoSettings');
	$StreamVideoSingle = ($options[3][3]['v']=='true');
	
	// finds the [stream /] tag and calls StreamVideo_Render to parse.
	$content = preg_replace_callback("/\[stream ([^]]*)\/\]/i", "StreamVideo_Render", $content);
	return $content;
}

// Get self URI
function StreamVideo_getSelfUri(){
	$proto = ( isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ) ? 'https://' : 'http://';
	return $proto.$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
}

// Render each player instance
function StreamVideo_Render($matches){
	global $videoid, $site_url, $player, $StreamVideoVersion, $StreamVideoSingle, $post, $svp_is_content, $svp_is_excerpt, $svp_is_widget;
	
	// URL Normalizer
	$nURI = new StreamVideo_nURI();
	
	if($svp_is_excerpt){
		if(is_feed()){
			return __('(Video: Watch this video on the post page)', 'stream-video-player');
		}
		return __('(video)', 'stream-video-player');
	}
	
	// Not necesary flashvars >>
	$noflashvar = explode(',','share,embed,logo,onlyonsingle,img,width,height,useobjswf,wrapper,bandwidth');
	
	$cmd = $matches[1];
	
	$cmd = str_replace("x:/", "http://", $cmd);
	$cmd = str_replace('"', '', $cmd);
	$cmd = str_replace(array('&#8221;','&#8243;'), '', $cmd);
	preg_match_all('/(\w*)=(.*?) /i', $cmd, $attributes);
	
	
	// A dirty temporary fix for the bad regex to support multiple spaces (ex: title=this is a title)
	$arguments = array();
	$tmp1=explode(' ',$cmd);
	foreach($tmp1 as $val){
		$tmp2 = explode('=',$val);
		if(count($tmp2)==2){
			$arguments[$tmp2[0]]=str_replace('"', '', $tmp2[1]);
			$last_key = $tmp2[0];
		}else if(count($tmp2)==1){
			$arguments[$last_key].=' '.str_replace('"', '', $tmp2[0]);
		}
	}
	
	// Normalize URLs	
	$thisurl = StreamVideo_getSelfUri();
	foreach($arguments as $kwww => $fxwww){
		if(substr($fxwww,0,7)=='http://' || substr($fxwww,0,8)=='https://'){
			$arguments[$kwww] = $nURI->norm($thisurl, $fxwww);
		}
	}
	// Display an error on the post if the FLV parameter is missing
	if (!array_key_exists('flv', $arguments)){
		return '<div style="background-color:#ff9;padding:10px;"><p>Error: Required parameter "flv" is missing!</p></div>';
		exit;
	}
	
	// Read the default options
	$options = get_option('StreamVideoSettings');

	/**
	 * Override default parameters 
	 **/
	 
	// Check if there is a base url declared
	if(!empty($arguments['base'])){
		// arguments to add base url
		$ar2up = explode(',','flv,img,mp4,hd,captions');
		
		// base url
		$baseurl = StreamVideo_trim($arguments['base']);
		
		// remove base URL if found
		foreach($ar2up as $sar2up){
			if(!empty($arguments[$sar2up])){
				$arguments[$sar2up] = str_ireplace($baseurl, '', $arguments[$sar2up]);
			}
		}
		
		// check if base url dont have / at the end
		if(substr($baseurl, -1)!='/'){
			$baseurl = $baseurl.'/';
		}
		
		// change each argument
		foreach($ar2up as $sar2up){
			$carg = $arguments[$sar2up]; 
			if(!empty($carg)){
				if(substr($carg,0,1)=='/'){
					$carg = substr($carg,1);
				}
				$arguments[$sar2up] = $baseurl.$carg;
			}
		}
	}
	
	// Width
	if (array_key_exists('width', $arguments)){
		$options[1][0]['v'] = $arguments['width'];
	}
	// Height
	if (array_key_exists('height', $arguments)){
		$options[1][1]['v'] = $arguments['height'];
	}
	// Image, check if has ben defined
	if (array_key_exists('img', $arguments)){
		$img_fqt = $arguments['img'];
	} else {
		// if not defined and not set in settings, use default
		if ($options[0][1]['v'] == ''){
			$img_fqt = $site_url.'/wp-content/plugins/stream-video-player/default.gif';
		} else {
			$img_fqt = $options[0][1]['v'];
		}
	}
	
	// Generate and Return the RSS output if needed
	if(is_feed()){
		// Generate RSS HTML
		$rss_output = '<a href="'.get_permalink($post->ID).'"><img src="'.$img_fqt.'" width="'.$options[1][0]['v'].'" height="'.$options[1][1]['v'].'" alt="video" /></a>';
		// Check if is Full Text or Summary option, if Summary just say (Video)
		$rss_output = (!get_option('rss_use_excerpt'))?$rss_output:__('(Video: Watch this video on the post page)', 'stream-video-player');
		// A hack for RSS Feed to display images
		$rss_output = (strpos($_SERVER['REQUEST_URI'],'/feed/rss') !== false)?htmlspecialchars($rss_output):$rss_output;
		// To control the object id
		$videoid++;
		return ($rss_output);
	}

	// Restart the HTML Player Generator
	$player->restart();
	$StreamVideo_jwp = array();

	
	/////
	// Set all the settings acording to the specified arguments and default options
	/////
	
	// wmode and style added if it requires a CSS OverLap Fix
	$overlfix = StreamVideo_trim($arguments['opfix']);
	if($overlfix=='true'){
		$player->opfix = true;
	}

	
	// HTML Wraper
	$player->wrapper=$options[3][1]['v'];
	
	// SWF Player
	$player->swf = $site_url.'/wp-content/plugins/stream-video-player/player.swf?ver='.$StreamVideoVersion;
	
	// FLV Video to load
	$player->flv = StreamVideo_trim($arguments['flv']);
	
	// iPhone MP4
	if(!empty($arguments['mp4'])){
		$player->mp4 = StreamVideo_trim($arguments['mp4']);
	}
	
	// HTML id of the player
	$player->id = 'svdo_'.$videoid;
	
	// HTML Name of the player
	$player->name = 'svdo_'.$videoid;
	
	// Width
	$player->width = $options[1][0]['v'];
	
	// Height
	$player->height = $options[1][1]['v'];
	
	// Image preview
	$player->image = StreamVideo_trim($img_fqt);
	
	/////
	// FlashVars
	/////

	
	// Set the HD
	if(!empty($arguments['hd'])){
		$player->setFv('hd.file', StreamVideo_trim($arguments['hd']));
		// Add the HD plugin to JW Player
		$StreamVideo_jwp[]='hd';
	}
	
	// Set the LongTail Ads
	if(!empty($arguments['adscode'])){
		$player->setFv('ltas.cc', StreamVideo_trim($arguments['adscode']));
		// Add the HD plugin to JW Player
		$StreamVideo_jwp[]='ltas';
	}
	
	// Set the Captions >>
	if(!empty($arguments['captions'])){
		$StreamVideo_jwp[]='captions';
		$player->setFv('captions.file', StreamVideo_trim($arguments['captions']));
		if(!empty($arguments['captions.fontsize'])){
			$player->setFv('captions.fontsize', StreamVideo_trim($arguments['captions.fontsize']));
		}
		if(!empty($arguments['captions.fontsize'])){
			$player->setFv('captions.fontsize', StreamVideo_trim($arguments['captions.fontsize']));
		}
		if(!empty($arguments['captions.state'])){
			$player->setFv('captions.state', StreamVideo_trim($arguments['captions.state']));
		}
		if(!empty($arguments['captions.margin'])){
			$player->setFv('captions.margin', StreamVideo_trim($arguments['captions.margin']));
		}else{
			$player->setFv('captions.margin', 20);
		}
	}
	// Set the Captions <<
	
	
	for ($i=0; $i<count($options);$i++){
		// Override all default parameters with the specified arguments
		foreach ((array) $options[$i] as $key=>$value){
			if (array_key_exists($value['on'], $arguments) && $value['on']){
				$value['v'] = $arguments[$value['on']];
			}
			if ($value['v'] != ''){
				$tvar = $value['on'];
				if($tvar == 'skin'){
					// If it's a "skin"
					if(StreamVideo_trim($value['v'])!='default'){
						// for custom skins
						$player->setFv('skin',$site_url.'/wp-content/plugins/stream-video-player/skins/'.StreamVideo_trim($value['v'])); //.'?ver='.$StreamVideoVersion
					}
				}else if($tvar != 'skin'){
					// set the rest of parameters but not if they are skin, width, height, useobjswf or wrapper
					$player->setFv(strtolower($tvar),StreamVideo_trim($value['v']));
				}		
			}
		}
	}
	
	

	// Set the provider for JW Player >>
	$providers = explode(',','video,sound,image,youtube,http,rtmp');
	foreach($providers as $p){
		if($player->flashvars['provider']==$p){
			$player->setFv('provider',$p);
			break;
		}
	}
	if(empty($player->flashvars['provider'])){
		$player->setFv('provider','http');
	}
	
	// Set the controlbar for JW Player >>
	if(empty($player->flashvars['controlbar'])){
		$player->setFv('controlbar','over');
	}
	// Set the controlbar for JW Player <<

	// Set the bufferlength for JW Player (legacy for the bandwidth param)
	$fvbw = $player->flashvars['bandwidth'];
	if(!empty($fvbw)){
		if($fvbw=='low'){
			$player->setFv('bufferlength','30');
		}else if($fvbw=='med'){
			$player->setFv('bufferlength','10');
		}else if($fvbw=='high'){
			$player->setFv('bufferlength','5');
		}
	}
	
	// Set the logo
	if(!empty($player->flashvars['logo'])){
		$player->setFv('logo.file',$player->flashvars['logo']);
	}
	
	// Set the sharing URL
	if(!empty($player->flashvars['share'])){
		if($player->flashvars['share'] == 'true'){
			$StreamVideo_jwp[]='sharing';
			$thispost = get_post($post->ID);
			$player->setFv('sharing.link',urlencode($thispost->guid));
		}
	}
	
	
	// Set the plugins
	if(count($StreamVideo_jwp)>0){
		$player->setFv('plugins', implode(',',$StreamVideo_jwp));
	}
	
	// To control the object id
	$videoid++;
	
	// Set the Embed Code
	if(!empty($player->flashvars['embed'])){
		if($player->flashvars['embed']=='true'){	
			// Remove not necesary flashvars
			foreach($noflashvar as $rfv){
				unset($player->flashvars[$rfv]);
			}
			
			// Get HTML
			$embedhtml = $player->getHTML(false);
			
			// Set the embed code
			$player->setFv('sharing.code',urlencode($embedhtml));
			
			// Check if sharing plugin is set
			if(!in_array('sharing',$StreamVideo_jwp)){
				$StreamVideo_jwp[]='sharing';
				$player->setFv('plugins', implode(',',$StreamVideo_jwp));
			}
		}		
	}
	
	// Remove not necesary flashvars
	foreach($noflashvar as $rfv){
		unset($player->flashvars[$rfv]);
	}

	// Generate and return the HTML
	
	if($StreamVideoSingle && !$svp_is_widget){
		if(is_single() || is_page()){
			return $player->getHTML();
		}else{
			return __('(video)', 'stream-video-player');
		}
	}else{
		return $player->getHTML();
	}
	
	
	
}

// Add page on settings for level 8 (admins)
function StreamVideoAddPage(){
	if(function_exists('add_object_page')){
		add_object_page("Stream Video Player", "Stream Video", 8, __FILE__, "StreamVideoOptions", plugins_url('/stream-video-player/button/images/vdo.png'));
	}else{
		add_menu_page('Stream Video Player', 'Stream Video', 10, basename(__FILE__), 'StreamVideoOptions', plugins_url('/stream-video-player/button/images/vdo.png'));
	}
}

// To read the skin directory
function StreamVideoReadSkins(){
	// Get the skin directory (a better aproach!)
	$skins_dir = dirname(__FILE__).'/skins/';
	$skins = array();
		
	// Pull the swf's listed in the skins folder to generate the dropdown list with valid skin files
	chdir($skins_dir);
	if ($handle = opendir($skins_dir)){
		while (false !== ($file = readdir($handle))){
			if ($file != "." && $file != ".."){
				$ext = strrchr($file, '.');
				if($ext == '.swf' || $ext == '.zip'){
					$skins[] = $file;//substr($file, 0, -strlen($ext));
				}
			}
		}
		closedir($handle);
	}
	chdir(dirname(__FILE__));
	// Add the default value onto the beginning of the skins array
	array_unshift($skins, 'default');
	
	return $skins;
}

// Plug-in options
function StreamVideoOptions(){
	global $site_url;
	$message = '';	
	$g = array(0=>__('Video Properties', 'stream-video-player'), 1=>__('Layout', 'stream-video-player'), 2=>__('Behavior', 'stream-video-player'), 3=>__('System', 'stream-video-player'));

	$options = get_option('StreamVideoSettings');
	$options_lang = StreamVideoLoadDefaults();
	// Process form submission
	if ($_POST){
		for($i=0; $i<count($options);$i++){
			foreach((array) $options[$i] as $key=>$value){
				// Handle Checkboxes that don't send a value in the POST
				if($value['t'] == 'cb' && !isset($_POST[$options[$i][$key]['on']])){
					$options[$i][$key]['v'] = 'false';
				}
				if($value['t'] == 'cb' && isset($_POST[$options[$i][$key]['on']])){
					$options[$i][$key]['v'] = 'true';
				}
				// Handle all other changed values
				if(isset($_POST[$options[$i][$key]['on']]) && $value['t'] != 'cb'){
					
					// Fix for quotes 
					$spval = $_POST[$options[$i][$key]['on']];
					if(get_magic_quotes_gpc()){
						$spval =  stripslashes($spval);
					}
					
					$options[$i][$key]['v'] = $spval;
				}
			}
		}
		update_option('StreamVideoSettings', $options);
		$message = '<div class="updated"><p><strong>'.__('Options saved.', 'stream-video-player').'</strong></p></div>';	
	}

	echo '<div class="wrap">';
	echo '<h2>'.__('Stream Video Options', 'stream-video-player').'</h2>';
	echo $message;
	echo '<form method="post" action="admin.php?page=stream-video-player/stream-video-player.php">';
	echo "<p>".__('Here you can set some default global options for all your videos, if you need help or more information on how to encode and prepare your video to be a pseudo stream compliant check out the', 'stream-video-player'). ' <a href="http://rodrigopolo.com/about/wp-stream-video/faq" target="_blank">Plug-in '.__('FAQs', 'stream-video-player').'</a> '.__('where you can find a lot of free and open resources to encode your video.', 'stream-video-player')."</p>";

	// For tests:
	//echo "<pre>";
	//echo print_r($options);
	//echo "</pre>";

	$options[1][2]['op'] = StreamVideoReadSkins();
	
	// Generate the admin HTML based on the options
	foreach((array) $options as $key=>$value){
		echo '<h3>'.$g[$key].'</h3>'."\n";
		echo '<table class="form-table">'."\n";
		foreach((array) $value as $sk => $setting){
			echo '<tr><th scope="row">'.$options_lang[$key][$sk]['dn'].'</th><td>'."\n";
			switch ($setting['t']){
				case 'tx':
					echo '<input type="text" name="'.$setting['on'].'" value="'.htmlentities($setting['v']).'" />';
					break;
				case 'dd':
					echo '<select name="'.$setting['on'].'">';
					foreach((array) $setting['op'] as $v){
						$selected = '';
						if($v == $setting['v']){
							$selected = ' selected';
						}
						echo '<option value="'.$v.'"'.$selected.'>'.($v).'</option>'; // remove ucfirst
					}
					echo '</select>';
					break;
				case 'cb':
					echo '<input type="checkbox" class="check" name="'.$setting['on'].'" ';
					if($setting['v'] == 'true'){
						echo 'checked="checked"';
					}
					echo ' />';
					break;
				}
				echo '</td></tr>'."\n";
			}
			echo '</table>'."\n";
		}
	echo '<p class="submit"><input class="button-primary" type="submit" method="post" value="'.__('Update Options', 'stream-video-player').'"></p>';
	echo '</form>';
	echo '</div>';
}

function StreamVideoFixStyle(){
	echo "\n<style type=\"text/css\">\nobject {outline:none;}\n</style>\n";
}

// Function to include the SWF Object
function StreamVideoSWFObj(){
	$options = get_option('StreamVideoSettings');
	// add JS If is set.
	if($options[3][2]['v']=='true'){
		wp_enqueue_script( 'swfobject', plugins_url('/stream-video-player/swfobject.js'), array(), '2.1'); //, true
	}else{
		wp_enqueue_script('swfobject');
	}
	
}

// Function to load the defaults
function StreamVideoLoadDefaults(){
	$f = array();

	/*
	  Array Legend:
	  on = Option Name
	  dn = Display Name
	  t = Type
	  v = Default Value
	*/
	
	//Video Properties
	
	$f[0][0]['on'] = 'title';
	$f[0][0]['dn'] = __('Title', 'stream-video-player');
	$f[0][0]['t'] = 'tx';
	$f[0][0]['v'] = '';
	
	$f[0][1]['on'] = 'img';
	$f[0][1]['dn'] = __('Preview Image', 'stream-video-player');
	$f[0][1]['t'] = 'tx';
	$f[0][1]['v'] = '';
		
	//Layout
	
	$f[1][0]['on'] = 'width';
	$f[1][0]['dn'] = __('Player Width', 'stream-video-player');
	$f[1][0]['t'] = 'tx';
	$f[1][0]['v'] = '450';

	$f[1][1]['on'] = 'height';
	$f[1][1]['dn'] = __('Player Height', 'stream-video-player');
	$f[1][1]['t'] = 'tx';
	$f[1][1]['v'] = '253';

	$f[1][2]['on'] = 'skin';
	$f[1][2]['dn'] = __('Skin', 'stream-video-player');
	$f[1][2]['t'] = 'dd';
	$f[1][2]['v'] = 'default';
	$f[1][2]['op'] = array('default');
	
	$f[1][3]['on'] = 'logo';
	$f[1][3]['dn'] = __('Logo', 'stream-video-player');
	$f[1][3]['t'] = 'tx';
	$f[1][3]['v'] = '';
	
	$f[1][5]['on'] = 'dock';
	$f[1][5]['dn'] = __('Dock', 'stream-video-player');
	$f[1][5]['t'] = 'dd';
	$f[1][5]['v'] = 'true';
	$f[1][5]['op'] = array('true', 'false');
	
	$f[1][4]['on'] = 'controlbar';
	$f[1][4]['dn'] = __('Control Bar', 'stream-video-player');
	$f[1][4]['t'] = 'dd';
	$f[1][4]['v'] = 'over';
	$f[1][4]['op'] = array('bottom', 'over', 'none');

	//Behavior

	$f[2][0]['on'] = 'autostart';
	$f[2][0]['dn'] = __('Auto Start', 'stream-video-player');
	$f[2][0]['t'] = 'cb';
	$f[2][0]['v'] = 'false';
	
	$f[2][1]['on'] = 'volume';
	$f[2][1]['dn'] = __('Startup Volume', 'stream-video-player');
	$f[2][1]['t'] = 'dd';
	$f[2][1]['v'] = '90';
	$f[2][1]['op'] = array('0', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100');
	
	$f[2][2]['on'] = 'share';
	$f[2][2]['dn'] = __('Show Share URL', 'stream-video-player');
	$f[2][2]['t'] = 'cb';
	$f[2][2]['v'] = 'false';
	
	$f[2][3]['on'] = 'embed';
	$f[2][3]['dn'] = __('Show Embed HTML Code', 'stream-video-player');
	$f[2][3]['t'] = 'cb';
	$f[2][3]['v'] = 'false';
	
	// System

	$f[3][4]['on'] = 'provider';
	$f[3][4]['dn'] = __('Default media provider<br /><small>http = pseudo-streaming</small>', 'stream-video-player');
	$f[3][4]['t'] = 'dd';
	$f[3][4]['v'] = 'http';
	$f[3][4]['op'] = array('video', 'sound', 'image', 'youtube', 'http', 'rtmp');
	
	$f[3][5]['on'] = 'streamer';
	$f[3][5]['dn'] = __('Pseudo-Streamer URL', 'stream-video-player');
	$f[3][5]['t'] = 'tx';
	$f[3][5]['v'] = get_option('siteurl').'/wp-content/plugins/stream-video-player/streamer.php';


	$f[3][0]['on'] = 'bandwidth';
	$f[3][0]['dn'] = __('Bandwidth', 'stream-video-player');
	$f[3][0]['t'] = 'dd';
	$f[3][0]['v'] = 'high';
	$f[3][0]['op'] = array('low', 'med', 'high', 'off');

	$f[3][1]['on'] = 'wrapper';
	$f[3][1]['dn'] = __('HTML Wrapper', 'stream-video-player');
	$f[3][1]['t'] = 'tx';
	$f[3][1]['v'] = '';

	$f[3][2]['on'] = 'useobjswf';
	$f[3][2]['dn'] = __('Use own SWFObject.js', 'stream-video-player');
	$f[3][2]['t'] = 'cb';
	$f[3][2]['v'] = 'true';
	
	$f[3][3]['on'] = 'onlyonsingle';
	$f[3][3]['dn'] = __('Show player only on single pages', 'stream-video-player');
	$f[3][3]['t'] = 'cb';
	$f[3][3]['v'] = 'false';

	return $f;
}

// Function for activation
function StreamVideo_activate(){
	update_option('StreamVideoSettings', StreamVideoLoadDefaults());
}

// Function for deactivation
function StreamVideo_deactivate(){
	delete_option('StreamVideoSettings');
}

// Add button hooks to the Tiny MCE 
function StreamVideo_addbuttons() {
	
	global $StreamVideoVersion;
	
	if (!current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
		return;
	}
	if ( get_user_option('rich_editing') == 'true') {
		add_filter( 'tiny_mce_version', 'StreamVideo_tiny_mce_version', 0 );
		add_filter( 'mce_external_plugins', 'StreamVideo_plugin', 0 );
		add_filter( 'mce_buttons', 'StreamVideo_button', 0);
	}


	// Register Hooks
	if (is_admin()) {
		
		// Add Quicktag
		add_action( 'edit_form_advanced', 'add_quicktags' );
		add_action( 'edit_page_form', 'add_quicktags' );

		// Queue Embed JS
		add_action( 'admin_head', 'set_admin_js_vars');
		wp_enqueue_script( 'streamvideoqt', plugins_url('/stream-video-player/button/svb.js'), array(), $StreamVideoVersion);
		
	}
	
}

// Break the browser cache of TinyMCE
function StreamVideo_tiny_mce_version( $ver ) {
	global $StreamVideoVersion;
	return $ver . '-svb' . $StreamVideoVersion;
}

// Load the custom TinyMCE plugin
function StreamVideo_plugin( $plugins ) {
	$plugins['streamvideoqt'] = plugins_url('/stream-video-player/button/tinymce3/editor_plugin.js');
	return $plugins;
}

// Add the buttons: separator, custom
function StreamVideo_button( $buttons ) {
	array_push( $buttons, 'separator', 'StreamVideo' );
	return $buttons;
}

// Add a button to the quicktag view (HTML Mode) >>>
function add_quicktags(){
?>
<script type="text/javascript" charset="utf-8">
// <![CDATA[
(function(){
	if (typeof jQuery === 'undefined') {
		return;
	}
	jQuery(document).ready(function(){
		// Add the buttons to the HTML view
		jQuery("#ed_toolbar").append('<input type="button" class="ed_button" onclick="RodrigoPolo.Tag.embed.apply(RodrigoPolo.Tag); return false;" title="Insert Stream Video Tag" value="Stream Video" />');
	});
}());
// ]]>
</script>
<?php	
}

// Set URL for the settings page
function set_admin_js_vars(){
?>
<script type="text/javascript" charset="utf-8">
// <![CDATA[
	if (typeof RodrigoPolo !== 'undefined' && typeof RodrigoPolo.Tag !== 'undefined') {
		RodrigoPolo.Tag.configUrl = "<?php echo plugins_url('/stream-video-player/config.php'); ?>";
	}
// ]]>	
</script>
<?php
}

// To handle version on JS files
$StreamVideoVersion = '1.1.3';

// To handle ids
$videoid = 0;

// To handle the site url
$site_url = get_option('siteurl');

// New player object
$player = new rp_splayer();

// Load the language packs
load_plugin_textdomain( 'stream-video-player', FALSE, 'stream-video-player/langs/');

// Fix to the_excerpt 
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

// Set the activation
register_activation_hook(__FILE__,'StreamVideo_activate');

// Set the deactivation function
register_deactivation_hook(__FILE__,'StreamVideo_deactivate');

// Set the content filter for Content and for RSS
add_filter('the_content', 'StreamVideo_Parse_content',100);
add_filter('the_excerpt', 'StreamVideo_Parse_excerpt',100);

// For editing
add_filter('content_edit_pre', 'StreamVideo_ViewPost');

// For writing
add_filter('content_save_pre', 'StreamVideo_SavePost');

// Add options menu
add_action('admin_menu', 'StreamVideoAddPage');

// Adding button to the MCE toolbar (Visual Mode) 
add_action('init', 'StreamVideo_addbuttons');

// Include the SWFObject
add_action((preg_match("/(\/\?feed=|\/feed)/i",$_SERVER['REQUEST_URI'])) ? 'template_redirect' : 'plugins_loaded', 'StreamVideoSWFObj');
add_action('wp_head', 'StreamVideoFixStyle');

/***********************
 * Widget Code  >>>
 **********************/
 
// Widget hook
add_action( 'widgets_init', 'svp_load_widget' );
function svp_load_widget() {
	register_widget( 'SVP_Widget' );
}

// Widget Class
class SVP_Widget extends WP_Widget {

	// Class Init
	function SVP_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'svp_widget', 'description' => __('Put your video tag short code here to include some widget videos.', 'stream-video-player') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 650, 'id_base' => 'svp_widget_id' );

		/* Create the widget. */
		$this->WP_Widget( 'svp_widget_id', 'Stream Video Player', $widget_ops, $control_ops );
	}

	// Widget output
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$vtag = $instance['vtag'];
		$show_title = isset( $instance['show_title'] ) ? $instance['show_title'] : false;

		/* Before widget (defined by themes). */
		echo $before_widget;
		
		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title && $show_title )
			echo $before_title . $title . $after_title;

		/* Display vtag from widget settings if one was input. */
		if ( $vtag ){
			echo StreamVideo_Parse_widget($vtag);
		}

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	// Widget Update
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['vtag'] = strip_tags( $new_instance['vtag'] );
		$instance['show_title'] = $new_instance['show_title'];
		return $instance;
	}
	
	// Widget Form
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Title', 'stream-video-player'), 'vtag' => "[stream /]", 'show_title' => true);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'stream-video-player'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'vtag' ); ?>"><?php _e('Video Tag:', 'stream-video-player'); ?></label>
            <textarea id="<?php echo $this->get_field_id( 'vtag' ); ?>" name="<?php echo $this->get_field_name( 'vtag' ); ?>" style="width:100%; height:150px;"><?php echo $instance['vtag']; ?></textarea>

		</p>
        <p><?php _e('Type or paste here a video tag short code to display a video, you can add multiple tags on this widget and text if you want, if you need a help generating a video tag enter to the page or post editor and generate one with the video tag generator, take in count the widget width size to make your video fit it, if your video is very small consider not using the control bar.', 'stream-video-player'); ?></p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_title'], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_title' ); ?>" name="<?php echo $this->get_field_name( 'show_title' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e('Display Title', 'stream-video-player'); ?></label>
		</p>

	<?php
	}
}
/***********************
 * Widget Code  <<<
 **********************/

?>