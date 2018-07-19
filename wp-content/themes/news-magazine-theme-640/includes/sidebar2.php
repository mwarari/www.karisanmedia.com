<div id="postsidebar">

<div class="postsidebarcontent">

	<?php if(get_option($themeoptionsprefix.'_sidebar2widgetspos') == 1  ){ ?>

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SidebarOther') ) : ?>


		<?php endif; ?>

	<?php } ?>

	<?php if(!(get_option($themeoptionsprefix.'_hidecustomsidebarelements') == "hide" ) ){ ?>
	<?php if(have_posttype_posts_posts()) : ?>

		<div class="widget">

			<div class="morefromcat">

			<h2><?php _e("Latest Topics",'NewsMagazineTheme640');?></h2>
			<?php include (TEMPLATEPATH . '/includes/recenttopics.php'); ?>

			</div><!-- close morefromcat-->

		</div><!-- close widget-->
	<?php endif; ?>
	<?php } ?>


	<?php if(get_option($themeoptionsprefix.'_sidebaradother') <> "" ){ ?>
			<div class="widget">
				<div class="sidebarad">
				<?php echo stripslashes(get_option($themeoptionsprefix.'_sidebaradother')); ?>
				</div><!-- close sidebarad-->
			</div><!-- close widget-->
	<?php } ?>


	<?php if(!(get_option($themeoptionsprefix.'_hidecustomsidebarelements') == "hide" ) ){ ?>

		<?php if ( some_posts_have_comments() ) : ?>

			<div class="widget">

				<div class="morefromcat">

				<h2><?php _e("Recent Comments",'NewsMagazineTheme640');?></h2>
				<?php include (TEMPLATEPATH . '/includes/latestcomments.php'); ?>

				</div><!-- close morefromcat-->

			</div><!-- close widget-->

		<?php endif; ?>

	<?php } ?>

	<?php if(get_option($themeoptionsprefix.'_sidebar2widgetspos') == "2" ){	?>

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SidebarOther') ) : ?>

			<div class="widget">

				<h2><?php _e("Popular Topics",'NewsMagazineTheme640');?></h2>

					<?php wp_tag_cloud('smallest=8&largest=14&'); ?>

			</div><!-- close widget-->

		<?php endif; ?>

	<?php } ?>

</div><!--close postsidebarcontent-->
</div><!--close postsidebar-->
