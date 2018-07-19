<?php global $themeoptionsprefix; get_header(); ?>

<div id="content">
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 1){ get_sidebar(); } ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') != 2 || get_option($themeoptionsprefix.'_sidebarpos') != 1 )  { get_sidebar(); } ?>


<div class="postarea">

		<h1><?php _e("Search Results for",'KarisanMediaTheme');?>  <?php printf(__('\'%s\''), $s) ?></h1>

	<?php if (have_posts()) : ?>


		<?php while (have_posts()) : the_post(); ?>


			<div class="excerpt">

 				<h2> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?>	</a>	</h2>
				<div class="byline"> <?php _e("Author",'KarisanMediaTheme');?>: <?php  the_author(); ?> <?php _e("Published",'KarisanMediaTheme');?>: <?php  the_time('F jS, Y'); ?>  </div>


					 			<?php

					 				$thecimage = get_image_for_crop($post->ID,$thumborno='');

					 				if (isset($thecimage))
					 				{
					 					$fulltextorexcerptthumbwidth=get_option($themeoptionsprefix.'_fulltextorexcerptthumbwidth');
					 					 if(!isset($fulltextorexcerptthumbwidth) || empty($fulltextorexcerptthumbwidth))
					 					 {
					 						$fulltextorexcerptthumbwidth=125;
					 					 }
					 			?>

					 			<?php  bdw_get_images($post->ID,$width=$fulltextorexcerptthumbwidth,$height='',$thumborno='2');?>
					 			<?php } ?>

					 				<?php

					 			  $rcsample = get_the_content();
					 			 $fulltextorexcerptlength=get_option($themeoptionsprefix.'_fulltextorexcerptlength');
					 			 if(!isset($fulltextorexcerptlength) || empty($fulltextorexcerptlength))
					 			 {
					 			 	$fulltextorexcerptlength=350;
					 			 }
					 				// Remove extraneous stuff from the content text
					 				$rcstthec = strip_tags($rcsample);
					 				$rcsspthec = str_replace(' ',' ',$rcstthec );
					 				$rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );

					 				if(strlen($rcsspthec) > $fulltextorexcerptlength)
					 				{
					 					$newrcs=LimitText(trim($rcsspthec),10,$fulltextorexcerptlength,"");

					 				?>
					 				<p><?php echo $newrcs;?> [<a href="<?php the_permalink() ?>">...</a>]

					 				<?php

					 				}
					 				else
					 				{
					 					$newrcs=$rcsspthec;
					 				?>

					 				<p><?php echo $newrcs;?>

					 				<?php

					 				}

				?>

						<div class="clear"></div>

				</div><!--close div class excerpt-->


		<?php endwhile; ?>

			<div class="paginav">
				<?php
					include('wp-pagenavi.php');
					if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				?>
			</div>

	<?php else : ?>
	<?php $hidelatest=1; ?>

		<div class="npfsearchmsg">
		<h2>No posts found</h2>

		<p><?php _e("You searched for",'KarisanMediaTheme');?> "<?php the_search_query() ?>". <?php _e("Unfortunately there were no posts found that match what you are looking for.",'KarisanMediaTheme');?></p>
			<div class="entry">

													<h3><?php _e("Maybe you might be interested in one of the topics below",'KarisanMediaTheme');?></h3>

														<p>
														<ol class="list404">
														<?php get_archives('postbypost', 10); ?>
														</ol>
														</p>

															<?php $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
															// If images exist
														   	 if($arrImages) {?>
															<p>
															<h3><?php _e("Or you might prefer to browse by photo?",'KarisanMediaTheme');?></h3>
									</p>
									<br/>
															<?php } ?>

															<?php $recent = new WP_Query("showposts=9"); while($recent->have_posts()) : $recent->the_post(); ?>
															<a href="<?php the_permalink() ?>"><?php echo bdw_get_images($post->ID,$width='130',$height='130') ?></a>

															<?php endwhile; ?>


	</div><!--clos div entry-->

		</div>

	<?php endif; ?>

</div><!--end postarea-->
<?php include (TEMPLATEPATH . '/includes/sidebar3.php'); ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 2) { get_sidebar(); } ?>

</div><!--end content-->
<?php get_footer(); ?>