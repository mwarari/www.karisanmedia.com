<?php 
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly.');
	if (!empty($post->post_password)) { // if password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // invalid
?>		
	<p class="nocomments">This post is password protected. Enter the password to view comments.<p>		
	<?php
		return;
    	}
 	}
	$oddcomment = 'alt'; // set alternating comment background
	?>
<?php if ($comments) : ?>
	<h3><?php comments_number('No Responses', '1 Response', '% Responses' );?> to <em><?php the_title(); ?></em></h3> 
	<ol class="commentlist">	
	<?php foreach ($comments as $comment) : ?>
	<?php
	if (function_exists('get_avatar')) {
		//echo get_avatar($email);
		echo get_avatar($comment, '50');
		}else{
		// alternate gravatar code for < 2.5
		$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5($comment) . "&default=" . urlencode($default) . "&size=" . $size;
		echo "<img src='$grav_url'/>";
	   }
	?>
	<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
		<cite><?php comment_author_link() ?></cite>
		<?php if ($comment->comment_approved == '0') : ?>
		<em>Your comment is awaiting moderation.</em>
		<?php endif; ?>
		<br />
		<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="">
		<?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> 
		<?php edit_comment_link('Edit','',''); ?></small>

		<?php comment_text() ?>
	</li>
	<?php /* Changes every other comment to a different class */	
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?> 
	<!-- If comments are open, but there are no comments. -->
		
	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<p class="nocomments">Comments are closed.</p>	
	<?php endif; ?>
<?php endif; ?> <!-- end if comments -->

<div id="commentform" class="clearfix">
<!-- comments open? -->
<?php if ('open' == $post->comment_status) : ?>
	<h3 id="respond">Post a Comment</h3>
	
	<!-- registration required? -->
	<?php if (get_option('comment_registration') && !$user_ID) : ?>
	<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
	<div class="comfoot" style="margin-top:-20px;">&nbsp;</div>
<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
	
	<!-- user logged in? -->
	<?php if ($user_ID) : ?>
		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
	<?php else : ?>
		<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /><label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
		<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /><label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>
		<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /><label for="url"><small>Website</small></label></p>
	<?php endif; ?>
	<!-- end if user logged in -->
	
	<div><textarea name="comment" id="commentbox" cols="100%" rows="10" tabindex="4"></textarea></div> 
	<div style="margin:40px 0 0 80px; float:left;"><input name="submit" type="submit" id="submit" value="Submit" /></div>
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	<?php do_action('comment_form', $post->ID); ?>
	<div class="comfoot">&nbsp;</div>
	</form>
	
	<?php endif; ?>
	<!-- end if registration required -->

<?php endif; ?> <!-- end if comments open -->
</div>  <!-- end div commentform -->