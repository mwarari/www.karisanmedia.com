<?php global $themeoptionsprefix; get_header(); ?>
<?php $themeison=get_option($themeoptionsprefix.'_newsmaglayon'); if(!isset($themeison) || empty($themeison) || ($themeison == 'off') ){include (TEMPLATEPATH . '/index.php');}else{?>
<div id="tier1">
<div class="tier1main">
			<?php 
			global $wpdb; 
			$featuredpostscatname1=get_option($themeoptionsprefix.'_featuredcat1');
			$featuredpostscatname1=str_replace("&","&amp;",$featuredpostscatname1);
			 $featuredpostscat1 = get_cat_id($featuredpostscatname1);
			 $featuredpostscatname1=stripslashes($featuredpostscatname1);
			 
			 $featuredpostscatname2=get_option($themeoptionsprefix.'_featuredcat2');
			$featuredpostscatname2=str_replace("&","&amp;",$featuredpostscatname2);
			 $featuredpostscat2 = get_cat_id($featuredpostscatname2);
			 $featuredpostscatname2=stripslashes($featuredpostscatname2);

			if((isset($featuredpostscat1) && !empty($featuredpostscat1)) || (isset($featuredpostscat2) && !empty($featuredpostscat2))){ 
				include (TEMPLATEPATH . '/includes/featured1.php'); 
			} else { ?>

				<h2>Featured Category #1</h2>

				<div class="tier1mainleft">

				<div class="excerpt">
				<img src="<?php bloginfo('template_url'); ?>/images/samplethumb5.jpg" alt="" border=""/>
				<strong>Place holder post title</strong>
				<p>This space will contain the excerpt from the headlined post for "Featured Category #1".  <br/><em>Read More</em></p>
				</div>

				<ul>
				<li><a href="#">First headline link from Featured Category #1 </a></li>
				<li><a href="#">Second headline link from Featured Category #1</a></li>
				<li><a href="#">Third headline link from Featured Category #1 </a></li>
				<li><a href="#">Fourth headline link from Featured Category #1</a></li>
				<li><a href="#">Fifth headline link from Featured Category #1</a></li>
				</ul>

		</div>
		<div class="tier1mainright">
		<img src="<?php bloginfo('template_url'); ?>/images/samplethumb4.jpg" alt="" border=""/></a>
		<h3>This is a sample headline for a Featured Category #1 post &raquo;</h3>


		</div>
	<?php } ?>
</div>
<div class="tier1side">

			<?php global $wpdb; $featuredpostscatname6=get_option($themeoptionsprefix.'_featuredcat6');
			$featuredpostscatname6=str_replace("&","&amp;",$featuredpostscatname6);
			 $featuredpostscat6 = get_cat_id($featuredpostscatname6);
			 $featuredpostscatname6=stripslashes($featuredpostscatname6);

			if(isset($featuredpostscat6) && !empty($featuredpostscat6)){ include (TEMPLATEPATH . '/includes/featured2a.php'); } else { ?>

				<h2>Featured Category #6</h2>

				<div class="excerpt">
				<img src="<?php bloginfo('template_url'); ?>/images/samplethumb1.jpg" alt="" border=""/>
				<strong>Place holder post title</strong>
				<p>This space will showcase thumbnails and headlines from a category of your choice.
				All you have to do is...</p>
				</div>

				<div class="excerpt">
				<img src="<?php bloginfo('template_url'); ?>/images/samplethumb2.jpg" alt="" border=""/>
				<strong>Place holder post title</strong>
				<p>...select a category from the theme options page next to the option that reads "Featured Category #2". </p>
				</div>

				<div class="excerpt">
				<img src="<?php bloginfo('template_url'); ?>/images/samplethumb3.jpg" alt="" border=""/>
				<strong>Place holder post title</strong>
				<p>To prevent the layout from becoming distored due to too many post excerpts, only three posts will be displayed.</p>
				</div>

			<?php } ?>


</div>

</div>

<?php if(get_option($themeoptionsprefix.'_turnonofftierx') != "off" ){ ?>
<?php if(get_option($themeoptionsprefix.'_tierxposition') == "under tier one" ){ ?>
<?php include (TEMPLATEPATH . '/includes/tierX.php'); ?>
<?php } ?>
<?php } ?>

<div id="tier2">
<div class="tier2a">

<div class="tier2ain">
<!-- home.php -->
			<!-- <a href="http://www.asapphirephoto.com/" target="_blank"><img src="http://www.karisanmedia.com/adverts/KarisanMediaBanner.jpg" width="180" height="415"/></a> -->
			<h2>Our Friends</h2>
<div>
<!-- 07/22/2012
    <a href="http://www.jambonewspot.com/">
            <span style="color: #000000;">
                    <img title="jambonewspot" src="http://www.karisanmedia.com/wp-content/uploads/2010/03/jambonewspot1.jpg" alt="" width="180" height="75" />
            </span>
    </a>
    <a href="http://www.jambonewspot.com/">
            <span style="color: #0000ff;">www.jambonewspot.com</span>
    </a>
-->
<a href="http://www.mwakilishi.com//" target="_blank">
	<img src="http://www.karisanmedia.com/adverts/mwakilishi-logo.png" width=180" height="46"/>
</a> 
<a href="http://www.mwakilishi.com//" target="_blank">
	<span style="color: #0000ff;">www.mwakilishi.com</span>
</a>
</div>
<!-- Added 06/23/2011 - MMM -->
<div>
    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
    <fb:like-box href="http://www.facebook.com/pages/Karisan-Media-Productions/124137670931034" width="190" show_faces="true" border_color="" stream="false" header="false" height="520"></fb:like-box>
</div>
			<!-- 
		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('IndexPageSidebar') ) : ?>
			<div class="widget">
				<h2>Categories</h2>
				<ul>
				 <?php wp_list_categories('title_li='); ?>
				</ul>
			</div>
		<?php endif; ?>
		-->
