<div id="sidebar">
<?php 
$categories = get_post_category_names_list($post->ID);
?>
<div class="widget" style="margin-bottom:5px;">
	<div class="ornament">
		<h3><?php printf(__('More %s'), $categories)?></h3>
	</div>
</div>
<?php 	
	$categories = get_post_categories_list($post->ID);

?>
<?php 
	query_posts("cat=$categories&paged=1&showposts=21&order_by=menu_order");
	while (have_posts()) : 
		the_post();

		$w_max=55;
		$args = array(
			'max_width' => $w_max, 
			'max_height' => round($w_max*$options['catalogue_thumb_height']/$options['catalogue_thumb_width']),
			'caption' => false,
			'align'=>'alignnone',
			'link_to' => 'post',
			'thumb_only'=>false,
			'fit_entire_size'=>true,
			'margin'=>false,
			'aclass'=>'agallery-small',
			'padding'=>1,
		);
		draw_image_thumb($args);
		?>
	<?php endwhile;?>
	<div class="clear"></div>

</div>