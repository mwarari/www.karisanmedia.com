<!-- header.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?><?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results for  <?php printf(__('\'%s\''), $s); } ?><?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?><?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?><?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?><?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?><?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lte IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie6.css" type="text/css" media="screen" /><![endif]-->
<!--[if gt IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie.css" type="text/css" media="screen" /><![endif]-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/pagenavi-css.css" type="text/css" media="screen" />


<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if lte IE 6]>
	<script defer type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngfix.js"></script>
	<![endif]-->


	<?php wp_head(); ?>

</head>
<body>

<div id="wrapper">

<div id="maincontainer" class="rounded-corners">


<div id="sitetitle">
	<div class="logo">
<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_sitelogo')){ ?>
<a href="<?php echo get_option('home'); ?>"><img src="<?php echo get_option($themeoptionsprefix.'_sitelogo'); ?>" alt="<?php bloginfo('name'); ?>" border="0"></a>
<?php } else { ?>
<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
<?php } ?>
</div><br/>
<?php $blogdescription=get_bloginfo('description'); if(!empty($blogdescription)){ ?> <div class="tagline">  <?php bloginfo('description');?> </div> <?php } ?>

</div>

<div id="nmag-navbar">

	<ul id="nmag">
		<li><a href="<?php echo get_settings('home'); ?>"><?php _e("Home",'KarisanMediaTheme');?></a></li>
		<?php if( current_user_can('manage_options')  && get_option($themeoptionsprefix.'_hideaddpostlink') != 'hide' )  { ?> <li><a href="<?php echo get_settings('home'); ?>/wp-admin/post-new.php"><?php _e("Add Post",'KarisanMediaTheme');?></a></li> </a> <?php } ?>
		<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
	</ul>

</div>
<div class="datesearch">
<div class="date"><?php echo date_i18n( 'l F jS Y', false, false ) ?></div>
<div class="search"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
</div>
<!--
<?php
global $themeoptionsprefix;
$showhideleader=get_option($themeoptionsprefix.'_showhideleader');
if( isset($showhideleader) && !empty($showhideleader) && ($showhideleader != 'hide') ) { ?>

	<div id="leaderboardspace" style="text-align:<?php $textalignlc=get_option($themeoptionsprefix.'_showhideleadercontentposition'); if(!isset($textalignlc) || empty($textalignlc)){ $textalignlc="center";}  echo $textalignlc; ?>;">
<?php if(get_option($themeoptionsprefix.'_leadercode') <> "") {  echo stripslashes(get_option($themeoptionsprefix.'_leadercode')); } else { ?> <img src="<?php bloginfo('template_url'); ?>/images/fsplash728.jpg" alt="" border=""/><?php } ?>
</div>
<?php } ?>
-->
<div id="leaderboardspace" style="text-align:<?php $textalignlc=get_option($themeoptionsprefix.'_showhideleadercontentposition'); if(!isset($textalignlc) || empty($textalignlc)){ $textalignlc="center";}  echo $textalignlc; ?>;">
	<div id="banner-effects">
		<!--
	<?php imagesliderfx_echo_embed_code(); ?>
	  -->
		This should be blank.
	</div>
<div id="live-player" style="text-align:left">
<!-- 08/18/2012
<div id="live-player-text" style="text-align:left">


<strong>Click below to listen using a standalone player.</strong>
<br/>

<a href="http://www.icastcenter.com/cast/tunein.php/karisan/playlist.pls"><img src="http://www.karisanmedia.com/wp-content/images/player-winamp.png" alt="Click to play using Winamp"></a>
<a href="http://www.icastcenter.com/cast/tunein.php/karisan/playlist.asx"><img src="http://www.karisanmedia.com/wp-content/images/player-wmp.png" alt="Click to play using Windows Media Player"></a>
<a href="http://www.icastcenter.com/cast/tunein.php/karisan/playlist.ram"><img src="http://www.karisanmedia.com/wp-content/images/player-real.png" alt="Click to play using Real Player"></a>
<a href="http://www.icastcenter.com/cast/tunein.php/karisan/playlist.qtl"><img src="http://www.karisanmedia.com/wp-content/images/player-qt.png" alt="Click to play using Quick Time"></a>

