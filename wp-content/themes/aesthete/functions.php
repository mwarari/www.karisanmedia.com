<?php 

define ('DOMAIN','aesthete');	//Translation domain
$aesthete_options =null;
include ('_thumbnailing.php');
include ('functions-core.php');

//delete_option('aesthete_options');
		$aesthete_options = get_option('aesthete_options');
		$aestheteFooterTemplates = array(
			'last_used' => $aesthete_options['footer'],
			'address' => '<div id="footeraddress">455 Larkspur Dr. California Springs, CA 92926</div>' . "\n"
				. '<div id="footerphone"><div class="tel">phone: </div><div class="code">+1 (707)</div> <div class="number">123-45-67</div></div>' . "\n"
				. '<div class="clear"></div>' . "\n"
				. '&copy; <a href="[blog home]">[blog name]</a>',
			'contact_me_via_email' => 
				'<div id="footeraddress">Contact me by</div>' . "\n"
				. '<div id="footerphone"><div class="tel">email: </div><div class="number">[admin_email]</div></div>' . "\n"
				. '<div class="clear"></div>' . "\n"
				. '&copy; <a href="[blog home]">[blog name]</a>',
			'contact_me_via_contact_form' => 
				'<div id="footeraddress">Contact me via</div>' . "\n"
				. '<div id="footerphone"><div class="number"><a href="http://enter_url_of_your_contact_form">Contact Form</a></div></div>' . "\n"
				. '<div class="clear"></div>' . "\n"
				. '&copy; <a href="[blog home]">[blog name]</a>',
			'general_info' =>
				'<div id="footeraddress">MySite.com</div>' . "\n"
				. '<div id="footerphone"><div class="number" style="margin:0;"><a href="[blog home]">[blog name]</a></div></div>' . "\n"
				. '<div class="clear"></div>' . "\n"
				. '[blog description]',
		);

