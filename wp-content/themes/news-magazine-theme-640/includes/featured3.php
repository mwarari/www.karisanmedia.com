<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_alternatecropper') == '1'){ $cropperfile="cropper.php";}elseif(get_option($themeoptionsprefix.'_alternatecropper') == '2'){ $cropperfile="cropper-alt.php";} ?>


			<h2><a href="<?php echo get_category_link($featuredpostscat3);?>"><?php	if(strlen($featuredpostscatname3) > 25){ $featuredpostscatname3=LimitText($featuredpostscatname3,10,25,""); $featuredpostscatname3.="&raquo;"; } echo $featuredpostscatname3; ?> </a></h2>


			<?php if (have_posts()) : ?>



				  		<?php $feat3 = new WP_Query('showposts=1&cat='.$featuredpostscat3); ?>

				  		<?php while($feat3->have_posts()) : $feat3->the_post();  $loopcounter++; ?>
											<h3><a href="<?php the_permalink() ?>" rel="bookmark">

																<?php

																$thetitle=get_the_title();

																if(strlen($thetitle) > 35)
																{
																	$thetitle=LimitText($thetitle,10,35,"");
																}

																echo $thetitle;

														?> &raquo;</a></h3>

				  					<?php $thecimage = get_image_for_crop($post->ID,$thumborno=2);

									if (isset($thecimage) && !empty($thecimage)) { ?>
									<div class="imgstyle">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to",'NewsMagazineTheme640');?> <?php the_title_attribute(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/<?php echo $cropperfile;?>?src=<?php echo $thecimage; ?>&amp;h=125&amp;w=280&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>
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


				 					   	 	if(strlen($rcsspthec) > 155)
											{
				 					   	  		$newrcs=LimitText(trim($rcsspthec),10,155,"");
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
 								 		[<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><em><?php _e("Read More",'NewsMagazineTheme640');?></em></a>]
 								 		</p>

			<?php endwhile; ?>
			<?php endif; ?>

