<?php get_header(); ?>

<div id="left" class="grid_9 omega alpha">
  <div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post();
if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
    <div class="entry">
      <h2 class="sectionhead">Search Results</h2>
      <div class="post" id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></h2>
        <p class="postinfo">
          <?php the_time('M j, Y') ?>
          <?php the_category(', ') ?>
          <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?>
          <?php edit_post_link('Edit', ' | ', ''); ?>
        </p>
        <?php the_content('Read More ...'); ?>
      </div>
    </div>
    <?php endwhile; ?>
    <div class="next_nav">
      <div class="alignleft">
        <?php next_posts_link('&laquo; Older Entries') ?>
      </div>
      <div class="alignright">
        <?php previous_posts_link('Newer Entries &raquo;') ?>
      </div>
    </div>
    <?php else : ?>
    <div class="entry">
      <h2>No posts found. Try a different search? or Please look at below. Maybe will help you :)</h2>
      <div class="postmetadata">
        <h3>All internal blog posts:</h3>
        <ul>
          <?php $archive_query = new WP_Query('showposts=1000');
		while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
          <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
            <?php the_title(); ?>
            </a> <strong>
            <?php comments_number('0', '1', '%'); ?>
            </strong></li>
          <?php endwhile; ?>
        </ul>
        <h3>Monthly archive pages:</h3>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
        <h3>Topical archive pages:</h3>
        <ul>
          <?php wp_list_categories('title_li=0'); ?>
        </ul>
      </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
  </div>
</div>
<?php get_sidebar(); ?>
<br clear="all" />
</div>
<?php get_footer(); ?>
