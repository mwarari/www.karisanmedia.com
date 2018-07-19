<?php global $themeoptionsprefix; get_header(); ?>

<div id="content">
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 1){ get_sidebar(); } ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') != 2 || get_option($themeoptionsprefix.'_sidebarpos') != 1 )  { get_sidebar(); } ?>


<div class="postarea">

		<?php is_tag(); ?>
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h1> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e("Archives",'KarisanMediaTheme'); ?></h1>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1><?php _e("Posts Tagged",'KarisanMediaTheme'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h1>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1><?php _e("Archive for",'KarisanMediaTheme'); ?> <?php the_time('F jS, Y'); ?></h1>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1><?php _e("Archive for",'KarisanMediaTheme'); ?> <?php the_time('F, Y'); ?></h1>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1><?php _e("Archive for",'KarisanMediaTheme'); ?> <?php the_time('Y'); ?></h1>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1><?php _e("Author Archive",'KarisanMediaTheme'); ?></h1>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1><?php _e("Blog Archives",'KarisanMediaTheme'); ?></h1>
 	  <?php } ?>



		<?php while (have_posts()) : the_post(); ?>


			<div class="excerpt">

 				<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> 	</a>	</h2>
				<div class="byline"><?php _e("Author",'KarisanMediaTheme');?> : <?php  the_author(); ?> <?php _e("Published",'KarisanMediaTheme'); ?>: <?php  the_time('F jS, Y'); ?>  </div>



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

		<div class="npfsearchmsg">
		<h2>No posts found</h2>

		<p><?php _e("You were trying to browse",'KarisanMediaTheme');?> <?php single_cat_title(); ?> <?php _e("Unfortunately there were no posts found.",'KarisanMediaTheme');?></p>


				</div>

	<?php endif; ?>


</div><!--end postarea-->
<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 2) { get_sidebar(); } ?>

</div><!--end content-->

<?php get_footer(); ?>