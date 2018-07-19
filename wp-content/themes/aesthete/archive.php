	<?php 
	get_header();
	?>
	<div id="leftcontent">
	  
  <?php the_post(); ?>  

  <?php if ( is_day() ) : ?>
  <h1><?php printf(__('Daily Archives: <span style="color: #c1e66d;">%s</span>'), get_the_time(get_settings('date_format'))) ?></h1>
  <?php elseif ( is_month() ) : ?>
  <h1><?php printf(__('Monthly Archives: <span style="color: #c1e66d;">%s</span>'), get_the_time('F Y')) ?></h1>
  <?php elseif ( is_year() ) : ?>
  <h1><?php printf(__('Yearly Archives: <span style="color: #c1e66d;">%s </span>'), get_the_time('Y')) ?></h1>
  <?php elseif ( is_tag() ) : ?>
  <h1><?php printf( __('Posts Tagged %s'), '<span class="tag">'.single_tag_title('', false) .'</span>');?></h1>
  <?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
  <h1><?php _e('Blog Archives') ?></h2>

  <?php endif; ?>
  
  <?php rewind_posts() ?>
	<?php 

		$options = get_option('aesthete_options'); 
	?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
			 <h2 id="post-<?php the_ID(); ?>" class="h1"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if (!$options['hide_post_info']):?>
				<div class="info">
					<span class="date"><?php the_time('j F Y') ?></span>
					<div class="act">						
							<span class="comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'),''); ?></span>
						<?php edit_post_link(__('Edit This'), '<span class="editpost">', '</span>'); ?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			<?php endif;?>
			
			<div class="storycontent">
				<?php the_content(__('(more...)')); ?>
			</div>
			
			<div class="feedback">
					<?php //wp_link_pages(); ?>
					<?php //comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?>
			</div>

		</div>

		<?php comments_template(); // Get wp-comments.php template ?>

		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>


		<?php if(function_exists('wp_paginate')) 
			{
				wp_paginate();
			} else
			posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;'));?>

	</div>
	<?php get_sidebar(); ?>


<div class="clear"></div>
<?php get_footer(); ?>