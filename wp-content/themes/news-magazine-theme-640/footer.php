</div><!--close contentcontainer-->

  <div class="clearall"></div>

	<div id="footer">

		<div class="tools">
			<ul>

				<li><?php wp_register(); ?></li>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>

			</ul>
		</div>

		<?php wp_footer(); ?>

		<?php _e("Powered by",'NewsMagazineTheme640');?> <a href="http://www.WordPress.org">WordPress</a> <?php _e("Copyright",'NewsMagazineTheme640');?> &copy; <?php print(date(Y)); ?> 	<?php bloginfo('name'); ?>	<?php _e("All rights reserved",'NewsMagazineTheme640');?>
		 News Magazine Theme 640 <?php _e("designed by",'NewsMagazineTheme640');?> <a href="http://www.antisocialmediallc.com">antisocialmediallc.com</a>

	</div>

</div><!--close maincontainer-->
<br/><br/>
</div><!--close wrapper-->
<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_sitetrackingcode') <> ""){  echo stripslashes(get_option($themeoptionsprefix.'_sitetrackingcode')); } ?>

</body>
</html>