<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>

<p class="protect">This post is password protected. Enter the password to view comments.</p>
<?php
		return;
	}
?>
<!-- You can start editing here. -->
<div id="commentspanel" style="padding-top: 10px; padding-bottom: 10px;" class="examples">
  <?php if ( have_comments() ) : ?>
  <div><img src="<?php bloginfo('template_directory'); ?>/images/content_topcurve.png" alt="" /></div>
  <div class="commentsbg">
    <h3 id="comments">
      <?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220; <?php the_title(); ?> &#8221;
	</h3>
    <div>
      <div class="alignleft"><?php previous_comments_link() ?></div>
      <div class="alignright"><?php next_comments_link() ?></div>
    </div>
    <div style="margin-top: 10px;" class="commentlist">
      <ul>
        <?php wp_list_comments(); ?>
      </ul>
    </div>
    <div class="navigation">
      <div class="alignleft"><?php previous_comments_link() ?>
      </div>
      <div class="alignright"><?php next_comments_link() ?></div>
    </div>
  </div>
  <div><img src="<?php bloginfo('template_directory'); ?>/images/content_btmcurve.png" alt="" /></div>
  <?php else : // this is displayed if there are no comments so far ?>
  <?php if ( comments_open() ) : ?>
  <?php else : // comments are closed ?>
	<div><img src="<?php bloginfo('template_directory'); ?>/images/content_topcurve.png" alt="" /></div>
	
	 <div class="commentsbg">
     <p class="nocomments">Comments are closed.</p>
	 </div>
	<div><img src="<?php bloginfo('template_directory'); ?>/images/content_btmcurve.png" alt="" /></div>
	
</div>
<?php endif; ?>
<?php endif; ?>

<div id="respond" style="margin-bottom: 15px;">
  <?php if ( comments_open() ) : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <h3>
      <?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?>
    </h3>
    <div class="cancel-comment-reply"> <small>
      <?php cancel_comment_reply_link('Click here to cancel reply.'); ?>
      </small> </div>
    <div class="respondform examples">
      <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
      <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
      <?php else : ?>
      <?php if ( is_user_logged_in() ) : ?>
      <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
      <?php else : ?>
      <p><span class="inputLeftCrnr"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></span>
        <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> class="inputBg" />
        <span class="inputRightCrnr"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></span>
        <label for="author"><small>Name
        <?php if ($req) echo "(required)"; ?>
        </small></label>
      </p>
      <p><span class="inputLeftCrnr"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></span>
        <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>  class="inputBg"/>
        <span class="inputRightCrnr"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></span>
        <label for="email"><small>Mail (will not be published)
        <?php if ($req) echo "(required)"; ?>
        </small></label>
      </p>
      <p><span class="inputLeftCrnr"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></span>
        <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" class="inputBg" />
        <span class="inputRightCrnr"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></span>
        <label for="url"><small>Website</small></label>
      </p>
      <?php endif; ?>
      <p><span class="textareaTopCurv"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></span>
        <textarea name="comment" id="comment" cols="48" rows="10" tabindex="4" class="textareaBg"></textarea>
        <span class="textareaBotmCurv"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" alt="" /></span></p>
		<p class="submit_comment"> <input name="submit" type="submit" id="submitcomment" tabindex="5" value="Submit Comment" class="send_commentbtn" />
		 <?php comment_id_fields(); ?>
		</p>
		   </div>
    
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
