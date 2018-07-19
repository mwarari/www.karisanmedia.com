<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if (is_single()) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>
</head>
<body>

<div id="wrapt" class="clearfix">

<div id="header" class="clearfix">

<div id="menu" class="clearfix">
<ul>
<li class="pages"><a href="<?php echo get_settings('home'); ?>">Home</a></li>
<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>	
</div>	<!-- end menu -->

<h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<h2><?php bloginfo('description'); ?></h2>

</div> <!-- end header -->

<div id="Trss"><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe via RSS"><img src="<?php bloginfo('template_directory'); ?>/images/rss.jpg" alt="Subscribe via RSS" /></a></div>

<div id="Tsearch">
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p class="aligncenter">
	<input name="s" type="text" class="s"  value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
	<input type="image" class="searchButton" value="Search" src="<?php bloginfo('stylesheet_directory'); ?>/images/srchbtn.jpg" alt="search" />
</p>
</form></div>
