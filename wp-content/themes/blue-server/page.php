<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
					<div class="main">
					<?php the_content('Read More...'); ?>
					</div>
					</div>
			</div>
			</div>
		<div class="comment">
			
		<div class="container_metadata">
							<span><?php edit_post_link('Edit', '<div class="comment-cont">
								<div class="comment-l"></div>
								<div class="comment-m">
										<p class="postmetadata">', ' </p>
								</div>
								<div class="comment-r"></div>
							</div>'); ?></span>
							
		</div>
		
			
		</div>
		<br clear="left" class="clear" />
	</div>
		<div class="bg_content_bottom"></div>
	</div>
	<?php endwhile; ?>
	<div class="navigation"> 
		<div class="alignleft">
			<?php next_posts_link('&laquo; Previous Entries') ?>
		</div>
		<div class="alignright">
			<?php previous_posts_link('Next Entries &raquo;') ?>
		</div>
	 </div>
		<?php else : ?>
		
	<h2 class="center">Not Found</h2>
	<p class="center">Sorry,but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		 <?php endif; ?>
	<?php comments_template(); ?>
	</div>
		

<?php get_sidebar(); ?>

<?php get_footer(); ?>