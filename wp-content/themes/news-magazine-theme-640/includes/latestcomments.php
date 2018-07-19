

<?php
global $wpdb, $themeoptionsprefix;

$numrecentcomments=get_option($themeoptionsprefix.'_numrecentcomments');
$commentsdisplayorder=get_option($themeoptionsprefix.'_recentcommentsdisplayorder');
if(!isset($commentsdisplayorder) || empty($commentsdisplayorder))
{
	$commentsdisplayorder="DESC";
}

if(!isset($numrecentcomments) || empty($numrecentcomments) ){ $numrecentcomments=3; }

wp_reset_query();

$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_date_gmt, comment_approved,
comment_type,comment_author_url,comment_author_email,
SUBSTRING(comment_content,1,25) AS abridgedcomment
FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID)
WHERE comment_approved = '1' AND comment_type = '' AND
post_password = ''
ORDER BY comment_date_gmt $commentsdisplayorder LIMIT $numrecentcomments";

$comments = $wpdb->get_results($sql);


foreach ($comments as $comment) {
$myreturn .= "\n
<div class=\"excerpt\">
".get_avatar( $comment->comment_author_email, $size = '50', $default = '' )."

<p>"."<a href=\"" . get_permalink($comment->ID) .
"#comment-" . $comment->comment_ID . "\" title=\"on " .
$comment->post_title . "\">" .strip_tags($comment->comment_author)
.": " . strip_tags($comment->abridgedcomment)
."...</a></p></div>

";
}
echo $myreturn; ?>

