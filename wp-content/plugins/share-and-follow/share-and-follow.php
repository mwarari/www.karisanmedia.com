<?php
/* 
Plugin Name: Share and Follow
Plugin URI: http://phat-reaction.com/share-and-follow
Version: 1.15.1
Author: Andy Killen
Author URI: http://phat-reaction.com
Description: A simple plugin to manage sharing and following. **We're adding lots of functionality at the moment, so why not <a href="http://phat-reaction.com/share-and-follow/what-do-you-want/" >tell us what you want?</a>, or join the <a href="http://twitter.com/shareandfollow/" >twitter feed</a> to findout what's going on.  Great things are happening, be part of them....**        <a href="options-general.php?page=share-and-follow.php">Options &amp; configuration</a> | <a href="http://phat-reaction.com/share-and-follow/" >Documentation</a> | <a href="http://phat-reaction.com/share-and-follow/support/" >Support</a>
Copyright 2010 Andy Killen  (email : andy  [a t ] phat hyphen reaction DOT com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
              
if (!class_exists("ShareAndFollow")) {
	class ShareAndFollow {
            var $adminOptionsName = "ShareAndFollowAdminOptions";
		function ShareAndFollow() { //constructor
		}
		function init() {
			$this->getAdminOptions();
		}
                function getPostImage($postID)
                    {
                            $photos = get_children( array('post_parent' => $postID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
                            // DOES NOT WORK IF ALL IMAGES ARE JUST HTML NEEDS CMS LIBRARY
                            //
                            if($photos)
                            {
                                    $theImages = array_keys($photos);
                                    $iNum=$theImages[0];
                                    $sThumbUrl = wp_get_attachment_url($iNum);
                            }
                            if(!isset($sThumbUrl) || empty($sThumbUrl)) //default to site image if none there
                            {
                                $devOptions = $this->getAdminOptions();
                                if (isset($devOptions['logo_image_url'])){$sThumbUrl=$devOptions['logo_image_url'];}

                            // DEFAULTS to author gravatar, then site image need to be added
                            //
                            }
                            // return image url
                            return $sThumbUrl ;
                    }
                function show_follow_links(){
                 //shows follow links on the page top/bottom/left/right
                $devOptions = $this->getAdminOptions();
                if ($devOptions['add_follow'] == "true") {
                $devOptions = $this->getAdminOptions();
                    $args=array('list_style'=>$devOptions['follow_list_style'],                     'size'=>$devOptions['tab_size'],
                                'spacing'=>$devOptions['spacing'],                                  'add_content'=>'true',
                                'word_value'=>$devOptions['word_value'],                            'word_text'=>$devOptions['word_text'],
                                'add_follow'=>$devOptions['add_follow'],                            'add_css'=>$devOptions['add_css'],
                                'follow_facebook'=>$devOptions['follow_facebook'],                  'follow_stumble'=>$devOptions['follow_stumble'],
                                'follow_digg'=>$devOptions['follow_digg'],                          'follow_hyves'=>$devOptions['follow_hyves'],
                                'follow_orkut'=>$devOptions['follow_orkut'],                        'follow_reddit'=>$devOptions['follow_reddit'],
                                'follow_twitter'=>$devOptions['follow_twitter'],                    'follow_delicious'=>$devOptions['follow_delicious'],
                                'follow_myspace'=>$devOptions['follow_myspace'],                    'follow_rss'=>$devOptions['follow_rss'],
                                'follow_newsletter'=>$devOptions['follow_newsletter'],              'newsletter_link'=>$devOptions['newsletter_link'],
                                'follow_youtube'=>$devOptions['follow_youtube'],                    'follow_yahoo_buzz'=>$devOptions['follow_yahoo_buzz'],
                                'follow_google_buzz'=>$devOptions['follow_google_buzz'],            'facebook_link'=>$devOptions['facebook_link'],
                                'lastfm_text'=>$devOptions['facebook_link_text'],                   'lastfm_link'=>$devOptions['lastfm_link'],
                                'stumble_link'=>$devOptions['stumble_link'],                        'digg_link'=>$devOptions['digg_link'],
                                'hyves_link'=>$devOptions['hyves_link'],                            'orkut_link'=>$devOptions['orkut_link'],
                                'reddit_link'=>$devOptions['reddit_link'],                          'twitter_link'=>$devOptions['twitter_link'],
                                'delicious_link'=>$devOptions['delicious_link'],                    'myspace_link'=>$devOptions['myspace_link'],
                                'youtube_link'=>$devOptions['youtube_link'],                        'google_buzz_link'=>$devOptions['google_buzz_link'],
                                'yahoo_buzz_link'=>$devOptions['yahoo_buzz_link'],                  'follow_location'=>$devOptions['follow_location'],
                                'facebook_text'=>$devOptions['facebook_link_text'],                 'stumble_text'=>$devOptions['stumble_link_text'],
                                'twitter_text'=>$devOptions['twitter_link_text'],                   'youtube_text'=>$devOptions['youtube_link_text'],
                                'yahoo_buzz_text'=>$devOptions['yahoo_buzz_link_text'],             'google_buzz_text'=>$devOptions['google_buzz_link_text'],
                                'hyves_text'=>$devOptions['hyves_link_text'],                       'orkut_text'=>$devOptions['orkut_link_text'],
                                'myspace_text'=>$devOptions['myspace_link_text'],                   'follow_flickr'=>$devOptions['follow_flickr'],
                                'flickr_link'=>$devOptions['flickr_link'],                          'flickr_text'=>$devOptions['flickr_link_text'],
                                'follow_tumblr'=>$devOptions['follow_tumblr'],                      'tumblr_link'=>$devOptions['tumblr_link'],
                                'tumblr_text'=>$devOptions['tumblr_link_text'],                     'follow_xfire'=>$devOptions['follow_xfire'],
                                'xfire_link'=>$devOptions['xfire_link'],                          'xfire_text'=>$devOptions['xfire_link_text'],
                                'google_buzz_text'=>$devOptions['google_buzz_link_text'],           'yahoo_buzz_text'=>$devOptions['yahoo_buzz_link_text'],
                                'follow_linkedin'=>$devOptions['follow_linkedin'],                  'linkedin_link'=>$devOptions['linkedin_link'],
                                'linkedin_text'=>$devOptions['linkedin_link_text'],                 'follow_yelp'=>$devOptions['follow_yelp'],
                                'yelp_link'=>$devOptions['yelp_link'],                              'yelp_text'=>$devOptions['yelp_link_text'],
                                'rss_text'=>$devOptions['rss_link_text'],                           'css_images'=>'yes',
                                'border_color'=>$devOptions['border_color'],                        'follow_lastfm'=>$devOptions['follow_lastfm'],
                                'newsletter_text'=>$devOptions['newsletter_link_text'],
                    );
                   follow_links($args);   // does the follow links tab from the args above
                 }
                }
		function getAdminOptions() {
                        // setup defaults for all the options
			$shareAdminOptions = array(
                                'show_header' => 'true',                		'iconset' => 'default',
                                'follow_location'=>'right',                             'background_color'=>'f60',
                                'border_color'=>'fff',                                  'follow_color'=>'000',
                                'extra_print_css'=>'',                     		'content' => '',
                                'extra_css'=>'',                                        'excluded_share_pages'=>'',
                                'list_style'=>'iconOnly',                               'size'=>'32',
                                'spacing'=>'3',                                         'add_content'=>'true',
                                'add_follow'=>'true',                                   'add_css'=>'false',
                                'post_rss'=>'yes',                                      'facebook' => 'yes',
                                'twitter'=>'yes',                                       'stumble' => 'yes',
				'digg'=> 'yes',                                         'reddit'=> 'yes',
                                'hyves' => '',                                          'delicious'=>'yes',
                                'print'=>'',                                            'orkut'=>'',
                                'myspace'=>'',                                          'google_buzz'=>'',
                                'yahoo_buzz'=>'',                                       'yahoo_buzz_link'=>'',
                                'google_buzz_link'=>'',                                 'youtube'=>'',
                                'mixx'=>'',                                             'email'=>'',
                                'tumblr_link'=>'',                                      'tumblr'=>'',
                                'email_link'=>'',                                       'email_body'=>'',
                                'facebook_link' => '',                                  'twitter_link'=>'',
                                'stumble_link' => '',                                   'digg_link'=> '',
                                'reddit_link'=> '',                                     'hyves_link' => '',
                                'delicious_link'=>'',                                   'orkut_link'=>'',
                                'myspace_link'=>'',                                     'rss_link'=>'',
                                'newsletter_link'=>'',                                  'follow_newsletter'=>'',
                                'cssid'=>'1',                                           'add_follow_text'=>'true',
                                'word_value'=>'follow',                                 'theme_support'=>'none',
                                'follow_list_style'=>'iconOnly',                        'follow_facebook' => '',
                                'follow_twitter'=>'',                                   'follow_stumble' => '',
				'follow_digg'=> '',                                     'follow_reddit'=> '',
                                'follow_hyves' => '',                                   'follow_delicious'=>'',
                                'follow_orkut'=>'',                                     'follow_myspace'=>'',
                                'follow_lastfm'=>'',                                    'lastfm'=>'',
                                'follow_rss'=>'yes',                                    'follow_youtube'=>'',
                                'tab_size'=>'16',                                       'css_images'=>'yes',
                                'wp_post'=>'yes',                                       'wp_page'=>'yes',
                                'wp_home'=>'yes',                                       'wp_archive'=>'yes',
                                'add_image_link'=>'true',                               'default_email'=>'',
                                'default_email_image'=>'',                              'author_defaults'=>'authors',
                                'logo_image_url'=>'',                                   'homepage_img'=>'logo',
                                'homepage_image_url'=>'',                               'archive_img'=>'logo',
                                'archive_image_url'=>'',                                'page_img_url'=>'',
                                'post_img_url'=>'',                                     'page_img' =>'logo',
                                'post_img' =>'gravatar',                                'share_text'=>__('share:','share-and-follow'),
                                'share'=>'no',                                          'lastfm_link'=>'',
                                'css_print_excludes'=>'#menu, #navigation, #navi, .menu',
                                'word_text'=>__('follow:','share-and-follow'),
                                'mixx_share_text' =>__('Mixx it up','share-and-follow'),
                                'facebook_share_text' =>__('Recommend on Facebook','share-and-follow'),
                                'twitter_share_text' =>__('Tweet about it','share-and-follow'),
                                'tumblr_share_text' =>__('Tumblr it','share-and-follow'),
                                'stumble_share_text' =>__('Share with Stumblers','share-and-follow'),
                                'digg_share_text' =>__('Digg this post','share-and-follow'),
                                'reddit_share_text' =>__('share via Reddit','share-and-follow'),
                                'hyves_share_text' =>__('Tip on Hyves','share-and-follow'),
                                'delicious_share_text' =>__('Bookmark on Delicious','share-and-follow'),
                                'orkut_share_text' =>__('Share on Orkut','share-and-follow'),
                                'myspace_share_text' =>__('Share via MySpace','share-and-follow'),
                                'facebook_link_text' => __('Become my Facebook friend','share-and-follow'),
                                'twitter_link_text'=>__('Tweet with me','share-and-follow'),
                                'tumblr_link_text'=>__('Read my Tumbles.','share-and-follow'),
                                'xfire_link_text'=>__('Come on a mission','share-and-follow'),
                                'stumble_link_text' => __('Follow my Stumbles','share-and-follow'),
                                'hyves_link_text' => __('Become my friend on Hyves','share-and-follow'),
                                'orkut_link_text'=>__('Become Orkut Buddies','share-and-follow'),
                                'myspace_link_text'=>__('Become a myspace follower','share-and-follow'),
                                'linkedin_link_text'=>__('Connect with me','share-and-follow'),
                                'yahoo_buzz_share_text'=>__('Buzz it up','share-and-follow'),
                                'google_buzz_share_text'=>__('Buzz it up','share-and-follow'),
                                'yahoo_buzz_link_text'=>__('Follow me','share-and-follow'),
                                'lastfm_link_text'=>__('Check my tunes','share-and-follow'),
                                'google_buzz_link_text'=>__('Join my conversations','share-and-follow'),
                                'linkedin_link_text'=>__('Connect with me','share-and-follow'),
                                'yelp_link_text'=>__('Read reviews','share-and-follow'),
                                'flickr_link_text'=>__('See my photos','share-and-follow'),
                                'newsletter_link_text'=>__('Join the newsletter','share-and-follow'),
                                'rss_link_text'=>__('RSS','share-and-follow'),
                                'email_share_text'=>__('Tell a friend','share-and-follow'),
                                'email_body_text'=>__('here is a link to a site I really like. ','share-and-follow'),
                                'youtube_link_text'=>__('Subscribe to my YouTube Channel','share-and-follow'),
                                'post_rss_share_text'=>__('Subscribe to the comments on this post','share-and-follow'),
                                'print_share_text'=>__('Print for later','share-and-follow'),
                                );
			$devOptions = get_option($this->adminOptionsName);
			if (!empty($devOptions)) {
				foreach ($devOptions as $key => $option)
					$shareAdminOptions[$key] = $option;
			}
			update_option($this->adminOptionsName, $shareAdminOptions);
			return $shareAdminOptions;
		}
		function addHeaderCode() {
                $devOptions = $this->getAdminOptions();
                 function stylesheet_loader($name, $media){
                        $myStyleUrl = WP_PLUGIN_URL . "/share-and-follow/css/".$name.".css" ;
                        $myStyleFile = WP_PLUGIN_DIR . "/share-and-follow/css/".$name.".css" ;
                            if ( file_exists($myStyleFile) ) {
                                wp_register_style("share-and-follow-".$name."" , $myStyleUrl,array(),1,"".$media."" );
                                wp_enqueue_style( "share-and-follow-".$name."");
                            }
                    }
                    if ($devOptions['add_css'] == "false") {
                                require_once('create-styles.php');  // loading style maker
                                ?>
                                <style type="text/css" media="screen" >
                                        <?php echo $buildCss; ?>
                                </style>
                                <?php
                                add_action('wp_print_styles', 'printsheet_autoloader');
                                function printsheet_autoloader(){
                                    $sheets = array(
                                        'print'=>'print',
                                        );
                                    foreach ($sheets as $name => $media){
                                    stylesheet_loader($name, $media);
                        }
                    }
                   }
                if ($devOptions['add_css'] == "true") {
                    function checkCss($name, $cssid, $devOptions){
                    $pd = WP_PLUGIN_DIR;
                    $fp = fopen("$pd/share-and-follow/css/".$name.".css",'r');
                    $readLevel = fgets($fp, 999);
                    $versionStart = stripos($readLevel, '=')+1;
                    $version = substr($readLevel,$versionStart,6);
                    $version = trim($version);
                    if($cssid == $version){}
                    else {
                        require_once('create-styles.php'); // loading style maker when needed
                        $fp = fopen("$pd/share-and-follow/css/".$name.".css",'w');
                        switch($name){
                            case 'stylesheet':
                                fwrite($fp, $buildCss, strlen($buildCss));
                                break;
                            case 'print':
                                fwrite($fp, $printCSS, strlen($printCSS));
                                break;
                        }
                        fclose($fp);
                    }
                    }
                    // check the sheets;
                    $sheets = array(
                                    'stylesheet'=>$devOptions['cssid'],
                                    'print'=>$devOptions['cssid'],
                                        );
                        foreach ($sheets as $name=>$cssid){
                            checkCss($name, $cssid, $devOptions);
                     }
                     ///  add the possibly newly created sheet
                    add_action('wp_print_styles', 'stylesheet_autoloader');
                    function stylesheet_autoloader(){
                        $sheets = array('stylesheet'=>'screen',
                                        'print'=>'print',
                                        );
                        foreach ($sheets as $name => $media){
                            stylesheet_loader($name, $media);
                        }
                    }
                }
                 //end make print CSS
                if ($devOptions['add_image_link']=="true"){
                    global $wp_query;
                    $curauth = $wp_query->get_queried_object();
                    $default = '';
                    if ( is_page()){  
                            if (empty ($devOptions['page_image_url'])) {$share_image_base=$devOptions['page_img'];}
                            else{$share_image_base=$devOptions['page_image_url'];}
                            }
                    elseif ( is_single()){
                            if (empty ($devOptions['post_image_url'])) {$share_image_base=$devOptions['post_img'];}
                            else{$share_image_base=$devOptions['post_image_url'];}
                    }
                    elseif ( is_archive()){
                            if (empty ($devOptions['archive_image_url'])) {$share_image_base=$devOptions['archive_img'];}
                            else{$share_image_base=$devOptions['archive_image_url'];}
                    }
                    elseif ( is_home()){
                            if (empty ($devOptions['homepage_image_url'])) {$share_image_base=$devOptions['homepage_img'];}
                            else{$share_image_base=$devOptions['homepage_image_url'];}
                    }
                    elseif (is_404()){$share_image_base = "no";}
                    elseif (is_search()){$share_image_base = "no";}
                       
                       switch($share_image_base){
                       case "gravatar":
                            if ($devOptions['author_defaults']=='authors'){ // generated email
                                $email = get_the_author_meta('user_email', $curauth->post_author);
                            }
                            else { // default email
                                $email = $devOptions['default_email'];
                                if(!empty($devOptions['default_email_image'])){$default = $devOptions['default_email_image'];}
                            }
                            $image_src = doGravatarLink($email,$default).".jpg"; // adds .jpg for extra compatibilty
                        break;
                        case "logo":
                           $image_src = $devOptions['logo_image_url'];
                        break;
                        case "postImage":
                            $image_src = $this->getPostImage($curauth->ID);
                        break;
                        case "no":
                            break;
                        default:
                            $image_src = $share_image_base;
                       }
                 
                    echo "<link rel=\"image_src\" href=\"".$image_src."\" /> \n";
                }


                


		}
                // add screen oriented CSS to head as link or inline style
              
                function addContent($content = '') {
                    //add social links to the bottom of posts
                    $devOptions = $this->getAdminOptions();
                    $include_page = "yes";
                    global $wp_query;
                    $curauth = $wp_query->get_queried_object();
                    if (!empty($devOptions['excluded_share_pages'])){// exclude pages
                        $arr = explode(",", $devOptions['excluded_share_pages']);
                        foreach ($arr as $value){
                            if ($value == $curauth->ID){$include_page="";}
                        }
                    }
                    if ( is_page()&&$devOptions['wp_page']==''){}
                    elseif ( is_single()&&$devOptions['wp_post']==''){}
                    elseif ( is_archive()&&$devOptions['wp_archive']==''){}
                    elseif ( is_home()&&$devOptions['wp_home']==''){}
                    elseif ($include_page == ""){}
                    elseif (is_404()){}
                    elseif (is_search()){}
                    else {
                        if ($devOptions['add_content'] == "true") {
                            $perma=get_permalink();
                            $title=get_the_title();
                            $postid = get_the_ID();
                                $args = array('page_id' => $postid,
                                   'heading' => '2',
                                   'list_style'=>$devOptions['list_style'],
                                   'size'=>$devOptions['size'],
                                   'direction' => 'row',
                                   'page_title'=>$title,
                                   'page_link'=>$perma,
                                   'echo'=>'1',
                                   'share'=>$devOptions['share'],
                                   'share_text'=>$devOptions['share_text'],
                                   'facebook'=>$devOptions['facebook'],
                                   'stumble'=>$devOptions['stumble'],
                                   'digg'=>$devOptions['digg'],
                                   'hyves'=>$devOptions['hyves'],
                                   'orkut'=>$devOptions['orkut'],
                                   'reddit'=>$devOptions['reddit'],
                                   'twitter'=>$devOptions['twitter'],
                                   'delicious'=>$devOptions['delicious'],
                                   'yahoo_buzz'=>$devOptions['yahoo_buzz'],
                                   'google_buzz'=>$devOptions['google_buzz'],
                                   'myspace'=>$devOptions['myspace'],
                                   'mixx'=>$devOptions['mixx'],
                                   'tumblr'=>$devOptions['tumblr'],
                                   'email'=>$devOptions['email'],
                                   'print'=>$devOptions['print'],
                                   'post_rss'=>$devOptions['post_rss'],
                                   'email_body_text'=>$devOptions['email_body_text'],
                                   'css_images'=>$devOptions['css_images'],
                                   'yahoo_buzz_share_text'=>$devOptions['yahoo_buzz_share_text'],
                                   'google_buzz_share_text'=>$devOptions['google_buzz_share_text'],
                                   'facebook_share_text'=>$devOptions['facebook_share_text'],
                                   'stumble_share_text'=>$devOptions['stumble_share_text'],
                                   'digg_share_text'=>$devOptions['digg_share_text'],
                                   'hyves_share_text'=>$devOptions['hyves_share_text'],
                                   'orkut_share_text'=>$devOptions['orkut_share_text'],
                                   'reddit_share_text'=>$devOptions['reddit_share_text'],
                                   'twitter_share_text'=>$devOptions['twitter_share_text'],
                                   'delicious_share_text'=>$devOptions['delicious_share_text'],
                                   'myspace_share_text'=>$devOptions['myspace_share_text'],
                                   'mixx_share_text'=>$devOptions['mixx_share_text'],
                                   'tumblr_share_text'=>$devOptions['tumblr_share_text'],
                                   'email_share_text'=>$devOptions['email_share_text'],
                                   'print_share_text'=>$devOptions['print_share_text'],
                                   'post_rss_share_text'=>$devOptions['post_rss_share_text'],

                                );
                          $content .= "</p>".social_links($args);
                        }
                    }
                    return $content;
                }
                function share_func($atts, $content) {
                        extract(shortcode_atts(array(
                                'heading' => '0',                                'size' => "16",
                                'list_style' => "icon_text",                     'direction' => 'down',
                                'share'=>'no',                                   'facebook'=>'yes',
                                'stumble'=>'yes',                                'hyves'=>'no',
                                'orkut'=>'yes',                                  'digg'=>'yes',
                                'print'=>'no',                                   'reddit'=>'yes',
                                'delicious'=>'yes',                              'yahoo_buzz'=>'',
                                'google_buzz'=>'',                               'twitter'=>'yes',
                                'myspace'=>'yes',                                'mixx'=>'no',
                                'email'=>'no',                                   'post_rss'=>'yes',
                                'css_images'=>'yes',                             'css_images'=>'',
                        ), $atts));
                        //shortcode defaults
                        $postid=get_the_ID();
                        $page_title=get_the_title();
                        $page_link=get_permalink($postid);
                        $args = array(
                                'post_id'=>$postid,                              'facebook'=>$facebook,
                                'stumble'=>$stumble,                             'hyves'=>$hyves,
                                'orkut'=>$orkut,                                 'mixx'=>$mixx,
                                'digg'=>$digg,                                   'reddit'=>$reddit,
                                'delicious'=>$delicious,                         'twitter'=>$twitter,
                                'myspace'=>$myspace,                             'share'=>$share,
                                'heading' => $heading,                           'size' => $size,
                                'email' => $email,                               'echo'=>'1',
                                'direction' => $direction,                       'page_title'=>$page_title,
                                'page_link'=>$page_link,                         'post_rss'=>$post_rss,
                                'print'=>$print,                                 'tumbler'=>$tumbler,
                                        );
                        
                        print ( $content );
                        $html = social_links($args)."<p>";
                        return $html; // shortcodes should be a return, not a print or echo as it only puts it at the top of the post
                }

                function follow_func($atts, $content) {
                        extract(shortcode_atts(array(
                                'heading' => '0',                                'size' => "16",
                                'list_style' => "icon_text",                     'direction' => 'down',
                                'facebook'=>'no',                                'stumble'=>'no',
                                'hyves'=>'no',                                   'orkut'=>'no',
                                'digg'=>'no',                                    'print'=>'no',
                                'reddit'=>'no',                                  'delicious'=>'no',
                                'yahoo_buzz'=>'no',                              'google_buzz'=>'no',
                                'twitter'=>'no',                                 'myspace'=>'no',
                                'mixx'=>'no',                                    'facebook_link'=>'',
                                'lastfm'=>'no',                                  'lastfm_link'=>'',
                                'tumblr'=>'',                                    'xfire'=>'no',
                                'tumblr_link'=>'',                              'xfire_link'=>'',
                                'stumble_link'=>'',                              'hyves_link'=>'',
                                'orkut_link'=>'',                                'digg_link'=>'',
                                'print_link'=>'',                                'reddit_link'=>'',
                                'delicious_link'=>'',                            'yahoo_buzz_link'=>'',
                                'google_buzz_link'=>'',                          'twitter_link'=>'',
                                'myspace_link'=>'',                              'mixx_link'=>'',
                                'facebook_text'=>'',                             'stumble_text'=>'',
                                'hyves_text'=>'',                                'orkut_text'=>'',
                                'digg_text'=>'',                                 'print_text'=>'',
                                'reddit_text'=>'',                               'delicious_text'=>'',
                                'yahoo_buzz_text'=>'',                           'google_buzz_text'=>'',
                                'twitter_text'=>'',                              'myspace_text'=>'',
                                'mixx_link'=>'',                                 'email'=>'no',
                                'post_rss'=>'no',                                'css_images'=>'no',
                        ), $atts));
                        //shortcode defaults
                        $postid=get_the_ID();
                        $page_title=get_the_title();
                        $page_link=get_permalink($postid);
                        $args = array('post_id'=>$postid,
                                'follow_facebook'=>$facebook,                    'follow_stumble'=>$stumble,
                                'follow_hyves'=>$hyves,                          'follow_orkut'=>$orkut,
                                'follow_mixx'=>$mixx,                            'follow_digg'=>$digg,
                                'follow_rss'=>$digg,                             'follow_reddit'=>$reddit,
                                'follow_delicious'=>$delicious,                  'follow_twitter'=>$twitter,
                                'follow_myspace'=>$myspace,                      'follow_google_buzz'=>$google_buzz,
                                'follow_yahoo_buzz'=>$yahoo_buzz,                'facebook_text'=>$facebook_text,
                                'follow_lastfm'=>$yahoo_buzz,                    'lastfm_text'=>$lastfm_text,
                                'stumble_text'=>$stumble_text,                   'hyves_text'=>$hyves_text,
                                'orkut_text'=>$orkut_text,                       'mixx_text'=>$mixx_text,
                                'digg_text'=>$digg_text,                         'rss_text'=>$rss_text,
                                'tumblr_text'=>$tumblr_text,                         'xfire_text'=>$xfire_text,
                                'reddit_text'=>$reddit_text,                     'delicious_text'=>$delicious_text,
                                'twitter_text'=>$twitter_text,                   'myspace_text'=>$myspace_text,
                                'google_buzz_text'=>$google_buzz_text,           'yahoo_buzz_text'=>$yahoo_buzz_text,
                                'facebook_link'=>$facebook_link,                 'stumble_link'=>$stumble_link,
                                'hyves_link'=>$hyves_link,                       'rss_link'=>$hyves_link,
                                'orkut_link'=>$orkut_link,                       'digg_link'=>$digg_link,
                                'print_link'=>$print_link,                       'reddit_link'=>$reddit_link,
                                'delicious_link'=>$delicious_link,               'yahoo_buzz_link'=>$yahoo_buzz_link,
                                'google_buzz_link'=>$google_buzz_link,           'twitter_link'=>$twitter_link,
                                'myspace_link'=>$myspace_link,                   'mixx_link'=>$mixx_link,
                                'heading' => $heading,                           'size' => $size,
                                'email' => $email,                               'echo'=>'1',
                                'direction' => $direction,                       'page_title'=>$page_title,
                                'page_link'=>$page_link,                         'post_rss'=>$post_rss,
                                'print'=>$print,                                 'lastfm_link'=>$yahoo_buzz_link,
                                        );

                        print ( $content );
                        $html = follow_links($args)."<p>";
                        return $html; // shortcodes should be a return, not a print or echo as it only puts it at the top of the post
                }
                function load_widgets() {
                    register_widget( 'Share_Widget' );
                    register_widget( 'Follow_Widget' );
                }
                function printAdminPage() {
                    
                        wp_enqueue_script( 'postbox' );
                        wp_enqueue_script( 'jquery-ui-sortable' );
                        require_once('admin-page.php');
                        
                       
             }//End function printAdminPage()

                // remove options from options table upon delete
                 function removeShareAndFollow (){
                     if (deleteOptions('ShareAndFollowAdminOptions', 'widget_share-widget', 'widget_follow-widget'))
                           echo 'Options have been deleted!';
                     else
                     echo 'An error has occurred while trying to delete the options from database!';
                    }

                // manages deletion of options
                function deleteOptions()
                    {
                        $args = func_get_args();
                        $num = count($args);

                        if ($num == 1) {
                            return (delete_option($args[0]) ? TRUE : FALSE);
                        }
                        elseif (count($args) > 1)
                        {
                            foreach ($args as $option) {
                                    if ( ! delete_option($option))
                                            return FALSE;
                            }
                        return TRUE;
                        }
                	return FALSE;
                    }

                    //  gets the image if poss from the post/page



                    function loadLangauge ()
                    {
                      load_plugin_textdomain ('share-and-follow');
                    }

                    function create_share_url_taxonomies() {
                             $args = array('post'); // where taxonomie applies
                            register_taxonomy( 'share_image', $args, array( 'hierarchical' => false, 'label' => 'Default Share Image URL', 'query_var' => true, 'rewrite' => true ) );
                    }

                    function admin_init_shareFollow()
                    {
                        /* Register the script. */
                       wp_register_script('colourpicker', WP_PLUGIN_URL . '/share-and-follow/js/colorpicker.js');
                       wp_register_script('adminpages', WP_PLUGIN_URL . '/share-and-follow/js/admin.js');
                       wp_enqueue_script('jquery-ui-core');
                       wp_enqueue_script('jquery-ui-sortable');
                       wp_enqueue_script('jquery-ui-draggable');
                       wp_enqueue_script('jquery-ui-droppable');
                       wp_enqueue_script('jquery-ui-selectable');
                       wp_enqueue_script('jquery');
                       wp_enqueue_script('colourpicker');
                       wp_enqueue_script('adminpages');
                       $this->stylesheet_loader('colorpicker', 'screen');
                    }

                    function stylesheet_loader($name, $media){
                        $myStyleUrl = WP_PLUGIN_URL . "/share-and-follow/css/".$name.".css" ;
                        $myStyleFile = WP_PLUGIN_DIR . "/share-and-follow/css/".$name.".css" ;
                            if ( file_exists($myStyleFile) ) {
                                wp_register_style("share-and-follow-".$name."" , $myStyleUrl,array(),1,"".$media."" );
                                wp_enqueue_style( "share-and-follow-".$name."");

                            }
                    }
        }
}

