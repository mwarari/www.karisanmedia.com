<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<?php wp_enqueue_script('jquery'); ?>

<script type='text/javascript'>
jQuery(document).ready(function() {
jQuery("#dropmenu ul").css({display: "none"}); // Opera Fix
jQuery("#dropmenu li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(100);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		});
});
</script>
<!--[if lte IE 6 ]>
<style type="text/css">

.time {

background: url(<?php echo bloginfo('stylesheet_directory'); ?>/images/bg_date.png) top left no-repeat transparent;
_background-image: none;
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled="true", sizingMethod="crop", src="<?php echo bloginfo('stylesheet_directory'); ?>/images/bg_date.png");
}

.comment-l{

background: url(<?php echo bloginfo('stylesheet_directory'); ?>/images/metadata-l.png) top left no-repeat transparent;
_background-image: none;
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled="true", sizingMethod="crop", src="<?php echo bloginfo('stylesheet_directory'); ?>/images/metadata-l.png");
}

.comment-r{

background: url(<?php echo bloginfo('stylesheet_directory'); ?>/images/metadata-r.png) top left no-repeat transparent;
_background-image: none;
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled="true", sizingMethod="crop", src="<?php echo bloginfo('stylesheet_directory'); ?>/images/metadata-r.png");
}

</style>
<![endif]-->
</head>

<body>
<div id="container">
	<div id="main_container">
		<div id="content_box">
			<div id="menu">
					<div id="main_menu">
					<ul id="dropmenu">
			<li class="page_item<?php if (is_home()) echo ' current_page_item'; ?>" id="home"><a href="<?php echo get_option('home'); ?>/"><span>Home</span></a></li>
			<?php wp_list_pages('title_li=' ); ?>
		</ul>
					</div>
					
			</div>
			<div id="header">
				<div id="title"><strong><a href="<?php echo get_option('home'); ?>"> <?php bloginfo('name'); ?> </a></strong></div>
				<div id="small_title"><?php bloginfo('description');?></div>
			</div>
			<div id="content_blog">
				<div id="nav">
						<div class="box-left">
						<?php get_sidebar(); ?>
						</div>
				</div>
				<div id="main_content">
					<div class="box_text">							