<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	<div class="post" id="post-<?php the_ID(); ?>">
	<div class="post-date">
	<span class="post-month"><?php the_time('M') ?></span> 
	<span class="post-day"><?php the_time('d') ?></span>
	<span class="post-year"><?php the_time('Y') ?></span>
	</div>

	<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	<small>By <?php the_author() ?>
	<?php edit_post_link('Edit','',''); ?></small>
	<div class="entry">
		<?php the_content('(more&raquo;)'); ?>
	</div><!-- end entry -->
	
	<!-- meta -->
	<div class="postmetadata clearfix">
		<ul class="clearfix">
		<li><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></li>
		</ul>
		<ul class="clearfix">
		<li>Filed under: <?php the_category(',</li><li>') ?></li>
		</ul>
		<ul class="clearfix">
		<li>Tags:</li> <?php the_tags('<li>', ', </li><li>', '</li>'); ?>
		</ul>
	</div><!-- end meta -->
	
	</div><!-- end post -->
	<?php endwhile; ?>

<?php else: ?>
	<p>Sorry, there was an error reading posts.</p>
<?php endif; ?>


<div class="postNav">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>
			
</div><!-- end content -->

<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php get_footer(); ?>