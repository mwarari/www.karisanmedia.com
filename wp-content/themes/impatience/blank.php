<?php
/*
Template Name: Blank
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php if ( is_single() ) { ?> Blog Archive <?php } ?> <?php wp_title(); ?></title>		
		<meta name="author" content="Alex Welch" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dark.css" type="text/css" media="screen" title="default" charset="utf-8" />
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/light.css" type="text/css" media="screen" title="light" charset="utf-8" />		
		<script src="<?php bloginfo('template_url') ?>/scripts/styleswap.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		 				
		 	<?php the_content(__('Read more'));?>
			
			<?php echo edit_post_link() ?>
		<?php endwhile; else: ?>
		 <p>Sorry, nothing matches that criteria.</p>
		<?php endif; ?>
	</body>
</html>