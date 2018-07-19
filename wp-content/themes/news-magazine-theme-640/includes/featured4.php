<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_alternatecropper') == '1'){ $cropperfile="cropper.php";}elseif(get_option($themeoptionsprefix.'_alternatecropper') == '2'){ $cropperfile="cropper-alt.php";} ?>

<h2><a href="<?php echo get_category_link($featuredpostscat4);?>"><?php	if(strlen($featuredpostscatname4) > 25){ $featuredpostscatname4=LimitText($featuredpostscatname4,10,25,""); $featuredpostscatname4.="&raquo;"; } echo $featuredpostscatname4; ?> </a></h2>

<?php if (have_posts()) : ?>

<?php $featured4showmany=3; ?>


<?php $featured4postquery = new WP_Query('cat='.$featuredpostscat4.'&showposts='.$featured4showmany); ?>

<?php $count=0; while($featured4postquery->have_posts()) : $featured4postquery->the_post(); ?>



				<div class="excerpt">

				<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);
					if (isset($thecimage) && !empty($thecimage)) { ?>

						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to",'NewsMagazineTheme640');?> <?php the_title_attribute(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/<?php echo $cropperfile;?>?src=<?php echo $thecimage; ?>&amp;h=75&amp;w=75&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>
					<?php
					}
					else
					{ if(get_option($themeoptionsprefix.'_noimagethumbnailstate') != 'off'){
					?>
					<img src="<?php bloginfo('template_url'); ?>/images/noimg75.gif" alt="" border=""/>

					<?php } } ?>
					<strong><a href="<?php the_permalink() ?>" rel="bookmark">
					<?php

					$thetitle=get_the_title();

					if(strlen($thetitle) > 20)
					{
						$thetitle=LimitText($thetitle,10,20,"");
					}

					echo $thetitle;

					?> &raquo;</a></strong>

								<?php
				 					   	    $rcsample = get_the_content();
				 					   	  	// Remove extraneous stuff from the content text
				 					   	  	$rcstthec = strip_tags($rcsample);
				 					   	  	$rcsspthec = str_replace(' ',' ',$rcstthec );
				 					   	  	$rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );

				 					   	 	if(strlen($rcsspthec) > 90)
											{
				 					   	  		$newrcs=LimitText(trim($rcsspthec),10,90,"");
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



 				 </div>



	<?php $count++;?>
	<?php endwhile; ?>
<?php endif; ?>