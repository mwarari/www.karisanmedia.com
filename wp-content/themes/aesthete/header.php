<!DOCTYPE html>
<html <?php language_attributes() ?> >
<?php $options = get_option('aesthete_options'); ?>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if (is_home () ) { bloginfo('name'); echo ' - '; bloginfo('description');}
	elseif ( is_category() ) {single_cat_title(); echo ' - ' ; bloginfo('name'); }
	elseif (is_single() ) { single_post_title(); echo ' - '. get_tags_for_post($post->ID, 'category' ).' - '. get_tags_for_post($post->ID). ' - ' ; bloginfo('name');}
	elseif (is_page() ) { single_post_title();}
	elseif(is_tag()) {echo 'Post tagged '; wp_title('',true); echo ' - '; bloginfo('name');}
	else { wp_title('',true); } ?></title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<?php if (is_single())
	{?>
		<meta name="description" content="<?php single_post_title();?> <?php echo ' - '.get_the_excerpt() . '.' . get_tags_for_post($post->ID, 'category' )?>" />
		<meta name="keywords" content="<?php echo get_tags_for_post($post->ID, 'category' ). get_tags_for_post($post->ID)?>" />
	<?php }
	elseif (is_category())
	{?>
			<meta name="description" content="<?php single_cat_title(); echo ', '; bloginfo('description');?>" />
			<meta name="keywords" content="<?php single_cat_title(); echo ' '; bloginfo('description');?>" />
	<?php 
	}
	else 
	{?>
			<meta name="description" content="<?php bloginfo('name'); echo '. '; bloginfo('description');?>" />
			<meta name="keywords" content="<?php bloginfo('name'); echo ' '; bloginfo('description');?>" />
	<?php }?>
	
	
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/base64.js"></script>

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
	<?php wp_head(); ?>

	


</head>

<body>
<div id="page">
	<div id="wrapper">
		<?php if (false && $options['use_graph_header']):?>
			<div id="header">
				<a href="<?php echo get_option('home'); ?>">
						<img src="<?php bloginfo('stylesheet_directory');?>/img/head-b.jpg" width="683" height="177" border="0"/><img src="<?php bloginfo('stylesheet_directory');?>/img/logo.gif" width="239" height="177" border="0"/>
				</a>
			</div>
		<?php else:?>
			<div id="header">
			
				<a href="<?php echo get_option('home'); ?>" class="headerimg" style="width:<?php echo $options['header_image_width']?>px;">
					<?php //print_r($options);?>
					<?php if ($options['header_image']==3 && $options['image_url']):?>
						<img src="<?php echo $options['image_url']?>" border="0" class="headerimg"/>
					<?php elseif($options['header_image']==1):?>
						<img src="<?php bloginfo('stylesheet_directory');?>/img/head-s.jpg" width="479" height="131" border="0" class="headerimg" />
					<?php elseif($options['header_image']==2):?>
						<img src="<?php bloginfo('stylesheet_directory');?>/img/head-small.jpg" border="0" class="headerimg" />
					<?php endif;?>
				</a>
				<?php if (!$options['hide_blog_title']):?>
					<div class="headerimg"  style="padding-top:<?php $pad=max(0,$options['header_image_height']-97); echo $pad;?>px">
						<?php if (is_home()):?>
							<h1 <?php if ($options['blog_title_size']) echo 'style="font-size:'.$options['blog_title_size'].'px"'?>><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
						<?php else:?>
							<h3 <?php if ($options['blog_title_size']) echo 'style="font-size:'.$options['blog_title_size'].'px"'?>><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h3>
						<?php endif;?>
							<div class="description"><?php bloginfo('description'); ?></div>
					</div>
				<?php endif; ?>
				<div class="clear"></div>
			</div>
		<?php endif;?>


		<div id="whitepage">
			<div id="whitepagesidebg">
				<div id="whitepagetopbg">
					<div id="whitepagebottombg">
						<div id="navdiv">
						<ul id="nav">
			<?php if ($options['show_home_link']): ?>
				<li <?php if(!is_page()) echo 'class="current_page_item"'; ?>><a href="<?php echo get_option('home'); ?>/"><?php _e('Home');?></a></li>
			<?php endif;?>
			<?php wp_list_pages('title_li=&depth=2'); ?>
						</ul>
						<div class="clear"></div>
						</div>
<?php 

?>


<!-- end header -->