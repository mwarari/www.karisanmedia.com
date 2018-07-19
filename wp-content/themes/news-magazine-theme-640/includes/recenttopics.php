<?php global $themeoptionsprefix; ?>
<?php $numlatesttopics=get_option($themeoptionsprefix.'_numlatesttopics'); if(!isset($numlatesttopics) || empty($numlatesttopics) ){ $numlatesttopics=2;} else { $numlatesttopics=($numlatesttopics - 1); } $recenttopics = new WP_Query('showposts='.$numlatesttopics); ?>

<?php wp_reset_query(); query_posts('showposts='.$numlatesttopics); ?>


	<?php if (have_posts()) : ?>


	<?php while(have_posts()) : the_post();  $loopcounter++; ?>

						<div class="excerpt">

						<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);

											if (isset($thecimage) && !empty($thecimage)) { ?>

										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to",'NewsMagazineTheme640');?> <?php the_title_attribute(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/cropper.php?src=<?php echo $thecimage; ?>&amp;h=50&amp;w=50&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>
											<?php
											}
											else
											{
												if(get_option($themeoptionsprefix.'_noimagethumbnailstate') != 'off'){
											?>
											<img src="<?php bloginfo('template_url'); ?>/images/noimg50.gif" alt="" border=""/>

											<?php } } ?>
											<strong><a href="<?php the_permalink() ?>" rel="bookmark"><?php $thetitle=LimitText(get_the_title(),10,15,""); echo $thetitle; ?> &raquo;</a></strong>

										<?php
						 					   	    $rcsample = get_the_content();
						 					   	  	// Remove extraneous stuff from the content text
						 					   	  	$rcstthec = strip_tags($rcsample);
						 					   	  	$rcsspthec = str_replace(' ',' ',$rcstthec );
						 					   	  	$rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );
						 					   	  	$newrcs=LimitText(trim($rcsspthec),10,45,"");
 													echo "<p>$newrcs... </p>";
 										 ?>
 				 </div>

			<?php endwhile; ?>
			<?php endif; ?>

<?php wp_reset_query(); ?>


