<?php 
get_header();
//print_r ($post);
?>
<div id="leftcontent">

<?php $options = get_option('aesthete_options'); ?>
<!-- <?php //print_r($options);?>-->

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
			<?php if (in_root_category($post->ID,$options['catalogue_category'])):
				$args = array( 
					'post_parent' => $post->ID,
					'post_type' => 'attachment', 
				    'post_mime_type' => image,
				    'order' => 'ASC', 
					'orderby' => 'menu_order ID'
				);
				$images =& get_children( $args );
				if (($images)):?>
					<div xclass="catalogitem">
						<div class="images" style="width: <?php echo ($options['catalogue_thumb_width']+22)?>px;">
							<?php foreach ( $images as $attachment_id => $attachment ) : 
								//if (preg_match('/thumb/i',$attachment->post_name)):
									$img = wp_get_attachment_image_src( $attachment_id,'full');
									$h = min($img[2]*100/$img[1],$options['catalogue_thumb_height']);
									$img = substr($img[0], 7+strlen($_SERVER['SERVER_NAME']));
									$args1 = array(
										'max_width' => $options['catalogue_thumb_width'], 
										'max_height' => $options['catalogue_thumb_height'],
										'caption' => false,
										'align'=>'alignnone',
										'link_to' => 'image',
										'thumb_only'=>false,
										'fit_entire_size'=>true,
										'img'=>wp_get_attachment_image_src( $attachment_id,'full'),
										'margin'=>'10px 10px 0px 0px',
									);
									draw_image_thumb($args1);
									?>
							<?php endforeach;?>
							<div class="clear"></div>
						</div>
						<div class="catalogdesc">
							<?php the_content()?>
						</div>
						<div class="clear"></div>
					</div>
					
				<?php endif; // Catalogue?> 
				
			<?php elseif (in_root_category($post->ID,$options['portfolio_category'])):?>
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

			<?php else:
				the_content();
			endif?>
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

	<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>
<?php include (TEMPLATEPATH . '/sidebar-catalog.php');?>

<div class="clear"></div>
<?php get_footer(); ?>