<a href="http://www.icastcenter.com/cast/tunein.php/karisan/playlist.pls"><img src="http://www.karisanmedia.com/wp-content/images/Winamp-icon128x128.png" width="32" height="32" alt="Click to play using Winamp"></a>
<a href="http://www.icastcenter.com/cast/tunein.php/karisan/playlist.asx"><img src="http://www.karisanmedia.com/wp-content/images/wmpIcon94x94.bmp" width="32" height="32" alt="Click to play using Windows Media Player"></a>
<a href="http://www.icastcenter.com/cast/tunein.php/karisan/playlist.ram"><img src="http://www.karisanmedia.com/wp-content/images/realplayerIcon94x94.bmp" width="32" height="32" alt="Click to play using Real Player"></a>
<a href="http://www.icastcenter.com/cast/tunein.php/karisan/playlist.qtl"><img src="http://www.karisanmedia.com/wp-content/images/quicktimeIcon94x94.bmp" width="32" height="32" alt="Click to play using Quick Time"></a>
-->
<!-- 08/18/2012
<script language="JavaScript" type="text/javascript" src="http://radio.securenetsystems.net/radio_player_mobile_instructions.js"></script>
<a href="javascript:SSI_MobileStream('show','KARISAN');"><img src="https://radio.securenetsystems.net/graphics/buttons_mobile/mobileyellowsmall.png" border="0" width="71" height="94"></a><br>
<div id="SSI_MobileStream_Modal" style="background-image: url(http://radio.securenetsystems.net/graphics/overlay.png);display:none;z-index:921;"></div>
<div id="SSI_MobileStream_Instructions" style="width:410px;height:400px;border:1px solid black;display:none;position:absolute;z-index:922;background-color:dddddd;">
	   <a href="javascript:SSI_MobileStream('hide');" style="font:normal 12px Verdana;text-decoration:none;color:000000;font-weight:bold;">[<font color="red">X</font>] close</a><br>
	<iframe id="SSI_MobileStream_Page" src="http://radio.securenetsystems.net/radio_player_mobile_instructions.cfm?pageMode=ini&stationCallSign=KARISAN" frameborder="0" onBlur="this.src='http://radio.securenetsystems.net/radio_player_mobile_instructions.cfm?pageMode=ini&stationCallSign=KARISAN';" style="width:410px;height:380px;border-width:0px;border-top:3px double red;background-color:dddddd;"></iframe>

</div>

</div>
-->
<div id="live-player-embed">

	<!--
	<object
	id="fmp256"
	classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
	width="180"
	height="70"
	codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
	>
	<param name="data" value="http://www.icastcenter.com/minicaster.swf" />
	<param name="flashVars" value="config=http://www.icastcenter.com/cast/tunein.php/karisan/playlist.mc" />
	<param name="wmode" value="transparent" />
	<param name="allowScriptAccess" value="always" />
	<param name="src" value="http://www.icastcenter.com/minicaster.swf" />
	<param name="flashvars" value="config=http://www.icastcenter.com/cast/tunein.php/karisan/playlist.mc" />
	<embed
	id="fmp256"
	type="application/x-shockwave-flash"
	width="180"
	height="70"
	src="http://www.icastcenter.com/minicaster.swf"
	allowscriptaccess="always"
	flashvars="config=http://www.icastcenter.com/cast/tunein.php/karisan/playlist.mc"
	wmode="transparent" data="http://www.icastcenter.com/minicaster.swf">
	</embed>
	</object>
	-->
	<!--
	<a href="javascript:{}" onClick="window.open('http://radio.securenetsystems.net/radio_player_large.cfm?stationCallSign=KARISAN','radio_player', 'Width=822,Height=507,directories=0,hotkeys=0,location=0,menubar=0,personalbar=0,resizable=0,scrollbars=0,status=0,toolbar=0');"><img src="https://radio.securenetsystems.net/graphics/buttons_player/27.jpg" border="0" width="89" height="70"></a>
	-->
	<!-- <a href="javascript:{}" onClick="window.open('http://www.karisanmedia.com/media-player/index.htm','radio_player', 'Width=822,Height=507,directories=0,hotkeys=0,location=0,menubar=0,personalbar=0,resizable=0,scrollbars=0,status=0,toolbar=0');"><img src="http://www.karisanmedia.com/media-player/graphics/listen-live.jpg" border="0" width="89" height="70"></a> -->
	<iframe title='Flash Player' src='//samcloudmedia.spacial.com/webwidgets/player/v4/250x100.html?sid=94614&rid=169542&startstation=false&theme=light&showBuyButton=false&token=3deea227365ee62e6d073a0cd0af62b9f9e8322f'
			width='250'
			height='100'
			scrolling='no'
			frameborder='0'
			marginheight='0'
			marginwidth='0'
			allowtransparency='true'>
			<p>Your browser does not support iframes.
			<a href='//samcloudmedia.spacial.com/webwidgets/player/v4/250x100.html?sid=94614&rid=169542&startstation=false&theme=light&showBuyButton=always&token=3deea227365ee62e6d073a0cd0af62b9f9e8322f'>
			View the content of this inline frame</a> with your browser</p>
	</iframe>
	<br/>
	<strong><em>Call in Number: 8059309-2350 PIN: 722-3241</em></strong>
</div>
</div>
</div>

<div id="contentcontainer">