require_once('share-widget.php');   //  includes the code for the share widget
require_once('follow-widget.php');  //  includes the code for the follow widget
require_once('functions.php');      //  includes the functions social_links(), follow_links() and share_links() and any needed items

//  setup new instance of plugin
if (class_exists("ShareAndFollow")) {$cons_shareFollow = new ShareAndFollow();}
//Actions and Filters	
if (isset($cons_shareFollow)) {
    //Initialize the admin panel
        if (!function_exists("shareFollow_ap")) {
	function shareFollow_ap() {
		global $cons_shareFollow;
		if (!isset($cons_shareFollow)) {
			return;
		}
		if (function_exists('add_options_page')) {
                    add_options_page('Share and Follow', 'Share and Follow', 9, basename(__FILE__), array(&$cons_shareFollow, 'printAdminPage'));
		}
	}
}
//Actions
     //   add_action( 'init', array(&$cons_shareFollow, 'create_share_url_taxonomies'), 0 );  // later release
        add_action('admin_menu', 'shareFollow_ap'); //admin page
	add_action('wp_head', array(&$cons_shareFollow, 'addHeaderCode'), 1); // adds items into head section
        add_action('wp_footer',array(&$cons_shareFollow, 'show_follow_links'), 1); // adds follow links
        add_action('widgets_init',array(&$cons_shareFollow, 'load_widgets'), 1); // loads widgets
        add_action('activate_share-and-follow/share-and-follow.php',  array(&$cons_shareFollow, 'init')); // plugin activation
        add_action ('init',array(&$cons_shareFollow, 'loadLangauge'), 1);  // add languages
        add_action ('admin_init',array(&$cons_shareFollow, 'admin_init_shareFollow'), 1);  // add languages
        // add_action('admin_menu', 'my_plugin_admin_menu');

//Filters
        add_filter('the_content', array(&$cons_shareFollow, 'addContent'),1); // adds the icons automatically to the content
// short codes
        add_shortcode('share_links', array(&$cons_shareFollow,'share_func')); // setup shortcode [share_links]
        add_shortcode('follow_links', array(&$cons_shareFollow,'follow_func')); // setup shortcode [follow_links]

// unstall hooks to remove admin options
// register_uninstall_hook('share-and-follow',array(&$cons_shareFollow, 'removeShareAndFollow'));
// not working and don't know why
}
?>
