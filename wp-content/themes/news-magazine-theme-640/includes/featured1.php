<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_alternatecropper') == '1'){ $cropperfile="cropper.php";}elseif(get_option($themeoptionsprefix.'_alternatecropper') == '2'){ $cropperfile="cropper-alt.php";} ?>

			<h2><a href="<?php echo get_category_link($featuredpostscat1);?>"><?php 	if(strlen($featuredpostscatname1) > 61){ $featuredpostscatname1=LimitText($featuredpostscatname1,10,61,""); $featuredpostscatname1.="&raquo;"; } echo $featuredpostscatname1; ?> </a></h2>


			<div class="tier1mainright">

			<?php if (have_posts()) : ?>

				  		<?php $tier1mainpost1 = new WP_Query('showposts=1&cat='.$featuredpostscat1); ?>

				  		<?php while($tier1mainpost1->have_posts()) : $tier1mainpost1->the_post(); $tier1post1 = $post->ID; $loopcounter++; ?>

						<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);

									if (isset($thecimage) && !empty($thecimage)) { ?>

										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to",'NewsMagazineTheme640');?> <?php the_title_attribute(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/<?php echo $cropperfile;?>?src=<?php echo $thecimage; ?>&amp;h=142&amp;w=200&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>

									<?php } else { if(get_option($themeoptionsprefix.'_noimagethumbnailstate') != 'off'){ ?>

											<img src="<?php bloginfo('template_url'); ?>/images/noimg200.gif" alt="" border=""/>

									<?php } } ?>

				<h3><a href="<?php the_permalink() ?>" rel="bookmark">



													<?php

													$thetitle=get_the_title();

													if(strlen($thetitle) > 75)
													{
														$thetitle=LimitText($thetitle,10,75,"");
														$thetitle.="&raquo;";
													}

													echo $thetitle;

					?>

				</a></h3>

			<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<div class="tier1mainleft">


				<div class="excerpt">
				<?php if (have_posts()) : ?>

				  		<?php $tier1mainpost2 = new WP_Query('showposts=2&cat='.$featuredpostscat1); ?>

				  		<?php while($tier1mainpost2->have_posts()) : $tier1mainpost2->the_post(); if(!($tier1post1 == $post->ID)) : $tier1post2 = $post->ID; $loopcounter++; ?>

						<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);

									if (isset($thecimage) && !empty($thecimage)) { ?>

									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to",'NewsMagazineTheme640');?> <?php the_title_attribute(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/<?php echo $cropperfile;?>?src=<?php echo $thecimage; ?>&amp;h=77&amp;w=100&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>

									<?php } else { if(get_option($themeoptionsprefix.'_noimagethumbnailstate') != 'off'){	?>

									<img src="<?php bloginfo('template_url'); ?>/images/noimg75.gif" alt="" border=""/>

									<?php } } ?>

									<h3><a href="<?php the_permalink() ?>" rel="bookmark">

														<?php

														$thetitle=get_the_title();

														if(strlen($thetitle) > 25)
														{
															$thetitle=LimitText($thetitle,10,25,"");
														}

														echo $thetitle;

														?> &raquo;</a></h3>

																	<?php
													 					   	    $rcsample = get_the_content();
													 					   	  	// Remove extraneous stuff from the content text
													 					   	  	$rcstthec = strip_tags($rcsample);
													 					   	  	$rcsspthec = str_replace(' ',' ',$rcstthec );
													 					   	  	$rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );

													 					   	 	if(strlen($rcsspthec) > 123)
																				{
													 					   	  		$newrcs=LimitText(trim($rcsspthec),10,123,"");
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
									 								 		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark">...</a>]
									 								 		</p>
										<br/>
 				<?php endif; ?>
				<?php endwhile; ?>
				<?php endif; ?>
 				</div>
 				<ul>

				<?php if (have_posts()) : ?>

				  		<?php $tier1mainpost3 = new WP_Query('showposts=7&cat='.$featuredpostscat1); ?>

				  		<?php while($tier1mainpost3->have_posts()) : $tier1mainpost3->the_post(); if(!($tier1post1 == $post->ID) && !($tier1post2 == $post->ID)) : $tier1post3 = $post->ID; $loopcounter++; ?>


				<li><a href="<?php the_permalink() ?>" rel="bookmark">

									<?php

									$thetitle=get_the_title();

									if(strlen($thetitle) > 40)
									{
										$thetitle=LimitText($thetitle,10,40,"");
										$thetitle.="...";
									}

									echo $thetitle;

					?>


				</a></li>


			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
		</div>
