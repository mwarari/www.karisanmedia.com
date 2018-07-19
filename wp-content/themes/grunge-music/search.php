<?php get_header(); ?>
	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<div class="clr"></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="date">Posted by <?php the_author() ?> on <?php the_time('jS F Y') ?> in <?php the_category(', ') ?></div>
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<div class="clr"></div>
				</div>

				<p class="postmetadata"><?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?><br /><?php the_tags('Tags: ', ', ', ''); ?> </p>
</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<div class="clr"></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
<?php get_footer(); ?>
