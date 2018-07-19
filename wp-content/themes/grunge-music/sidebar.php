        <form method="get" action="<?php bloginfo('url'); ?>/" class="searchbar">
                    <p>
                    <input type="text" class="txt" value="<?php the_search_query(); ?>" name="s"/>
                    <input type="submit" name="submit" value="Search" class="btn"/>
                    </p>
        </form>
        <div class="clr"></div>
		
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
                <div class="sb-box">
                    <h2>Archives</h2>
				    <ul><?php wp_get_archives('type=monthly'); ?></ul>
                </div>

                <div class="sb-box">
                    <h2><?php _e('Categories'); ?></h2>

                    <ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=1'); ?></ul>
                </div>
                
                <div class="sb-box">
                    <h2>Bookmarks</h2>
                    <ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
                </div>

				<div class="sb-box">
                <h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</div>
			<?php endif; ?>

