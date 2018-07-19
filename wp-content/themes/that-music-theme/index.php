<?php get_header(); ?>

<div id="left" class="grid_9 omega alpha">
<div id="content">
  <?php if ( $paged < 2 ) { // Do stuff specific to first page ?>
  <?php $my_query = new WP_Query('showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID; ?>
  <div class="entry">
    <h2 class="sectionhead"><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/rss.gif" alt="Main Content RSS Feed" title="Main Content RSS Feed" style="float:right; margin-left:5px;" /></a>Latest Entry</h2>
    <div class="post" id="post-<?php the_ID(); ?>">
      <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
        <?php the_title(); ?>
        </a></h2>
      <p class="postinfo">
        <?php the_time('M j, Y') ?>
        <?php the_category(', ') ?>
        <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?>
        <?php edit_post_link('Edit', ' | ', ''); ?>
        <br />
		Posted by
        <?php the_author(); ?>
		</p>
      <?php the_content('<strong>Read More..</strong>'); ?>
    </div>
  </div>
  <?php endwhile; ?>
  <div class="entry">
    <h2 class="sectionhead">Recent Entries</h2>
    <?php if (have_posts()) : while (have_posts()) : the_post();
if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
      <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
        <?php the_title(); ?>
        </a></h2>
      <p class="postinfo">
        <?php the_time('M j, Y') ?>
        <?php the_category(', ') ?>
        <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?>
        <?php edit_post_link('Edit', ' | ', ''); ?>
        <br />
        Posted by
        <?php the_author(); ?>
        </p>
      <?php the_excerpt('<strong>Read More..</strong>'); ?>
    </div>
    <?php endwhile; endif; ?>
  </div>
  <div class="entry">
    <?php } else { // Do stuff specific to non-first page ?>
    <div class="entry">
      <h2 class="sectionhead">Recent Articles</h2>
      <?php if (have_posts()) : while (have_posts()) : the_post();
if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
      <div class="post" id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
          <?php the_title(); ?>
          </a></h2>
        <p class="postinfo">
          <?php the_time('M j, Y') ?>
          <?php the_category(', ') ?>
          <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?>
          <?php edit_post_link('Edit', ' | ', ''); ?>
          	<br />
        	Posted by <?php the_author(); ?></p>
        <?php the_content('<strong>Read More..</strong>'); ?>
      </div>
      <?php endwhile; endif; ?>
      <div class="next_nav">
      <div class="alignleft">
        <?php next_posts_link('&laquo; Older Entries') ?>
      </div>
      <div class="alignright">
        <?php previous_posts_link('Newer Entries &raquo;') ?>
      </div>
    </div>
      <?php } ?>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php get_sidebar(); ?>
<br clear="all" />
</div>
<?php get_footer(); ?>
