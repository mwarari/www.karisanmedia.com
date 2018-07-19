<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	 	<div class="post">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		 	<div class="postcontent"><?php the_content(__('Read more'));?>	</div>
		</div>
		<?php echo edit_post_link() ?>
	<?php endwhile; else: ?>
	 <p>Sorry, nothing matches that criteria.</p>
	<?php endif; ?>
</div>
<?php get_footer(); ?>