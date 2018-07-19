<?php get_header(); ?>
	
	<div id="content">
		<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			 
			<?php /* If this is a category archive */ if (is_category()) { ?>				
			<h1 class="archivetitle">Archive for the '<?php echo single_cat_title(); ?>' Category</h1>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h1 class="archivetitle">Archive for <?php the_time('F jS, Y'); ?></h1>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1 class="archivetitle">Archive for <?php the_time('F, Y'); ?></h1>
	
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h1 class="archivetitle">Archive for <?php the_time('Y'); ?></h1>
			
			<?php /* If this is a search */ } elseif (is_search()) { ?>
			<h1 class="archivetitle">Search Results</h1>
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h1 class="archivetitle">Author Archive</h1>
	
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1 class="archivetitle">Blog Archive</h1>

		<?php } ?>

	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
	
	<div class="post-date">
	<span class="post-month"><?php the_time('M') ?></span> 
	<span class="post-day"><?php the_time('d') ?></span>
	<span class="post-year"><?php the_time('Y') ?></span>
	</div>
	<h2><?php the_title(); ?></h2>
	
	<div class="entry">
		<?php the_excerpt(); ?> 
		<a href="<?php the_permalink() ?>" class="readmore" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">More&raquo;</a>	
	</div><!-- end entry -->
		
	<!-- meta -->
	<div class="postmetadata clearfix">
		<ul class="clearfix">
		<li><a href="#respond"></a></li>
		<li><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></li>
		</ul>
		<ul class="clearfix">
		<li>Categories:</li>
		<li><?php the_category(', </li><li>') ?></li>
		</ul>
		<ul class="clearfix">
		<li>Tags:</li>
		<?php the_tags('<li>', ', </li><li>', '</li>'); ?>
		</ul>
	</div><!-- end metadata -->
	
	</div><!-- end post -->
	<?php endwhile; ?>

	<div class="navigation clearfix">
	<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
	<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
	</div><!-- end navigation -->
	
	<?php else : ?>

		<h2>Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>
		
	</div>
<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php get_footer(); ?>