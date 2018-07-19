<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/MenuMatic.css" type="text/css" media="screen" />
<!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="ie6.css" />
<![endif]-->
<!--PNGFIX JS-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/iepngfix_tilebg.js"></script>
<style type="text/css">
	img, div { behavior: url(<?php bloginfo('template_directory'); ?>/iepngfix.htc) }
</style>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body class="bodyBg2435">
<div id="wrapper"><!-- main wrapper -->
<div id="header" style="margin-top: 14px;"><!--HEADER PART STARTS HERE-->
  <div class="examples"><!--NAVIGATION PART STARTS HERE  class="navigation"-->
    <ul id="nav"><!--  class="sf-menu" -->
      <li class="<?php if (((is_home()) && !(is_paged())) or (is_archive()) or (is_single()) or (is_paged()) or (is_search())) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>">Home<?php echo $langblog;?></a></li>
      <?php wp_list_pages('sort_column=ID&title_li='); ?>
    </ul>
  </div><!--NAVIGATION PART ENDS HERE-->
  <div id="branding"><!-- branding -->
    <div>
      <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
      <h3><?php bloginfo('description'); ?></h3>
    </div>
    <div id="search">
      <form class="search" method="get" id="searchform1" action="<?php bloginfo('url'); ?>/">
        <div>
          <input type="text" value="Search..." name="s" id="ls" onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" class="searchbg" />
        </div>
        <div>
          <input type="submit" class="searchbtn" value="" id="submit" />
        </div>
      </form>
    </div>
    <div id="date-time">
      <p style="text-align: right;" class="time">Today is <span><?php echo date("F jS\, Y"); ?></span>. The current time is <span><?php echo date("g:i");  ?></span><?php echo date(" A"); ?>.</p>
    </div>
  </div><!-- branding -->
</div><!--HEADER PART ENDS HERE-->
