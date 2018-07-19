<?php get_header(); ?>

<div id="main"><!-- main content  -->
  <div style="float: none; margin-top: 19px;"><!--CONTENT PART STARTS HERE-->
    <div class="content">
      <?php get_sidebar();?>
      <div class="content_right examples" style="float: right;"><!--CONTENT RIGHT STARTS HERE-->
        <div class="pagenav_top">
			<a href="<?php echo get_settings('home'); ?>">Home<?php echo $langblog;?></a>
			<img src="<?php bloginfo('template_directory'); ?>/images/dot_arrow.png" alt="" width="16" height="16" /><?php the_title(); ?>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div><!--CONTENT CATOGORY1 STARTS HERE-->
          <div class="contentheadbg">
            <div class="contentinner">
              <h2><?php the_time('F j'); ?></h2>
              <span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
              <?php the_title(); ?>
              </a></span>
			</div>
          </div>
          <div class="contentpost">
		  Posted on <?php the_time('F jS, Y')?> at <?php the_time(' g:i A') ?> by <span><?php the_author() ?></span>
		  </div>
          <div class="contenttags"><!--CONTENT CATOGORY TAGS STARTS HERE-->
            <div><?php the_tags(__('Tags: '), ', ', ''); ?><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" />   </div>
            <div style="float: right;">Category: <?php the_category(',') ?></div>
          </div><!--CONTENT CATOGORY TAGS ENDS HERE-->
          <div class="normaltext">
            <div><?php the_content(); ?></div>
            <div class="linkpages"><?php  wp_link_pages(); ?></div>
          </div>
          <div><img src="<?php bloginfo('template_directory'); ?>/images/content_btmcurve.png" alt="" /></div>
        </div><!--CONTENT CATOGORY1 ENDS HERE-->
        <?php comments_template(); // Get wp-comments.php template ?>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
      </div><!--CONTENT RIGHT ENDS HERE-->
    </div>
  </div><!--CONTENT PART ENDS HERE-->
</div><!-- main content  -->
</div><!-- main wrapper -->
</div>
<?php get_footer();?>
