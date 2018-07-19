<?php
/*
Template Name: Page With No Sidebar
*/
?>
<?php global $themeoptionsprefix; get_header(); ?>

<div id="content">



		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>
		<?php $readrest=__("Read the rest of this page",'NewsMagazineTheme640'); $edent=__("Edit this entry",'NewsMagazineTheme640'); $pgswrd=__("Pages",'NewsMagazineTheme640'); ?>

				<?php the_content('<p class="serif">$readrest &raquo;</p>'); ?>
				<div class="postareameta"><?php edit_post_link($edent, '<p>', '</p>'); ?></div>
				<?php wp_link_pages(array('before' => '<p><strong>$pgswrd:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>


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




</div><!--end content-->

<?php get_footer(); ?>
