<?php
	if ( function_exists('register_sidebar') ) {  
		register_sidebar(array('name'=>'sidebar'));  
		register_sidebar(array('name'=>'subfooterleft'));  
		register_sidebar(array('name'=>'subfootercenter'));  
		register_sidebar(array('name'=>'subfooterright'));
	}

# edit this function to take an arg of short or long
function display_post() { ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2><em class="comment_link"><a href="<?php echo comments_link(); ?>"><?php echo comments_number('Comment', '1 Comment', '% Comments'); ?></a> <?php # comments_popup_link('Comment', '1 Comment', '% Comments'); ?></em><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <em>- <?php the_time('m/j/y'); ?></em></h2>

		<div class="postcontent"><?php the_content(__('Read more'));?></div>

		<div class="postmeta">
			<ul>
				<!-- <li><em>Posted by:</em> <?php the_author() ?></li> -->
				<!-- <li><?php comments_popup_link('Comment', '1 Comment', '% Comments'); ?></li> -->
				<li><em>Categories:</em> <?php the_category(', ') ?></li>
				<?php the_tags('<li><em>Tags:</em> ', ', ', ' </li>'); ?>
				<!-- <li>Social Networking Links - If you're interested. Please note, that the following networking links contain invalid XHTML.</li> -->
				<!-- <li><p>Social Networks : <a href="http://technorati.com/faves?add=<?php the_permalink();?>">Technorati</a>, <a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>">Stumble it!</a>, <a href="http://digg.com/submit?phase=2&url= <?php the_permalink();?>&title=<?php the_title();?>">Digg</a>, <a href="http://del.icio.us/post?v=4&noui&jump=close&url=<?php the_permalink();?>&title=<?php the_title();?>">de.licio.us</a>, <a href="http://myweb.yahoo.com/myresults/bookmarklet? t=<?php the_title();?>&u=<?php the_permalink();?>&ei=UTF">Yahoo</a>, <a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" >reddit</a>, <a href="http://blogmarks.net/my/new.php? title=<?php the_title();?>&url=<?php the_permalink();?>">Blogmarks</a>, <a href="http://www.google.com/bookmarks/mark?op=edit&output=popup&bkmk=<?php the_permalink();?>&title=<?php the_title();?>">Google</a>, <a href="http://ma.gnolia.com/bookmarklet/add? url=<?php the_permalink();?>&title=<?php the_title();?>">Magnolia</a>.</p></li> -->
			</ul>
			<?php edit_post_link("edit post") ?>
		</div><!-- end #postmeta -->		
	</div>
	<?php wp_link_pages(); ?>
<?php
}
?>