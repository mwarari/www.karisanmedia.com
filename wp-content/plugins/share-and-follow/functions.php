<?php

 function currentPageURI() {
                 $pageURL = 'http';
                 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
                 $pageURL .= "://";
                 if ($_SERVER["SERVER_PORT"] != "80") {
                  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
                 } else {
                  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                 }
                 return $pageURL;
                }

function the_share_links(){
        // prints html share links
        $perma=get_permalink();
        $title=get_the_title();
        $postid = get_the_ID();
        $args = array (
                    'page_id' => $postid,
                    'heading' => "0",
                    'list_style' => "icon_text",
                    'direction' => 'row',
                    'page_title'=>$title,
                    'page_link'=>$perma,
                    'echo'=>'0',
                    'facebook_share_text' => __('Recommend','share-and-follow'),
                    'stumble_share_text'=> __('Stumble uppon','share-and-follow'),
                    'twitter_share_text'=>__('Tweet','share-and-follow'),
                    'delicious_share_text'=>__('Bookmark','share-and-follow'),
                    'digg_share_text'=>__('Digg','share-and-follow'),
                    'reddit_share_text'=>__('Share','share-and-follow'),
                    'hyves_share_text'=>__('Tip','share-and-follow'),
                    'orkut_share_text'=>__('Share','share-and-follow'),
                    'myspace_share_text'=>__('Share','share-and-follow'),
                    
        );
        social_links($args);
}

function get_the_share_links(){
        // returns html share links
        $perma=get_permalink();
        $title=get_the_title();
        $postid = get_the_ID();
        $args = array (

                    'page_id' => $postid,
                    'heading' => "0",
                    'list_style' => "icon_text",
                    'direction' => 'row',
                    'page_title'=>$title,
                    'page_link'=>$perma,
                    'echo'=>'1',
                    'facebook_share_text' => __('Recommend','share-and-follow'),
                    'stumble_share_text'=> __('Stumble uppon','share-and-follow'),
                    'twitter_share_text'=>__('Tweet','share-and-follow'),
                    'delicious_share_text'=>__('Bookmark','share-and-follow'),
                    'digg_share_text'=>__('Digg','share-and-follow'),
                    'reddit_share_text'=>__('Share','share-and-follow'),
                    'hyves_share_text'=>__('Tip','share-and-follow'),
                    'orkut_share_text'=>__('Share','share-and-follow'),
                    'myspace_share_text'=>__('Share','share-and-follow'),

        );
        social_links($args);

}

