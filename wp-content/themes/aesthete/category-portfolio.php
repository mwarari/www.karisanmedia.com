<?php 
get_header();
?>
<?php $aesthete_options = get_option('aesthete_options'); ?>
	<div id="widecontent">
	<h1><?php echo single_cat_title('', false)?></h1>

		<?php 
		$catname = wp_title('', false);
		//$wp_query = new WP_Query('category_id=5&showposts=4&paged=1');
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts("cat=${aesthete_options['portfolio_category']}&paged=$page&posts_per_page=${aesthete_options['portfolio_works_per_page']}");
		while (/*$wp_query->*/have_posts()) : 
			the_post();
			$args = array(
				'max_width' => $aesthete_options['portfolio_thumb_width'], 
				'max_height' => $aesthete_options['portfolio_thumb_height'],
				'caption' => true,
				'align'=>'alignnone',
				'link_to' => 'post',
				'thumb_only'=>false,
				'fit_entire_size'=>false,
			);
			draw_image_thumb($args);
			?>
		<?php endwhile;?>
		<div class="clear"></div>
		<?php if(function_exists('wp_paginate')){wp_paginate();	} 
		elseif(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
		else {posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;'));}?>  

	</div>
<?php //get_sidebar(); 
?>

<div class="clear"></div>
<?php get_footer(); ?>