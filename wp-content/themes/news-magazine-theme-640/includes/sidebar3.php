<div id="postsidebar">
<div class="postsidebarcontent">



	<?php	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SidebarOther') ) : ?>


<div class="widget">
<h2><?php _e("Latest Posts",'NewsMagazineTheme640');?></h2>
<ul>
<?php get_archives('postbypost', 10); ?>
</ul>
</div>

		<div class="widget">
		<h2><?php _e("Popular Topics",'NewsMagazineTheme640');?></h2>


				<?php wp_tag_cloud('smallest=8&largest=14&'); ?>

		</div>

	<?php endif; ?>






</div><!--close postsidebarcontent-->
</div><!--close postsidebar-->
