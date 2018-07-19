<?php
if (is_user_logged_in() && is_admin() ){
$devOptions = $this->getAdminOptions();
                        //  get post variables
                        if (isset($_POST['update_share-and-follow'])) { //save option changes
                            if (isset($_POST['devloungeHeader'])) {$devOptions['show_header'] = $_POST['devloungeHeader'];}
                            if (isset($_POST['devloungeAddContent'])) {$devOptions['add_content'] = $_POST['devloungeAddContent'];						}
                            if (isset($_POST['background_color'])) {$devOptions['background_color'] = $_POST['background_color'];						}
                            if (isset($_POST['border_color'])) {$devOptions['border_color'] = $_POST['border_color'];						}
                            if (isset($_POST['follow_location'])) {$devOptions['follow_location'] = $_POST['follow_location'];					}
                            if (isset($_POST['follow_color'])) {$devOptions['follow_color'] = $_POST['follow_color'];}
                            if (isset($_POST['spacing'])) {$devOptions['spacing'] = $_POST['spacing'];}
                            if (isset($_POST['size'])) {$devOptions['size'] = $_POST['size'];}
                            if (isset($_POST['add_content'])) {$devOptions['add_content'] = $_POST['add_content'];}
                            if (isset($_POST['add_follow'])) {$devOptions['add_follow'] = $_POST['add_follow'];}
                            if (isset($_POST['add_css'])) {$devOptions['add_css'] = $_POST['add_css'];}
                            if (isset($_POST['words_icons'])) {$devOptions['follow_words_icons'] = $_POST['words_icons'];}
                            if (isset($_POST['list_style'])) {$devOptions['list_style'] = $_POST['list_style'];}
                            if (isset($_POST['follow_list_style'])) {$devOptions['follow_list_style'] = $_POST['follow_list_style'];}
                            $devOptions['excluded_share_pages']= $_POST['excluded_share_pages'];
                            $devOptions['css_images']= $_POST['css_images'];
                            $devOptions['extra_print_css']= $_POST['extra_print_css'];
                            $devOptions['extra_css']= $_POST['extra_css'];
                            $devOptions['add_image_link']= $_POST['add_image_link'];
                            $devOptions['default_email']= $_POST['default_email'];
                            $devOptions['default_email_image']= $_POST['default_email_image'];
                            $devOptions['author_defaults']= $_POST['author_defaults'];
                            $devOptions['logo_image_url']= $_POST['logo_image_url'];
                            $devOptions['homepage_img']= $_POST['homepage_img'];
                            $devOptions['homepage_image_url']= $_POST['homepage_image_url'];
                            $devOptions['archive_img']= $_POST['archive_img'];
                            $devOptions['archive_image_url']= $_POST['archive_image_url'];
                            $devOptions['page_image_url']= $_POST['page_image_url'];
                            $devOptions['post_image_url']= $_POST['post_image_url'];
                            $devOptions['page_img'] = $_POST['page_img'];
                            $devOptions['post_img'] = $_POST['post_img'];
                            $devOptions['background_transparent'] = $_POST['background_transparent'];
                            $devOptions['border_transparent'] = $_POST['border_transparent'];
                            $devOptions['tab_size'] = $_POST['tab_size'];
                            $devOptions['google_buzz'] = $_POST['google_buzz'];
                            $devOptions['yahoo_buzz'] = $_POST['yahoo_buzz'];
                            $devOptions['share'] = $_POST['share'];
                            $devOptions['share_text'] = $_POST['share_text'];
                            $devOptions['print'] = $_POST['print'];
                            $devOptions['facebook'] = $_POST['facebook'];
                            $devOptions['twitter'] = $_POST['twitter'];
                            $devOptions['stumble'] = $_POST['stumble'];
                            $devOptions['digg'] = $_POST['digg'];
                            $devOptions['reddit'] = $_POST['reddit'];
                            $devOptions['hyves'] = $_POST['hyves'];
                            $devOptions['delicious'] = $_POST['delicious'];
                            $devOptions['orkut'] = $_POST['orkut'];
                            $devOptions['tumblr'] = $_POST['tumblr'];
                            $devOptions['lastfm'] = $_POST['lastfm'];
                            $devOptions['myspace'] = $_POST['myspace'];
                            $devOptions['mixx'] = $_POST['mixx'];
                            $devOptions['email'] = $_POST['email'];
                            $devOptions['post_rss'] = $_POST['post_rss'];
                            $devOptions['cssid'] = $_POST['cssid'];
                            $devOptions['word_text'] = $_POST['word_text'];
                            $devOptions['add_follow_text'] = $_POST['add_follow_text'];
                            $devOptions['word_value'] = $_POST['word_value'];
                            $devOptions['post_rss_share_text'] = $_POST['post_rss_share_text'];
                            $devOptions['print_share_text'] = $_POST['print_share_text'];
                            $devOptions['google_buzz_share_text'] = $_POST['google_buzz_share_text'];
                            $devOptions['yahoo_buzz_share_text'] = $_POST['yahoo_buzz_share_text'];
                            $devOptions['facebook_share_text'] = $_POST['facebook_share_text'];
                            $devOptions['email_share_text'] = $_POST['email_share_text'];
                            $devOptions['email_body_text'] = $_POST['email_body_text'];
                            $devOptions['twitter_share_text'] = $_POST['twitter_share_text'];
                            $devOptions['tumblr_share_text'] = $_POST['tumblr_share_text'];
                            $devOptions['stumble_share_text'] = $_POST['stumble_share_text'];
                            $devOptions['digg_share_text'] = $_POST['digg_share_text'];
                            $devOptions['reddit_share_text'] = $_POST['reddit_share_text'];
                            $devOptions['hyves_share_text'] = $_POST['hyves_share_text'];
                            $devOptions['delicious_share_text'] = $_POST['delicious_share_text'];
                            $devOptions['orkut_share_text'] = $_POST['orkut_share_text'];
                            $devOptions['myspace_share_text'] = $_POST['myspace_share_text'];
                            $devOptions['mixx_share_text'] = $_POST['mixx_share_text'];
                            $devOptions['facebook_link'] = $_POST['facebook_link'];
                            $devOptions['twitter_link'] = $_POST['twitter_link'];
                            $devOptions['stumble_link'] = $_POST['stumble_link'];
                            $devOptions['hyves_link'] = $_POST['hyves_link'];
                            $devOptions['newsletter_link'] = $_POST['newsletter_link'];
                            $devOptions['orkut_link'] = $_POST['orkut_link'];
                            $devOptions['tumblr_link'] = $_POST['tumblr_link'];
                            $devOptions['xfire_link'] = $_POST['xfire_link'];
                            $devOptions['myspace_link'] = $_POST['myspace_link'];
                            $devOptions['youtube_link'] = $_POST['youtube_link'];
                            $devOptions['linkedin_link'] = $_POST['linkedin_link'];
                            $devOptions['yelp_link'] = $_POST['yelp_link'];
                            $devOptions['google_buzz_link'] = $_POST['google_buzz_link'];
                            $devOptions['yahoo_buzz_link'] = $_POST['yahoo_buzz_link'];
                            $devOptions['flickr_link'] = $_POST['flickr_link'];
                            $devOptions['yahoo_buzz_link_text'] = $_POST['yahoo_buzz_link_text'];
                            $devOptions['google_buzz_link_text'] = $_POST['google_buzz_link_text'];
                            $devOptions['youtube_link_text'] = $_POST['youtube_link_text'];
                            $devOptions['flickr_link_text'] = $_POST['flickr_link_text'];
                            $devOptions['yelp_link_text'] = $_POST['yelp_link_text'];
                            $devOptions['flickr_link_text'] = $_POST['flickr_link_text'];
                            $devOptions['facebook_link_text'] = $_POST['facebook_link_text'];
                            $devOptions['newsletter_link_text'] = $_POST['newsletter_link_text'];
                            $devOptions['twitter_link_text'] = $_POST['twitter_link_text'];
                            $devOptions['stumble_link_text'] = $_POST['stumble_link_text'];
                            $devOptions['hyves_link_text'] = $_POST['hyves_link_text'];
                            $devOptions['orkut_link_text'] = $_POST['orkut_link_text'];
                            $devOptions['xfire_link_text'] = $_POST['xfire_link_text'];
                            $devOptions['tumblr_link_text'] = $_POST['tumblr_link_text'];
                            $devOptions['lastfm_link_text'] = $_POST['lastfm_link_text'];
                            $devOptions['lastfm_link'] = $_POST['lastfm_link'];
                            $devOptions['myspace_link_text'] = $_POST['myspace_link_text'];
                            $devOptions['youtube_link_text'] = $_POST['youtube_link_text'];
                            $devOptions['flickr_link_text'] = $_POST['flickr_link_text'];
                            $devOptions['yelp_link_text'] = $_POST['yelp_link_text'];
                            $devOptions['rss_link_text'] = $_POST['rss_link_text'];
                            $devOptions['linkedin_link_text'] = $_POST['linkedin_link_text'];
                            $devOptions['follow_facebook'] = $_POST['follow_facebook'];
                            $devOptions['follow_newsletter'] = $_POST['follow_newsletter'];
                            $devOptions['follow_twitter'] = $_POST['follow_twitter'];
                            $devOptions['follow_stumble'] = $_POST['follow_stumble'];
                            $devOptions['follow_hyves'] = $_POST['follow_hyves'];
                            $devOptions['follow_lastfm'] = $_POST['follow_lastfm'];
                            $devOptions['follow_orkut'] = $_POST['follow_orkut'];
                            $devOptions['follow_xfire'] = $_POST['follow_xfire'];
                            $devOptions['follow_tumblr'] = $_POST['follow_tumblr'];
                            $devOptions['follow_myspace'] = $_POST['follow_myspace'];
                            $devOptions['follow_rss'] = $_POST['follow_rss'];
                            $devOptions['follow_youtube'] = $_POST['follow_youtube'];
                            $devOptions['follow_yelp'] = $_POST['follow_yelp'];
                            $devOptions['follow_flickr'] = $_POST['follow_flickr'];
                            $devOptions['follow_linkedin'] = $_POST['follow_linkedin'];
                            $devOptions['follow_google_buzz'] = $_POST['follow_google_buzz'];
                            $devOptions['follow_yahoo_buzz'] = $_POST['follow_yahoo_buzz'];
                            $devOptions['follow_lastfm'] = $_POST['follow_lastfm'];
                            $devOptions['wp_page'] = $_POST['wp_page'];
                            $devOptions['wp_post'] = $_POST['wp_post'];
                            $devOptions['wp_home'] = $_POST['wp_home'];
                            $devOptions['css_print_excludes'] = $_POST['css_print_excludes'];
                            $devOptions['theme_support'] = $_POST['theme_support'];
                            $devOptions['wp_archive'] = $_POST['wp_archive'];
                            if (isset($_POST['devloungeContent'])) {$devOptions['content'] = apply_filters('content_save_pre', $_POST['devloungeContent']);}
                            update_option($this->adminOptionsName, $devOptions);?>
                            <div class="updated"><p><strong><?php _e("Settings Updated.", "shareAndFollow");?></strong></p></div>
                            <?php } ?>
                        <div class="wrap" >
                            <div style="float:right; width:400px;padding:10px; background-color:#ccc;border:1px solid #666;margin:5px;"><p><?php _e('if your feeling lovely and really like this plug-in, do the right thing and buy us some beer.  It&#39;s usually &euro;4.50 here in Amsterdam for a pint, and we will give you a link from', 'share-and-follow') ?> <a href="http://phat-reaction.com/share-and-follow/donations">phat reaction</a> for being so nice</p>
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHRwYJKoZIhvcNAQcEoIIHODCCBzQCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYAKh6xKR78vr8zCFULzqI3wRQ0hGBLUd3UoKSOw/1M/bb/hH/Exi7om+hNOqojhCmaD/Qyb6gWDaP/b+dorwmTtcZmjBndw0LVLjLA3+TCfISBcLBHmM+GL1la+TAsgata083xD+m/ol53slun5IiwtrHrbU0EyN+XUnU8c9fzXGDELMAkGBSsOAwIaBQAwgcQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIDA3mwqPD3q6AgaB6ajRBH6G2XV2Cuim1p14AfOtdz76Z1Wd2wy1kiahX4uTA8Y7tUY8EHcY+rQ7Thmuhp7qZq4LMs5yFOwEueT4JXMiAHDVTAd5ZQB7oFAMxJS8VqOCHwLbIPUy9z1fmRY/YamrA1Sm6mUmHmZKZxubBtXGKjz5rCRsgi30Wky+C0zEKRMjtSkD8Bl3QFd64HxcschQLTFLM6hEnWmXfXSNaoIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMTAwMzI5MTg0MDAxWjAjBgkqhkiG9w0BCQQxFgQUU2NmrWX67HKe4/WDJGpvzckRMRcwDQYJKoZIhvcNAQEBBQAEgYAsWAdOiLp62+tSRaCvoBQsbIiGd217XNkVHJtZV8dJBpoXaqm7SqnL571TA3XlzwRcLiyzY7MLYRCuzm9iVmMAAhSWcrj7X/Ot6+pGGQlBwOhLR2ol0GwHimoEW1hxw1YM44cOML24JAP39ILyOkxpl+upIOv1QQlVNt7SWUKJXQ==-----END PKCS7-----">
                                    <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG_global.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
                                    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </form></div>
                            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                <div style="margin-right:440px;min-height:180px">
                                <h2><?php _e('Share and Follow Administration','share-and-follow'); ?></h2>
                                <p><?php _e('Here you can administer either the Follow Tab, or the Share Links on a Post.  If you want to admin the sidebar widget,  you need to goto the ','share-and-follow'); ?><a href="widgets.php"><?php _e('widgets section.','share-and-follow'); ?></a></p> <p><?php _e(' However for the Follow widget to work with anything except RSS you will have to fill out the details below in the ','share-and-follow'); ?><a href="#enterlinks"><?php _e('follow section','share-and-follow'); ?></a></p>
                                <p><?php _e('More','share-and-follow'); ?> <a href="http://phat-reaction.com/share-and-follow/" target="_blank"><?php _e('documentation','share-and-follow'); ?></a> <?php _e(' on how to use this plugin and it&#39;s options &#40;Share Widget, Follow Widget, Share on Posts, Shortcode in Post, Follow Tab, Theme Tags&#41;','share-and-follow'); ?></p>
                                </div>
                                <style>
                                    td img {vertical-align:bottom;}
                                    th {text-align:left;}
                                    td {vertical-align:top}

                                    div.rounded {-moz-border-radius:15px;-webkit-border-radius:15px;padding:0 20px 20px 20px;background-color:white;border:solid 1px #333  }

                                    div.rounded table{ border-collapse:collapse; }
                                    div.rounded table thead tr th { padding:.2em .4em}
                                    div.rounded table tbody tr td {}

                                    table.logic {border:solid 1px #ccc;margin-bottom:20px}
                                    table.logic tr th {padding:.2em .4em}
                                    table.logic tr td {border:solid 1px #ccc;border-width: 1px 0 0  0;padding:.2em .4em }
                                    table.logic tr td h4 {margin:0;}
                                </style>
                                <div style="float:left;width:580px;margin-right:10px;margin-top:20px;" class="rounded">
                                        <?php wp_nonce_field('update-options'); ?>
                                        <h1><?php _e('Share Icons Setup','share-and-follow'); ?></h1>
                                        <h3><?php _e('Allow Share Icons to be added to the End of a Post?','share-and-follow'); ?></h3>
                                        <input type="hidden" name="cssid" id="cssid" value="<?php echo ($devOptions['cssid']+1);?>" />
                                        <p><?php _e('Selecting &quot;No&quot; will disable the content from being added into the end of a post.','share-and-follow'); ?></p>
                                        <p><label for="devloungeAddContent_yes"><input type="radio" id="devloungeAddContent_yes" name="add_content" value="true" <?php if ($devOptions['add_content'] == "true") { _e('checked="checked"', "shareAndFollow"); }?> /> <?php _e('Yes','share-and-follow'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label for="devloungeAddContent_no"><input type="radio" id="devloungeAddContent_no" name="add_content" value="false" <?php if ($devOptions['add_content'] == "false") { _e('checked="checked"', "shareAndFollow"); }?>/> <?php _e('No','share-and-follow'); ?></label></p>
                                        <h3><?php _e('Where to show them','share-and-follow'); ?></h3>
                                        <p><?php _e('Choose where on your site the icons will be automatically added','share-and-follow'); ?></p>
                                        <input type="checkbox" <?php if ( 'yes' == $devOptions['wp_page'] ) {echo "checked=\"checked\"";} ?> name="wp_page" value="yes" id="wp_page"/><label for="wp_page"><?php _e('pages','share-and-follow'); ?></label><br />
                                        <input type="checkbox" <?php if ( 'yes' == $devOptions['wp_post'] ) {echo "checked=\"checked\"";} ?> name="wp_post" value="yes" id="wp_post"/><label for="wp_post"><?php _e('posts','share-and-follow'); ?></label><br />
                                        <input type="checkbox" <?php if ( 'yes' == $devOptions['wp_home'] ) {echo "checked=\"checked\"";} ?> name="wp_home" value="yes" id="wp_home"/><label for="wp_home"><?php _e('home page','share-and-follow'); ?></label><br />
                                        <input type="checkbox" <?php if ( 'yes' == $devOptions['wp_archive'] ) {echo "checked=\"checked\"";} ?> name="wp_archive" value="yes" id="wp_archive"><label for="wp_archive"/><?php _e('tags, archive or catagory page','share-and-follow'); ?></label><br />
                                        <label><?php _e('exclude these IDs :','share-and-follow'); ?></label><input type="text" name="excluded_share_pages" value="<?php echo $devOptions['excluded_share_pages']; ?>">
                                        <p><?php _e('exclude pages or posts by entering IDs as a comma seperated list. i.e. 1, 2, 3, 4   (ideal for About and Contact page)','share-and-follow'); ?></p>
                                        <ul style="padding:0;margin:0">
                                                <li style="float:left;width:50%;padding:0;margin:0">
                                                    <h3><label for="size"><?php _e('Size of Icons on Posts','share-and-follow'); ?></label></h3>
                                                    <select  name="size" id="size" style="width:12em">
                                                    <option value="16" <?php if ("16" == $devOptions['size']) { echo 'selected="selected"'; }?>>16x16</option>
                                                    <option value="24" <?php if ( "24" == $devOptions['size']) { echo 'selected="selected"'; }?>>24x24</option>
                                                    <option value="32" <?php if ( "32" == $devOptions['size']) { echo 'selected="selected"'; }?>>32x32</option>
                                                    <option value="48" <?php if ( "48" == $devOptions['size']) { echo 'selected="selected"'; }?>>48x48</option>
                                                    <option value="60" <?php if ( "60" == $devOptions['size']) { echo 'selected="selected"'; }?>>60x60</option>
                                                    </select>
                                                </li>
                                                 <li style="padding:1px 0 5px 0 ;margin:0 0 0 50%">
                                                    <h3><label for="list_style"><?php _e('Share icons display style','share-and-follow'); ?></label></h3>
                                                    <select id="list_style" name="list_style" style="width:12em">
                                                            <option <?php if ( 'icon_text' == $devOptions['list_style'] ) echo 'selected="selected"'; ?> value="icon_text"><?php _e('Icon and Text','share-and-follow'); ?></option>
                                                            <option <?php if ( 'text_only' == $devOptions['list_style'] ) echo 'selected="selected"'; ?> value="text_only"><?php _e('Text only','share-and-follow'); ?> </option>
                                                            <option <?php if ( 'iconOnly' == $devOptions['list_style'] ) echo 'selected="selected"'; ?> value="iconOnly"><?php _e('Icon only','share-and-follow'); ?> </option>
                                                    </select>
                                                 </li>
                                        </ul>
                                        <ul style="padding:0;margin:0;clear:left;">
                                                <li style="float:left;width:50%;padding:0;margin:0">
                                                    <h3><?php _e('Use &lt;img&gt; Tag or CSS images?','share-and-follow'); ?></h3>
                                                    <p><label for="css_images_yes"><input type="radio" id="devloungeAddContent_yes" name="css_images" value="yes" <?php if ($devOptions['css_images'] == "yes") { _e('checked="checked"', "shareAndFollow"); }?> /> <?php _e('CSS(default)','share-and-follow'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label for="css_images_no"><input type="radio" id="devloungeAddContent_no" name="css_images" value="no" <?php if ($devOptions['css_images'] == "no") { _e('checked="checked"', "shareAndFollow"); }?>/> <?php _e('IMG tag','share-and-follow'); ?></label></p>
                                                 </li>
                                                 <li style="padding:1px 0 5px 0 ;margin:0 0 0 50%">
                                                    <h3><label for="spacing"><?php _e('Element spacing (in px)','share-and-follow'); ?> </label></h3>
                                                    <select  name="spacing" id="spacing" style="width:12em">
                                                        <option value="0" <?php if ("0" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>0</option>
                                                        <option value="1" <?php if ("1" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>1</option>
                                                        <option value="2" <?php if ("2" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>2</option>
                                                        <option value="3" <?php if ("3" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>3</option>
                                                        <option value="4" <?php if ("4" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>4</option>
                                                        <option value="5" <?php if ("5" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>5</option>
                                                        <option value="6" <?php if ("6" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>6</option>
                                                        <option value="7" <?php if ("7" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>7</option>
                                                        <option value="8" <?php if ("8" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>8</option>
                                                        <option value="9" <?php if ("9" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>9</option>
                                                        <option value="10" <?php if ("10" == $devOptions['spacing']) { echo 'selected="selected"'; }?>>10</option>
                                                    </select>
                                                 </li>
                                        </ul>
                                        <ul style="padding:0;margin:0;clear:left;">
                                                <li style="float:left;width:50%;padding:0;margin:0;">
                                                    <h3><?php _e('Show heading prefix','share-and-follow'); ?></h3>
                                                    <label for="devloungeAddContent_yes"><input type="radio" id="devloungeAddContent_yes" name="share" value="yes" <?php if ($devOptions['share'] == "yes") { _e('checked="checked"', "shareAndFollow"); }?> /> <?php _e('Yes','share-and-follow'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label for="devloungeAddContent_no"><input type="radio" id="devloungeAddContent_no" name="share" value="no" <?php if ($devOptions['share'] == "no" || empty($devOptions['share']) ) { _e('checked="checked"', "shareAndFollow"); }?>/> <?php _e('No','share-and-follow'); ?></label>
                                                </li>
                                                <li style="padding:1px 0 5px 0 ;margin:0 0 0 50%">
                                                    <h3><?php _e('Heading text','share-and-follow'); ?></h3>
                                                        <label for="share_text"><?php _e('Share text ','share-and-follow'); ?></label> <input type="text" name="share_text" value="<?php echo $devOptions['share_text']; ?>" id="share_text"/>
                                                </li>
                                        </ul>
 

                                        <h3><?php _e('Share Links  to display','share-and-follow'); ?></h3>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th style="width:12em"><?php _e('Show','share-and-follow'); ?></th><th><?php _e('Link text','share-and-follow'); ?></th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/facebook.png" height="16px" width="16px" alt="facebook" /><input type="checkbox" <?php if ( 'yes' == $devOptions['facebook'] ) {echo "checked=\"checked\"";} ?> name="facebook" value="yes" id="facebook"><label for="facebook">facebook</label></td>
                                                    <td><input type="text" name="facebook_share_text" id="facebook_share_text" value="<?php echo stripslashes  ($devOptions['facebook_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/twitter.png" height="16px" width="16px" alt="twitter" /><input type="checkbox" <?php if ( 'yes' == $devOptions['twitter'] ) {echo "checked=\"checked\"";} ?> name="twitter" value="yes" id="twitter"><label for="twitter">twitter</label></td>
                                                    <td><input type="text" name="twitter_share_text" id="twitter_share_text" value="<?php echo stripslashes  ($devOptions['twitter_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/stumbleupon.png" height="16px" width="16px" alt="stumble upon" /><input type="checkbox" <?php if ( 'yes' == $devOptions['stumble'] ) {echo "checked=\"checked\"";} ?> name="stumble" value="yes" id="stumble"><label for="stumble">stumble</label></td>
                                                    <td><input type="text" name="stumble_share_text" id="stumble_share_text" value="<?php echo stripslashes  ($devOptions['stumble_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/digg.png" height="16px" width="16px" alt="digg" /><input type="checkbox" <?php if ( 'yes' == $devOptions['digg'] ) {echo "checked=\"checked\"";} ?> name="digg" value="yes" id="digg"><label for="digg">digg</label></td>
                                                    <td><input type="text" name="digg_share_text" id="digg_share_text" value="<?php echo stripslashes  ($devOptions['digg_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/reddit.png" height="16px" width="16px" alt="reddit" /><input type="checkbox" <?php if ( 'yes' == $devOptions['reddit'] ) {echo "checked=\"checked\"";} ?> name="reddit" value="yes" id="reddit"><label for="reddit">reddit</label></td>
                                                    <td><input type="text" name="reddit_share_text" id="reddit_share_text" value="<?php echo stripslashes  ($devOptions['reddit_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/hyves.png" height="16px" width="16px" alt="hyves" /><input type="checkbox" <?php if ( 'yes' == $devOptions['hyves'] ) {echo "checked=\"checked\"";} ?> name="hyves" value="yes" id="hyves"><label for="hyves">hyves</label></td>
                                                    <td><input type="text" name="hyves_share_text" id="hyves_share_text" value="<?php echo stripslashes  ($devOptions['hyves_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/google_buzz.png" height="16px" width="16px" alt="google_buzz" /><input type="checkbox" <?php if ( 'yes' == $devOptions['google_buzz'] ) {echo "checked=\"checked\"";} ?> name="google_buzz" value="yes" id="google_buzz"><label for="google_buzz">google buzz</label></td>
                                                    <td><input type="text" name="google_buzz_share_text" id="google_buzz_share_text" value="<?php echo stripslashes  ($devOptions['google_buzz_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/yahoobuzz.png" height="16px" width="16px" alt="yahoo_buzz" /><input type="checkbox" <?php if ( 'yes' == $devOptions['yahoo_buzz'] ) {echo "checked=\"checked\"";} ?> name="yahoo_buzz" value="yes" id="yahoo_buzz"><label for="yahoo_buzz">yahoo buzz</label></td>
                                                    <td><input type="text" name="yahoo_buzz_share_text" id="yahoo_buzz_share_text" value="<?php echo stripslashes  ($devOptions['yahoo_buzz_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/delicious.png" height="16px" width="16px" alt="delicious" /><input type="checkbox" <?php if ( 'yes' == $devOptions['delicious'] ) {echo "checked=\"checked\"";} ?> name="delicious" value="yes" id="delicious"><label for="delicious">delicious</label></td>
                                                    <td><input type="text" name="delicious_share_text" id="delicious_share_text" value="<?php echo stripslashes  ($devOptions['delicious_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/orkut.png" height="16px" width="16px" alt="orkut" /><input type="checkbox" <?php if ( 'yes' == $devOptions['orkut'] ) {echo "checked=\"checked\"";} ?> name="orkut" value="yes" id="orkut"><label for="orkut">orkut</label></td>
                                                    <td><input type="text" name="orkut_share_text" id="orkut_share_text" value="<?php echo stripslashes  ($devOptions['orkut_share_text']);?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/myspace.png" height="16px" width="16px" alt="myspace" /><input type="checkbox" <?php if ( 'yes' == $devOptions['myspace'] ) {echo "checked=\"checked\"";} ?> name="myspace" value="yes" id="myspace"><label for="myspace">myspace</label></td>
                                                    <td><input type="text" name="myspace_share_text" id="myspace_share_text" value="<?php echo stripslashes  ($devOptions['myspace_share_text']);?>" style="width:250px"/></td>

                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/mixx.png" height="16px" width="16px" alt="mixx" /><input type="checkbox" <?php if ( 'yes' == $devOptions['mixx'] ) {echo "checked=\"checked\"";} ?> name="mixx" value="yes" id="mixx"><label for="mixx">mixx</label></td>
                                                    <td><input type="text" name="mixx_share_text" id="mixx_share_text" value="<?php echo $devOptions['mixx_share_text'];?>" style="width:250px"/></td>

                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/tumblr.png" height="16px" width="16px" alt="tumblr" /><input type="checkbox" <?php if ( 'yes' == $devOptions['tumblr'] ) {echo "checked=\"checked\"";} ?> name="tumblr" value="yes" id="tumblr"><label for="tumblr">tumblr</label></td>
                                                    <td><input type="text" name="tumblr_share_text" id="tumblr_share_text" value="<?php echo $devOptions['tumblr_share_text'];?>" style="width:250px"/></td>

                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/rss.png" height="16px" width="16px" alt="post rss" /><input type="checkbox" <?php if ( 'yes' == $devOptions['post_rss'] ) {echo "checked=\"checked\"";} ?> name="post_rss" value="yes" id="post_rss"><label for="post_rss">rss comment feed</label></td>
                                                    <td><input type="text" name="post_rss_share_text" id="post_rss_share_text" value="<?php echo $devOptions['post_rss_share_text'];?>" style="width:250px"/></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/print.png" height="16px" width="16px" alt="print" /><input type="checkbox" <?php if ( 'yes' == $devOptions['print'] ) {echo "checked=\"checked\"";} ?> name="print" value="yes" id="print"><label for="print">print</label></td>
                                                    <td><input type="text" name="print_share_text" id="print_share_text" value="<?php echo $devOptions['print_share_text'];?>" style="width:250px"/></td>

                                                </tr>
                                                <tr>
                                                    <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/email.png" height="16px" width="16px" alt="post email" /><input type="checkbox" <?php if ( 'yes' == $devOptions['email'] ) {echo "checked=\"checked\"";} ?> name="email" value="yes" id="_email"><label for="email">email</label></td>
                                                    <td><input type="text" name="email_share_text" id="email_share_text" value="<?php echo $devOptions['email_share_text'];?>" style="width:250px"/>
                                                        <h4>What it says in the email message</h4>
                                                        <textarea name="email_body_text"  id="email_body_text"  style="width:250px" rows="3" cols="20" ><?php echo $devOptions['email_body_text'];?></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="submit" name="update_share-and-follow" value="<?php _e('Update Settings', 'share-and-follow') ?>" />
                                    </div>
                                    <div style="float:left;width:580px;margin-top:20px;" class="rounded">
                                            <?php wp_nonce_field('update-options'); ?>
                                        <h1><?php _e('Follow Side/Top/Bottom Tab setup','share-and-follow'); ?></h1>
                                        <h3><?php _e('Show the Follow Tab on Screen','share-and-follow'); ?></h3>
                                        <p><?php _e('Selecting "No" will disable the content from being added into to your website.','share-and-follow'); ?></p>
                                        <p><label for="add_follow_yes"><input type="radio" id="add_follow_yes" name="add_follow" value="true" <?php if ($devOptions['add_follow'] == "true") { _e('checked="checked"', "shareAndFollow"); }?> /><?php _e('Yes','share-and-follow'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label for="add_follow_no"><input type="radio" id="add_follow_no" name="add_follow" value="false" <?php if ($devOptions['add_follow'] == "false") { _e('checked="checked"', "shareAndFollow"); }?>/><?php _e('No','share-and-follow'); ?></label></p>
                                        <ul style="padding:0;margin:0">
                                            <li style="float:left;width:50%;padding:0;margin:0">
                                                <h3><?php _e('Background Color','share-and-follow'); ?></h3>
                                                <div id="colorSelector"></div>
                                                       #<input type="text" name="background_color" id="background_color" value="<?php echo $devOptions['background_color'];?>"/><br />
                                                       <input type="checkbox" <?php if ( 'yes' == $devOptions['background_transparent'] ) {echo "checked=\"checked\"";} ?> name="background_transparent" value="yes" id="background_transparent"> <label for="background_transparent"><?php _e('Transparent','share-and-follow'); ?></label></li>
                                            <li  style="padding:1px 0 5px 0 ;margin:0 0 0 50%">
                                                <h3><?php _e('Border Color','share-and-follow'); ?></h3>
                                                       #<input type="text" name="border_color" id="border_color" value="<?php echo $devOptions['border_color'];?>"/> <br />
                                                      <input type="checkbox" <?php if ( 'yes' == $devOptions['border_transparent'] ) {echo "checked=\"checked\"";} ?> name="border_transparent" value="yes" id="border_transparent"><label for="border_transparent"><?php _e('No Border','share-and-follow'); ?></label></li>
                                        </ul>
                                        <p style="padding:0;margin:0;font-size:small;clear:left;"><?php _e('for example <b>#f60</b> is entered as <b>f60</b> or <b>#ff6600</b> becomes <b>ff6600</b>, clicking <b>Transparent</b> will make the tab have no color and <b>no border</b> will set the border to disapear','share-and-follow'); ?>.</p>
                                         <ul style="padding:0;margin:0">
                                                <li style="float:left;width:50%;padding:0;margin:0">
                                                    <h3><label for="follow_location"><?php _e('Follow Tab Location','share-and-follow'); ?> </label></h3>
                                                    <select  name="follow_location" id="follow_location" style="width:12em">
                                                    <option value="right" <?php if ("right" == $devOptions['follow_location'] ) { echo 'selected="selected"'; }?>  ><?php _e('Right','share-and-follow'); ?></option>
                                                    <option value="left" <?php if ( "left" == $devOptions['follow_location']) { echo 'selected="selected"'; }?>><?php _e('Left','share-and-follow'); ?></option>
                                                    <option value="bottom" <?php if ( "bottom" == $devOptions['follow_location']) { echo 'selected="selected"'; }?>><?php _e('Bottom','share-and-follow'); ?></option>
                                                    <option value="top" <?php if ( "top" == $devOptions['follow_location']) { echo 'selected="selected"'; }?>><?php _e('Top','share-and-follow'); ?></option>
                                                    </select>
                                                </li>
                                                <li  style="padding:1px 0 5px 0 ;margin:0 0 0 50%">
                                                    <h3><?php _e('Prefix with a heading','share-and-follow'); ?></h3>
                                                    <p><label for="add_follow_text_yes"><input type="radio" id="add_follow_text_yes" name="add_follow_text" value="true" <?php if ($devOptions['add_follow_text'] == "true") { _e('checked="checked"', "shareAndFollow"); }?> /><?php _e('Yes','share-and-follow'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <label for="add_follow_text_no"><input type="radio" id="add_follow_text_no" name="add_follow_text" value="false" <?php if ($devOptions['add_follow_text'] == "false") { _e('checked="checked"', "shareAndFollow"); }?>/><?php _e('No','share-and-follow'); ?></label></p>
                                                </li>
                                         </ul>
                                            <ul style="padding:0;margin:0">
                                                <li style="float:left;width:50%;padding:0;margin:0">
                                                    <h3><label for="follow_color"><?php _e('Follow Word Color','share-and-follow'); ?></label></h3>
                                                        <select  name="follow_color" id="follow_color" style="width:12em">
                                                            <option value="f00"  <?php if ("f00" == $devOptions['follow_color'] ) { echo 'selected="selected"'; }?>><?php _e('Red','share-and-follow'); ?></option>
                                                            <option value="f0f" <?php if ( "f0f" == $devOptions['follow_color']) { echo 'selected="selected"'; }?>><?php _e('Pink','share-and-follow'); ?></option>
                                                            <option value="00f"  <?php if ("00f" == $devOptions['follow_color'])  { echo 'selected="selected"'; }?>><?php _e('Blue','share-and-follow'); ?></option>
                                                            <option value="fff" <?php if ( "fff" == $devOptions['follow_color']) { echo 'selected="selected"'; }?>><?php _e('White','share-and-follow'); ?></option>
                                                            <option value="ccc" <?php if ( "ccc" == $devOptions['follow_color']) { echo 'selected="selected"'; }?>>#ccc</option>
                                                            <option value="999"  <?php if ( "999" == $devOptions['follow_color']) { echo 'selected="selected"'; }?>>#999</option>
                                                            <option value="666"  <?php if ( "666" == $devOptions['follow_color']) { echo 'selected="selected"'; }?>>#666</option>
                                                            <option value="333" <?php if ( "333" == $devOptions['follow_color']) { echo 'selected="selected"'; }?>>#333</option>
                                                            <option value="000" <?php if ( "000" == $devOptions['follow_color']) { echo 'selected="selected"'; }?>><?php _e('Black','share-and-follow'); ?></option>
                                                        </select>
                                                </li>
                                                <li style="padding:1px 0 5px 0 ;margin:0 0 0 50%">
                                                    <h3><?php _e('Follow Heading text replacement','share-and-follow'); ?></h3>
                                                    <p><label for="word_value"><?php _e('On screen text','share-and-follow'); ?></label> <input type="text" name="word_text" id="word_text" value="<?php echo $devOptions['word_text'];?>" style="width:150px"/></p>
                                                    <p><?php _e('Replacement Word','share-and-follow'); ?> <select  name="word_value" id="word_value" style="width:12em">
                                                            
                                                            <optgroup label="<?php _e('English words','share-and-follow'); ?>">
                                                                <option value="follow"  <?php if ("follow" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>follow</option>
                                                                <option value="followme"  <?php if ("followme" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>follow me</option>
                                                                <option value="followus"  <?php if ("followus" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>follow us</option>
                                                                <option value="connect" <?php if ( "connect" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>connect</option>
                                                                <option value="communicate" <?php if ( "communicate" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>communicate</option>
                                                                <option value="join" <?php if ( "join" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>join</option>
                                                                <option value="network" <?php if ( "network" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>network</option>
                                                                <option value="reviews" <?php if ( "reviews" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>reviews</option>
                                                            </optgroup>
                                                            <optgroup label="<?php _e('Dutch words','share-and-follow'); ?>">
                                                                <option value="aansluiten" <?php if ( "aansluiten" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>aansluiten</option>
                                                                <option value="deelnemen" <?php if ( "deelnemen" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>deelnemen</option>
                                                                <option value="mededeling" <?php if ( "mededeling" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>mededeling</option>
                                                                <option value="overzichten" <?php if ( "overzichten" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>overzichten</option>
                                                                <option value="toevoegen" <?php if ( "toevoegen" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>toevoegen</option>
                                                                <option value="verbinden" <?php if ( "verbinden" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>verbinden</option>
                                                                <option value="volgen"  <?php if ("volgen" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>volgen</option>
                                                                <option value="volgmij"  <?php if ("volgmij" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>volg mij</option>
                                                                <option value="volgonze"  <?php if ("volgonze" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>volg onze</option>

                                                            </optgroup>
                                                            <optgroup label="<?php _e('French words','share-and-follow'); ?>">
                                                                <option value="ajouter" <?php if ( "ajouter" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>ajouter</option>
                                                                <option value="seconnecter" <?php if ( "seconnecter" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>se connecter</option>
                                                                <option value="publications" <?php if ( "publications" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>publications</option>
                                                                <option value="rejoindre" <?php if ( "rejoindre" == $devOptions['word_value']) { echo 'selected="selected"'; }?>>rejoindre</option>
                                                                <option value="reseau"  <?php if ("reseau" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>r&eacute;seau</option>
                                                                <option value="suivre"  <?php if ("suivre" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>suivre</option>
                                                            </optgroup>
                                                            <optgroup label="<?php _e('Portuguese words','share-and-follow'); ?>">
                                                                <option value="conectar"  <?php if ("conectar" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>conectar</option>
                                                                <option value="comunicar"  <?php if ("comunicar" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>comunicar</option>
                                                                <option value="juntar"  <?php if ("juntar" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>juntar</option>
                                                                <option value="rede"  <?php if ("rede" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>rede</option>
                                                                <option value="resenhas"  <?php if ("resenhas" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>resenhas</option>
                                                                <option value="seguir"  <?php if ("seguir" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>seguir</option>
                                                                <option value="sigame"  <?php if ("sigame" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>siga-me</option>
                                                                <option value="siganos"  <?php if ("siganos" == $devOptions['word_value'] ) { echo 'selected="selected"'; }?>>siga-nos</option>
                                                            </optgroup>
                                                        </select>
                                                        </p>
                                                </li>
                                            </ul>
                                            <p><?php _e('The text replacement only applies to the side tabs.  It has been made that way to give virtical text, but does limit the word choices.  Use a top or bottom tab to show the text that you want, not the replacement text.','share-and-follow')?></p>
                                            <ul style="padding:0;margin:0">
                                                <li style="float:left;width:50%;padding:0;margin:0">
                                                   <h3><label for="follow_list_style"><?php _e('Follow icons display style','share-and-follow'); ?></label></h3>
                                                    <select id="follow_list_style" name="follow_list_style" style="width:12em">
                                                            <?php if ( $devOptions['follow_location'] == 'bottom'||$devOptions['follow_location'] == 'top'){?><option <?php if ( 'icon_text' == $devOptions['follow_list_style'] ) echo 'selected="selected"'; ?> value="icon_text"><?php _e('Icon and Text','share-and-follow'); ?></option><?php } ?>
                                                            <?php if ( $devOptions['follow_location'] == 'bottom'||$devOptions['follow_location'] == 'top'){?><option <?php if ( 'text_only' == $devOptions['follow_list_style'] ) echo 'selected="selected"'; ?> value="text_only"><?php _e('Text only','share-and-follow'); ?> </option><?php } ?>
                                                            <option <?php if ( 'text_replace' == $devOptions['follow_list_style'] ) echo 'selected="selected"'; ?> value="text_replace"><?php _e('Text replacement','share-and-follow'); ?></option>
                                                            <option <?php if ( 'iconOnly' == $devOptions['follow_list_style'] ) echo 'selected="selected"'; ?> value="iconOnly"><?php _e('Icon only','share-and-follow'); ?> </option>
                                                    </select>
                                               </li>
                                                <li style="padding:1px 0 5px 0 ;margin:0 0 0 50%">
                                                    <h3><label for="tab_size"><?php _e('Size of Follow Icons on tab','share-and-follow'); ?></label></h3>
                                                    <select  name="tab_size" id="tab_size" style="width:12em">
                                                    <option value="16" <?php if ("16" == $devOptions['tab_size']) { echo 'selected="selected"'; }?>>16x16</option>
                                                    <option value="24" <?php if ( "24" == $devOptions['tab_size']) { echo 'selected="selected"'; }?>>24x24</option>
                                                    <option value="32" <?php if ( "32" == $devOptions['tab_size']) { echo 'selected="selected"'; }?>>32x32</option>
                                                    <option value="48" <?php if ( "48" == $devOptions['tab_size']) { echo 'selected="selected"'; }?>>48x48</option>
                                                    <option value="60" <?php if ( "60" == $devOptions['tab_size']) { echo 'selected="selected"'; }?>>60x60</option>
                                                    </select>
                                                </li>
                                            </ul>
                                               <h3 id="enterlinks"><?php _e('Follow Links  to display in the follow tab (also needed for follow widget)','share-and-follow'); ?></h3>
                                               <table>
                                                   <thead><tr><th style="width:12em"><?php _e('Show','share-and-follow'); ?></th><th><?php _e('Link Text','share-and-follow'); ?></th><th><?php _e('Link destination','share-and-follow'); ?></th></tr></thead>
                                                   <tbody>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/facebook.png" height="16px" width="16px" alt="facebook" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_facebook'] ) {echo "checked=\"checked\"";} ?> name="follow_facebook" value="yes" id="follow_facebook"><label for="follow_facebook">facebook</label></td>
                                                           <td><input type="text" name="facebook_link_text" id="facebook_link_text" value="<?php echo stripslashes  ($devOptions['facebook_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="facebook_link" id="facebook_link" value="<?php echo $devOptions['facebook_link'];?>" style="width:100%"/><td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/flickr.png" height="16px" width="16px" alt="flickr" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_flickr'] ) {echo "checked=\"checked\"";} ?> name="follow_flickr" value="yes" id="follow_flickr"><label for="follow_flickr">flickr</label></td>
                                                           <td><input type="text" name="flickr_link_text" id="flickr_link_text" value="<?php echo stripslashes  ($devOptions['flickr_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="flickr_link" id="flickr_link" value="<?php echo $devOptions['flickr_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/google_buzz.png" height="16px" width="16px" alt="google_buzz" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_google_buzz'] ) {echo "checked=\"checked\"";} ?> name="follow_google_buzz" value="yes" id="follow_google_buzz"><label for="follow_google_buzz">google buzz</label></td>
                                                           <td><input type="text" name="google_buzz_link_text" id="google_buzz_link_text" value="<?php echo stripslashes  ($devOptions['google_buzz_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="google_buzz_link" id="google_buzz_link" value="<?php echo $devOptions['google_buzz_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/hyves.png" height="16px" width="16px" alt="hyves" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_hyves'] ) {echo "checked=\"checked\"";} ?> name="follow_hyves" value="yes" id="follow_hyves"><label for="follow_hyves">hyves</label></td>
                                                           <td><input type="text" name="hyves_link_text" id="hyves_link_text" value="<?php echo stripslashes  ($devOptions['hyves_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="hyves_link" id="hyves_link" value="<?php echo $devOptions['hyves_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/linkedin.png" height="16px" width="16px" alt="linkedin" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_linkedin'] ) {echo "checked=\"checked\"";} ?> name="follow_linkedin" value="yes" id="follow_linkedin"><label for="follow_linkedin">linkedin</label></td>
                                                           <td><input type="text" name="linkedin_link_text" id="linkedin_link_text" value="<?php echo stripslashes  ($devOptions['linkedin_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="linkedin_link" id="linkedin_link" value="<?php echo $devOptions['linkedin_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/lastfm.png" height="16px" width="16px" alt="lastfm" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_lastfm'] ) {echo "checked=\"checked\"";} ?> name="follow_lastfm" value="yes" id="follow_lastfm"><label for="follow_lastfm">lastfm</label></td>
                                                           <td><input type="text" name="lastfm_link_text" id="lastfm_link_text" value="<?php echo stripslashes  ($devOptions['lastfm_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="lastfm_link" id="lastfm_link" value="<?php echo $devOptions['lastfm_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/myspace.png" height="16px" width="16px" alt="myspace" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_myspace'] ) {echo "checked=\"checked\"";} ?> name="follow_myspace" value="yes" id="follow_myspace"><label for="follow_myspace">myspace</label></td>
                                                           <td><input type="text" name="myspace_link_text" id="myspace_link_text" value="<?php echo stripslashes  ($devOptions['myspace_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="myspace_link" id="myspace_link" value="<?php echo $devOptions['myspace_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/newsletter.png" height="16px" width="16px" alt="newsletter" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_newsletter'] ) {echo "checked=\"checked\"";} ?> name="follow_newsletter" value="yes" id="follow_newsletter"><label for="follow_newsletter">newsletter</label></td>
                                                           <td><input type="text" name="newsletter_link_text" id="newsletter_link_text" value="<?php echo stripslashes  ($devOptions['newsletter_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="newsletter_link" id="newsletter_link" value="<?php echo $devOptions['newsletter_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/orkut.png" height="16px" width="16px" alt="orkut" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_orkut'] ) {echo "checked=\"checked\"";} ?> name="follow_orkut" value="yes" id="follow_orkut"><label for="follow_orkut">orkut</label></td>
                                                           <td><input type="text" name="orkut_link_text" id="orkut_link_text" value="<?php echo stripslashes  ($devOptions['orkut_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="orkut_link" id="orkut_link" value="<?php echo $devOptions['orkut_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/stumbleupon.png" height="16px" width="16px" alt="stumble upon" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_stumble'] ) {echo "checked=\"checked\"";} ?> name="follow_stumble" value="yes" id="follow_stumble"><label for="follow_stumble">stumble</label></td>
                                                           <td><input type="text" name="stumble_link_text" id="stumble_link_text" value="<?php echo stripslashes  ($devOptions['stumble_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="stumble_link" id="stumble_link" value="<?php echo $devOptions['stumble_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/tumblr.png" height="16px" width="16px" alt="tumblr" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_tumblr'] ){ echo "checked=\"checked\"";} ?> name="follow_tumblr" value="yes" id="follow_tumblr"><label for="follow_tumblr">tumblr</label></td>
                                                           <td><input type="text" name="tumblr_link_text" id="tumblr_link_text" value="<?php echo stripslashes  ($devOptions['tumblr_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="tumblr_link" id="tumblr_link" value="<?php echo $devOptions['tumblr_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/twitter.png" height="16px" width="16px" alt="twitter" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_twitter'] ){ echo "checked=\"checked\"";} ?> name="follow_twitter" value="yes" id="follow_twitter"><label for="follow_twitter">twitter</label></td>
                                                           <td><input type="text" name="twitter_link_text" id="twitter_link_text" value="<?php echo stripslashes  ($devOptions['twitter_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="twitter_link" id="twitter_link" value="<?php echo $devOptions['twitter_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/xfire.png" height="16px" width="16px" alt="xfire" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_xfire'] ){ echo "checked=\"checked\"";} ?> name="follow_xfire" value="yes" id="follow_xfire"><label for="follow_xfire">xfire</label></td>
                                                           <td><input type="text" name="xfire_link_text" id="xfire_link_text" value="<?php echo stripslashes  ($devOptions['xfire_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="xfire_link" id="xfire_link" value="<?php echo $devOptions['xfire_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/yahoobuzz.png" height="16px" width="16px" alt="yahoo buzz" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_yahoo_buzz'] ) {echo "checked=\"checked\"";} ?> name="follow_yahoo_buzz" value="yes" id="follow_yahoo_buzz"><label for="follow_yahoo_buzz">yahoo buzz</label></td>
                                                           <td><input type="text" name="yahoo_buzz_link_text" id="yahoo_buzz_link_text" value="<?php echo stripslashes  ($devOptions['yahoo_buzz_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="yahoo_buzz_link" id="yahoo_buzz_link" value="<?php echo $devOptions['yahoo_buzz_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/youtube.png" height="16px" width="16px" alt="youtube" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_youtube'] ) {echo "checked=\"checked\"";} ?> name="follow_youtube" value="yes" id="follow_youtube"><label for="follow_youtube">youtube</label></td>
                                                           <td><input type="text" name="youtube_link_text" id="youtube_link_text" value="<?php echo stripslashes  ($devOptions['youtube_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="youtube_link" id="youtube_link" value="<?php echo $devOptions['youtube_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/yelp.png" height="16px" width="16px" alt="yelp" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_yelp'] ) {echo "checked=\"checked\"";} ?> name="follow_yelp" value="yes" id="follow_yelp"><label for="follow_yelp">yelp</label></td>
                                                           <td><input type="text" name="yelp_link_text" id="yelp_link_text" value="<?php echo stripslashes  ($devOptions['yelp_link_text']);?>" style="width:150px"/></td>
                                                           <td><input type="text" name="yelp_link" id="yelp_link" value="<?php echo $devOptions['yelp_link'];?>" style="width:100%"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><img src="<?php echo WP_PLUGIN_URL; ?>/share-and-follow/default/16/rss.png" height="16px" width="16px" alt="rss" /><input type="checkbox" <?php if ( 'yes' == $devOptions['follow_rss'] ) {echo "checked=\"checked\"";} ?> name="follow_rss" value="yes" id="follow_rss"><label for="follow_rss">rss</label></td>
                                                           <td><input type="text" name="rss_link_text" id="rss_link_text" value="<?php echo stripslashes  ($devOptions['rss_link_text']);?>" style="width:150px"/></td>
                                                           <td><?php _e('this link is automatically setup to be your wordpress feed.','share-and-follow'); ?></td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                               <p><b><em><?php _e('Important', 'share-and-follow') ?>:</em></b> <?php _e('Always put in the full URL with http:// at the beginning when entering a Link Destination.', 'share-and-follow') ?> </p>
                                            <input type="submit" name="update_share-and-follow" value="<?php _e('Update Settings', 'share-and-follow') ?>" />
                                        </div>
                                <div style="clear:both;"></div>
                        <div style="margin-top:20px;float:left;width:580px;margin-right:10px;"  class="rounded">
                                     <h1 id="share-image"><?php _e('Setup share image', 'share-and-follow') ?></h1>
                                     <p><?php _e('By setting up a share image, social networks such as Facebook will choose that share image as its primary image to display on screen in news feeds inside facebook. This is especially useful if the theme is made of only image replacement images rather than HTML tag images, as facebook will now have the opportunity to show an image rather than none at all', 'share-and-follow') ?>.</p>
                                     <h3><?php _e('Show Share Images', 'share-and-follow') ?></h3>
                                     <p><?php _e('Add the share image metadata to the head section of your web pages.  Saying "no" will remove the functionality', 'share-and-follow') ?>.</p>
                                     <p><label for="add_image_link_yes"><input type="radio" id="add_image_link_yes" name="add_image_link" value="true" <?php if ($devOptions['add_image_link'] == "true") { _e('checked="checked"', "shareAndcss"); }?> /><?php _e('Yes', 'share-and-follow') ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label for="add_image_link_no"><input type="radio" id="add_image_link_no" name="add_image_link" value="false" <?php if ($devOptions['add_image_link'] == "false") { _e('checked="checked"', "shareAndcss"); }?>/><?php _e('No', 'share-and-follow') ?></label></p>
                                     <h3><?php _e('Setup Default Gravatar image', 'share-and-follow') ?> <small><a href="http://gravatar.com/" target="_blank">goto gravatar</a></small></h3>
                                        <?php _e('enter your email address', 'share-and-follow') ?> <input type="email" name="default_email" id="default_email" value="<?php echo $devOptions['default_email'];?>" /><br />
                                        <?php _e('alternative default image', 'share-and-follow') ?> <input type="text" name="default_email_image" id="default_email_image" value="<?php echo $devOptions['default_email_image'];?>" />
                                        <p><?php _e('You can choose an alternative image to display rather than the standard gravatar one, if so, enter the URL here including http://, useful for high volume sites.', 'share-and-follow') ?></p>
                                        <h3><?php _e('Author Settings', 'share-and-follow') ?></h3>
                                            <input type="radio" <?php if ( 'default' == $devOptions['author_defaults'] ) {echo "checked=\"checked\"";} ?> name="author_defaults" value="default" ><label for="author_defaults"><?php _e('Use default gravatar','share-and-follow'); ?></label><br />
                                            <input type="radio" <?php if ( 'authors' == $devOptions['author_defaults'] ) {echo "checked=\"checked\"";} ?> name="author_defaults" value="authors" ><label for="author_defaults"><?php _e('Use author email to generate gravatar','share-and-follow'); ?></label><br />
                                        <h3><?php _e('Site Logo setup', 'share-and-follow') ?></h3>
                                        <?php _e('enter image URL', 'share-and-follow') ?> <input type="text" name="logo_image_url" value="<?php echo $devOptions['logo_image_url']; ?>" />
                                        <p><?php _e('Include http:// in the URL, make sure that the image is no larger than 130px wide by 110px high.', 'share-and-follow') ?></p>
                                        <p><?php _e('<strong><em>Important:</em></strong> the system will default to this image if there is not an image in a post or page that it can find.','share-and-follow')?></p>
                                        <h3><?php _e('Setup image logic: Who, What, Where.', 'share-and-follow') ?></h3>
                                        <table class="logic">
                                            <tr><th style="width:160px"><?php _e('Type of page', 'share-and-follow') ?></th><th><?php _e('Display logic', 'share-and-follow') ?></th></tr>
                                            <tr>
                                                <td>Pages</td>
                                                <td> <input type="radio" <?php if ( 'gravatar' == $devOptions['page_img'] ) {echo "checked=\"checked\"";} ?> name="page_img" value="gravatar" ><label for="page_img"><?php _e('Author Gravatar','share-and-follow'); ?></label><br />
                                                     <input type="radio" <?php if ( 'logo' == $devOptions['page_img'] ) {echo "checked=\"checked\"";} ?> name="page_img" value="logo" ><label for="page_img"><?php _e('Site Logo','share-and-follow'); ?></label><br />
                                                     <input type="radio" <?php if ( 'postImage' == $devOptions['page_img'] ) {echo "checked=\"checked\"";} ?> name="page_img" value="postImage" ><label for="page_img"><?php _e('Image from page','share-and-follow'); ?></label><br />
                                                     <h4>optional default image</h4>
                                                     <input type="text" name="page_image_url" value="<?php echo $devOptions['page_image_url']; ?>" />
                                                     <br /><small>Enter full URL including http:// to the image you want to use. Making the field blank will restore the radio button logic</small>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Posts</td>
                                                <td> <input type="radio" <?php if ( 'gravatar' == $devOptions['post_img'] ) {echo "checked=\"checked\"";} ?> name="post_img" value="gravatar" ><label for="post_img"><?php _e('Author Gravatar','share-and-follow'); ?></label><br />
                                                     <input type="radio" <?php if ( 'logo' == $devOptions['post_img'] ) {echo "checked=\"checked\"";} ?> name="post_img" value="logo" ><label for="post_img"><?php _e('Site Logo','share-and-follow'); ?></label><br />
                                                     <input type="radio" <?php if ( 'postImage' == $devOptions['post_img'] ) {echo "checked=\"checked\"";} ?> name="post_img" value="postImage" ><label for="post_img"><?php _e('Image from post','share-and-follow'); ?></label><br />
                                                     <h4>optional default image</h4>
                                                     <input type="text" name="post_image_url" value="<?php echo $devOptions['post_image_url']; ?>" />
                                                     <br /><small>Enter full URL including http:// to the image you want to use. Making the field blank will restore the radio button logic</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Homepage</td>
                                                <td> <input type="radio" <?php if ( 'gravatar' == $devOptions['homepage_img'] ) {echo "checked=\"checked\"";} ?> name="homepage_img" value="gravatar" ><label for="homepage_img"><?php _e('Default Author Gravatar','share-and-follow'); ?></label><br />
                                                     <input type="radio" <?php if ( 'logo' == $devOptions['homepage_img'] ) {echo "checked=\"checked\"";} ?> name="homepage_img" value="logo" ><label for="homepage_img"><?php _e('Site Logo','share-and-follow'); ?></label><br />
                                                     <h4>optional default image</h4>
                                                     <input type="text" name="homepage_image_url" value="<?php echo $devOptions['homepage_image_url']; ?>" />
                                                     <br /><small>Enter full URL including http:// to the image you want to use. Making the field blank will restore the radio button logic</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Archive pages</td>
                                                <td> <input type="radio" <?php if ( 'gravatar' == $devOptions['archive_img'] ) {echo "checked=\"checked\"";} ?> name="archive_img" value="gravatar" ><label for="archive_img"><?php _e('Default Author Gravatar','share-and-follow'); ?></label><br />
                                                     <input type="radio" <?php if ( 'logo' == $devOptions['archive_img'] ) {echo "checked=\"checked\"";} ?> name="archive_img" value="logo" ><label for="archive_img"><?php _e('Site Logo','share-and-follow'); ?></label><br />
                                                     <h4>optional default image</h4>
                                                     <input type="text" name="archive_image_url" value="<?php echo $devOptions['archive_image_url']; ?>" />
                                                     <br /><small>Enter full URL including http:// to the image you want to use. Making the field blank will restore the radio button logic</small>
                                                </td>
                                            </tr>
                                        </table>
                                        <input type="submit" name="update_share-and-follow" value="<?php _e('Update Settings', 'share-and-follow') ?>" />
                                        <br />
                                </div>
                              <div style="margin-top:20px;float:left;width:580px;"  class="rounded">
                                     <h1><?php _e('CSS and style Configuration', 'share-and-follow') ?></h1>
                                     <h3>Use CSS?</h3>
                                     <p><?php _e('This is useful if you want to style things yourself with CSS. Anyhow, if you really need it, it loads', 'share-and-follow') ?> <strong>/wp-content/plugins/share-and-follow/css/stylesheet.css</strong>.</p>
                                        <p><label for="add_css_yes"><input type="radio" id="add_css_yes" name="add_css" value="true" <?php if ($devOptions['add_css'] == "true") { _e('checked="checked"', "shareAndcss"); }?> /><?php _e('Yes', 'share-and-follow') ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label for="add_css_no"><input type="radio" id="add_css_no" name="add_css" value="false" <?php if ($devOptions['add_css'] == "false") { _e('checked="checked"', "shareAndcss"); }?>/><?php _e('No', 'share-and-follow') ?></label></p>
                                        <p><?php _e('be careful as it reloads the CSS dynamically evey time there is a change to the admin screen', 'share-and-follow') ?></p>
                                        <h3><?php _e('Add your own CSS', 'share-and-follow') ?></h3>
                                            <textarea cols="20" rows="10" style="width:100%"  name="extra_css" ><?php echo stripslashes($devOptions['extra_css']) ?></textarea>
                                        <h3><?php _e('Add theme support', 'share-and-follow') ?></h3>
                                        <p><?php _e('Wordpress has many themes, slowly over time we will be adding more and more CSS packs to support those themes. For now we have a selection of the top ones. <em>Please note</em> that Kubric/Default will work for most themes no matter what the name, as they have been based on this theme originally.', 'share-and-follow') ?></p>
                                        <select  name="theme_support" id="theme_support" style="width:12em">
                                            <option value="none" <?php if ("none" == $devOptions['theme_support']) { echo 'selected="selected"'; }?>>none</option>
                                            <option value="default" <?php if ( "default" == $devOptions['theme_support']) { echo 'selected="selected"'; }?>>default</option>
                                            <option value="choco" <?php if ( "choco" == $devOptions['theme_support']) { echo 'selected="selected"'; }?>>ChocoTheme</option>
                                            <option value="arjuna" <?php if ( "arjuna" == $devOptions['theme_support']) { echo 'selected="selected"'; }?>>Arjuna X</option>
                                            <option value="intrepidity" <?php if ( "intrepidity" == $devOptions['theme_support']) { echo 'selected="selected"'; }?>>Intrepidity</option>
                                            <option value="dojo" <?php if ( "dojo" == $devOptions['theme_support']) { echo 'selected="selected"'; }?>>Dojo</option>
                                            <option value="thesis" <?php if ( "thesis" == $devOptions['theme_support']) { echo 'selected="selected"'; }?>>Thesis</option>
                                        </select>
                                        <h3><?php _e('Page Print Support', 'share-and-follow') ?></h3>
                                        <p><?php _e('Printing a page is different to reading it from the screen. There are many things that do not need to be there on a printed page, such as the menu or navigation.  Use the entry box to provide a comment list of CSS selectors to help control how your printouts look.  By default a few have been added to help you.', 'share-and-follow') ?></p>
                                            <input type="text" name="css_print_excludes" value="<?php echo $devOptions['css_print_excludes']; ?>" style="width:80%"/>
                                        <br />
                                        <h3><?php _e('Add your own Print CSS ', 'share-and-follow') ?></h3>
                                            <textarea cols="20" rows="10" style="width:100%"  name="extra_print_css" ><?php echo stripslashes($devOptions['extra_print_css']) ?></textarea>
                                            <input type="submit" name="update_share-and-follow" value="<?php _e('Update Settings', 'share-and-follow') ?>" />
                                        <br />
                                </div>
                        </form>
                        <div class="submit">
                        </div>
                        </div>
 <?php } ?>