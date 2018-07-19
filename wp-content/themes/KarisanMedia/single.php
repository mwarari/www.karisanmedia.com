<?php global $themeoptionsprefix; get_header(); ?>
<div id="content">
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 1){ get_sidebar(); } ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') != 2 || get_option($themeoptionsprefix.'_sidebarpos') != 1 )  { get_sidebar(); } ?>



<div class="postareasingle">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


			<?php if(get_option($themeoptionsprefix.'_singlepageadsensecode') <> "") {?>
			<?php if(get_option($themeoptionsprefix.'_singlepageadsenseposition') == 'above post title'){?>

			<div style="padding:10px;text-align:center;">
			<?php echo stripslashes(get_option($themeoptionsprefix.'_singlepageadsensecode')); ?>
			</div>
			<?php } } ?>
			<h2 class="singletitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to','KarisanMediaTheme');?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php if(get_option($themeoptionsprefix.'_singlepageadsensecode') <> "") {?>
			<?php if(get_option($themeoptionsprefix.'_singlepageadsenseposition') == 'below post title'){?>

			<div style="padding:10px;text-align:center;">
			<?php echo stripslashes(get_option($themeoptionsprefix.'_singlepageadsensecode')); ?>
			</div>
			<?php } } ?>


			<div class="entry">

				<?php $edent=__("Edit this entry",'KarisanMediaTheme'); 
				$pgswrd=__("Pages",'KarisanMediaTheme'); 
				$prevtop=__("Previous Show",'KarisanMediaTheme'); 
				$nxtop=__("Next Show",'KarisanMediaTheme');
				?>

				<?php if(get_option($themeoptionsprefix.'_singlepageadsensecode') <> "") {?>
				<?php if(get_option($themeoptionsprefix.'_singlepageadsenseposition') == 'left'){?>

				<div style="float:left;margin-right:10px;">
				<?php echo stripslashes(get_option($themeoptionsprefix.'_singlepageadsensecode')); ?>
				</div>
				<?php } elseif(get_option($themeoptionsprefix.'_singlepageadsenseposition') == 'right'){?>
				<div style="float:right;margin-left:10px;">
				<?php echo stripslashes(get_option($themeoptionsprefix.'_singlepageadsensecode')); ?>
				</div>
				<?php } ?>
				<?php } ?>

				<?php the_content(__('Read the rest of this entry &raquo;')); ?>
				<?php wp_link_pages(array('before' => "<p><strong>$pgswrd:</strong>", 'after' => '</p>', 'next_or_number' => 'number')); ?>



				<div class="clear"></div>
				<?php if(get_option($themeoptionsprefix.'_singlepageadsensecode') <> "") {?>
				<?php if(get_option($themeoptionsprefix.'_singlepageadsenseposition') == 'between post content and post details'){?>

				<div style="padding:10px;text-align:center;">
				<?php echo stripslashes(get_option($themeoptionsprefix.'_singlepageadsensecode')); ?>
				</div>
				<?php } } ?>

				<div class="byline">
					<?php _e("Published",'KarisanMediaTheme');?>: <?php the_time('d F Y'); ?><br/>
					<!-- <?php _e("Author",'KarisanMediaTheme');?>: <?php the_author(); ?><br/> -->
					<?php _e("Found in section",'KarisanMediaTheme');?>: <?php the_category(', ') ?><br/>
					<?php if(current_user_can('edit_post')){ ?><?php edit_post_link($edent, '', ''); ?><br/><?php } ?>

					<p>
					<?php if(has_tag()){ echo " <b>"; _e("Tags",'KarisanMediaTheme'); echo ":</b> "; the_tags('');  }?>
					</p>
						<div class="bnavigation">
							<div class="bnavleft"><?php previous_post_link('<b>'.$prevtop.':</b> %link') ?></div>
							<div class="bnavright"><?php next_post_link('<b>'.$nxtop.':</b> %link') ?></div>
						</div><div class="clear"></div>
				</div>

				<?php if(get_option($themeoptionsprefix.'_singlepageadsensecode') <> "") {?>
				<?php if(get_option($themeoptionsprefix.'_singlepageadsenseposition') == 'under post details'){?>

				<div style="padding:10px;text-align:center;">
				<?php echo stripslashes(get_option($themeoptionsprefix.'_singlepageadsensecode')); ?>
				</div>
				<?php } } ?>


			</div><!--close div class entry-->


					<?php if ( comments_open() ) : ?>
					<div class="commentarea">
						<?php comments_template(); // Get wp-comments.php template ?>
					</div>
					<?php endif; ?>



	<?php endwhile; else : ?>


		<h2><?php _e('Not Found','KarisanMediaTheme'); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.','KarisanMediaTheme'); ?></p>

		<h3><?php _e('Search','KarisanMediaTheme'); ?></h3>


	<?php endif; ?>

</div><!--end postareasingle-->

<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 2) { get_sidebar(); } ?>

</div><!--end content-->

<?php get_footer(); ?>



