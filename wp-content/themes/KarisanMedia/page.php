<?php global $themeoptionsprefix; get_header(); ?>

<div id="content">
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 1){ get_sidebar(); } ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') != 2 || get_option($themeoptionsprefix.'_sidebarpos') != 1 )  { get_sidebar(); } ?>


<div class="postarea">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>
		<?php $readrest=__("Read the rest of this page",'KarisanMediaTheme'); $edent=__("Edit this entry",'KarisanMediaTheme'); $pgswrd=__("Pages",'KarisanMediaTheme'); ?>
				<div class="entry">
				<?php the_content('<p class="serif">$readrest &raquo;</p>'); ?>
				<div class="postareameta"><?php edit_post_link($edent, '<p>', '</p>'); ?></div>
				<?php wp_link_pages(array('before' => '<p><strong>$pgswrd:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>


				<?php
					$commentsonpage=get_option($themeoptionsprefix.'_commentsonpage');
					if(!isset($commentsonpage) || empty($commentsonpage) || ($commentsonpage == 'yes') )
					{ ?>
					<?php if ( comments_open() ) : ?>
					<div class="commentarea">
						<?php comments_template(); // Get wp-comments.php template ?>
					</div>
					<?php endif; ?>
				<?php } ?>

		<?php endwhile; endif; ?>



</div><!--end postarea-->
<?php include (TEMPLATEPATH . '/includes/sidebar2.php'); ?>
<?php if(get_option($themeoptionsprefix.'_sidebarpos') == 2) { get_sidebar(); } ?>

</div><!--end content-->

<?php get_footer(); ?>
