<?php $current_page = "home" ?>
<?php get_header(); ?>


<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
			<?php echo display_post(); ?>
 	<?php endwhile; else: ?>
  		<p>Sorry, nothing matches that criteria.</p>
 	<?php endif; ?> 	

</div> <!-- end #content -->
<div class="postnavigation">
	<?php next_posts_link('&laquo; Older Entries') ?><?php previous_posts_link(' | Newer Entries &raquo;') ?>
</div> <!-- end #postnavigation -->
<?php get_footer(); ?>