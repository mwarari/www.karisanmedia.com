<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
			  <div class="bg_content_top"></div>
			  <div class="bg_content_mid">
			  <div class="text_content">
			  <div class="title_content">
			 	<div class="title"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2><span class="author">posted by <?php the_author() ?></span></div>
				 <div class="time">
					<span class="month"><?php the_time('M') ?></span>  
					  <span class="date"><?php the_time('j') ?></span>					  	  
				 </div>
			  </div>
			  <br clear="all" />
			  <div class="main_txt">
					<div class="entry">
					<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php if ( function_exists('the_tags') ) { the_tags( '<p>Tags: ', ', ', '</p>'); } ?>
				<p>Categories: <?php the_category(' ,'); ?></p>
					
					</div>
			</div>
			</div>
		
		<br clear="left" class="clear" />
		</div>
	<div class="bg_content_bottom"></div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
