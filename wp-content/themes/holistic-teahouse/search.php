<?php get_header(); ?>

<div id="main"><!-- main content  -->
  <div style="float: none; margin-top: 19px;"><!--CONTENT PART STARTS HERE-->
    <div class="content">
      <?php get_sidebar();?>
      <div class="content_right examples" style="float: right;"><!--CONTENT RIGHT STARTS HERE-->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div style="padding-bottom: 10px;"> <!--CONTENT CATOGORY1 STARTS HERE-->
          <div class="contentheadbg">
            <div class="contentinner">
              <h2><?php the_time('F j'); ?></h2>
              <span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
              <?php the_title(); ?></a></span> 
			</div>
          </div>
          <div class="contentpost">
		  	Posted on <?php the_time('F jS, Y')?> at <?php the_time(' g:i A') ?> by <span> <?php the_author() ?></span>
		  </div>
          <div class="contenttags"><!--CONTENT CATOGORY TAGS STARTS HERE-->
            <div><?php the_tags(__('Tags: '), ', ', ''); ?><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></div>
            <div style="float: right;">Category: <?php the_category(',') ?></div>
          </div><!--CONTENT CATOGORY TAGS ENDS HERE-->
          <div class="normaltext"><!--CONTENT STARTS HERE -->
            <div>
				<?php the_content(); ?></div>
              	<div class="linkpages"><?php  wp_link_pages(); ?></div>
            </div><!--CONTENT ENDS HERE -->
          <div><img src="<?php bloginfo('template_directory'); ?>/images/content_btmcurve.png" alt="" /></div>
           <div style="width: 618px;">
            <div class="content_readmore examples">
              <div><img src="<?php bloginfo('template_directory'); ?>/images/contentbtm_leftcurve.png" alt="" /></div>
              <div class="contentbtm_bg">
                <div class="readmore_btn" style="padding-right: 8px;">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read More</a>
				</div>
                <div class="comment_btn"><?php comments_popup_link(__('Comments')); ?></div>
              </div>
              <div><img src="<?php bloginfo('template_directory'); ?>/images/contentbtm_rightcurve.png" alt="" /></div>
            </div>
          </div>
        </div><!--CONTENT CATOGORY1 ENDS HERE-->
        <?php comments_template(); // Get wp-comments.php template ?>
        <?php endwhile; else: ?>
        <div>
          <div><img src="<?php bloginfo('template_directory'); ?>/images/content_topcurve.png" alt="" /></div>
          <div class="commentsbg">
            <p class="search_notfound"><h3>No posts found. Try a different search?</h3></p><br />
			<div id="search_notfoundbox">
				<?php get_search_form(); ?>
            </div>
          </div>
          <div><img src="<?php bloginfo('template_directory'); ?>/images/content_btmcurve.png" alt="" /></div>
        </div>
        <?php endif; ?>
        <div>
          	<?php 
			$bloginfo_link = get_bloginfo('template_directory');
			posts_nav_link(' ',  ('<img src="'.$bloginfo_link.'/images/new_post_btn.jpg" alt="" />'),  ('<img src="'.$bloginfo_link.'/images/old_post_btn.gif" alt="" />'));
			?>
        </div>
      </div><!--CONTENT RIGHT ENDS HERE-->
    </div>
  </div><!--CONTENT PART ENDS HERE-->
</div><!-- main content  -->
</div><!-- main wrapper -->
<?php get_footer();	?>
