<?php get_header(); ?>
<div id="main"><!-- main content  -->
  <div style="float: none; margin-top: 19px;"><!--CONTENT PART STARTS HERE-->
    <div class="content">
      <?php get_sidebar();?>
      <div class="content_right examples" style="float: right;"><!--CONTENT RIGHT STARTS HERE-->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div style="padding-bottom: 10px;"><!--CONTENT CATOGORY1 STARTS HERE-->
          <div class="contentheadbg">
            <div class="contentinner">
              <h2><?php the_time('F j'); ?></h2>
              <span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></span> 
			 </div>
          </div>
          <div class="contentpost">
		  Posted on <?php the_time('F jS, Y')?> at <?php the_time(' g:i A') ?> by <span><?php the_author() ?></span>
		  </div>
          <div class="contenttags"><!--CONTENT CATOGORY TAGS STARTS HERE-->
            <div><?php the_tags(__('Tags: '), ', ', ''); ?><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></div>
            <div style="float: right;">Category: <?php the_category(',') ?></div>
          </div><!--CONTENT CATOGORY TAGS ENDS HERE-->
          <div class="normaltext"><!--CONTENT STARTS HERE -->
            <div><?php the_content(); ?></div>
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
          <div><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /> </div>
        </div><!--CONTENT CATOGORY1 ENDS HERE-->
        <?php endwhile; else: ?>

<p><?php if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
?></p>
	
<?php endif; ?>
        <?php 
			$bloginfo_link = get_bloginfo('template_directory');
			?>
			<div style="float:left;"><?php next_posts_link('<img src="'.$bloginfo_link.'/images/old_post_btn.gif" alt="" />') ?></div>
	<div style="float:right;"><?php previous_posts_link('<img src="'.$bloginfo_link.'/images/new_post_btn.jpg" alt="" />') ?></div>
      </div><!--CONTENT RIGHT ENDS HERE-->
    </div>
  </div><!--CONTENT PART ENDS HERE-->
</div><!-- main content  -->
</div><!-- main wrapper -->
<?php get_footer();	?>