//show social links function
function social_links($args){
    $defaults = array(
                    'page_id' => '0',
                    'heading' => "1",
                    'size' => "16",
                    'list_style' => "icon_text",
                    'direction' => 'down',
                    'facebook' => 'yes',
                    'twitter'=>'yes',
                    'delicious'=>'yes',
                    'digg'=>'yes',
                    'reddit'=>'yes',
                    'myspace'=>'',
                    'hyves'=>'',
                    'tumblr'=>'',
                    'orkut'=>'',
                    'print'=>'',
                    'google_buzz'=>'',
                    'yahoo_buzz'=>'',
                    'post_rss'=>'',
                    'mixx'=>'',
                    'mixx'=>'email',
                    'iconset'=>'default',
                    'share'=>'yes',
                    'phat'=>'',
                    'page_title'=>'',
                    'page_link'=>'',
                    'echo'=>'0',
                    'words'=>'long',
                    'css_images'=>'yes',
                    'share_text'=>__('share:','share-and-follow'),
                    'mixx_share_text' => __('Mixx it up','share-and-follow'),
                    'facebook_share_text' => __('Recommend on Facebook','share-and-follow'),
                    'stumble_share_text'=> __('Share with Stumblers','share-and-follow'),
                    'twitter_share_text'=>__('Tweet this','share-and-follow'),
                    'tumble_share_text'=>__('Tumblr. this','share-and-follow'),
                    'delicious_share_text'=>__('Bookmark on Delicious','share-and-follow'),
                    'digg_share_text'=>__('Digg this','share-and-follow'),
                    'reddit_share_text'=>__('Share on Reddit','share-and-follow'),
                    'hyves_share_text'=>__('Tip on Hyves','share-and-follow'),
                    'orkut_share_text'=>__('Share on Orkut','share-and-follow'),
                    'myspace_share_text'=>__('Share via MySpace','share-and-follow'),
                    'post_rss_share_text'=>__('Follow this posts comments','share-and-follow'),
                    'print_share_text'=>__('Print for later','share-and-follow'),
                    'email_share_text'=>__('Tell a friend','share-and-follow'),
                    'google_buzz_share_text'=>__('Buzz up','share-and-follow'),
                    'yahoo_buzz_share_text'=>__('Buzz it','share-and-follow'),
                    'email_body_text'=>__('Found this and thought of you...','share-and-follow'),

                );
    $args = wp_parse_args( $args, $defaults );
    extract( $args, EXTR_SKIP );
    if (empty($page_title) && empty($page_link)){
       $page_title = get_bloginfo('name');
       if(is_category() || is_archive() || is_tag() || is_month()) {
               if ( is_category() || is_archive()) {
                   $category = get_the_category();
                   $page_title = $page_title."&nbsp;|&nbsp;".$category[0]->cat_name;
                }
               if ( is_tag() ) {
                    $page_title = get_bloginfo('name')."&nbsp;|&nbsp;".single_tag_title("", true);
                }
           $page_link = currentPageURI();
           $page_id = 0;
       }
       else if(is_front_page()) {
             $page_title = get_bloginfo('name');
             $page_link = get_option('home');
             $page_id = 0;
       }
       else{
            $page_title = get_the_title($page_id);
            $page_link = get_permalink($page_id);
       }
    }
$html='';
if($heading==1){
         $html = "<h2 class=\"clean\" >". _e('Share this ');
         if ($page_id==0){$html .='blog';}
         else {$html .='page';}
         $html.= "</h2>";
}

$rssAdminOption = "permalink_structure";
$rssSettigns = get_option($rssAdminOption);
if (empty($rssSettigns)){$rss_link = $page_link."&feed=rss2";}
else {$rss_link = $page_link."feed";}

if ($css_images=='yes'){$html .= "<ul class=\"socialwrap size".$size." ".$direction."\">";}
if ($css_images=='no'){$html .= "<ul class=\"socialwrap ".$direction."\">";}

if($share=='yes'){$html.="<li class=\"".$list_style." share\">".$share_text."</li>";}
if($delicious=='yes'){
            if ($css_images=='yes'){$html.="<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"delicious\" href=\"http://delicious.com/post?url=".urlencode($page_link)."&amp;title=".urlencode($page_title)."\" title=\"".sprintf(__('Save on Delicious %s','share-and-follow'),$page_title)."\"><span class=\"head\">".stripslashes  ($delicious_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html.="<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" href=\"http://delicious.com/post?url=".urlencode($page_link)."&amp;title=".urlencode($page_title)."\" title=\"".sprintf(__('Save on Delicious %s','share-and-follow'),$page_title)."  \"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/delicious.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($delicious_share_text)."</span></a></li>";}
            }
if($digg=='yes')
                {
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"digg\" href=\"http://digg.com/submit?phase=2&amp;url=".urlencode($page_link)."&amp;title=".urlencode($page_title)."\" title=\"".sprintf(__('Digg this %s - %s','share-and-follow'),pagepost($page_id),$page_title)."\"><span class=\"head\">".stripslashes  ($digg_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" href=\"http://digg.com/submit?phase=2&amp;url=".urlencode($page_link)."&amp;title=".urlencode($page_title)."\" title=\"".sprintf(__('Digg this %s - %s','share-and-follow'),pagepost($page_id),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/digg.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($digg_share_text)."</span></a></li>";}
        }
if($facebook=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"facebook\" href=\"http://www.facebook.com/sharer.php?u=".urlencode($page_link)."&t=".urlencode($page_title)."\" title=\"".sprintf(__('Share this %s - %s','share-and-follow'),pagepost($page_id),$page_title)."\"><span class=\"head\">".stripslashes  ($facebook_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"http://www.facebook.com/sharer.php?u=".urlencode($page_link)."&t=".urlencode($page_title)."\" title=\"".sprintf(__('Share this %s - %s','share-and-follow'),pagepost($page_id),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/facebook.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($facebook_share_text)."</span></a></li>";}
            }
if($google_buzz=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"google_buzz\" href=\"http://www.google.com/reader/link?url=".urlencode($page_link)."&title=".urlencode($page_title)."&srcURL=\" title=\"".sprintf(__('Buzz it : %s','share-and-follow'),$page_title)."\"><span class=\"head\">".stripslashes  ($google_buzz_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"http://www.google.com/reader/link?url=".urlencode($page_link)."&title=".urlencode($page_title)."&srcURL=\" title=\"".sprintf(__('Buzz it : %s','share-and-follow'),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/google_buzz.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($google_buzz_share_text)."</span></a></li>";}
}

if($yahoo_buzz=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"yahoo_buzz\" href=\"http://buzz.yahoo.com/buzz?targetUrl=".urlencode($page_link)."\" title=\"".sprintf(__('Buzz it : %s','share-and-follow'),$page_title)."\"><span class=\"head\">".stripslashes  ($yahoo_buzz_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"http://buzz.yahoo.com/buzz?targetUrl=".urlencode($page_link)."\" title=\"".sprintf(__('Buzz it : %s','share-and-follow'),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/yahoobuzz.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($yahoo_buzz_share_text)."</span></a></li>";}
}
if($hyves=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"hyves\" href=\"http://hyves-share.nl/button/tip/?tipcategoryid=12&rating=5&title=".urlencode($page_link)."&body=".urlencode($page_title)."\" title=\"".sprintf(__('Tip this %s via Hyves : %s','share-and-follow'),pagepost($page_id),$page_title)."\"><span class=\"head\">".stripslashes  ($hyves_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"http://hyves-share.nl/button/tip/?tipcategoryid=12&rating=5&title=".urlencode($page_link)."&body=".urlencode($page_title)."\" title=\"".sprintf(__('Tip this %s via Hyves : %s','share-and-follow'),pagepost($page_id),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/hyves.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($hyves_share_text)."</span></a></li>";}
}
if($mixx=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"mixx\" href=\"http://www.mixx.com/submit?page_url=".urlencode($page_link)."\" title=\"".sprintf(__('Mixx it up : %s','share-and-follow'),$page_title)."\"><span class=\"head\">".stripslashes  ($mixx_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"http://www.mixx.com/submit?page_url=".urlencode($page_link)."\" title=\"".sprintf(__('Mixx it up : %s','share-and-follow'),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/mixx.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($mixx_share_text)."</span></a></li>";}
}
if($myspace=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"myspace\" href=\"javascript:void(window.open('http://www.myspace.com/Modules/PostTo/Pages/?u='+encodeURIComponent(document.location.toString()),'ptm','height=450,width=440').focus())\" title=\"".sprintf(__('Share on Myspace : %s','share-and-follow'),$page_title)."\"><span class=\"head\">".stripslashes  ($myspace_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"javascript:void(window.open('http://www.myspace.com/Modules/PostTo/Pages/?u='+encodeURIComponent(document.location.toString()),'ptm','height=450,width=440').focus())\" title=\"".sprintf(__('Share on Myspace : %s','share-and-follow'),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/myspace.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($myspace_share_text)."</span></a></li>";}
}
if($orkut=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"orkut\" href=\"http://promote.orkut.com/preview?nt=orkut.com&du=".urlencode($page_link)."&tt=".urlencode($page_title)."\" title=\"".sprintf(__('Share via Orkut : %s','share-and-follow'),$page_title)."\"><span class=\"head\">".stripslashes  ($orkut_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"http://promote.orkut.com/preview?nt=orkut.com&du=".urlencode($page_link)."&tt=".urlencode($page_title)."\" title=\"".sprintf(__('Share via Orkut : %s','share-and-follow'),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/orkut.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($orkut_share_text)."</span></a></li>";}
}
if($reddit=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"reddit\" href=\"http://www.reddit.com/submit?url=".urlencode($page_link)."&amp;title=".urlencode($page_title)."\" title=\"".sprintf(__('Share on Reddit : %s','share-and-follow'),$page_title)."\"><span class=\"head\">".stripslashes  ($reddit_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"http://www.reddit.com/submit?url=".urlencode($page_link)."&amp;title=".urlencode($page_title)."\" title=\"".sprintf(__('Share on Reddit : %s','share-and-follow'),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/reddit.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($reddit_share_text)."</span></a></li>";}
}
if($stumble=='yes'){
            if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"stumble\" href=\"http://www.stumbleupon.com/submit?url=".urlencode($page_link)."&amp;title=".urlencode($page_title)."\" title=\"".sprintf(__('Submit to stumble : %s','share-and-follow'),$page_title)."\"><span class=\"head\">".stripslashes  ($stumble_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"http://www.stumbleupon.com/submit?url=".urlencode($page_link)."&amp;title=".urlencode($page_title)."\" title=\"".sprintf(__('Submit to stumble : %s','share-and-follow'),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/stumbleupon.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($stumble_share_text)."</span></a></li>";}
}
if($tumblr=='yes'){
            if ($css_images=='yes'){$html .="<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"tumblr\" href=\"http://www.tumblr.com/share?v=3&amp;u=".urlencode($page_link)."&amp;t=".urlencode($page_title)."\" title=\"".sprintf(__('Share this %s - %s on Tumblr.','share-and-follow'),pagepost($page_id),$page_title)."\"><span class=\"head\">".stripslashes  ($tumblr_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .="<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" href=\"http://www.tumblr.com/share?v=3&amp;u=".urlencode($page_link)."&amp;t=".urlencode($page_title)."\" title=\"".sprintf(__('Share this %s - %s on Tumblr.','share-and-follow'),pagepost($page_id),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/tumblr.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($tumblr_share_text)."</span></a></li>";}
}
if($twitter=='yes'){
            if ($css_images=='yes'){$html .="<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"twitter\" href=\"http://twitter.com/home/?status=".urlencode($page_link)."\" title=\"".sprintf(__('Tweet this %s - %s','share-and-follow'),pagepost($page_id),$page_title)."\"><span class=\"head\">".stripslashes  ($twitter_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .="<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" href=\"http://twitter.com/home/?status=".urlencode($page_link)."\" title=\"".sprintf(__('Tweet this %s - %s','share-and-follow'),pagepost($page_id),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/twitter.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($twitter_share_text)."</span></a></li>";}
}
if($post_rss=='yes'){
            if ($css_images=='yes'){$html .="<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"rss\" href=\"".$rss_link."\" title=\"".sprintf(__('Track this %s - %s via RSS','share-and-follow'),pagepost($page_id),$page_title)."\"><span class=\"head\">".stripslashes  ($post_rss_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .="<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" href=\"".$rss_link."\" title=\"".sprintf(__('Track this %s - %s via RSS','share-and-follow'),pagepost($page_id),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/rss.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($post_rss_share_text)."</span></a></li>";}
}
if($email=='yes'){
            if ($css_images=='yes'){$html .="<li class=\"".$list_style."\"><a rel=\"nofollow\" class=\"email\" href=\"mailto:?subject=".get_bloginfo('name')." : ".$page_title."&body=".$email_body_text."  ".$page_link."\" title=\"".sprintf(__('Email this %s : %s','share-and-follow'),pagepost($page_id),$page_title)."\"><span class=\"head\">".stripslashes  ($email_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .="<li class=\"".$list_style."\"><a  rel=\"nofollow\" href=\"mailto:?subject=".get_bloginfo('name')." : ".$page_title."&body=".$email_body_text."  ".$page_link."\" title=\"".sprintf(__('Email this %s : %s','share-and-follow'),pagepost($page_id),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/email.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($email_share_text)."</span></a></li>";}
}
if($print=='yes'){
            if ($css_images=='yes'){$html .="<li class=\"".$list_style."\"><a rel=\"nofollow\" class=\"print\" href=\"javascript:window.print();\" title=\"".sprintf(__('Print this %s : %s','share-and-follow'),pagepost($page_id),$page_title)."\"><span class=\"head\">".stripslashes  ($print_share_text)."</span></a></li>";}
            if ($css_images=='no'){$html .="<li class=\"".$list_style."\"><a  rel=\"nofollow\" href=\"javascript:window.print();\" title=\"".sprintf(__('Print this %s : %s','share-and-follow'),pagepost($page_id),$page_title)."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/print.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($print_share_text)."</span></a></li>";}
}
$html .= "</ul>";


if ($direction=='row'){$html .= "<div class=\"clean\"></div> ";}
if ($echo=='0'){
    echo $html;
}
else {return $html;}
}


function follow_links($args){
    $defaults = array(
                    'size' => "16",
                    'list_style' => 'text_replacement',
                    'direction' => 'down',
                    'iconset'=>'default',
                    'word_value'=>'follow',
                    'word_text'=>__('follow:','share-and-follow'),
                    'phat'=>'',
                    'page_title'=>'',
                    'page_link'=>'',
                    'echo'=>'0',
                    'words'=>'long',
                    'sidebar_tab'=>'tab',
                    'heading'=>'yes',
                    'css_images'=>'yes',
                    'follow_location'=>'right',
                    'facebook_text'=>__('Become a Fan','share-and-follow'),
                    'lastfm_text'=>__('Check my tunes','share-and-follow'),
                    'stumble_text'=>__('Follow my Stumbles','share-and-follow'),
                    'twitter_text'=>__('Tweet with me','share-and-follow'),
                    'tumblr_text'=>__('Tumblr.','share-and-follow'),
                    'youtube_text'=>__('Subscribe to my Channel','share-and-follow'),
                    'hyves_text'=>__('Become Hyves friends','share-and-follow'),
                    'orkut_text'=>__('Become Orkut friends','share-and-follow'),
                    'myspace_text'=>__('Become my MySpace follower','share-and-follow'),
                    'yelp_text'=>__('Read Reviews','share-and-follow'),
                    'newsletter_text'=>__('Join Newsletter','share-and-follow'),
                    'linkedin_text'=>__('Connect with me','share-and-follow'),
                    'flickr_text'=>__('See my photos','share-and-follow'),
                    'xfire_text'=>__('Join me on a mission','share-and-follow'),
                    'rss_text'=>__('RSS feed','share-and-follow'),
                    'google_buzz_text'=>__('Join the conversation','share-and-follow'),
                    'yahoo_buzz_text'=>__('Connect with me','share-and-follow'),

                );
    $args = wp_parse_args( $args, $defaults );
    extract( $args, EXTR_SKIP );

$html ='';
$rssAdminOption = "permalink_structure";
$rssSettigns = get_option($rssAdminOption);
if (empty($rssSettigns)){$rss_link = get_option('home')."/?feed=rss2";}
else {$rss_link = get_option('home')."/feed";}
if ($sidebar_tab=='tab'){$html .="<div id=\"follow\" class=\"".$follow_location."\">";}
    if ($css_images=='yes'){$html .= "<ul class=\"".$sidebar_tab." size".$size." ".$direction."\">";}
    if ($css_images=='no'){$html .= "<ul class=\"".$sidebar_tab." ".$direction."\">";}
    if($heading=='yes') {$html .= "<li class=\"".$word_value."\"><span>".$word_text."</span></li>";}
        if($follow_facebook=='yes'&&!empty($facebook_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"facebook\" href=\"".$facebook_link."\" title=\"".stripslashes  ($facebook_text)."\"><span class=\"head\">".stripslashes  ($facebook_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$facebook_link."\">";
                    if ($list_style != 'text_only'){$html .= "<img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/facebook.png\" height=\"".$size."\"  width=\"".$size."\" /> ";}
                    $html .= "<span class=\"head\">".stripslashes  ($facebook_text)."</span></a></li>";
                }
            }
        if($follow_flickr=='yes'&&!empty($flickr_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"flickr\" href=\"".$flickr_link."\" title=\"".stripslashes  ($flickr_text)."\"><span class=\"head\">".stripslashes  ($flickr_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$flickr_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/flickr.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($flickr_text)."</span></a></li>";}
            }
        if($follow_google_buzz=='yes'&&!empty($google_buzz_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"google_buzz\" href=\"".$google_buzz_link."\" title=\"".stripslashes  ($google_buzz_text)."\"><span class=\"head\">".stripslashes  ($google_buzz_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$google_buzz_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/google_buzz.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($google_buzz_text)."</span></a></li>";}
            }
        if($follow_hyves=='yes'&&!empty($hyves_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"hyves\" href=\"".$hyves_link."\" title=\"".stripslashes  ($hyves_text)."\"><span class=\"head\">".stripslashes  ($hyves_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$hyves_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/hyves.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($hyves_text)."</span></a></li>";}
            }
        if($follow_linkedin=='yes'&&!empty($linkedin_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"linkedin\" href=\"".$linkedin_link."\" title=\"".stripslashes  ($linkedin_text)."\"><span class=\"head\">".stripslashes  ($linkedin_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$linkedin_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/linkedin.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($linkedin_text)."</span></a></li>";}
            }
        if($follow_lastfm=='yes'&&!empty($lastfm_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"lastfm\" href=\"".$lastfm_link."\" title=\"".stripslashes  ($lastfm_text)."\"><span class=\"head\">".stripslashes  ($lastfm_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$lastfm_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/lastfm.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($lastfm_text)."</span></a></li>";}
            }
        if($follow_myspace=='yes'&&!empty($myspace_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"myspace\" href=\"".$myspace_link."\" title=\"".stripslashes  ($myspace_text)."\"><span class=\"head\">".stripslashes  ($myspace_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$myspace_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/myspace.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($myspace_text)."</span></a></li>";}
            }
        if($follow_newsletter=='yes'&&!empty($newsletter_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"newsletter\" href=\"".$newsletter_link."\" title=\"".stripslashes  ($newsletter_text)."\"><span class=\"head\">".stripslashes  ($newsletter_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$newsletter_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/newsletter.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($newsletter_text)."</span></a></li>";}
            }
        if($follow_orkut=='yes'&&!empty($orkut_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"orkut\" href=\"".$orkut_link."\" title=\"".stripslashes  ($orkut_text)."\"><span class=\"head\">".stripslashes  ($orkut_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$orkut_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/orkut.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($orkut_text)."</span></a></li>";}
            }
        if($follow_rss=='yes')
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"rss\" href=\"".$rss_link."\" title=\"".stripslashes  ($rss_text)."\"><span class=\"head\">".stripslashes  ($rss_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$rss_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/rss.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($rss_text)."</span></a></li>";}
            }
        if($follow_stumble=='yes'&&!empty($stumble_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"stumble\" href=\"".$stumble_link."\" title=\"".__('Stuble Upon','share-and-follow')."\"><span class=\"head\">".stripslashes  ($stumble_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\">
                                                            <a rel=\"nofollow\" target=\"_blank\"  href=\"".$stumble_link."\">
                                                                <img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/stumbleupon.png\" height=\"".$size."\"  width=\"".$size."\" />
                                                                <span class=\"head\">".stripslashes  ($stumble_text)."</span></a></li>";}
            }
        if($follow_tumblr=='yes'&&!empty($tumblr_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"tumblr\" href=\"".$tumblr_link."\" title=\"".stripslashes  ($tumblr_text)."\"><span class=\"head\">".stripslashes  ($tumblr_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$tumblr_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/tumblr.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($tumblr_text)."</span></a></li>";}
            }
        if($follow_twitter=='yes'&&!empty($twitter_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"twitter\" href=\"".$twitter_link."\" title=\"".stripslashes  ($twitter_text)."\"><span class=\"head\">".stripslashes  ($twitter_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$twitter_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/twitter.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($twitter_text)."</span></a></li>";}
            }
        if($follow_xfire=='yes'&&!empty($xfire_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"xfire\" href=\"".$xfire_link."\" title=\"".stripslashes  ($xfire_text)."\"><span class=\"head\">".stripslashes  ($xfire_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$xfire_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/xfire.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($xfire_text)."</span></a></li>";}
            }
        if($follow_yelp=='yes'&&!empty($yelp_link))
            {
                if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"yelp\" href=\"".$yelp_link."\" title=\"".stripslashes  ($yelp_text)."\"><span class=\"head\">".stripslashes  ($yelp_text)."</span></a></li>";}
                if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$yelp_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/yelp.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($yelp_text)."</span></a></li>";}
            }
        if($follow_youtube=='yes'&&!empty($youtube_link))
                {
                    if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"youtube\" href=\"".$youtube_link."\" title=\"".stripslashes  ($youtube_text)."\"><span class=\"head\">".stripslashes  ($youtube_text)."</span></a></li>";}
                    if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$youtube_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/youtube.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($youtube_text)."</span></a></li>";}
                }
        if($follow_yahoo_buzz=='yes'&&!empty($yahoo_buzz_link))
                {
                    if ($css_images=='yes'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\" class=\"yahoo_buzz\" href=\"".$yahoo_buzz_link."\" title=\"".stripslashes  ($yahoo_buzz_text)."\"><span class=\"head\">".stripslashes  ($yahoo_buzz_text)."</span></a></li>";}
                    if ($css_images=='no'){$html .= "<li class=\"".$list_style."\"><a rel=\"nofollow\" target=\"_blank\"  href=\"".$yahoo_buzz_link."\"><img src=\"".WP_PLUGIN_URL."/share-and-follow/default/$size/yahoobuzz.png\" height=\"".$size."\"  width=\"".$size."\" /> <span class=\"head\">".stripslashes  ($yahoo_buzz_text)."</span></a></li>";}
                }

$html .= "</ul>";
if ($direction=='row'){$html .= "<div class=\"clean\"></div> ";}
if ($sidebar_tab=='tab'){$html .="</div>";}

if ($echo=='0'){
    echo $html;
}
else {return $html;}
}

    function pagepost($page_id = 0){
        if ($page_id==0){$html =__('blog','share-and-follow');}
        else {$html =__('post','share-and-follow');}
        return $html;
    }

// do the gravatar stuff
function doGravatarLink ($email, $default = '', $size=110){
// construct the gravatar url, default to no alt image and 110px square
$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( $email ) ) .
"?default=" . urlencode( $default ) .
"&size=" . $size;

return $grav_url;
}


?>
