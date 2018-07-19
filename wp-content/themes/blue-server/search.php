<?php get_header(); ?>

			<!-- content start -->
			<div class="navigation">
							<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
							<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
						</div>	
				<div class="narrowcolumn" > 
					<?php if (have_posts()) : ?>
						<h2 class="pagetitle">Search Results</h2>
						
						<div class="bg_content_top"></div>
						<div class="bg_content_mid">
						<div class="search_result">
						<?php while (have_posts()) : the_post(); ?>
						    <div class="post">
							<div class="title_content">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						  </div>
						  
						  <div class="entry">
						 <?php
							  $excerpt = get_the_excerpt();
							 echo string_limit_words($excerpt,170).'...';
						  ?>
						  </div>
						</div>
						
						<?php endwhile; ?><br />
						
					<div class="navigation">
						<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
					</div>
									
					<?php else : ?>
					<div class="bg_content_top"></div>
						<div class="bg_content_mid">
						<div class="search_result">
					<div class="spacer_height">
						<h2 class="center">No posts found. Try a different search?</h2>
						<?php get_search_form(); ?>
					</div>
					
					
					<?php endif; ?>
			
		</div>		
	</div>
	<div class="bg_content_bottom"></div>
			</div>
			
			<!-- content end -->	
<?php get_footer(); ?>
