<div id="footer">
  <div style="float: none; text-align: center;">
    <p>Copyright 2010 <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> Designed by <a href="http://www.RebeccaRing.com/">Rebecca Rings</a> | Powered by <a href="http://wordpress.org/">WordPress.</a></p>
  </div>
</div>
<script src="<?php bloginfo('template_directory'); ?>/js/dropdown2.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/dropdown.js" type="text/javascript" charset="utf-8"></script>
<!-- Create a MenuMatic Instance -->
<script type="text/javascript" >
	window.addEvent('domready', function() {			
		var myMenu = new MenuMatic();
	});		
</script>
<?php wp_footer(); ?>
</body>
</html>