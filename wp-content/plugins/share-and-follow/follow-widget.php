<?php
class Follow_Widget  extends WP_Widget {
        function Follow_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'follow_links', 'description' => 'Most common follow links widget' );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'follow-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'follow-widget', 'Follow Widget', $widget_ops, $control_ops );
	}

        function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		/* Before widget (defined by themes). */
		echo $before_widget;
		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		/* Display name from widget settings. */
                global $wp_query;
                if(is_front_page()||is_category() || is_archive() || is_tag() || is_month()) {
                         $thePostID = 0;
                   }
                   else{
                        $thePostID = $wp_query->post->ID;
                   }

                  $adminOptionsName = "ShareAndFollowAdminOptions";
                  $widgetSettigns = get_option($adminOptionsName);
                    $args = array(
                        'page_id' => $thePostID,                                        'heading' => "no",
                        'size' => $instance['size'],                                    'list_style' => $instance['style'],
                        'direction' => $instance['direction'],                          'css_images' => $instance['css_images'],
                        'follow_facebook' => $instance['facebook'],                     'follow_stumble'=>$instance['stumble'],
                        'follow_twitter'=>$instance['twitter'],                         'follow_hyves'=>$instance['hyves'],
                        'follow_orkut'=>$instance['orkut'],                             'follow_youtube'=>$instance['youtube'],
                        'follow_yelp'=>$instance['yelp'],                               'follow_flickr'=>$instance['flickr'],
                        'follow_xfire'=>$instance['xfire'],                               'follow_tumblr'=>$instance['tumblr'],
                        'follow_linkedin'=>$instance['linkedin'],                       'follow_myspace'=>$instance['myspace'],
                        'follow_rss'=>$instance['rss'],                                 'follow_google_buzz'=>$instance['yahoo_buzz'],
                        'follow_yahoo_buzz'=>$instance['yahoo_buzz'],                   'sidebar_tab'=>'followwrap',
                        'facebook_link' => $widgetSettigns['facebook_link'],            'yahoo_buzz_link' => $widgetSettigns['yahoo_buzz_link'],
                        'google_buzz_link' => $widgetSettigns['google_buzz_link'],      'stumble_link'=>$widgetSettigns['stumble_link'],
                        'twitter_link'=>$widgetSettigns['twitter_link'],                'hyves_link'=>$widgetSettigns['hyves_link'],
                        'orkut_link'=>$widgetSettigns['orkut_link'],                    'youtube_link'=>$widgetSettigns['youtube_link'],
                        'yelp_link'=>$widgetSettigns['yelp_link'],                      'yelp_text'=>$instance['yelp_text'],
                        'tumblr_link'=>$widgetSettigns['tumblr_link'],                  'tumblr_text'=>$instance['tumblr_text'],
                        'xfire_link'=>$widgetSettigns['xfire_link'],                    'xfire_text'=>$instance['xfire_text'],
                        'lastfm_link'=>$widgetSettigns['lastfm_link'],                  'lastfm_text'=>$instance['lastfm_text'],
                        'follow_lastfm' => $instance['lastfm'],                         'linkedin_link'=>$widgetSettigns['linkedin_link'],
                        'myspace_text'=>$instance['myspace_text'],                      'yahoo_buzz_text'=>$instance['yahoo_buzz_text'],
                        'google_buzz_text'=>$instance['google_buzz_text'],              'facebook_text'=>$instance['facebook_text'],
                        'rss_text'=>$instance['rss_text'],                              'stumble_text'=>$instance['stumble_text'],
                        'twitter_text'=>$instance['twitter_text'],                      'hyves_text'=>$instance['hyves_text'],
                        'orkut_text'=>$instance['orkut_text'],                          'youtube_text'=>$instance['youtube_text'],
                        'linkedin_text'=>$instance['linkedin_text'],                    'flickr_link'=>$widgetSettigns['flickr_link'],
                        'flickr_text'=>$instance['flickr_text'],                        'rss_text'=>$instance['rss_text'],
                        'myspace_link'=>$widgetSettigns['myspace_link'],                'newsletter_text'=>$instance['newsletter_text'],
                        'follow_newsletter'=>$instance['newsletter'],                   'newsletter_link'=>$widgetSettigns['newsletter_link'],
                                );
		follow_links($args);
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );		$instance['size'] = $new_instance['size'];
                $instance['style'] = $new_instance['style'];                            $instance['direction'] = $new_instance['direction'];
                $instance['facebook'] = $new_instance['facebook'];                      $instance['stumble'] = $new_instance['stumble'];
                $instance['twitter'] = $new_instance['twitter'];                        $instance['hyves'] = $new_instance['hyves'];
                $instance['orkut'] = $new_instance['orkut'];                            $instance['myspace'] = $new_instance['myspace'];
                $instance['youtube'] = $new_instance['youtube'];                        $instance['google_buzz'] = $new_instance['google_buzz'];
                $instance['yahoo_buzz'] = $new_instance['yahoo_buzz'];                  $instance['yelp'] = $new_instance['yelp'];
                $instance['tumblr'] = $new_instance['tumblr'];                          $instance['xfire'] = $new_instance['xfire'];
                $instance['linkedin'] = $new_instance['linkedin'];                      $instance['flickr'] = $new_instance['flickr'];
                $instance['rss'] = $new_instance['rss'];                                $instance['facebook_text'] = $new_instance['facebook_text'];
                $instance['google_buzz_text'] = $new_instance['google_buzz_text'];      $instance['yahoo_buzz_text'] = $new_instance['yahoo_buzz_text'];
                $instance['stumble_text'] = $new_instance['stumble_text'];              $instance['twitter_text'] = $new_instance['twitter_text'];
                $instance['hyves_text'] = $new_instance['hyves_text'];                  $instance['orkut_text'] = $new_instance['orkut_text'];
                $instance['myspace_text'] = $new_instance['myspace_text'];              $instance['youtube_text'] = $new_instance['youtube_text'];
                $instance['rss_text'] = $new_instance['rss_text'];                      $instance['yelp_text'] = $new_instance['yelp_text'];
                $instance['linkedin_text'] = $new_instance['linkedin_text'];            $instance['flickr_text'] = $new_instance['flickr_text'];
                $instance['rss_text'] = $new_instance['rss_text'];                      $instance['lastfm_text'] = $new_instance['lastfm_text'];
                $instance['xfire_text'] = $new_instance['xfire_text'];                      $instance['tumblr_text'] = $new_instance['tumblr_text'];
                $instance['lastfm'] = $new_instance['lastfm'];                          $instance['newsletter_text'] = $new_instance['newsletter_text'];
                $instance['newsletter'] = $new_instance['newsletter'];                  $instance['css_images'] = $new_instance['css_images'];

		return $instance;
	}

        function form( $instance ) {
               
		/* Set up some default widget settings. */
		$defaults = array( 
                   'title' => '',                   'size'=>'16',
                   'style'=>'',                     'direction' => 'down',
                   'facebook'=>'yes',               'flickr'=>'yes',
                   'stumble'=>'yes',                'twitter'=>'yes',
                   'youtube'=>'yes',                'linkedin'=>'yes',
                   'hyves'=>'',                     'orkut'=>'',
                   'myspace'=>'yes',                'phat'=>'',
                   'yelp'=>'',                      'rss'=>'yes',
                   'tumblr'=>'',                      'xfire'=>'',
                   'lastfm'=>'',                    'css_images'=>'yes',
                   'lastfm_text'=>__('Check my tunes','share-and-follow'),
                   'facebook_text'=>__('Become a Fan','share-and-follow'),
                   'flickr_text'=>__('See my photos','share-and-follow'),
                   'stumble_text'=>__('Follow my Stumbles','share-and-follow'),
                   'linkedin_text'=>__('Connect with me','share-and-follow'),
                   'twitter_text'=>__('Tweet with me','share-and-follow'),
                   'youtube_text'=>__('Subscribe to my Channel','share-and-follow'),
                   'hyves_text'=>__('Become Hyves friends','share-and-follow'),
                   'orkut_text'=>__('Become Orkut friends','share-and-follow'),
                   'myspace_text'=>__('Become MySpace follower','share-and-follow'),
                   'yelp_text'=>__('Read my reviews','share-and-follow'),
                   'tumblr_text'=>__('Tumblr. me','share-and-follow'),
                   'xfire_text'=>__('Go on a mission with me','share-and-follow'),
                   'yahoo_buzz_text'=>__('Connect with me','share-and-follow'),
                   'google_buzz_text'=>__('Join the conversation','share-and-follow'),
                   'newsletter_text'=>__('Join our newsletter','share-and-follow'),
                   'rss_text'=>__('RSS feed','share-and-follow'),
                               );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
                <?php //admin pannel ?>
                
                <?php //title ?>
                <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','share-and-follow'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
                <p>
                    <?php _e('CSS images?','share-and-follow'); ?>
                    <label><input type="radio" name="<?php echo $this->get_field_name( 'css_images' ); ?>" value="yes" <?php if ( 'yes' == $instance['css_images'] ) echo 'checked'; ?> /> <?php _e('Yes','share-and-follow'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="<?php echo $this->get_field_name( 'css_images' ); ?>" value="no" <?php if ( 'no' == $instance['css_images'] ) echo 'checked'; ?> /> <?php _e('No','share-and-follow'); ?></label>
                </p>
                <?php //Size of icons ?>
                <p>
			<label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e('Size:','share-and-follow'); ?></label>
			<select id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( '16' == $instance['size'] ) echo 'selected="selected"'; ?> value="16" >16x16 px</option>
				<option <?php if ( '24' == $instance['size'] ) echo 'selected="selected"'; ?> value="24">24x24 px</option>
                                <option <?php if ( '32' == $instance['size'] ) echo 'selected="selected"'; ?> value="32">32x32 px</option>
                                <option <?php if ( '48' == $instance['size'] ) echo 'selected="selected"'; ?> value="48">48x48 px</option>
                                <option <?php if ( '60' == $instance['size'] ) echo 'selected="selected"'; ?> value="60">60x60 px</option>
			</select>
		</p>
                <?php //Display Style ?>
                <p>
			<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e('Style:','share-and-follow'); ?></label>
			<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( 'icon_text' == $instance['style'] ) echo 'selected="selected"'; ?> value="icon_text"><?php _e('Icon and Text','share-and-follow'); ?></option>
				<option <?php if ( 'text_only' == $instance['style'] ) echo 'selected="selected"'; ?> value="text_only"><?php _e('Text only','share-and-follow'); ?> </option>
                                <option <?php if ( 'iconOnly' == $instance['style'] ) echo 'selected="selected"'; ?> value="iconOnly"><?php _e('Icon only','share-and-follow'); ?></option>
			</select>
		</p>
                <?php //Display direction ?>
                <p>
			<label for="<?php echo $this->get_field_id( 'direction' ); ?>"><?php _e('Share Icons display direction:','share-and-follow'); ?></label>
			<select id="<?php echo $this->get_field_id( 'direction' ); ?>" name="<?php echo $this->get_field_name( 'direction' ); ?>" class="widefat" direction="width:100%;">
				<option  value="down"><?php _e('list','share-and-follow'); ?></option>
				<option <?php if ( 'row' == $instance['direction'] ) echo 'selected="selected"'; ?>value="row"><?php _e('row','share-and-follow'); ?></option>
			</select>
		</p>
                <?php //Icons to  display and the text to show?>
                <b><?php _e('icons to display','share-and-follow'); ?></b>
                     <table>
                        <thead>
                                <tr>
                                    <th style="width:100px"><?php _e('Show','share-and-follow'); ?></th><th><?php _e('Link text','share-and-follow'); ?></th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['facebook'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'facebook' ); ?>"><label for="<?php echo $this->get_field_id( 'facebook' ); ?>">facebook</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'facebook_text' ); ?>" id="<?php echo $this->get_field_id( 'facebook_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['facebook_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['flickr'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'flickr' ); ?>"><label for="<?php echo $this->get_field_id( 'flickr' ); ?>">flickr</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'flickr_text' ); ?>" id="<?php echo $this->get_field_id( 'flickr_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['flickr_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['twitter'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'twitter' ); ?>"><label for="<?php echo $this->get_field_id( 'twitter' ); ?>">twitter</label></td>
                                    <td><input type="text"  name="<?php echo $this->get_field_name( 'twitter_text' ); ?>" id="<?php echo $this->get_field_id( 'twitter_text' ); ?>"  style="width:100%" value="<?php echo stripslashes($instance['twitter_text']); ?>"> </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['stumble'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'stumble' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'stumble' ); ?>"><label for="<?php echo $this->get_field_id( 'stumble' ); ?>">stumble</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'stumble_text' ); ?>" id="<?php echo $this->get_field_id( 'stumble_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['stumble_text']); ?>"> </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['linkedin'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'linkedin' ); ?>"><label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">linkedin</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'linkedin_text' ); ?>" id="<?php echo $this->get_field_id( 'linkedin_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['linkedin_text']); ?>" ></td>
                                </tr>
                                 <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['google_buzz'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'google_buzz' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'google_buzz' ); ?>"><label for="<?php echo $this->get_field_id( 'google_buzz' ); ?>">google buzz</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'google_buzz_text'); ?>" id="<?php echo $this->get_field_id( 'google_buzz_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['google_buzz_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['hyves'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'hyves' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'hyves' ); ?>"><label for="<?php echo $this->get_field_id( 'hyves' ); ?>">hyves</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'hyves_text' ); ?>" id="<?php echo $this->get_field_id( 'hyves_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['hyves_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['lastfm'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'lastfm' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'lastfm' ); ?>"><label for="<?php echo $this->get_field_id( 'lastfm' ); ?>">lastfm</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'lastfm_text' ); ?>" id="<?php echo $this->get_field_id( 'lastfm_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['lastfm_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['myspace'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'myspace' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'myspace' ); ?>"><label for="<?php echo $this->get_field_id( 'myspace' ); ?>">myspace</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'myspace_text' ); ?>" id="<?php echo $this->get_field_id( 'myspace_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['myspace_text']); ?>" ></td>
                                </tr>

                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['newsletter'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'newsletter' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'newsletter' ); ?>"><label for="<?php echo $this->get_field_id( 'newsletter' ); ?>">newsletter</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'newsletter_text' ); ?>" id="<?php echo $this->get_field_id( 'newsletter_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['newsletter_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" <?php if ( 'yes' == $instance['orkut'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'orkut' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'orkut' ); ?>" ><label for="<?php echo $this->get_field_id( 'orkut' ); ?>">orkut</label>
                                    </td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'orkut_text' ); ?>" id="<?php echo $this->get_field_id( 'orkut_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['orkut_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" <?php if ( 'yes' == $instance['tumblr'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" ><label for="<?php echo $this->get_field_id( 'tumblr' ); ?>">tumblr</label>
                                    </td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'tumblr_text' ); ?>" id="<?php echo $this->get_field_id( 'tumblr_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['tumblr_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" <?php if ( 'yes' == $instance['xfire'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'xfire' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'xfire' ); ?>" ><label for="<?php echo $this->get_field_id( 'xfire' ); ?>">xfire</label>
                                    </td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'xfire_text' ); ?>" id="<?php echo $this->get_field_id( 'xfire_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['xfire_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['yelp'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'yelp' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'yelp' ); ?>"><label for="<?php echo $this->get_field_id( 'yelp' ); ?>">yelp</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'yelp_text' ); ?>" id="<?php echo $this->get_field_id( 'yelp_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['yelp_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['youtube'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'youtube' ); ?>"><label for="<?php echo $this->get_field_id( 'youtube' ); ?>">youtube</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'youtube_text' ); ?>" id="<?php echo $this->get_field_id( 'youtube_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['youtube_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['yahoo_buzz'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'yahoo_buzz' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'yahoo_buzz' ); ?>"><label for="<?php echo $this->get_field_id( 'yahoo_buzz' ); ?>">yahoo buzz</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'yahoo_buzz_text' ); ?>" id="<?php echo $this->get_field_id( 'yahoo_buzz_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['yahoo_buzz_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['rss'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'rss' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'rss' ); ?>"><label for="<?php echo $this->get_field_id( 'rss' ); ?>">rss</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'rss_text' ); ?>" id="<?php echo $this->get_field_id( 'rss_text' ); ?>" style="width:100%" value="<?php echo stripslashes($instance['rss_text']); ?>" ></td>
                                </tr>

                            </tbody>
                </table>
                <p><?php _e('Before a link will display, you must','share-and-follow'); ?> <a href="options-general.php?page=share-and-follow.php#enterlinks"><?php _e('enter the link details in to the admin page','share-and-follow'); ?></a>.</p>
                <?php
	}
}


?>
