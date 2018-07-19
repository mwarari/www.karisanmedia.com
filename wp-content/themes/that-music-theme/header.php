<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php bloginfo('name'); ?>
<?php if ( is_single() ) { ?>
&raquo; Blog Archive
<?php } ?>
<?php wp_title(); ?>
</title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/tabber.js"></script>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div class="container_16">
<div class="grid_16 blog_title">
  <h1><a href="<?php bloginfo('url'); ?>">
    <?php bloginfo('name'); ?>
    </a></h1>
    <h4>
      <?php bloginfo('description'); ?>
    </h4>
</div>
<div class="grid_16 navigation">
  <ul>
    <li><a <?php if (is_home()) echo('class="current" '); ?>href="<?php bloginfo('url'); ?>">Home</a></li>
    <?php wp_list_pages('depth=1&title_li='); ?>
  </ul>
  <div class="search_box">
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
      <div>
        <input type="image" src="<?php bloginfo('template_directory'); ?>/img/search_btn.gif" id="go" alt="Search" title="Search" class="search_btn" />
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="search_field" />
      </div>
    </form>
  </div>
</div>
<div class="grid_16 main_image"> </div>
<div class="grid_16 content_wrapper">