class AestheteOptions 
{
	function getOptions() 
	{
		//global $aesthete_options;
		//if (!$aesthete_options)
		{
			$options = get_option('aesthete_options');
			if (!is_array($options)) 
			{
				$options = array (
					'portfolio_category'=> '',
					'portfolio_works_per_page'=> 10,
					'portfolio_thumb_width'=> 190,
					'portfolio_thumb_height'=> 143,
					'catalogue_category'=>'',
					'catalogue_thumb_width'=> 100,
					'catalogue_thumb_height'=> 100,
					'catalogue_items_per_page'=> 10,
					'hide_post_info'=> false,
					'catalogue_image_number'=>1,
					'use_graph_header'=>false,
					'header_image' =>1,			//standard / small / custom
					'header_image_url'=>'',		//
					'header_font_size'=>54,		//
					'footer'=>'<div id="footeraddress">MySite.com</div>
	<div id="footerphone"><div class="number" style="margin:0;"><a href="[blog home]">[blog name]</a></div></div>
	<div class="clear"></div>
	[blog description]',
					'header_image_width' => 479,
					'header_image_height' => 131,
					'blog_title_size' => 54,
					'hide_blog_title' =>false,
					'show_rss_link'=>true,
					'show_home_link'=>true,
					'top_menu' =>''
				);
				update_option('aesthete_options', $options);
			}
			
		}
		return $options;
	}
	function add() 
	{
		$aesthete_options = AestheteOptions::getOptions();
		if(isset($_POST['aesthete_save_options'])) 
		{
			// meta
			$aesthete_options['portfolio_category'] = stripslashes($_POST['portfolio_category']);
			$aesthete_options['top_menu'] = stripslashes($_POST['top_menu']);
			$aesthete_options['portfolio_works_per_page'] = (int)($_POST['portfolio_works_per_page']);
			$aesthete_options['portfolio_thumb_width'] = (int)($_POST['portfolio_thumb_width']);
			$aesthete_options['portfolio_thumb_height'] = (int)($_POST['portfolio_thumb_height']);
			
			$aesthete_options['catalogue_category'] = stripslashes($_POST['catalogue_category']);
			$aesthete_options['catalogue_thumb_width'] = (int)($_POST['catalogue_thumb_width']);
			$aesthete_options['catalogue_thumb_height'] = (int)($_POST['catalogue_thumb_height']);
			$aesthete_options['catalogue_image_number'] = (int)($_POST['catalogue_image_number']);
			$aesthete_options['catalogue_items_per_page'] = (int)($_POST['catalogue_items_per_page']);
			$aesthete_options['hide_post_info'] = ($_POST['hide_post_info'])?true:false;
			$aesthete_options['use_graph_header'] = ($_POST['use_graph_header'])?true:false;
			$aesthete_options['header_image'] = (int)($_POST['header_image']);
			$aesthete_options['image_url'] = stripslashes($_POST['image_url']);
			$aesthete_options['hide_blog_title'] = ($_POST['hide_blog_title'])?true:false;
			$aesthete_options['blog_title_size'] = (int)($_POST['blog_title_size']);
			$aesthete_options['footer'] = stripslashes($_POST['aestheteFooter']);
			$aesthete_options['show_rss_link'] = ($_POST['show_rss_link'])?true:false;
			
			$aesthete_options['show_home_link'] = ($_POST['show_home_link'])?true:false;
			
			switch ($aesthete_options['header_image'])
			{
				case 1:
					$aesthete_options['header_image_width'] = 479;
					$aesthete_options['header_image_height'] = 131;
					break;
				case 2:
					$aesthete_options['header_image_width'] = 350;
					$aesthete_options['header_image_height'] = 94;
					break;
				case 3:
					if ($aesthete_options['image_url'])
					{
						$image = open_image( mime_type($aesthete_options['image_url']), $aesthete_options['image_url']);
						$aesthete_options['header_image_width'] = imagesx($image);
						$aesthete_options['header_image_height'] = imagesy($image);
						imagedestroy ($image);
					} else
					{
						$aesthete_options['header_image_width'] = 0;
						$aesthete_options['header_image_height'] = 97;
					}
					break;
			}
			update_option('aesthete_options', $aesthete_options);

		}

		add_theme_page("Aesthete Theme Options", "Aesthete Theme Options", 
				'edit_themes', basename(__FILE__), array('AestheteOptions', 'display'));
	}

	function option_footer_templates()
	{
		global $aestheteFooterTemplates;
		$aesthete_options = get_option('aesthete_options');
		foreach ($aestheteFooterTemplates as $k=>$v)
		{
			echo '<option value="'.$k.'">'.$k.'</option>';
		}
	}
	
	/*function get_document_root()
	{
		// from http://www.helicron.net/php/
		$localpath=dirname(getenv("SCRIPT_NAME"));
		echo "localpath =$localpath <br/>";
		
		$absolutepath=__DIR__;
		var_dump($absolutepath);
		
		echo "absolutepath =$absolutepath <br/>";
		// a fix for Windows slashes
		$absolutepath=str_replace("\\","/",$absolutepath);
		$docroot=substr($absolutepath,0,strpos($absolutepath,$localpath));
		echo "docroot =$docroot <br/>";
		return $docroot;
	}*/
	function echo_header_images($name, $selected)
	{
		//var_dump($selected);
		echo '<div class="alignleft header-image-select'.(($url.$file == $selected)?' header-selected':'').'">';
		echo 'without<br />image<br/>';
		echo '<input type="radio" name="'.$name.'" value=""'.(($selected)?'':' checked="checked"').'>';
		echo '</div>';
		
		$headerDir = dirname( __FILE__).'/img/headers';
		
		if (THUMB_DEBUG) echo "headerDir =$headerDir <br/>";
		
		$url = get_bloginfo('stylesheet_directory').'/img/headers';
		$img_url = substr($url, 7);
		$img_url = substr($img_url, strpos($img_url,'/'));
		
		if (THUMB_DEBUG) echo "img_url =$img_url <br/>";
		
		if (!is_dir($headerDir) && THUMB_DEBUG) echo "headerDir is not a dir <br/>";
		
		if (is_dir($headerDir)) {
			if ($dh = opendir($headerDir)) {
				while (($file = readdir($dh)) !== false) 
				{
					if (preg_match('/\.jpg$|\.jpeg$|\.png$|\.gif$/',$file))
					{
						if (THUMB_DEBUG) 
						{
							$tmp = get_thumb_image_url($headerDir.'/'.$file, 0,50,0,90) ;
							echo 'out of get_thumb_image_url...............................<br/>';
							echo "get_thumb_image_url =" .$tmp. " <br/>";
						}
						if (!THUMB_DEBUG) echo '<div class="alignleft header-image-select'.(($url.'/'.$file == $selected)?' header-selected':'').'">';
						echo '<img src="'.get_thumb_image_url($headerDir.'/'.$file, 0,50,0,90).'" title="'.$file.'"/><br/>';
						echo '<input type="radio" name="'.$name.'" value="'.$url.'/'.$file.'"'.(($url.'/'.$file == $selected)?' checked="checked"':'').'>';
						if (!THUMB_DEBUG) echo '</div>';
						//echo "filename: $file : filetype: " . filetype($headerDir.'/' . $file) . "<br/>";
					}
				}
				closedir($dh);
			}
		}
	}
	
