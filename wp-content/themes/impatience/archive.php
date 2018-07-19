<?php $current_page = "home" ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php is_tag(); ?>
<div id="content">
	 <?php if (have_posts()) : ?>

	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	  <?php /* If this is a category archive */ if (is_category()) { ?>
	   <!-- <h2 class="content_title">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2> use the top_nav -->
	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	   <h2 class="content_title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	   <h2 class="content_title">Archive for <?php the_time('F jS, Y'); ?></h2>
	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	   <h2 class="content_title">Archive for <?php the_time('F, Y'); ?></h2>
	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	   <h2 class="content_title">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
	   <h2 class="content_title">Author Archive</h2>
	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	   <h2 class="content_title">Blog Archives</h2>
	  <?php } ?>

	 <div class="postnavigation_top">
	  <!-- <?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?> -->
	 </div> <!-- end #postnavigation -->

	 <?php while (have_posts()) : the_post(); ?>
		<?php echo display_post(); ?>

	 <?php endwhile; ?>

	 <div class="postnavigation">
	  <p><?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?></p>
	 </div> <!-- end #postnavigation -->

	<?php else : ?>

	 <h2>Not Found</h2>
	 <p>Try using the search form below</p>
	 <?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
</div>


<?php get_footer(); ?>