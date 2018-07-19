<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="content"><?php echo display_post(); ?></div>
<?php endwhile; else: ?>
	<div id="content">
		<div class="post">
			<h2>No Results</h2>
		 	<div class="postcontent"><p>You can always give it another shot<p/></div>
		</div>		
	</div>
<?php endif; ?>

<div id="postnavigation">
 <p><?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?></p>
</div><!-- end #postnavigation -->

<?php get_footer(); ?>