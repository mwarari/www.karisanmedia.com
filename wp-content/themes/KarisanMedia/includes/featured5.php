<!-- featured5.php -->
<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_alternatecropper') == '1'){ $cropperfile="cropper.php";}elseif(get_option($themeoptionsprefix.'_alternatecropper') == '2'){ $cropperfile="cropper-alt.php";} ?>

		<h2><a href="<?php echo get_category_link($featuredpostscat5);?>"><?php	if(strlen($featuredpostscatname5) > 25){ $featuredpostscatname5=LimitText($featuredpostscatname5,10,25,""); $featuredpostscatname5.="&raquo;"; } echo $featuredpostscatname5; ?> </a></h2>

			<?php if (have_posts()) : ?>



				  		<?php $feat5 = new WP_Query('showposts=1&cat='.$featuredpostscat5); ?>

				  		<?php while($feat5->have_posts()) : $feat5->the_post(); $feat5post = $post->ID; $loopcounter++; ?>
									<h3><a href="<?php the_permalink() ?>" rel="bookmark">

														<?php

														$thetitle=get_the_title();

														if(strlen($thetitle) > 35)
														{
															$thetitle=LimitText($thetitle,10,35,"");
														}

														echo $thetitle;

														?> &raquo;</a></h3>

						<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2); ?>


								<?php if (isset($thecimage) && !empty($thecimage)) { ?>

										<div class="imgstyle">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to",'KarisanMediaTheme');?> <?php the_title_attribute(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/<?php echo $cropperfile;?>?src=<?php echo $thecimage; ?>&amp;h=125&amp;w=280&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>
										</div>

									<?php } else { if(get_option($themeoptionsprefix.'_noimagethumbnailstate') != 'off'){ ?>
										<div class="imgstyle">
											<img src="<?php bloginfo('template_url'); ?>/images/noimg280.gif" alt="" border=""/>
										</div>

									<?php } } ?>


								<?php
				 					   	    $rcsample = get_the_content();
				 					   	  	// Remove extraneous stuff from the content text
				 					   	  	$rcstthec = strip_tags($rcsample);
				 					   	  	$rcsspthec = str_replace(' ',' ',$rcstthec );
				 					   	  	$rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );

				 					   	 	if(strlen($rcsspthec) > 275)
											{
				 					   	  		$newrcs=LimitText(trim($rcsspthec),10,275,"");
				 					   	  		echo "<p>$newrcs";

				 					   	  	?>

				 					   	  <?php

				 					   	  }
				 					   	  	else
				 					   	  	{
				 					   	  		$newrcs=$rcsspthec;
				 					   	  		echo "<p>$newrcs";
				 					   	  	}

 				 ?>
 								 		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More",'KarisanMediaTheme');?></a>]
 								 		</p>


			<?php endwhile; ?>
			<?php endif; ?>

		<h4> <a href="<?php echo get_category_link($featuredpostscat5);?>"><?php _e("More",'KarisanMediaTheme');?> <?php echo $featuredpostscatname5; ?> <?php _e("Headlines",'KarisanMediaTheme');?> </a></h4>

 				<ul>

				<?php if (have_posts()) : ?>

				  		<?php $feat52 = new WP_Query('showposts=11&cat='.$featuredpostscat5); ?>

				  		<?php while($feat52->have_posts()) : $feat52->the_post(); if(!($feat5post == $post->ID)) : $loopcounter++; ?>


				<li><a href="<?php the_permalink() ?>" rel="bookmark">

									<?php

									$thetitle=get_the_title();

									if(strlen($thetitle) > 35)
									{
										$thetitle=LimitText($thetitle,10,35,"");
										$thetitle.="...";
									}

									echo $thetitle;

					?>


				</a></li>


			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
			</ul>