	function display() 
	{
		global $aestheteFooterTemplates;
		$aesthete_options = AestheteOptions::getOptions();
		
		//$message = test_upload_dir();
		//if ($message) $message = '<div class="updated">'.$message.'</div>';
		
		$message = test_thumb_cache();
		if ($message) $message = '<div class="updated">'.$message.'</div>';
?>
	<style type="text/css" media="screen">
		#thumb-err{ display:none;}
		#aestheteFooterPreview
		{
			background: url(<?php bloginfo('stylesheet_directory');?>/img/bg-w.jpg) #f8e9cc;
			margin: 2px 0px 10px 0px;
			padding:15px;
			border:1px solid #723419;
			width:600px;
		}
		#aestheteFooterPreview *
		{
			line-height:1.3em;
			font-family:Palatino Linotype,Book Antiqua3,Palatino6,serif;
		}
		#aestheteFooterPreview, #aestheteFooterPreview a, #aestheteFooterPreview a:visited
		{
			color: #723419; !important;
		}
		#footeraddress 
		{
			font-size: 18px;
		}
		#footerphone
		{
			font-size: 18px;
		}
		#footerphone .tel
		{
			float:left;
			margin:3px 10px 0 0;
		}
		#footerphone .code
		{
			font-size: 12px;
			margin-top:0px;
			float:left;
		}
		#footerphone .number
		{
			font-size: 28px;
			margin-top:-7px;
			float:left;
		}
		#aestheteFooterPreview a {
			text-decoration:none;
		}
		#aestheteFooterPreview a:hover {
			text-decoration:underline;
		}
		select.catSelect .level-1 { font-size:90%; color:#777777;}
		select.catSelect .level-2 { font-size:90%; color:#aaaaaa;}
		.header-image-select {padding:2px; margin:5px 10px; text-align:center; border:1px solid transparent;}
		.header-selected {border:1px solid green; background-color:#dddddd;}
	</style>

<script type="text/javascript">
	var aestheteShortcodes = [
			['[blog name]', '<?php bloginfo('name'); ?>'],
			['[blog description]', '<?php bloginfo('description'); ?>'],
			['[blog home]', '<?php echo get_option('home'); ?>'],
			['[admin_email]', '<a href="mailto:<?php bloginfo('admin_email');?>"><?php bloginfo('admin_email');?></a>']
			//,
			//[ /\[email (.*)\]/g , '<a href="mailto:$1">$1</a>']
	];
	var footerTemplates = {
			last_used: '<?php echo str_replace(array("\r","\n"),array("'+String.fromCharCode(10)+'", "'+String.fromCharCode(13)+'"),addslashes($aestheteFooterTemplates['last_used']));?>',
			address: '<?php echo str_replace(array("\r","\n"),array("'+String.fromCharCode(10)+'", "'+String.fromCharCode(13)+'"),addslashes($aestheteFooterTemplates['address']));?>',
			contact_me_via_email: '<?php echo str_replace(array("\r","\n"),array("'+String.fromCharCode(10)+'", "'+String.fromCharCode(13)+'"),addslashes($aestheteFooterTemplates['contact_me_via_email']));?>',
			contact_me_via_contact_form: '<?php echo str_replace(array("\r","\n"),array("'+String.fromCharCode(10)+'", "'+String.fromCharCode(13)+'"),addslashes($aestheteFooterTemplates['contact_me_via_contact_form']));?>',
			general_info: '<?php echo str_replace(array("\r","\n"),array("'+String.fromCharCode(10)+'", "'+String.fromCharCode(13)+'"),addslashes($aestheteFooterTemplates['general_info']));?>'
	};
	jQuery(document).ready(function($) { 
		var A = this;
		$('#thumb-id').click( function(){$('#thumb-err').toggle()})
		$('#aestheteFooter').keyup( function() {
			A.updateFooterPreview();
		});
		
		$('#footerTemplates').change( function() {
			$('#aestheteFooter').val(footerTemplates[$('#footerTemplates').val()]);
			A.updateFooterPreview();
		});
		
		A.replaceShortcodes = function(data)
		{
			for ( var sc in aestheteShortcodes) data = data.replace(aestheteShortcodes[sc][0],aestheteShortcodes[sc][1]);
			 data = data.replace(/\[email ([^\]]*)\]/g , '<a href="mailto:$1">$1</a>');
			return data;
		}
		A.updateFooterPreview = function()
		{
			$('#aestheteFooterPreviewTD').html(A.replaceShortcodes($('#aestheteFooter').val()));
		}
		A.updateFooterPreview();
		$('#header_image_type').change(function()
		{
			//alert($('#header_image_type').val());
			if ($('#header_image_type').val()==3) $('#custom-header-images').show(); else  $('#custom-header-images').hide();
		});
	});
</script>



<div class="wrap">
	<div id="icon-options-general" class="icon32">
	<br/>
	</div>
	<h2>Aesthete theme options</h2>
<?php echo $message; ?>
	<form action="#" method="post" enctype="multipart/form-data" name="aesthete_form" id="aesthete_form">
	Don't know how to use portfolio? Be sure to read <a href="<?php bloginfo('stylesheet_directory');?>/README.txt">README.txt</a>
	<table cellspacing="20" border="1">
	<tr>
		<td style="width:270px;">Portfolio Category </td>
		<td>
	<?php 
		$args = array(
			'selected'=>$aesthete_options['portfolio_category'],
			'show_select_a_category' => 1,
			'show_all_categories' => 0,
			'html_select_id' => 'portfolio_category',
			'html_select_class' =>'catSelect',
			'html_select_name' => 'portfolio_category',
			'html_option_level_class' => 'level-'
		);

		echo_select_catagories($args);
	?>
			<!--input type="text" name="portfolio_category" id="portfolio_category" size="6" value="<?php echo($aesthete_options['portfolio_category']);?>"-->
		</td>
	</tr>
	<tr>
		<td>Portfolio Thumb Width</td>
		<td>
			<input type="text" name="portfolio_thumb_width"	id="portfolio_thumb_width" size="6" 
				value="<?php echo($aesthete_options['portfolio_thumb_width']);?>">
		</td>
	</tr>
	<tr>	
		<td>Portfolio Thumb Height</td>
		<td>
			<input type="text" name="portfolio_thumb_height" 
				id="portfolio_thumb_height" size="6" value="<?php echo($aesthete_options['portfolio_thumb_height']);?>">
		</td>
	</tr>
	<tr>
		<td>Portfolio Works Per Page</td>
		<td>
			<input type="text" name="portfolio_works_per_page" 
			id="portfolio_works_per_page" size="6" value="<?php echo($aesthete_options['portfolio_works_per_page']);?>">
		</td>
	</tr>
	<tr>	
		<td>Catalogue Category</td>
		<td>
			<?php 
				$args = array(
					'selected'=>$aesthete_options['catalogue_category'],
					'show_select_a_category' => 1,
					'show_all_categories' => 0,
					'html_select_id' => 'catalogue_category',
					'html_select_class' =>'catSelect',
					'html_select_name' => 'catalogue_category',
					'html_option_level_class' => 'level-'
				);
				echo_select_catagories($args);
			?>
			<!--input type="text" name="catalogue_category" 
			id="catalogue_category" size="6" value="<?php echo($aesthete_options['catalogue_category']);?>">
			Category ID containing goods description-->
		</td>
	</tr>
	<tr>	
		<td>Catalogue Thumb Width</td>
		<td>
			<input type="text" name="catalogue_thumb_width" 
			id="catalogue_thumb_width" size="6" value="<?php echo($aesthete_options['catalogue_thumb_width']);?>">
		</td>
	</tr>
	<tr>
		<td>Catalogue Thumb Height</td>
		<td>
			<input type="text" name="catalogue_thumb_height" 
			id="catalogue_thumb_height" size="6" value="<?php echo($aesthete_options['catalogue_thumb_height']);?>">
		</td>
	</tr>
	<tr>	
		<td>Number of preview images per catalogue item in list</td>
		<td>
			<input type="text" name="catalogue_image_number" id="catalogue_image_number" 
			size="6" value="<?php echo($aesthete_options['catalogue_image_number']);?>">
		</td>
	</tr>
	<tr>	
		<td>Catalogue items per page</td>
		<td>
			<input type="text" name="catalogue_items_per_page" id="catalogue_items_per_page" 
			size="6" value="<?php echo($aesthete_options['catalogue_items_per_page']);?>">
		</td>
	</tr>
	<tr>	
		<td>Hide Post Info</td>
		<td>
			<input type="checkbox" name="hide_post_info" 
			id="hide_post_info" <?php if($aesthete_options['hide_post_info']) echo "checked='checked'";?>">
			Check it if you want to hide post info (date, edit link, categories and tags). 
			Can be usefull if you use wordpress for a corporate site
		</td>
	</tr>
	<!--tr>	
		<td>Use Graphic Header</td>
		<td>
			<input type="checkbox" name="use_graph_header" 
			id="use_graph_header" <?php if($aesthete_options['use_graph_header']) echo "checked='checked'";?>">
			This option turns on graphic header. Please read README on this option.
		</td>
	</tr-->
	<tr>	
		<td style="vertical-align:top;">Header Image</td>
		<td>
			<select name="header_image" id ="header_image_type" >
				<option value="1" <?php echo (($aesthete_options['header_image']==1)?' selected="selected"':'')?>>Medium (default)</option>
				<option value="2" <?php echo (($aesthete_options['header_image']==2)?' selected="selected"':'')?>>Small</option>
				<option value="3" <?php echo (($aesthete_options['header_image']==3)?' selected="selected"':'')?>>Your image</option>
			</select> <small><em>select "Your image" to view all available images</em></small><br />
			<div id="custom-header-images" <?php if ($aesthete_options['header_image']!=3) echo 'style = "display:none;"'?>>
				Here are listed all images in <code><?php echo TEMPLATEPATH ?>/img/headers</code><br />
				Upload your images to the dir at your hosting (e.g. using ftp)<br />
				<?php AestheteOptions::echo_header_images('image_url',$aesthete_options['image_url']);?>
			</div>
		</td>
	</tr>
	<tr>	
		<td>Blog title size</td>
		<td>
			<input type="text" name="blog_title_size" id="blog_title_size" 
			size="2" value="<?php echo($aesthete_options['blog_title_size']);?>">px
		</td>
	</tr>
	<tr>	
		<td>Hide blog title</td>
		<td>
			<input type="checkbox" name="hide_blog_title" 
			id="hide_blog_title" <?php if($aesthete_options['hide_blog_title']) echo "checked='checked'";?>">
			Turn on the checkbox if you want to use your own large (full-page-width) header image
		</td>
	</tr>
	<tr>	
		<td>Show RSS link in sidebar</td>
		<td>
			<input type="checkbox" name="show_rss_link" 
			id="show_rss_link" <?php if($aesthete_options['show_rss_link']) echo "checked='checked'";?>">
			Check it to show "Subscribe RSS" link in sidebar
		</td>
	</tr>
	<tr>	
		<td>Show Home link in the top menu</td>
		<td>
			<input type="checkbox" name="show_home_link" 
			id="show_home_link" <?php if($aesthete_options['show_home_link']) echo "checked='checked'";?>">
			Check it to show "Home" link in the top menu
		</td>
	</tr>
	<tr>	
		<td style="vertical-align:top;">Footer</td>
		<td>
			<table>
				<tr>
					<td><select id="footerTemplates">
			<?php echo AestheteOptions::option_footer_templates();?>
			</select> <small><em>select a predefined template and edit it</em></small><br />
			<textarea name="aestheteFooter" id="aestheteFooter" style="width:500px; height:140px"><?php echo $aesthete_options['footer']?></textarea><br />
					</td>
					
					<td  style="vertical-align:top;">
						<br />
						You can use following shortcodes:<br />
						[blog name]<br />
						[blog description]<br />
						[blog home]<br />
						[admin_email] <small><em>Antispam encoded</em></small><br />
						[email <em>your@email.com</em>] <small><em>Antispam encoded</em></small><br />
					</td>
					
					
				</tr>
				</table>
				<br />
					Footer preview
					<div  id="aestheteFooterPreview">
						<table>
							<tr>
								<td style="vertical-align:top; width:127px;">
									<img src="<?php bloginfo('stylesheet_directory');?>/img/phone.gif"/>
								</td>
								<td style="vertical-align:top;" id="aestheteFooterPreviewTD"><?php echo $aesthete_options['footer']?></td>
							</tr>
						</table>
					</div>
					
					
					

		</td>
	</tr>
	<!--tr>	
		<td>Top Menu</td>
		<td>
			<input type="text" name="top_menu" id="top_menu" size="20" value="<?php echo($aesthete_options['top_menu']);?>">
			Тут будет формироваться верхнее меню
		</td>
	</tr-->
		
	</table>

	<br />	
		<input class="button-primary" type="submit" name="aesthete_save_options" value="Save Changes" />
	</form>
</div>
<?php 
	}
}
/*
	Выдает строку с путем до поста (все родительские категории)
*/
function get_post_path($post_id,$delimiter)
{
	$out ='';
	$categories = &get_the_category($post_id);
	if (is_array($categories))
	{
		foreach ($categories as $category)
		{
			if ($out) $out .= ', ';
			$out .= '<a href="'.get_category_link($category->cat_ID).'">'.$category->name.'</a>';
		}
		$category_list = get_category_parents($categories[0]->cat_ID, TRUE, $delimiter);
		$category_list =substr($category_list,0, strrpos($category_list,$delimiter));
		$category_list =substr($category_list,0, strrpos($category_list,$delimiter));
		if ($category_list)
			$out =  $category_list . $delimiter . $out;
	}
	return $out;
}

