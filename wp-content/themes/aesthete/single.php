<?php $options = get_option('aesthete_options'); ?>
<?php if (in_root_category($post->ID,$options['catalogue_category'])):
	include (TEMPLATEPATH . '/single-catalog.php');
	return;
elseif (in_root_category($post->ID,$options['portfolio_category'])):
	include (TEMPLATEPATH . '/single-portfolio.php');
else:

get_header();
//print_r ($post);
?>
<div id="leftcontent">

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
			<?php 
				the_content();
?>
			<div class="postpages">

			<?php 
if (function_exists('multipagebar'))
{
                    multipagebar();

} else 
wp_link_pages('pagelink=<span>%</span>'); ?>
			</div>
			<?php if (!$options['hide_post_info']):?>
				<p class="under">
					<span class="categories"><?php the_category(', '); ?></span>
					<?php $t=get_the_tag_list('',', ');
					if ($t):?>
					<span class="tags"><?php echo $t ?></span>
					<?php endif;?>
					<div class="clear"></div>
				</p>
			<?php endif;?>
		</div>
		
	</div>
<?php 
	comments_template();

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
<?php get_sidebar(); ?>

<div class="clear"></div>
<?php get_footer(); ?>
<?php endif;?>