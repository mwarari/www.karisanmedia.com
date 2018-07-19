<?php 
get_header();
?>
<div id="leftcontent">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post">
		 <h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
		
		<div class="storycontent">
			<?php the_content(__('(more...)')); ?>
		</div>
	</div>
	<?php endwhile; endif; ?>
	<?php comments_template();?>
</div>
<?php get_sidebar(); ?>

<div class="clear"></div>
<?php get_footer(); ?>