			<div class="force_break"></div>
			</div> <!-- /middle -->
			<div id="sub_footer">
				<div class="widgets">
					<div class="inner">
						<ul><?php dynamic_sidebar("subfooterleft") ?></ul>
					</div>
				</div>

				<div class="widgets" id="sub_footer_center"><div class="inner">
					<ul><?php dynamic_sidebar("subfootercenter") ?></ul>
				</div></div>

				<div class="widgets"><div class="inner">
					<ul><?php dynamic_sidebar("subfooterright") ?></ul>
				</div></div>
				<div class="force_break"></div>
			</div>
			<div id="footer">				
				<!-- <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>
				<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress.org</a> -->
				&copy; <?php $today = getdate(); echo $today["year"] ?> <?php echo bloginfo('name'); ?>
				<span class="divider">|</span>
				built with <a href="http://www.alexwelch.com">Impatience</a> theme for <a href="http://wordpress.org/">WordPress</a>
				<span class="divider">|</span>
				<a href="<?php echo bloginfo('rss2_url') ?>">Subscribe via RSS</a>
			</div>
			<?php wp_footer(); ?>
		</div><!-- /wrap -->
	</body>
</html>