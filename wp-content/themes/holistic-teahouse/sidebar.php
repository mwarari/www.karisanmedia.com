<div id="sidebar">
  <ul>
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
			
			<li class="widget widget_archive">
				<h2  class="widgettitle">Archives</h2>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
			
			<li id="categories-3" class="widget widget_categories">
				<h2 class="widgettitle">Categories</h2>
				<ul>
						<?php wp_list_categories("show_count=0&orderby=name&title_li="); ?>
				</ul>
			</li>
			
    <?php endif; ?>
	<?php wp_meta(); ?>
  </ul>
</div>
