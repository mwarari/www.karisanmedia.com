<div id="sidebar">
	<?php 
	global $options;
	if ($options['show_rss_link']):?>
		<div><a href="<?php echo get_bloginfo('rss2_url')?>" class="subscribe-rss">Subscribe RSS</a></div>
	<?php endif;?>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('index_sidebar') ) : ?>

	
<!-- posts -->
	<?php 
		if (is_single()) {
			$posts_widget_title = 'Recent Posts';
		} else {
			$posts_widget_title = 'Random Posts';
		}
	?>

	<div class="widget widget_categories">
	<div class="ornament">
		<h3><?php echo $posts_widget_title; ?></h3>
		<ul>
			<?php 
				if (is_single()) {
					$posts = get_posts('numberposts=10&orderby=post_date');
				} else {
					$posts = get_posts('numberposts=5&orderby=rand');
				}
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
			?>
		</ul>
	</div>
	</div>

	<!-- recent comments -->
	<?php if( function_exists('wp_recentcomments') ) : ?>
		<div class="widget">
		<div class="ornament">	
			<h3>Recent Comments</h3>
			<ul>
				<?php wp_recentcomments('limit=5&length=16&post=false&smilies=true'); ?>
			</ul>
		</div>
		</div>
	<?php endif; ?>

	<!-- tag cloud -->
	<?php if (!is_single()) : ?>
		<div id="tag_cloud" class="widget">
		<div class="ornament">
			<h3>Tag Cloud</h3>
			<?php wp_tag_cloud('smallest=8&largest=16'); ?>
		</div>
		</div>
	<?php endif; ?>	
	
	
	
	<?php endif; ?>
</div>