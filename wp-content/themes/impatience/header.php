<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
		<meta name="generator" content="WordPress" />
		<meta name="author" content="Alex Welch" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dark.css" type="text/css" media="screen" title="default" charset="utf-8" />
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/light.css" type="text/css" media="screen" title="light" charset="utf-8" />		
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<script src="<?php bloginfo('template_url') ?>/scripts/prototype.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php bloginfo('template_url') ?>/scripts/site.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php bloginfo('template_url') ?>/scripts/styleswap.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
					// 
					// function goWide() {
					// 	$('content').addClassName("wide_content");
					// 	$('right_col').hide();
					// }
					// function goNarrow() {
					// 	$('content').removeClassName("wide_content");
					// 	$('right_col').show();
					// }
		</script>
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<div id="tip_top_nav">
					<!-- <h5>Color Scheme</h5> -->
					<ul>
						<li>color scheme:</li>						
						<li class="light"><a href="#" onclick="setActiveStyleSheet('light'); return false;">lighten up</a></li>
						<li class="dark"><a href="#" onclick="setActiveStyleSheet('default'); return false;">dark horse</a></li>
					</ul>
				</div>				
				<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			 	<h5><?php bloginfo('description'); ?></h5>
			</div>
			<div id="top_nav">
				<ul>
					<!-- <li class="<?php echo ($GLOBALS['current_page'] == 'home' ? 'current_page_item' : 'not-current') ?>"><a href="<?php echo get_option('home'); ?>/">Blog</a></li> -->
					<?php wp_list_pages('depth=1&title_li='); ?>
				</ul>
			</div>
			<div id="middle">				
				<div id="sub_nav">
					<ul><?php wp_list_categories(array('title_li' => '', 'hierarchical' => false)); ?></ul> 
				</div>