/* 
	@param $post_id	int
	@param $category int
	определяет, находится ли пост в заданной корневой категории 
*/
function in_root_category($post_id, $root_category_id='')
{
	$categories = &get_the_category($post_id);
	if (is_array($categories))
	{
		foreach ($categories as $category)
		{
			if ($root_category_id == get_root_category($category->cat_ID)) return true;
		}
	}
	return false;
}
/*
	returns category IDs of the post separated by comma
*/
function get_post_categories_list($post_id)
{
	$categories = &get_the_category($post_id);
	$out='';
	foreach ($categories as $category)
	{
		if ($out) $out .= ', ';
		$out .= $category->cat_ID;
	}
	return $out;
}

function get_post_category_names_list($post_id)
{
	$categories = &get_the_category($post_id);
	$out='';
	foreach ($categories as $category)
	{
		if ($out) $out .= ', ';
		$out .= $category->name;
	}
	return $out;
}
function get_post_root_category($post_id)
{
	$categories = &get_the_category($post_id);
	if (is_array($categories))
	{
		foreach ($categories as $category_id)
		{
			return get_root_category($category_id);
		}
	}
	return false;
}

function get_root_category($category_id='')
{
	$category = &get_category( $category_id );

	if ($category->parent)
	{
		$parent_id = get_root_category($category->parent);
		//echo "+"; print_r($parent);
		return $parent_id;
	}
	else
		return $category_id;
}

