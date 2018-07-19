<div id="tierX">

<div class="tierXmain">
			<?php global $wpdb; $featuredpostscatname6=get_option($themeoptionsprefix.'_featuredcat6');
			$featuredpostscatname6=str_replace("&","&amp;",$featuredpostscatname6);
			 $featuredpostscat6 = get_cat_id($featuredpostscatname6);
			 $featuredpostscatname6=stripslashes($featuredpostscatname6);

			if(isset($featuredpostscat6) && !empty($featuredpostscat6)){ include (TEMPLATEPATH . '/includes/featured6.php'); } else { ?>

			<h2>Extra Featured Category</h2>

			<div class="tierxcontent">
			<div class="tierximage"><img src="<?php bloginfo('template_url'); ?>/images/samplethumb11.jpg" alt="" border=""/></div>
			<div class="tierxexcerpt"><strong>Place holder post title</strong>
				<p>This space will contain the excerpt from the headlined post for your extra featured category. The setting for the extra featured category is Featured Category #6. The extra featured category is only visible when you activate Extra Content Row  <br/><em>Read More</em></p>
			</div>
			</div>
			<div class="clear"></div>

			<div class="tierxcontent">
			<div class="tierximage"><img src="<?php bloginfo('template_url'); ?>/images/samplethumb12.jpg" alt="" border=""/></div>
			<div class="tierxexcerpt"><strong>Place holder post title</strong>
				<p>This space will contain the excerpt from the headlined post for your extra featured category. The setting for the extra featured category is Featured Category #6. The extra featured category is only visible when you activate Extra Content Row  <br/><em>Read More</em></p>
			</div>
			</div>

			<div class="clear"></div>
			<div class="tierxcontent">
			<div class="tierximage"><img src="<?php bloginfo('template_url'); ?>/images/samplethumb13.jpg" alt="" border=""/></div>
			<div class="tierxexcerpt"><strong>Place holder post title</strong>
				<p>This space will contain the excerpt from the headlined post for your extra featured category. The setting for the extra featured category is Featured Category #6. The extra featured category is only visible when you activate Extra Content Row  <br/><em>Read More</em></p>
			</div>
			</div>


			<div class="clear"></div>
			<div class="tierxcontent">
			<div class="tierximage"><img src="<?php bloginfo('template_url'); ?>/images/samplethumb14.jpg" alt="" border=""/></div>
			<div class="tierxexcerpt"><strong>Place holder post title</strong>
				<p>This space will contain the excerpt from the headlined post for your extra featured category. The setting for the extra featured category is Featured Category #6. The extra featured category is only visible when you activate Extra Content Row  <br/><em>Read More</em></p>
			</div>
			</div>


			<div class="clear"></div>
			<div class="tierxcontent">
			<div class="tierximage"><img src="<?php bloginfo('template_url'); ?>/images/samplethumb15.jpg" alt="" border=""/></div>
			<div class="tierxexcerpt"><strong>Place holder post title</strong>
				<p>This space will contain the excerpt from the headlined post for your extra featured category. The setting for the extra featured category is Featured Category #6. The extra featured category is only visible when you activate Extra Content Row  <br/><em>Read More</em></p>
			</div>
			</div>


	<?php } ?>
</div>
<div class="tierXside">

		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('ExtraRowSidebar') ) : ?>

			<?php if(get_option($themeoptionsprefix.'_rssblockshowhide') != 'hide'){ ?>
<div class="widget">
			<h2><?php if(get_option($themeoptionsprefix.'_rsssubscribeblockh2') <> ""){ echo get_option($themeoptionsprefix.'_rsssubscribeblockh2'); } else { _e("Get our latest updates","NewsMagazineTheme640"); } ?></h2>
			<p>		<a href="<?php if(get_option($themeoptionsprefix.'_feedburnerurl') <> ""){echo get_option($themeoptionsprefix.'_feedburnerurl'); } else { echo bloginfo('rss_url'); } ?>">
			<?php if(get_option($themeoptionsprefix.'_rsssubscribeblocklinktext') <> ""){ echo get_option($themeoptionsprefix.'_rsssubscribeblocklinktext'); } else { _e("Subscribe Via A Feed Reader","NewsMagazineTheme640"); } ?>
				</a></p>

		<?php if(get_option($themeoptionsprefix.'_feedburnerid') <> ""){ ?>

				<p>
				<?php if(get_option($themeoptionsprefix.'_rsssubscribeblocksubtext') <> ""){ echo get_option($themeoptionsprefix.'_rsssubscribeblocksubtext'); } else { _e("Sign up via email to receive breaking news as well as receive other site updates","NewsMagazineTheme640"); } ?>

				</p>
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php $feedburner_id = get_option($themeoptionsprefix.'_feedburnerid'); echo $feedburner_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p>
				<?php _e("Enter your email address","NewsMagazineTheme640");?>:<br/><input type="text" style="width:140px" name="email"/></p><input type="hidden" value="<?php $feedburner_id = get_option($themeoptionsprefix.'_feedburnerid'); echo $feedburner_id; ?>" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" value="<?php _e("Subscribe","NewsMagazineTheme640");?>" /><p><?php _e("Delivered by","NewsMagazineTheme640");?> <a href="http://feedburner.google.com" target="_blank">FeedBurner</a></p></form>

		<?php } ?>
		</div>
<?php } ?>

			<div class="widget">
				<h2><?php _e("Recent Posts","NewsMagazineTheme640"); ?></h2>
				<ul>
				 <?php get_archives('postbypost', 10); ?>
				</ul>
				</div>
		<?php endif; ?>



</div>

</div>