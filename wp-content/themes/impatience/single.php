<?php $current_page = "home" ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php echo display_post(); ?>
	 	<?php comments_template(); ?>
	<?php endwhile; else: ?>
	 	<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
