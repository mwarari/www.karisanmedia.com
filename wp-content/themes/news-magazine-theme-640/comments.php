<?php


// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div class="commentareain">


<?php if ( have_comments() ) : ?>
<h2><?php _e("Reader Feedback",'NewsMagazineTheme640'); ?></h2>
	<h3><?php $norer=__("No Responses ",'NewsMagazineTheme640'); $onerer=__("One Response ",'NewsMagazineTheme640'); $rer=__(" Responses",'NewsMagazineTheme640'); comments_number($norer, $onerer, '%'.$rer );?> <?php _e("to",'NewsMagazineTheme640'); ?> &#8220;<?php the_title(); ?>&#8221;</h3>


	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>

	<div class="bnavigation">
		<div class="bnavleft"><?php previous_comments_link() ?></div>
		<div class="bnavright"><?php next_comments_link() ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e("Comments are closed",'NewsMagazineTheme640');?>.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

	<h3><?php $larep=__("Leave a Reply ",'NewsMagazineTheme640'); $larepto=__("Leave a Reply to ",'NewsMagazineTheme640'); comment_form_title( $larep, $larepto.' %s' ); ?></h3>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p><?php _e("You must be",'NewsMagazineTheme640'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in",'NewsMagazineTheme640'); ?></a> <?php _e("to post a comment",'NewsMagazineTheme640');?>.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( $user_ID ) : ?>

	<p><?php _e("Logged in as",'NewsMagazineTheme640');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e("Log out",'NewsMagazineTheme640'); ?> &raquo;</a></p>

	<?php else : ?>

	<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
	<label for="author"><small><?php _e("Name",'NewsMagazineTheme640');?> <?php if ($req) echo "("; _e("required",'NewsMagazineTheme640'); echo ")"; ?></small></label></p>

	<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
	<label for="email"><small><?php _e("Mail",'NewsMagazineTheme640');?> (<?php _e("will not be published",'NewsMagazineTheme640'); ?>) <?php if ($req) echo "("; _e("required",'NewsMagazineTheme640'); echo ")"; ?></small></label></p>

	<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
	<label for="url"><small><?php _e("Website",'NewsMagazineTheme640'); ?></small></label></p>

	<?php endif; ?>


	<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

	<p><input name="submit" type="submit" id="submit" tabindex="5" class="commentsubmit" value="<?php _e("Submit Comment",'NewsMagazineTheme640'); ?>" />
	<?php comment_id_fields(); ?>
	</p>
	<?php do_action('comment_form', $post->ID); ?>

	</form>

<?php endif; // If registration required and not logged in ?>

</div><!--close div id respond-->


<?php endif; // if you delete this the sky will fall on your head ?>
</div>