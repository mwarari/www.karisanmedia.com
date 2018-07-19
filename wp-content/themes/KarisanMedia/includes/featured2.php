<!-- featured2.php -->
<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_alternatecropper') == '1'){ $cropperfile="cropper.php";}elseif(get_option($themeoptionsprefix.'_alternatecropper') == '2'){ $cropperfile="cropper-alt.php";} ?>

			<h2><a href="<?php echo get_category_link($featuredpostscat3);?>">
				<?php	if(strlen($featuredpostscatname3) > 25){
					$featuredpostscatname2=LimitText($featuredpostscatname2,10,25,"");
					$featuredpostscatname2.="&raquo;";
				} echo
					$featuredpostscatname2; ?> </a></h2>


<?php if (have_posts()) : ?>

<?php $featured6showmany=3; ?>


<?php $featured6postquery = new WP_Query('cat='.$featuredpostscat2.'&showposts='.$featured6showmany); ?>

<?php $count=0; while($featured6postquery->have_posts()) : $featured6postquery->the_post(); ?>

				<div class="excerpt">
				<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);
					if (isset($thecimage) && !empty($thecimage)) { ?>

						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','KarisanMediaTheme'); the_title(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/<?php echo $cropperfile;?>?src=<?php echo $thecimage; ?>&amp;h=75&amp;w=75&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>
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

					if(strlen($thetitle) > 40)
					{
						$thetitle=LimitText($thetitle,10,40,"");
						$thetitle.="&raquo;";
					}

					echo $thetitle;

					?></a></strong>

								<?php
				 					   	    $rcsample = get_the_content();
				 					   	  	// Remove extraneous stuff from the content text
				 					   	  	$rcstthec = strip_tags($rcsample);
				 					   	  	$rcsspthec = str_replace(' ',' ',$rcstthec );
											$rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );


				 					   	 	if(strlen($rcsspthec) > 100)
											{
				 					   	  		$newrcs=LimitText(trim($rcsspthec),10,100,"");
				 					   	  		echo "<p>$newrcs";

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
