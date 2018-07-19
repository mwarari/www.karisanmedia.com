<?php 
get_header();
//print_r ($post);
?>
<div id="leftcontent">

<?php $options = get_option('aesthete_options'); ?>

<?php if (have_posts()) : the_post(); update_post_caches($posts); 
//echo $options['portfolio_category'];
//var_dump( in_root_category($post->ID,$options['portfolio_category']));
?>

	<div id="postpath">
		<a title="<?php _e('Goto homepage'); ?>" href="<?php echo get_settings('home'); ?>/"><?php _e('Home'); ?></a>
		 &raquo; <?php echo(get_post_path($post->ID, ' &raquo; ')); ?>
		&raquo; <?php the_title(); ?>
	</div>


	<div class="post">
		 <h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php if (!$options['hide_post_info']):?>
			<div class="info">
				<span class="date"><?php the_time('j F Y') ?></span>
				<div class="act">
					<?php if ($comments || comments_open()) : ?>
						<span class="comments"><a href="#comments"><?php _e('Goto comments', 'aesthete'); ?></a></span>
						<span class="addcomment"><a href="#respond"><?php _e('Leave a comment', 'aesthete'); ?></a></span>
					<?php endif; ?>
					<?php edit_post_link(__('Edit This'), '<span class="editpost">', '</span>'); ?>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		<?php endif;?>

		<div class="content">
				<?php if (post_has_immage($post)):
					the_content();?>
				<?php else:
					the_content();
					$args = array( 
						'post_parent' => $post->ID,
						'post_type' => 'attachment', 
					    'post_mime_type' => image,
					    'order' => 'ASC', 
						'orderby' => 'menu_order ID'
					);
					$images =& get_children( $args );
					if (($images)):?>
						<?php foreach ( $images as $attachment_id => $attachment ) :
							if (!preg_match('/thumb/i',$attachment->post_name)):
								$img = wp_get_attachment_image_src( $attachment_id,'full');?>
								<img src="<?php echo $img[0]?>" width="<?php echo $img[1]?>" height="<?php echo $img[2]?>" />
								<div class="full-image-caption">
									<?php echo $attachment->post_title ?>
								</div>
							<?php endif?>
						<?php endforeach;?>
					<?php endif;?>
					
				<?php endif;?>

			<div>
			<p class="under">
				<?php if ($options['categories']) : ?><span class="categories"><?php the_category(', '); ?></span><?php endif; ?>
				<?php if ($options['tags']) : ?><span class="tags"><?php the_tags('', ', ', ''); ?></span><?php endif; ?>
			</p>
			<div class="clear"></div>
			</div>
		</div>
		
	</div>
<?php 
	// Support comments for WordPress 2.7 or higher
	if (function_exists('wp_list_comments')) {
		comments_template('', true);
	} else {
		comments_template();
	}
?>
<div id="postnavi">
	<span class="prev"><?php next_post_link('%link') ?></span>
	<span class="next"><?php previous_post_link('%link') ?></span>
	<div class="fixed"></div>
</div>

	<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>
<?php include (TEMPLATEPATH . '/sidebar-portfolio.php');?>

<div class="clear"></div>
<?php get_footer(); ?>