<?php 
$aesthete_options = get_option('aesthete_options');
if ($aesthete_options['catalogue_category'] > 0 
	&& (
		is_category($aesthete_options['catalogue_category'])
		|| cat_is_ancestor_of ($aesthete_options['catalogue_category'],$cat)
		)
	):
	include(TEMPLATEPATH . '/category-catalogue.php');
elseif ($aesthete_options['portfolio_category'] > 0 && is_category($aesthete_options['portfolio_category'])):
	include(TEMPLATEPATH . '/category-portfolio.php');
else:
?>
	<?php 
	get_header();
	?>
	<div id="leftcontent">
	<?php echo single_tag_title('', false);?>
	<?php 
		$aesthete_options = get_option('aesthete_options'); 
		if (is_home()) 
		{
			$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			//query_posts("cat=$cat&paged=$page&posts_per_page=$posts_per_page");

			query_posts("cat=-${aesthete_options['portfolio_category']},-${aesthete_options['catalogue_category']}&paged=$page&posts_per_page=$posts_per_page");
		}
	?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
			 <h2 id="post-<?php the_ID(); ?>" class="h1"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if (!$aesthete_options['hide_post_info']):?>
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
<?php endif;?>
<?php //get_sidebar(); 
?>

<div class="clear"></div>
<?php get_footer(); ?>