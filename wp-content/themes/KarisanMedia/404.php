<?php global $themeoptionsprefix; get_header(); ?>

<div id="content">
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 1){ get_sidebar(); } ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') != 2 || get_option($themeoptionsprefix.'_sidebarpos') != 1 )  { get_sidebar(); } ?>


<div class="postarea">


	<h1><?php _e("Page Not Found",'KarisanMediaTheme'); ?></h1>


	<div class="entry">

							<p><?php _e("The page you were trying to reach could not be found.",'KarisanMediaTheme'); ?></p>
												<h3><?php _e("Maybe you might be interested in one of the topics below",'KarisanMediaTheme'); ?></h3>

												<p>
												<ol class="list404">
												<?php get_archives('postbypost', 10); ?>
												</ol>
												</p>

													<?php $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
													// If images exist
												   	 if($arrImages) {?>
													<p>
													<h3><?php _e("Or you might prefer to browse by photo",'KarisanMediaTheme');?></h3>
							</p>
							<br/>
													<?php } ?>

													<?php $recent = new WP_Query("showposts=9"); while($recent->have_posts()) : $recent->the_post(); ?>
													<a href="<?php the_permalink() ?>"><?php echo bdw_get_images($post->ID,$width='130',$height='130',$thumborno='1') ?></a>

													<?php endwhile; ?>


	</div><!--clos div entry-->
</div><!--end postarea-->

<?php include (TEMPLATEPATH . '/includes/sidebar3.php'); ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 2) { get_sidebar(); } ?>
</div><!--end content-->
<?php get_footer(); ?>