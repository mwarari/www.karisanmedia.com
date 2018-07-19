<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
	
	<div class="post-date">
	<span class="post-month"><?php the_time('M') ?></span> 
	<span class="post-day"><?php the_time('d') ?></span>
	<span class="post-year"><?php the_time('Y') ?></span>
	</div> <!-- end post-date -->
	
	<h1><?php the_title(); ?></h1>
	<small>By <?php the_author(); ?>
	<?php edit_post_link('Edit','',''); ?></small>
	
	<div class="entry">
	<?php the_content('(more&raquo;)'); ?>
	<?php //if page is split into more than one
		link_pages('<p>Pages: ', '</p>', 'number'); ?>
	</div> <!-- end entry -->
		
	<!-- metadata -->
	<div class="postmetadata clearfix">				
	<ul class="clearfix">
	<li><?php comments_rss_link('RSS'); ?></li>
	<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
		// Both Comments and Pings are open 
		?>
		<li><a href="#respond"> ~ Comments</a></li>
		<li><a href="<?php trackback_url(true); ?>" rel="trackback"> ~ Trackback</a></li>		
		<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
		// Only Pings are Open 
		?>
		<li>Comments are closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.</li>			
		<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
		// Comments are open, Pings are not 
		?>
		<li>Pinging is currently disabled.</li>
		<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
		// Neither Comments, nor Pings are open 
		?>
		<li>Comments and pings are currently closed.</li>			
		<?php } ?>
	</ul>
	<ul class="clearfix">
	<li>Categories:</li>
	<li><?php the_category(',</li><li>') ?></li>
	<!-- comment popup doesn't work on single pages -->
	</ul>
	<ul class="clearfix">
	<li>Tags:</li>
	<?php the_tags('<li>', ', </li><li>', '</li>'); ?>
	</ul>
	</div><!-- end metadata -->
		
	<div id="comments">
		<?php comments_template(); ?>
	</div>
	
	</div><!-- end post -->
<?php endwhile; else: ?>
	<h1 style="text-align:center;')"><?php _e('Sorry, no posts matched your criteria.'); ?></h1>
<?php endif; ?>
</div><!-- end content -->

<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php get_footer(); ?>