function post_has_immage($post)
{
	return (bool)preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content);
}

// не проверялась!
function catch_that_image() {
  global $post;
  $first_img = '';
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //определяем картинку по умолчанию
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

// custom comments
function mytheme_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; 
   //print_r($comment);
   ?>
   <li <?php comment_class('common-comment'); ?> id="comment-<?php comment_ID() ?>">

      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='26'); ?>

        <div class="fn floatleft"><?php echo get_comment_author_link()?><span class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" title="<?php _e("Permanent link to the comment")?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a> <?php edit_comment_link(__('(Edit)'),'  ','') ?></span></div>
		<div class="clear"></div>
	  </div>
		<div class="comment-body">
			<?php if ($comment->comment_approved == '0') : ?>
				 <em><?php _e('Your comment is awaiting moderation.') ?></em>
				 <br />
			<?php endif; ?>

			<?php comment_text() ?>
		</div>
		<div class="reply">
		 <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>

<?php 
}

/** l10n */
function theme_init()
{
	load_theme_textdomain('aest');
}

function legacy_comments( $file ) 
{
	if ( !function_exists('wp_list_comments') )
	{
		$file = TEMPLATEPATH . '/legacy.comments.php';
	}
	return $file;
}

// [a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?
function hide_email($email,$text='')
{
	$p1=rand(1,strlen($email)-2);
	$s1=substr($email,0,$p1);
	$email = substr($email,$p1);
	
	$p2 = rand(1,strlen($email)-1);
	$s2=substr($email,0,$p2);
	$s3 = substr($email,$p2);
	
	$js_email='Base64.decode("' . base64_encode($s1) . '")+\'' . $s2 . '\'+Base64.decode("' . base64_encode($s3) . '")';
	$js='<script>var m=' . $js_email .';' . 
		'document.write(\'<a href="ma\'+Base64.decode("'. base64_encode('ilto:') . '")+\'\'+m+\'">\'+' . (($text)?'\''.$text.'\'':'m') . '+\'</a>\');</script>';
	return $js;
}
function get_tags_for_post($post_id, $type='post_tag') 
{
	$tags = get_the_terms($post_id,$type);
	$tag_list='';
	if (is_array($tags))
		foreach ($tags as $tag)
			$tag_list .= ' '.$tag->name;
	return $tag_list;
}

