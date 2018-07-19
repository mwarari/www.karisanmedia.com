<?php 
get_header();
?>
<?php $options = get_option('aesthete_options'); ?>
<div id="leftcolumn">
	
	<?php 
	//echo "root=".get_root_category($cat);
	$args = array(
    'type'                     => 'post',
    'child_of'                 => $options['catalogue_category'],
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'include_last_update_time' => false,
    'hierarchical'             => 1,
    'pad_counts'               => false );
	$categories = get_categories( $args ); 
	//print_r($categories);
	?>
	<div class="widget">
		<div class="ornament">
			<h3><?php _e('Browse categories');?></h3>
			<ul id="catalog-sub-cat">
				<?php foreach ($categories as $category):?>
					<li>
						<a href="<?php echo get_category_link($category->cat_ID)?>" class="<?php echo (($category->cat_ID==$cat)?'current':'a');?>">
							<?php echo $category->name?>
						</a>
					</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>




<div id="rightcontent" class="leftborder">
<h1><?php echo single_cat_title('', false)?></h1>

<?php 
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts("cat=$cat&paged=$page&posts_per_page=${options['catalogue_items_per_page']}");
		while (have_posts()) : 
			the_post();
			//print_r($post);
			?>
			<?php 
				$args1 = array(
					'max_width' => $options['catalogue_thumb_width'], 
					'max_height' => $options['catalogue_thumb_height'],
					'caption' => false,
					'align'=>'alignnone',
					'link_to' => 'image',
					'thumb_only'=>false,
					'fit_entire_size'=>true,
					'margin'=>'10px',
				);
				//draw_image_thumb($args);
	?>

			<?php $args = array( 
				'post_parent' => $post->ID,
				'post_type' => 'attachment', 
			    'post_mime_type' => image,
			    'order' => 'ASC', 
				'orderby' => 'menu_order ID'
			);
			$images =& get_children( $args );
			if (($images)):?>
				<div class="catalogitem">
					<?php 
					$icount=0;
					foreach ( $images as $attachment_id => $attachment ) : 
						$args1['img']= wp_get_attachment_image_src( $attachment_id,'full');
						draw_image_thumb($args1);
							$icount++;
							if ($icount>=$options['catalogue_image_number']) break;
							?>
					<?php endforeach;?>
										<div class="catalogdesc">
						<div class="itemtitle"><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title?></a></div>
						<?php the_excerpt()?>
						<?php //= get_post_meta($post->ID, 'Catalog Item Short Description', true);?>
					</div>
					<div class="clear"></div>
				</div>
				
			<?php endif?>
			<?php 
			?>
		<?php endwhile;?>
		<?php if(function_exists('wp_paginate')){wp_paginate();	} 
		elseif(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
		else {posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;'));}?>  
</div>


<div class="clear"></div>
<?php get_footer(); ?>