</div>

</div>
<?php if(get_option($themeoptionsprefix.'_filler120600hide') != "hide" ){ ?>
<div class="tier2b">
<?php } else { ?>
<div class="tier2bexpanded">
<?php } ?>
<div class="tier2bin">
			<?php global $wpdb; $featuredpostscatname3=get_option($themeoptionsprefix.'_featuredcat3');
			$featuredpostscatname3=str_replace("&","&amp;",$featuredpostscatname3);
			 $featuredpostscat3 = get_cat_id($featuredpostscatname3);
			 $featuredpostscatname3=stripslashes($featuredpostscatname3);

			if(isset($featuredpostscat3) && !empty($featuredpostscat3)){ include (TEMPLATEPATH . '/includes/featured3.php'); } else { ?>

				<h2>Featured Category #3</h2>

				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/samplethumb6.jpg" alt="" border=""/></a></div>
				<p>Text from featured post with photo pulled from "Featured Category #3". One post with photo will be pulled from
				3rd featured category. To choose category go to theme options page setting for "Featured Category #3". <a href="#"><em>Read More</em></a></p>


			<?php } ?>

			<hr>

			<?php global $wpdb; $featuredpostscatname4=get_option($themeoptionsprefix.'_featuredcat4');
			$featuredpostscatname4=str_replace("&","&amp;",$featuredpostscatname4);
			 $featuredpostscat4 = get_cat_id($featuredpostscatname4);
			 $featuredpostscatname4=stripslashes($featuredpostscatname4);

			if(isset($featuredpostscat4) && !empty($featuredpostscat4)){ include (TEMPLATEPATH . '/includes/featured4.php'); } else { ?>

				<h2>Featured Category #4</h2>

				<div class="excerpt">
				<img src="<?php bloginfo('template_url'); ?>/images/samplethumb8.jpg" alt="" border=""/>
				<strong>Place holder post title</strong>
				<p>This space will showcase thumbnails and headlines from a category of your choice.
				</p>
				</div>

				<div class="excerpt">
				<img src="<?php bloginfo('template_url'); ?>/images/samplethumb9.jpg" alt="" border=""/>
				<strong>Place holder post title</strong>
				<p>All you have to do is select a category from the theme options page next to the option that... </p>
				</div>

				<div class="excerpt">
				<img src="<?php bloginfo('template_url'); ?>/images/samplethumb10.jpg" alt="" border=""/>
				<strong>Place holder post title</strong>
				<p>...reads "Featured Category #4". Only the most recent three posts will be displayed.</p>
				</div>


			<?php } ?>
</div>
</div>
<?php if(get_option($themeoptionsprefix.'_filler120600hide') != "hide" ){ ?>
<div class="tier2ad">
<div class="tier2adin">
					<?php if(get_option($themeoptionsprefix.'_filler120600') <> "" ){ ?>
					<div class="tier2sidecontent">
					<?php echo stripslashes(get_option($themeoptionsprefix.'_filler120600')); ?>
					</div>
				<?php } else { ?>
				<img src="<?php bloginfo('template_url'); ?>/images/fsplash120.jpg"  alt="" border=""/>
				<?php } ?>


	</div>
</div>
<?php } ?>

<?php if(get_option($themeoptionsprefix.'_filler120600hide') != "hide" ){ ?>
<div class="tier2c">
<?php } else { ?>
<div class="tier2cexpanded">
<?php } ?>
<div class="tier2cin">
			<?php global $wpdb; $featuredpostscatname5=get_option($themeoptionsprefix.'_featuredcat5');
			$featuredpostscatname5=str_replace("&","&amp;",$featuredpostscatname5);
			 $featuredpostscat5 = get_cat_id($featuredpostscatname5);
			 $featuredpostscatname5=stripslashes($featuredpostscatname5);

			if(isset($featuredpostscat5) && !empty($featuredpostscat5)){ include (TEMPLATEPATH . '/includes/featured5.php'); } else { ?>

				<h2>Featured Category #5</h2>

				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/samplethumb7.jpg" alt="" border=""/></a></div>
				<p>This is some text from the featured post with photo pulled from "Featured Category #4". This will be a brief excerpt. One post with photo will be pulled from the
				fourth featured category, followed by linked headlines of more posts from the category. To choose the category for this section go to the theme options pagea and change
				the setting for "Featured Category #5". <a href="#"><em>Read More</em></a></p>

<hr>
<h2>Other Topics</h2>
				<ul>
				<li><a href="#">1st headline from Featured Category #5 </a></li>
				<li><a href="#">2nd headline from Featured Category #5</a></li>
				<li><a href="#">3rd headline from Featured Category #5 </a></li>
				<li><a href="#">4th headline from Featured Category #5</a></li>
				<li><a href="#">5th headline from Featured Category #5</a></li>
				<li><a href="#">6th headline from Featured Category #5</a></li>
				<li><a href="#">7th headline from Featured Category #5</a></li>
				<li><a href="#">8th headline from Featured Category #5</a></li>
				<li><a href="#">9th headline from Featured Category #5</a></li>
				<li><a href="#">10th headline from Featured Category #5</a></li
				</ul>

			<?php } ?>
	</div>
</div><!--close tier2c-->

</div><!--close tier2-->


<?php } ?>

<?php if(get_option($themeoptionsprefix.'_turnonofftierx') != "off" ){ ?>
<?php if(get_option($themeoptionsprefix.'_tierxposition') == "under tier two" ){ ?>
<?php include (TEMPLATEPATH . '/includes/tierX.php'); ?>
<?php } ?>
<?php } ?>


<?php get_footer(); ?>
