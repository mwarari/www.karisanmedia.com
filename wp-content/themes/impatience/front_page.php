<?php
/*
Template Name: Front Page
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
	<?php global $post; ?>
	<?php $postslist = get_posts('numberposts=2');
	 ?>
	<?php foreach ($postslist as $post) : 
		setup_postdata($post);
	?>		
		<?php echo display_post(); ?>	
 	<?php endforeach; ?> 	

</div> <!-- end #content -->
<div class="postnavigation">
	<!-- <?php next_posts_link('&laquo; Older Entries') ?><?php previous_posts_link(' | Newer Entries &raquo;') ?> -->
</div> <!-- end #postnavigation -->
<?php get_footer(); ?>