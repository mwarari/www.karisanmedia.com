<?php
class Share_Widget  extends WP_Widget {
        function Share_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'share_links', 'description' => 'Most common share links widget' );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'share-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'share-widget', 'Share Widget', $widget_ops, $control_ops );
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
                            'page_id' => $thePostID,                                        'heading' => "2",
                            'share'=>'',                                                    'css_images' => $instance['css_images'],
                            'size' => $instance['size'],                                    'list_style' => $instance['style'],
                            'direction' => $instance['direction'],                          'facebook' => $instance['facebook'],
                            'stumble'=>$instance['stumble'],                                'twitter'=>$instance['twitter'],
                            'delicious'=>$instance['delicious'],                            'digg'=>$instance['digg'],
                            'reddit'=>$instance['reddit'],                                  'hyves'=>$instance['hyves'],
                            'orkut'=>$instance['orkut'],                                    'phat'=>$instance['phat'],
                            'myspace'=>$instance['myspace'],                                'mixx'=>$instance['mixx'],
                            'tumblr_share_text'=>$instance['tumblr_share_text'],            'tumblr'=>$instance['tumblr'],
                            'email'=>$instance['email'],                                    'print'=>$instance['print'],
                            'google_buzz'=>$instance['google_buzz'],                        'yahoo_buzz'=>$instance['yahoo_buzz'],
                            'facebook_share_text' => $instance['facebook_share_text'],      'stumble_share_text'=>$instance['stumble_share_text'],
                            'twitter_share_text'=>$instance['twitter_share_text'],          'delicious_share_text'=>$instance['delicious_share_text'],
                            'digg_share_text'=>$instance['digg_share_text'],                'reddit_share_text'=>$instance['reddit_share_text'],
                            'hyves_share_text'=>$instance['hyves_share_text'],              'orkut_share_text'=>$instance['orkut_share_text'],
                            'phat_share_text'=>$instance['phat_share_text'],                'myspace_share_text'=>$instance['myspace_share_text'],
                            'mixx_share_text'=>$instance['mixx_share_text'],                'email_share_text'=>$instance['email_share_text'],
                            'print_share_text'=>$instance['print_share_text'],              'google_buzz_share_text'=>$instance['google_buzz_share_text'],
                            'yahoo_buzz_share_text'=>$instance['yahoo_buzz_share_text'],    'email_body_text' => $widgetSettigns['email_body_text'],

                        );
                                
		social_links($args);
		/*
                 *  After widget (defined by themes). */
		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
                print_r($instance);
		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );                   $instance['size'] = $new_instance['size'];
                $instance['style'] = $new_instance['style'];                                 $instance['direction'] = $new_instance['direction'];
                $instance['facebook'] = $new_instance['facebook'];                           $instance['stumble'] = $new_instance['stumble'];
                $instance['twitter'] = $new_instance['twitter'];                             $instance['delicious'] = $new_instance['delicious'];
                $instance['digg'] = $new_instance['digg'];                                   $instance['reddit'] = $new_instance['reddit'];
                $instance['hyves'] = $new_instance['hyves'];                                 $instance['orkut'] = $new_instance['orkut'];
                $instance['phat'] = $new_instance['phat'];                                   $instance['myspace'] = $new_instance['myspace'];
                $instance['mixx'] = $new_instance['mixx'];                                   $instance['print'] = $new_instance['print'];
                $instance['email'] = $new_instance['email'];                                 $instance['google_buzz'] = $new_instance['google_buzz'];
                $instance['yahoo_buzz'] = $new_instance['yahoo_buzz'];                       $instance['facebook_share_text'] = $new_instance['facebook_share_text'];
                $instance['stumble_share_text'] = $new_instance['stumble_share_text'];       $instance['twitter_share_text'] = $new_instance['twitter_share_text'];
                $instance['delicious_share_text'] = $new_instance['delicious_share_text'];   $instance['digg_share_text'] = $new_instance['digg_share_text'];
                $instance['reddit_share_text'] = $new_instance['reddit_share_text'];         $instance['hyves_share_text'] = $new_instance['hyves_share_text'];
                $instance['orkut_share_text'] = $new_instance['orkut_share_text'];           $instance['phat_share_text'] = $new_instance['phat_share_text'];
                $instance['myspace_share_text'] = $new_instance['myspace_share_text'];       $instance['mixx_share_text'] = $new_instance['mixx_share_text'];
                $instance['email_share_text'] = $new_instance['email_share_text'];           $instance['print_share_text'] = $new_instance['print_share_text'];
                $instance['google_buzz_share_text'] = $new_instance['google_buzz_share_text'];  $instance['yahoo_buzz_share_text'] = $new_instance['yahoo_buzz_share_text'];
                $instance['tumblr_share_text'] = $new_instance['tumblr_share_text'];  $instance['tumblr'] = $new_instance['tumblr'];
                $instance['css_images'] = $new_instance['css_images'];
		return $instance;
	}
        function form( $instance ) {

		/* Set up some default widget settings. */
                
               $defaults = array(
               'title' => '',                   'size'=>'16',
               'style'=>'',                     'direction' => 'down',
               'google_buzz'=>'',               'yahoo_buzz'=>'',
               'facebook'=>'yes',               'stumble'=>'yes',
               'twitter'=>'yes',                'hyves'=>'',
               'digg'=>'yes',                   'delicious'=>'yes',
               'reddit'=>'yes',                 'orkut'=>'',
               'myspace'=>'',                   'email'=>'',
               'tumblr'=>'',
               'mixx'=>'',                      'phat'=>'yes',
               'css_images'=>'yes',      'print'=>'',
               'tumblr_share_text'=>__('Share on Tumblr','share-and-follow'),
                'facebook_share_text' => __('Recomend on Facebook','share-and-follow'),
                'yahoo_buzz_share_text' => __('Buzz it','share-and-follow'),
                'google_buzz_share_text' => __('Buzz it up','share-and-follow'),
                'mixx_share_text' => __('Mixx it up','share-and-follow'),
                'stumble_share_text'=>__('Share with Stumblers','share-and-follow') ,
                'twitter_share_text'=>__('Tweet this','share-and-follow'),
                'delicious_share_text'=>__('Bookmark on Delicious','share-and-follow'),
                'digg_share_text'=>__('Digg this','share-and-follow'),
                'reddit_share_text'=>__('Share on Reddit','share-and-follow'),
                'hyves_share_text'=>__('Tip on Hyves','share-and-follow'),
                'orkut_share_text'=>__('Share on Orkut','share-and-follow'),
                'myspace_share_text'=>__('Share via MySpace','share-and-follow'),
                'email_share_text'=>__('Tell a friend','share-and-follow'),
                'print_share_text'=>__('Print for later','share-and-follow'),
               );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
                <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','share-and-follow'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
                <p>
                    <?php _e('CSS images?','share-and-follow'); ?>
                    <label><input type="radio" name="<?php echo $this->get_field_name( 'css_images' ); ?>" value="yes" <?php if ( 'yes' == $instance['css_images'] ) echo 'checked'; ?> /> <?php _e('Yes','share-and-follow'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="<?php echo $this->get_field_name( 'css_images' ); ?>" value="no" <?php if ( 'no' == $instance['css_images'] ) echo 'checked'; ?> /> <?php _e('No','share-and-follow'); ?></label>
                </p>

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


                <p>
			<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e('Style:','share-and-follow'); ?></label>
			<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( 'icon_text' == $instance['style'] ) echo 'selected="selected"'; ?> value="icon_text">Icon and Text</option>
				<option <?php if ( 'text_only' == $instance['style'] ) echo 'selected="selected"'; ?> value="text_only">Text only </option>
                                <option <?php if ( 'iconOnly' == $instance['style'] ) echo 'selected="selected"'; ?> value="iconOnly">Icon only </option>
			</select>
		</p>
                <p>
			<label for="<?php echo $this->get_field_id( 'direction' ); ?>"><?php _e('Direction:','share-and-follow'); ?></label>
			<select id="<?php echo $this->get_field_id( 'direction' ); ?>" name="<?php echo $this->get_field_name( 'direction' ); ?>" class="widefat" direction="width:100%;">
				<option  value="down"><?php _e('list','share-and-follow'); ?></option>
				<option <?php if ( 'row' == $instance['direction'] ) echo 'selected="selected"'; ?>value="row"><?php _e('row','share-and-follow'); ?></option>
			</select>
		</p>
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
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'facebook_share_text' ); ?>" id="<?php echo $this->get_field_id( 'facebook_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['facebook_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['twitter'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'twitter' ); ?>"><label for="<?php echo $this->get_field_id( 'twitter' ); ?>">twitter</label></td>
                                    <td><input type="text"  name="<?php echo $this->get_field_name( 'twitter_share_text' ); ?>" id="<?php echo $this->get_field_id( 'twitter_share_text' ); ?>"  style="width:100%" value="<?php echo stripslashes( $instance['twitter_share_text']); ?>"> </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['stumble'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'stumble' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'stumble' ); ?>"><label for="<?php echo $this->get_field_id( 'stumble' ); ?>">stumble</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'stumble_share_text' ); ?>" id="<?php echo $this->get_field_id( 'stumble_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['stumble_share_text']); ?>"> </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['google_buzz'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'google_buzz' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'google_buzz' ); ?>"><label for="<?php echo $this->get_field_id( 'google_buzz' ); ?>">google buzz</label><br /></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'google_buzz_share_text' ); ?>" id="<?php echo $this->get_field_id( 'google_buzz_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['google_buzz_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['yahoo_buzz'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'yahoo_buzz' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'yahoo_buzz' ); ?>"><label for="<?php echo $this->get_field_id( 'yahoo_buzz' ); ?>">yahoo buzz</label><br /></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'yahoo_buzz_share_text' ); ?>" id="<?php echo $this->get_field_id( 'yahoo_buzz_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['yahoo_buzz_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['digg'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'digg' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'digg' ); ?>"><label for="<?php echo $this->get_field_id( 'digg' ); ?>">digg</label><br /></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'digg_share_text' ); ?>" id="<?php echo $this->get_field_id( 'digg_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['digg_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['reddit'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'reddit' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'reddit' ); ?>"><label for="<?php echo $this->get_field_id( 'reddit' ); ?>">reddit</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'reddit_share_text' ); ?>" id="<?php echo $this->get_field_id( 'reddit_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['reddit_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['hyves'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'hyves' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'hyves' ); ?>"><label for="<?php echo $this->get_field_id( 'hyves' ); ?>">hyves</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'hyves_share_text' ); ?>" id="<?php echo $this->get_field_id( 'hyves_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['hyves_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['delicious'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'delicious' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'delicious' ); ?>"><label for="<?php echo $this->get_field_id( 'delicious' ); ?>">delicious</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'delicious_share_text' ); ?>" id="<?php echo $this->get_field_id( 'delicious_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['delicious_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['orkut'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'orkut' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'orkut' ); ?>" ><label for="<?php echo $this->get_field_id( 'orkut' ); ?>">orkut</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'orkut_share_text' ); ?>" id="<?php echo $this->get_field_id( 'orkut_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['orkut_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['myspace'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'myspace' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'myspace' ); ?>"><label for="<?php echo $this->get_field_id( 'myspace' ); ?>">myspace</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'myspace_share_text' ); ?>" id="<?php echo $this->get_field_id( 'myspace_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['myspace_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['mixx'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'mixx' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'mixx' ); ?>"><label for="<?php echo $this->get_field_id( 'mixx' ); ?>">mixx</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'mixx_share_text' ); ?>" id="<?php echo $this->get_field_id( 'mixx_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['mixx_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['tumblr'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'tumblr' ); ?>"><label for="<?php echo $this->get_field_id( 'tumblr' ); ?>">tumblr</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'tumblr_share_text' ); ?>" id="<?php echo $this->get_field_id( 'tumblr_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['tumblr_share_text']); ?>" ></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['email'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'email' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'email' ); ?>"><label for="<?php echo $this->get_field_id( 'email' ); ?>">email</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'email_share_text' ); ?>" id="<?php echo $this->get_field_id( 'email_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['email_share_text']); ?>" ></td>
                                </tr>
                                 <tr>
                                    <td><input type="checkbox" <?php if ( 'yes' == $instance['print'] ) echo 'checked'; ?> name="<?php echo $this->get_field_name( 'print' ); ?>" value="yes" id="<?php echo $this->get_field_id( 'print' ); ?>"><label for="<?php echo $this->get_field_id( 'print' ); ?>">print</label></td>
                                    <td><input type="text" name="<?php echo $this->get_field_name( 'print_share_text' ); ?>" id="<?php echo $this->get_field_id( 'print_share_text' ); ?>" style="width:100%" value="<?php echo stripslashes( $instance['print_share_text']); ?>" ></td>
                                </tr>
                            </tbody>
                </table>
                <?php
	}
}


?>
