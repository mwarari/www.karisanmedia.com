<!-- sidebar.php -->
<?php global $themeoptionsprefix; if(get_option($themeoptionsprefix.'_sidebarpos') == 1){ ?>
<div id="sidebarnarrowleft">
<?php } else { ?>
<div id="sidebarnarrowright">
<?php } ?>

	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SidebarNarrow') ) : ?>

		<div class="widget">
		<h2><?php _e("Categories",'KarisanMediaTheme');?></h2>
		<ul>
		<?php wp_list_categories('title_li='); ?>
		</ul>
		</div>
<!--
		<div class="widget">
		<h2><?php _e("Our Friends",'KarisanMediaTheme');?></h2>
			<ul>
				<?php get_links('-1', '<li>', '</li>', '', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
			</ul>
		</div>
-->

		<div class="widget">
		<h2><?php _e("Insider",'KarisanMediaTheme');?></h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</div>

		<div class="widget">

					<h2><?php _e("Archives",'KarisanMediaTheme');?></h2>

					<form id="archiveform" action="">
					<select name="archive_chrono" onchange="window.location =
					(document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
					<?php get_archives('monthly','','option'); ?>
					</select>
					</form>

		</div>

	<?php endif; ?>

</div>
