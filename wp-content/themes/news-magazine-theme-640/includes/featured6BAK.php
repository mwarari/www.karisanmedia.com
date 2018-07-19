<?php if(get_option($themeoptionsprefix.'_alternatecropper') == '1'){ $cropperfile="cropper.php";}elseif(get_option($themeoptionsprefix.'_alternatecropper') == '2'){ $cropperfile="cropper-alt.php";} ?>

			<h2><a href="<?php echo get_category_link($featuredpostscat6);?>"><?php 	if(strlen($featuredpostscatname6) > 90){ $featuredpostscatname1=LimitText($featuredpostscatname6,10,90,""); $featuredpostscatname6.="&raquo;"; } echo $featuredpostscatname6; ?> </a></h2>
			<?php $tierxshowhowmanyposts=get_option($themeoptionsprefix.'_tierxshowhowmanyposts'); if(!isset($tierxshowhowmanyposts) || empty($tierxshowhowmanyposts)){$tierxshowhowmanyposts=5;} ?>
			<?php wp_reset_query(); ?>


			<?php if (have_posts()) : ?>

				  		<?php $tierXmainpost1 = new WP_Query('showposts='.$tierxshowhowmanyposts.'&cat='.$featuredpostscat6); ?>

				  		<?php while($tierXmainpost1->have_posts()) : $tierXmainpost1->the_post(); $tierXpost1 = $post->ID; $loopcounter++; ?>
				<div class="tierxcontent">

						<?php $thecimage = get_image_for_crop($post->ID,$thumborno=1);

									if (isset($thecimage) && !empty($thecimage)) { ?>

										<div class="tierximage"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to",'NewsMagazineTheme640');?> <?php the_title_attribute(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/<?php echo $cropperfile;?>?src=<?php echo $thecimage; ?>&amp;h=150&amp;w=150&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a></div>

									<?php } else { if(get_option($themeoptionsprefix.'_noimagethumbnailstate') != 'off'){ ?>

											<div class="tierximage"><img src="<?php bloginfo('template_url'); ?>/images/noimg150.gif" alt="" border=""/></div>

									<?php } } ?>





				<?php if (isset($thecimage)) { ?>
				<div class="tierxexcerptimg">
				<?php } else { ?>
				<div class="tierxexcerptnoimg">
				<?php } ?>

				<h3><a href="<?php the_permalink() ?>" rel="bookmark">
				<?php
						$thetitle=get_the_title();
						if(strlen($thetitle) > 150)
						{
							$thetitle=LimitText($thetitle,10,150,"");
							$thetitle.="&raquo;";
						}
							echo $thetitle;

				?>
				</a></h3>

				<?php
				 		$rcsample = get_the_content();
				 		// Remove extraneous stuff from the content text
				 		$rcstthec = strip_tags($rcsample);
				 		$rcsspthec = str_replace(' ',' ',$rcstthec );
						$rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );

				 		if(strlen($rcsspthec) > 350)
						{
							$thepermalink=get_permalink();
				 			$newrcs=LimitText(trim($rcsspthec),10,350,"");
				 			$newrcs.=' [<a href="';
				 			$newrcs.=$thepermalink;
				 			$newrcs.='">...</a>] ';
				 			echo "<p>$newrcs</p>";

				 		}
				 		else
				 		{
				 			$newrcs=$rcsspthec;
				 			echo "<p>$newrcs</p>";
				 		}
				 ?>
			</div>
			</div>
			<div class="clear"></div>

			<?php endwhile; ?>
			<?php endif; ?>


