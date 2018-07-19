<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
			<div class="clr"></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
				<div class="date">Posted by <?php the_author() ?> on <?php the_time('jS F Y') ?> in <?php the_category(', ') ?></div>
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<div class="clr"></div>
				</div>

				<p class="postmetadata"><?php edit_post_link('Edit', '', ' | '); ?> <?php the_tags('Tags: ', ', ', ''); ?> </p>
		

	<?php comments_template(); ?>
</div>
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
