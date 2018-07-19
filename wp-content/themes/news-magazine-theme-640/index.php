<?php global $themeoptionsprefix; get_header(); ?>
<div id="content">
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 1){ get_sidebar(); } ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') != 2 || get_option($themeoptionsprefix.'_sidebarpos') != 1 )  { get_sidebar(); } ?>



<div class="postareaindex">
<?php $turnoffindexabout=get_option($themeoptionsprefix.'_turnoffindexabout'); if(!isset($turnoffindexabout) || empty($turnoffindexabout) || ($turnoffindexabout != 'off') ){ ?>
<div class="entry">
<h1>About News Magazine Theme 640</h1>
<p>You are viewing News Magazine Theme 640 with the news magazine style turned off. Once you turn on the news magazine style from your theme options page the theme should look like the screenshot below. To setup go to the theme options page to select your featured categories and configure your other settings.</p>
<a href="<?php echo bloginfo('template_url');?>/images/screenshotbig.jpg"><img class="aligncenter" src="<?php echo bloginfo('template_url');?>/images/screenshotbig.jpg" alt="<?php the_title(); ?>" border="0"></a>
<p>If you prefer to use this layout leave "Turn On or Off the News Magazine Layout" set to off and turn off this explanation text and screenshot example from the theme options page using the "Turn Off <b>About News Magazine Theme 640</b>" option</p>
</div>
<?php } ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



			<div id="indexentry"  <?php post_class(); ?>>

			<?php if(get_option($themeoptionsprefix.'_fulltextorexcerpt') == 'excerpt'){ ?>
			<div class="excerpt">


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

			<div class="tex">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to','NewsMagazineTheme640'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<?php if(get_option($themeoptionsprefix.'_showhideauthordatebyline') == 'on'){ ?>
			<div class="bylineexcerpt">
			<?php _e("Written by",'NewsMagazineTheme640');?> <?php the_author(); ?>
			<?php _e("on",'Canvas12');?> <?php the_time('d F Y'); ?>
			</div>
			<?php } ?>

			<?php

			  $rcsample = get_the_content();
			 $fulltextorexcerptlength=get_option($themeoptionsprefix.'_fulltextorexcerptlength');
			 if(!isset($fulltextorexcerptlength) || empty($fulltextorexcerptlength))
			 {
			 	$fulltextorexcerptlength=123;
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
			</div></div>
			<div class="clear"></div>
			<?php } else { ?>
			<h2 class="h2titleindex"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to','NewsMagazineTheme640'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php if(get_option($themeoptionsprefix.'_showhideauthordatebyline') == 'on'){ ?>
			<div class="bylinefulltext">
			<?php _e("Written by",'NewsMagazineTheme640');?> <?php the_author(); ?>
			<?php _e("on",'Canvas12');?> <?php the_time('d F Y'); ?>
			</div>
			<?php } ?>
			<?php the_content(__('Read the rest of this entry &raquo;')); ?>
			<?php } ?>
			<div class="clear"></div>
			</div><!--close div id indexentry-->

	<?php endwhile; ?>

				<div class="paginav">
					<?php
						include('wp-pagenavi.php');
						if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
					?>
			</div>

	<?php else : ?>


		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.'); ?></p>

		<h3><?php _e('Search'); ?></h3>

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

</div><!--end postarea-->
<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 2) { get_sidebar(); } ?>

</div><!--end content-->

<?php get_footer(); ?>