function fix_caption_width($x=null, $attr, $content)
{
	$xs= 8; //add 8px to image width
	extract(shortcode_atts(array(
			'id'    => '',
			'align'    => 'alignnone',
			'width'    => '',
			'caption' => ''
		), $attr));

	if ( 1 > (int) $width || empty($caption) ) {
		return $content;
	}

	if ( $id ) $id = 'id="' . $id . '" ';

	return '<div ' . $id . 'class="wp-caption ' . $align . '" style="width: ' . ((int) $width + $xs) . 'px">'
	. $content . '<p class="wp-caption-text">' . $caption . '</p></div>';
}



// #######################################################################################3


function draw_image_thumb($args)
{
	global $post;
	$defaults = array(
		'max_width' => 700, 
		'max_height' => 700,
		'caption' => false,
		'align'=>'alignnone',
		'link_to' => 'post',
		'thumb_only'=>false,
		'fit_entire_size'=>true,
		'img'=>null,
		'margin'=>false,
		'aclass'=>'agallery wp-caption',
		'padding'=>0,
	);
	$r = wp_parse_args( $args, $defaults );
	$awidth = $r['max_width'];
	$aheight = $r['max_height'];
	if ($r['caption']) $aheight +=22;
	$pad=$r['padding']; //padding;
	if ($r['img'])
		$img =$r['img'];
	else
	{
		$args = array( 
				'post_parent' => $post->ID,
				'post_type' => 'attachment', 
			    'post_mime_type' => image,
				'order' => 'ASC', 
				'orderby' => 'menu_order ID'
			);
		$images =& get_children( $args );
		if (($images))
		{
			$found_thumb=false;
			foreach ( $images as $attachment_id => $attachment )
			{
				if (preg_match('/thumb/i',$attachment->post_name))
				{
					$found_thumb=true;
					$img = wp_get_attachment_image_src( $attachment_id,'full');
					break;
				}
			}
			if (!$found_thumb && !$thumb_only)
			{
				foreach ( $images as $attachment_id => $attachment )
				{
						$img = wp_get_attachment_image_src( $attachment_id,'full');
						break;
				}
			}
		}
		else
			return;
	}
	$h = round(min($img[2]*$r['max_width']/$img[1],$r['max_height']));
	$w = round(min($img[1]*$h/$img[2],$r['max_width']));
	//echo "h=$h, w=$w ";
	$img_url = substr($img[0], 7);
	$img_url = substr($img_url, strpos($img_url,'/'));
	//echo $img_url;
	?>
	
	<a href="<?php if ($r['link_to']=='post'){the_permalink();} else {echo $img_url;}?>" <?php echo (($r['link_to']=='image')?'rel="lightbox[' . $post->ID . ']"':'')?> class="<?php echo $r['aclass']?> <?php echo $r['align']?>" title="<?php the_title()?>" 
		style="width: <?php echo $awidth?>px; height:<?php echo $aheight;?>px; <?php echo (($r['margin']===false)?'':'margin:'.$r['margin'])?>">
		<?php if ($img[1] <= $r['max_width'] && $img[2] <= $r['max_height']):?>
			<img src="<?php echo $img[0]?>" width="<?php echo $img[1]?>"  height="<?php echo $img[2]?>" class="agallery" 
			style="padding-top:<?php echo max(round(($r['max_height']-$img[2])/2),$r['padding'])?>px !important;"/>

		<?php elseif ($r['fit_entire_size']):?>
			<img src="<?php echo get_thumb_image_url($img_url,$r['max_width'],$r['max_height'],1,80)?>" class="thumb" 
				style="padding-top:0px !important; padding-bottom:0px"
			/>
		<?php else:?>
			<img src="<?php echo get_thumb_image_url($img_url,$w,$h,1,80)?>" class="thumb" 
				style="padding-top:<?php echo round(($r['max_height']-$h)/2)?>px !important; padding-bottom:<?php echo round(($r['max_height']-$h)/2)?>px"
			 width="<?php echo $w?>"  height="<?php echo $h?>" />	
		<?php endif?>
		<?php if ($r['caption']):?><p><?php echo $attachment->post_excerpt?></p><?php endif;?>
	</a>

	<?php 
}

// ################################################################################


function aesthete_footer()
{
	$aesthete_options = AestheteOptions::getOptions();
	$shortcodes = array(
		'[blog name]' => get_bloginfo('name'),
		'[blog description]' => get_bloginfo('description'),
		'[blog home]' => get_option('home'),
		'[admin_email]' =>  hide_email(get_bloginfo('admin_email')),
	);
	$footer =  $aesthete_options['footer'];
	foreach ($shortcodes as $k => $v)
	{
		 $footer = str_replace($k, $v, $footer);
	}
	preg_match_all('/\[email (.*)\]/',$footer, $matches);
	if (is_array($matches))
	foreach ($matches[0]  as $k=>$v)
	{
		$footer = str_replace($v,hide_email($matches[1][$k]), $footer);
	}
	return $footer;
	
}

/****************************************************
	START
*****************************************************/
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//echo "message";
} 

add_filter('img_caption_shortcode', 'fix_caption_width', 10, 3);
add_filter( 'comments_template', 'legacy_comments' );
add_action ('init', 'theme_init');
add_action('admin_menu', array('AestheteOptions', 'add'));


if( function_exists('register_sidebar') ) 
{
	register_sidebar(array(
		'name' => 'index_sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="ornament">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}