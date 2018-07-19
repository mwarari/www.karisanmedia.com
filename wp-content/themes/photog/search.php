<?php get_header(); ?>
	
<div id="content">
	<?php if (have_posts()) : ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div><!-- end navigation -->
		<h1 class="searchtitle">Search Results</h1>	

		<?php while (have_posts()) : the_post(); ?>	
			<div class="post" id="post-<?php the_ID(); ?>">
			
			<div class="post-date">
			<span class="post-month"><?php the_time('M') ?></span> 
			<span class="post-day"><?php the_time('d') ?></span>
			<span class="post-year"><?php the_time('Y') ?></span>
			</div><!-- end post-date -->
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			
			<div class="entry">
				<?php the_excerpt() ?>
				<a href="<?php the_permalink() ?>" class="readmore" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">More&raquo;</a>
			</div><!-- end entry -->
			
			<!-- meta -->
			<div class="metawrap clearfix"><div class="postmetadata clearfix">
			<ul class="clearfix">
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
		</div><!-- end metadata --></div><!-- end metawrap -->
		
		</div><!-- end post -->
		<?php endwhile; ?>

		<div class="navigation" style="width:550px; margin-top:-16px;">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div><!-- end navigation -->
	<?php else : ?>
		<h2>Sorry, I couldn&#39;t find anything that matches.</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>
</div><!-- end content -->
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php get_footer(); ?>