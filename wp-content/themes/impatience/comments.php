<div id="comments">
<?php // Do not delete these lines or your computer will implode
 if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
  die ('Please do not load this page directly. Thanks!');
  if (!empty($post->post_password)) { // if there's a password
   if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie			?>

<p>
 <?php _e("This post is password protected. Enter the password to view comments."); ?>
</p>

<?php
   return;
  }
 }
 /* This variable is for alternating comment background */
 $oddcomment = 'alt';
?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>  
<?php else : ?>

<?php if ($comments) : ?>
 <h4><?php comments_number(__('No Comment'), __('1 Comment so far'), __('% Comments so far')); ?></h4>

 <ol id="commentlist">
  <?php foreach ($comments as $comment) : ?>
   <li class="<?php if ($comment->comment_author_email == "me@alexwelch.com") echo 'author'; else echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">    
   <?php if ($comment->comment_approved == '0') : ?>
    <em>Your comment is awaiting moderation.</em>
   <?php endif; ?>
   <?php 
	echo get_avatar($comment, 46); 
    if(the_author('', false) == get_comment_author())
     echo "<div class='commenttext-admin'>";
      else	  
      echo "<div class='commenttext'>";	  
     comment_text();
    echo "</div>";
   ?>
	<div class="singlecomment">
    	by <?php comment_author_link()?> On <?php comment_date('m/j/Y') ?>		
   	</div>
   </li>
   <?php /* Changes every other comment to a different class */	
    if ('alt' == $oddcomment){
     $oddcomment = 'standard';
    }
     else {
     $oddcomment = 'alt';
    }
   ?>
  <?php endforeach; /* end for each comment */ ?>
 </ol>
  
 <?php else : // this is displayed if there are no comments so far ?>
 <?php if ('open' == $post-> comment_status) : ?>
 <!-- If comments are open, but there are no comments. -->
 <?php else : // comments are closed ?>
 <!-- If comments are closed. -->
 <p class="nocomments">We're sorry, but comments are closed.</p>
 <?php endif; ?>
 <?php endif; ?>
 <?php if ('open' == $post-> comment_status) : ?>
 <?php endif; // If registration required and not logged in ?>
 <?php endif; // if you delete this your computer will explode ?>

 <h4>Leave a Comment</h4>
 <div id="commentsform">
	<div class="notes">
		<h5>Allowed <abbr title="eXtensible Hypertext Markup Language">XHTML</abbr>:</h5> 
		<div class="allowed_tags"><code><?php echo allowed_tags(); ?></code></div>
	</div>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<dl>
   	<?php if ( $user_ID ) : ?>	
		<dt class="top single">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"> (Logout) </a></dt>	
   <?php else : ?>
    	<dt class="top"><label for="comment-author">Name <?php if ($req) echo "(required)"; ?></label></dt>
     	<dd><input type="text" name="author" id="comment-author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" /></dd>
    	<dt><label for="comment-email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label></dt>
     	<dd><input type="text" name="email" id="comment-email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" /></dd>
    	<dt><label for="comment-url">Website</label></dt>
     	<dd><input type="text" name="url" id="comment-url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" /></dd>
   <?php endif; ?>    
		<dt><label for="comment-comment">Your Comment</label></dt>
     	<dd><textarea name="comment" id="comment-comment" cols="50" rows="10" tabindex="4"></textarea></dd>
     	<dd class="button-group"><input name="submit" type="submit" id="sbutt" tabindex="5" value="Submit Comment" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /><?php do_action('comment_form', $post->ID); ?></dd>     	   		
	</dl>
  </form>
 </div><!-- end #commentsform -->
</div>