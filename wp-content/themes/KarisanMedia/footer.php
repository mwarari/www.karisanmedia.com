</div><!--close contentcontainer-->

  <div class="clearall"></div>

	<div id="footer" class="rounded-corners">

		<div class="tools">
			<ul>

				<li><?php wp_register(); ?></li>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>

			</ul>
		</div>

		<?php wp_footer(); ?>

		<?php _e("Copyright",'KarisanMediaTheme');?> &copy; <?php print(date(Y)); ?> 	<?php bloginfo('name'); ?>	<?php _e("All rights reserved.",'KarisanMediaTheme');?>
		 

	</div>

</div><!--close maincontainer-->
<br/>
</div><!--close wrapper-->
<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_sitetrackingcode') <> ""){  echo stripslashes(get_option($themeoptionsprefix.'_sitetrackingcode')); } ?>

</body>
</html>