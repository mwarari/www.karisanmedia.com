<div id="sidebar">
<div class="widget" style="margin-bottom:5px;">
	<div class="ornament">
		<h3><?php _e('Other works')?></h3>
	</div>
</div>
<?php 
	$options = get_option('aesthete_options');
	//var_dump($cat);
	$categories = get_post_categories_list($post->ID);
	query_posts("cat=$categories&paged=1&showposts=21");
	while (have_posts()) : 
		the_post();
		$w_max=55;
		$args = array(
			'max_width' => $w_max, 
			'max_height' => round($w_max*$options['portfolio_thumb_height']/$options['portfolio_thumb_width']),
			'caption' => false,
			'align'=>'alignnone',
			'link_to' => 'post',
			'thumb_only'=>false,
			'fit_entire_size'=>false,
			'margin'=>false,
			'aclass'=>'agallery-small',
			'padding'=>1,
		);
		draw_image_thumb($args);
		?>

	<?php endwhile;?>
	<div class="clear"></div>

</div>