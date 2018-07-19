<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div id="searchbox">
	<div class="searchinputbox"><input type="text" size="25" value="<?php the_search_query(); ?>" name="s" class="searchinput" id="s" /></div>
	<div class="searchsubmitbutton"><input type="submit" id="searchsubmit" value="<?php _e("Search",'KarisanMediaTheme');?>" class="searchbutton" /></div>
</div>
</form>
