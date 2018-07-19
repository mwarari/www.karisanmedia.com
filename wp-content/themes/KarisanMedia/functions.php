<?php

// Theme Vars

$this_theme = "Karisan Media Theme";
$themeoptionsprefix = "newsmag640";
$options = array();
$sidebarpos=array('1','2');
$twops=array('1','2');
$commentsonpage=array('yes','no');
$arrnumposts=array('4','5','6','7','8','9','10');
$numfeaturedarr=array('1','2','3','4','5','6','7','8','9','10');
$numfeaturedpostsarr=array('5','6','7','8','9','10');
$showhidearr=array('show','hide');
$deactivateslideshow=array('deactivate','activate');
$sidebar2widgetspos=array('1','2');
$textalignlc=array('left','center');
$offonops=array('off','on');
$onoffops=array('on','off');
$singlepageadsensepositions=array('left','right','above post title','below post title','between post content and post details','under post details');
$displayorder=array('DESC','ASC');
$tierxpos=array('under tier one','under tier two');
$showhideops=array('show','hide');
$fulltextorexcerpt=array('fulltext','excerpt');

$thecatlist_A = get_categories('hide_empty=0');
$catdlist = array();

foreach ($thecatlist_A as $catforlist)
{

$thecatname=$catforlist->cat_name;
$thecatname=str_replace("&amp;","&",$thecatname);
	$catdlist[$catforlist->cat_ID] = $thecatname;
}

$categories_tmp = array_unshift($catdlist, "Select a category:");



$pathtothemetemplate = get_bloginfo('template_directory');

$menuiconewsmag640=TEMPLATEPATH . '/images/newsmag640ico.png';

$sop=__("Select Option");
$selcat=__("Select Category");
$sel12=__("Select 1 or 2");
$o1=__("Turn On or Off the Karisan Media Layout");
$o2=__("To activate or deactivate the news magazine layout select off or on");
$o3=__("Turn Off <b>About Karisan Media Theme</b>");
$o4=__("This option is here in case you decide not to use the news magazine layout. It turns off the about text and news magazine screenshot displayed above the posts on the index page.");
$o5=__("Show/Hide Add Post Link");
$o6=__("Selecting <b>show</b> will display an <b>Add Post</b> link in your homepage menu. Only you will be able to see the link");
$o7=__("Site Tracking Code Example: Google Analytics");
$o8=__("Using Goolge Analytics? You can enter your code above.");
$o9=__("Site Logo");
$o10=__("You can replace the text title with a logo by entering the logo URL here Note:include http://");
$o11=__("Show/Hide leaderboard Space");
$o12=__("Select <b>hide</b> to hide or <b>show</b> to display the leaderboard content space under the date/search bar");
$o13=__("Leaderboard Space Content");
$o14=__("Content for the leaderboard space under the date/search bar");
$o15=__("Leaderboard content text position");
$o16=__("Select left to align leaderboard content to left or center to align to center");
$o17=__("Tier 2 120");
$o18=__("Content for the 120 by 600 space in the third row on index page");
$o19=__("Show/Hide Tier 2 120");
$o20=__("Select <b>hide</b> to hide or <b>show</b> to display the 120 by 600 filler space in row 2");
$o21=__("Sidebar Position");
$o22=__("Select 1 to move narrow sidebar to left or 2 for right");
$o23=__("Featured Category #1");
$o24=__("Select your first featured category");
$o25=__("Featured Category #2");
$o26=__("Select your second featured category");
$o27=__("Featured Category #3");
$o28=__("Select your third featured category");
$o29=__("Featured Category #4");
$o30=__("Select your fourth featured category");
$o31=__("Featured Category #5");
$o32=__("Select your fifth featured category");
$o33=__("Hide Custom Sidebar elements");
$o34=__("The package comes with a custom recent topics and recent comments displayed in the sidebar. You can hide them if they are in the way of the placement of your widgets");
$o35=__("Position for sidebar 2 widgets");
$o36=__("If not hiding the custom recent topics and custom recent comments you can decide if to show your dragged widgets on top of the packaged sidebar elements or below them. Choose 1 for top or 2 for bottom");
$o37=__("Number of items for Custom Latest Topics");
$o38=__("If using the customized Latest Topics in sidebar select how many to display");
$o39=__("Number of items for Custom Recent Comments");
$o40=__("If using the customized Recent Comments in sidebar select how many to display");
$o41=__("Comment form on Post Pages");
$o42=__("Do you want posts of the type <b>Page</b> to have a comment form?");
$o43=__("Ad code for single page posts");
$o44=__("If using positions left or right best to use 200 by 200 ads. For other positions best to use 468 by 60 ads");
$o45=__("Position for single page post ads");
$o46=__("Left will float left, right will float right - 6 position options");
$o47=__("State of default no image thumbnail");
$o48=__("If you prefer not to use a no image thumbnail for posts that have no image change state to off");
$o49=__("Display Order for custom latest comments");
$o50=__("You can change the order of the comments between DESC [last to first] and ASC [first to last] ");
$o51=__("Activate Extra content row");
$o52=__("If you need to feature another category select on to turn on the extra row available");
$o53=__("Extra content row position");
$o54=__("You can position the extra row under the first row or under the second row ");
$o55=__("Featured Category #6");
$o56=__("Select your sixth featured category(Note this category only shows up if you have turned on the extra content row");
$o57=__("Show/Hide RSS Subscribe block");
$o58=__("If you prefer not to show the block in the sidebar for RSS subscription hide it by selecting hide below");
$o59=__("Feedburner RSS URL");
$o60=__("Your Feedburner URL");
$o61=__("Feedburner ID");
$o62=__("Your Feedburner ID here");
$o63=__("Header for Sidebar Subscribe Block");
$o64=__("The text to display as the header above the subscribe links in the sidebar");
$o65=__("Subtext for rss subscribe block");
$o66=__("The text to display as a short description for why to subscribe to your feed");
$o67=__("Subscribe Link Text");
$o68=__("The text to use for your subscribe link");
$o69=__("Number of posts to show in featured category #6");
$o70=__("You might need to adjust the number of posts showin in featured category #6 to accommodate the side content in that row");
$o71=__("Thumbanail Function Switcher");
$o72=__("There are two functions for preparing thumbnails for display. If the default is not working for you try changing to the alternate.");
$o72a=__("Thumbanail File Switcher");
$o72b=__("If the thumbnails still don't work regardless of which function you use try switching between cropper files.");
$o73=__("Language File");
$o74=__("Select on or off");
$o75=__("Blog Mode Full Text Or Excerpt");
$o76=__("If you are using the theme in blog mode (instead of magazine) you can display the content on the index page in full text mode or excerpt mode");
$o77=__("Blog Mode Excerpt Length");
$o78=__("If you are using the theme in blog mode (instead of magazine) and using excerpts instead of full text on index page you can control the excerpt length here");
$o79=__("Blog Mode Excerpt Thumbnail Width");
$o80=__("If you are using the theme in blog mode (instead of magazine) and using excerpts instead of full text on index page you can control the width of the thumbnails used in excerpts. **Only enter numerical value");
$o81=__("Blog Mode Show author/date byline under title");
$o82=__("If you are using the theme in blog mode (instead of magazine) use this option to display or conceal the author and date byline under the title");


if(get_option($themeoptionsprefix.'_languagefileonoff') == 'on'){ load_theme_textdomain(KarisanMediaTheme); }

if ( function_exists('register_sidebar') )
    register_sidebars(1,array(
    	'name'=>'IndexPageSidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));


    register_sidebars(1,array(
    		'name'=>'SidebarNarrow',
	        'before_widget' => '<div class="widget">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>',
    ));


    register_sidebars(1,array(
    		'name'=>'SidebarOther',
	        'before_widget' => '<div class="widget">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>',
    ));

 if(get_option($themeoptionsprefix.'_turnonofftierx') != "off" )
 {
    		register_sidebars(1,array(
    		'name'=>'ExtraRowSidebar',
	        'before_widget' => '<div class="widget">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>',
    ));
 }
 elseif(get_option($themeoptionsprefix.'_turnonofftierx') == 'off' )
 {
	unregister_sidebar( 'ExtraRowSidebar' );
 }

remove_action('wp_head', 'wp_generator');

function getImage ($post) {
$imageyn=false;

$isimg= explode("<img",$post);
if(sizeof($isimg) > 1) {
$imageyn=true;}
return $imageyn;
}


function teaserimg($mw=580,$mh=325)
{

global $post;
$html = $post->post_content;
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $html,
$matches, PREG_SET_ORDER);
$p = $matches [0] [1];
 if(list($w,$h) = @getimagesize($p)) {
foreach(array('w','h') as $v) { $m = "m{$v}";
if(${$v} > ${$m} && ${$m}) { $o = ($v == 'w') ? 'h' : 'w';
$r = ${$m} / ${$v}; ${$v} = ${$m}; ${$o} = ceil(${$o} * $r); } }
return $p; }
}


	function LimitText($Text,$Min,$Max,$MinAddChar) {
	    if (strlen($Text) < $Min) {
	        $Limit = $Min-strlen($Text);
	        $Text .= $MinAddChar;
	    }
	    elseif (strlen($Text) >= $Max) {
	        $words = explode(" ", $Text);
	        $check=1;
	        while (strlen($Text) >= $Max) {
	            $c=count($words)-$check;
	            $Text=substr($Text,0,(strlen($words[$c])+1)*(-1));
	            $check++;
	        }
	    }

	    return $Text;
}

function get_the_post_image($thec) {
$images=array();

	if(stripos($thec, '<img')){

		$images = preg_match_all( "/<img .+?\/?>/im", $thec, $results );

		if( $images > 0 )
		{
			foreach( $results as $value )
			{
				$image=$value[1];
			}
		}
		else
		{$image='';}

		return $image;
	}
}

function some_posts_have_comments()
{

	global $wpdb;
	$somepostshavecomments=false;

	$sql = "SELECT comment_ID FROM $wpdb->comments WHERE comment_approved = '1'";
	$comments = $wpdb->get_results($sql);

	if(!empty($comments))
	{
		$somepostshavecomments=true;
	}

	return $somepostshavecomments;

}


function have_posttype_posts_posts()
{

	global $wpdb;
	$have_posttype_posts_posts=false;

	$sql = "SELECT ID FROM $wpdb->posts WHERE post_type='post' AND post_content <> '' AND post_title <> '' AND post_name <> '' AND post_password='' AND post_status='publish'";
	$postposts = $wpdb->get_results($sql);

	if(!empty($postposts))
	{
		$have_posttype_posts_posts=true;
	}

	return $have_posttype_posts_posts;

}


function bdw_get_images($postID,$imgwidth,$imgheight,$thumborno)
{

    // Get the post ID
    $iPostID = $postID;

	$files = get_children("post_parent=$iPostID&post_type=attachment&post_mime_type=image");
	if($files)
	{
	        $keys = array_keys($files);
	        $iNum=$keys[0];
	}

        // Get the thumbnail url for the attachment
       // $sThumbUrl = wp_get_attachment_thumb_url($iNum);

          if( (isset($thumborno)) && ($thumborno == 1) )
          {
         	 	$sThumbUrl = wp_get_attachment_thumb_url($iNum);
         	}
         	elseif( (isset($thumborno)) && ($thumborno == 2) )
          {
         		$sThumbUrl =wp_get_attachment_medium_url($iNum);
         	}
         	else
         	{
          		$sThumbUrl = wp_get_attachment_url($iNum);
       	 }

        if(!isset($sThumbUrl) || empty($sThumbUrl))
        {
				$thepostimages = c12pulltheimgurl($iPostID);
				foreach($thepostimages as $thepostimage)
				{
					$sThumbUrl=$thepostimages[0];
				}

		}



        // UNCOMMENT THIS IF YOU WANT THE FULL SIZE IMAGE INSTEAD OF THE THUMBNAIL
        //$sImageUrl = wp_get_attachment_url($iNum);

        // Build the <img> string
         if(isset($sThumbUrl) && !empty($sThumbUrl))
        {

        	$sImgString = '<a href="' . get_permalink() . '">' .
                            '<img src="' . $sThumbUrl . '" width="' . $imgwidth . '"';
                            if(isset($imgheight) && !empty($imgheight)){ $sImgString.='height="' . $imgheight . '"'; }
                            $sImgString.='alt="' . get_the_title($iPostID) . '" title="' . get_the_title($iPostID) . '" border="0"/>' .
                        '</a>';
		}
		else
		{
			$sImgString='';
		}

        // Print the image
        echo $sImgString;

}

function get_image_for_crop($postID,$thumborno)
{

    // Get the post ID
    $iPostID = $postID;
    global $themeoptionsprefix;

	$files = get_children("post_parent=$iPostID&post_type=attachment&post_mime_type=image");
	if($files){
	        $keys = array_keys($files);
	        $iNum=$keys[0];
	}

        if( (isset($thumborno)) && ($thumborno == 1) )
        {
       	 	$sImageUrlSet = wp_get_attachment_thumb_url($iNum);
       	}
       	elseif( (isset($thumborno)) && ($thumborno == 2) )
        {
       		$sImageUrlSet =wp_get_attachment_medium_url($iNum);
       	}
       	else
       	{
        	$sImageUrlSet = wp_get_attachment_url($iNum);
        }

      if(!isset($sImageUrlSet) || empty($sImageUrlSet))
      {
				$thepostimages = c12pulltheimgurl($iPostID);
				foreach($thepostimages as $thepostimage)
				{
					$sImageUrlSet=$thepostimages[0];
				}
		}

		if(isset($sImageUrlSet) && !empty($sImageUrlSet))
		{
			$sImageUrl = $sImageUrlSet;

			if(get_option($themeoptionsprefix.'_alternatecropper') == '1'){
			$sImageUrl=prepsimageurl($sImageUrl);
			}
		}
		else
		{
			$sImageUrl='';
		}



       return $sImageUrl;

}

function c12pulltheimgurl($thepostid)
{
    $theimgstring=get_the_content($thepostid);

    $c12tcmts = '/<img (?:.*?)src=(?:"|\'){1}(.*?)(?:"|\'){1}/is';

    $theimgmtchesarr = array();

    $procmatchs = preg_match_all($c12tcmts,$theimgstring,$theimgmtchesarr);

    if( $procmatchs!==false && isset($theimgmtchesarr[1]) )
    {
        return $theimgmtchesarr[1];
    }
    else
    {
        return false;
    }
}


function wp_get_attachment_medium_url($id){
 $medium_array = image_downsize( $id, 'medium' );
 $medium_path = $medium_array[0];
 return $medium_path;
}



if(get_option($themeoptionsprefix.'_alternateprepsimageurl') == '1')
{

	function prepsimageurl($src) {

	// remove http/ https/ ftp
	$src = preg_replace("/^((ht|f)tp(s|):\/\/)/i", "", $src);
	// remove domain name from the source url
	$host = $_SERVER["HTTP_HOST"];
	$src = str_replace($host, "", $src);
	$host = str_replace("www.", "", $host);
	$src = str_replace($host, "", $src);

	//$src = preg_replace( "/(?:^\/+|\.{2,}\/+?)/", "", $src );
	//$src = preg_replace( '/^\w+:\/\/[^\/]+/', '', $src );

	// don't allow users the ability to use '../'
	// in order to gain access to files below document root

	// src should be specified relative to document root like:
	// src=images/img.jpg or src=/images/img.jpg
	// not like:
	// src=../images/img.jpg
	$src = preg_replace( "/\.\.+\//", "", $src );

	return $src;

	}
}
elseif(get_option($themeoptionsprefix.'_alternateprepsimageurl') == '2')
{

	function prepsimageurl($src)
	{
	$url_parts = parse_url($src);
	$theimgpath=$url_parts['path'];
	return $theimgpath;
	}
}
else
{
	function prepsimageurl($src)
	{
	$url_parts = parse_url($src);
	$theimgpath=$url_parts['path'];
	return $theimgpath;
	}
}



// Handle Theme Options

$options = array (

array("optionname" => "General Settings",
"optiontype" => "heading"),

array("optionname" => "$o1",
"optiondescription" => "<p>$o2</p>",
"optionid" => $themeoptionsprefix."_newsmaglayon",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $offonops),

array("optionname" => "$o3",
"optiondescription" => "<p>$o4</p>",
"optionid" => $themeoptionsprefix."_turnoffindexabout",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $onoffops),

array("optionname" => "$o75",
"optiondescription" => "<p>$o76</p>",
"optionid" => $themeoptionsprefix."_fulltextorexcerpt",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $fulltextorexcerpt),

array("optionname" => "$o77",
"optiondescription" => "<p>$o78</p>",
"optionid" => $themeoptionsprefix."_fulltextorexcerptlength",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$o81",
"optiondescription" => "<p>$o82</p>",
"optionid" => $themeoptionsprefix."_showhideauthordatebyline",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $onoffops),

array("optionname" => "$o79",
"optiondescription" => "<p>$o80</p>",
"optionid" => $themeoptionsprefix."_fulltextorexcerptthumbwidth",
"selectoptiondef" => "",
"optiontype" => "text"),


array("optionname" => "$o5",
"optiondescription" => "<p>$o6</p>",
"optionid" => $themeoptionsprefix."_hideaddpostlink",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "$o7",
"optiondescription" => "<p>$o8</p>",
"optionid" => $themeoptionsprefix."_sitetrackingcode",
"selectoptiondef" => "",
"optiontype" => "textarea"),

array("optionname" => "$o9",
"optiondescription" => "<p>$o10</p>",
"optionid" => $themeoptionsprefix."_sitelogo",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$o11",
"optiondescription" => "<p>$o12</p>",
"optionid" => $themeoptionsprefix."_showhideleader",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "$o13",
"optiondescription" => "<p>$o14</p>",
"optionid" => $themeoptionsprefix."_leadercode",
"selectoptiondef" => "",
"optiontype" => "textarea"),

array("optionname" => "$o15",
"optiondescription" => "<p>$o16</p>",
"optionid" => $themeoptionsprefix."_showhideleadercontentposition",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $textalignlc),

array("optionname" => "$o17",
"optiondescription" => "<p>$o18</p>",
"optionid" => $themeoptionsprefix."_filler120600",
"selectoptiondef" => "",
"optiontype" => "textarea"),

array("optionname" => "$o19",
"optiondescription" => "<p>$o20</p>",
"optionid" => $themeoptionsprefix."_filler120600hide",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "$o21",
"optiondescription" => "<p>$o22</p>",
"optionid" => $themeoptionsprefix."_sidebarpos",
"selectoptiondef" => "$sop",
"optiontype" => "select",
"options" => $sidebarpos),

array("optionname" => "$o23",
"optiondescription" => "<p>$o24</p>",
"optionid" => $themeoptionsprefix."_featuredcat1",
"selectoptiondef" => "$selcat:",
"optiontype" => "select",
"options" => $catdlist),


array("optionname" => "$o25",
"optiondescription" => "<p>$o26</p>",
"optionid" => $themeoptionsprefix."_featuredcat2",
"selectoptiondef" => "$selcat:",
"optiontype" => "select",
"options" => $catdlist),

array("optionname" => "$o27",
"optiondescription" => "<p>$o28</p>",
"optionid" => $themeoptionsprefix."_featuredcat3",
"selectoptiondef" => "$selcat:",
"optiontype" => "select",
"options" => $catdlist),

array("optionname" => "$o29",
"optiondescription" => "<p>$o30</p>",
"optionid" => $themeoptionsprefix."_featuredcat4",
"selectoptiondef" => "$selcat:",
"optiontype" => "select",
"options" => $catdlist),

array("optionname" => "$o31",
"optiondescription" => "<p>$o32</p>",
"optionid" => $themeoptionsprefix."_featuredcat5",
"selectoptiondef" => "$selcat:",
"optiontype" => "select",
"options" => $catdlist),

array("optionname" => "$o55",
"optiondescription" => "<p>$o56</p>",
"optionid" => $themeoptionsprefix."_featuredcat6",
"selectoptiondef" => "$selcat:",
"optiontype" => "select",
"options" => $catdlist),

array("optionname" => "$o69",
"optiondescription" => "<p>$o70</p>",
"optionid" => $themeoptionsprefix."_tierxshowhowmanyposts",
"selectoptiondef" => "$selcat:",
"optiontype" => "select",
"options" => $numfeaturedarr),

array("optionname" => "$o33",
"optiondescription" => "<p>$o34</p>",
"optionid" => $themeoptionsprefix."_hidecustomsidebarelements",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $showhidearr),


array("optionname" => "$o35",
"optiondescription" => "<p>$o36</p>",
"optionid" => $themeoptionsprefix."_sidebar2widgetspos",
"selectoptiondef" => "$sel12:",
"optiontype" => "select",
"options" => $sidebar2widgetspos),

array("optionname" => "$o37",
"optiondescription" => "<p>$o38</p>",
"optionid" => $themeoptionsprefix."_numlatesttopics",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $numfeaturedarr),

array("optionname" => "$o39",
"optiondescription" => "<p>$o40</p>",
"optionid" => $themeoptionsprefix."_numrecentcomments",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $numfeaturedarr),

array("optionname" => "$o49",
"optiondescription" => "<p>$o50</p>",
"optionid" => $themeoptionsprefix."_recentcommentsdisplayorder",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $displayorder),

array("optionname" => "$o41",
"optiondescription" => "<p>$o42</p>",
"optionid" => $themeoptionsprefix."_commentsonpage",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $commentsonpage),

array("optionname" => "$o43",
"optiondescription" => "<p>$o44</p>",
"optionid" => $themeoptionsprefix."_singlepageadsensecode",
"selectoptiondef" => "",
"optiontype" => "textarea"),

array("optionname" => "$o45",
"optiondescription" => "<p>$o46</p>",
"optionid" => $themeoptionsprefix."_singlepageadsenseposition",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $singlepageadsensepositions),

array("optionname" => "$o47",
"optiondescription" => "<p>$o48</p>",
"optionid" => $themeoptionsprefix."_noimagethumbnailstate",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $onoffops),

array("optionname" => "$o71",
"optiondescription" => "<p>$o72</p>",
"optionid" => $themeoptionsprefix."_alternateprepsimageurl",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $twops),

array("optionname" => "$o72a",
"optiondescription" => "<p>$o72b</p>",
"optionid" => $themeoptionsprefix."_alternatecropper",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $twops),

array("optionname" => "$o51",
"optiondescription" => "<p>$o52</p>",
"optionid" => $themeoptionsprefix."_turnonofftierx",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $offonops),

array("optionname" => "$o53",
"optiondescription" => "<p>$o54</p>",
"optionid" => $themeoptionsprefix."_tierxposition",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $tierxpos),


array("optionname" => "$o57",
"optiondescription" => "<p>$o58</p>",
"optionid" => $themeoptionsprefix."_rssblockshowhide",
"selectoptiondef" => "Select Option:",
"optiontype" => "select",
"options" => $showhideops),

array("optionname" => "$o59",
"optiondescription" => "<p>$o60</p>",
"optionid" => $themeoptionsprefix."_feedburnerurl",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$o61",
"optiondescription" => "<p>$o62</p>",
"optionid" => $themeoptionsprefix."_feedburnerid",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$o63",
"optiondescription" => "<p>$o64</p>",
"optionid" => $themeoptionsprefix."_rsssubscribeblockh2",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$o65",
"optiondescription" => "<p>$o66</p>",
"optionid" => $themeoptionsprefix."_rsssubscribeblocksubtext",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$o67",
"optiondescription" => "<p>$o68</p>",
"optionid" => $themeoptionsprefix."_rsssubscribeblocklinktext",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$o73",
"optiondescription" => "<p>$o74</p>",
"optionid" => $themeoptionsprefix."_languagefileonoff",
"optiontype" => "select",
"options" => $offonops),

);

function do_options_update_theme()
{
	global $this_theme, $options;

	if ( $_GET['page'] == basename(__FILE__) )
	{
		if ( 'updateoptions' == $_REQUEST['action'] )
		{

			foreach ($options as $optionvalue)
			{
				update_option( $optionvalue['optionid'], $_REQUEST[ $optionvalue['optionid'] ] );
			}

			foreach ($options as $optionvalue)
			{

					if( isset( $_REQUEST[ $optionvalue['optionid'] ] ) )
					{
						update_option( $optionvalue['optionid'], $_REQUEST[ $optionvalue['optionid'] ]  );
					}
					else
					{
						delete_option( $optionvalue['optionid'] );
					}

			}

			header("Location: admin.php?page=functions.php&optionsupdated=true");

			die;

		}
	}

	add_theme_page($this_theme." Options", $this_theme." Options", 'edit_themes', basename(__FILE__), 'do_page_newsmag640', $menuiconewsmag640);

}


function do_page_newsmag640 ()
{

	global $options, $this_theme;

?>


	<div class="wrap">

    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

	<h2><?php echo $this_theme; ?> Options</h2>

	<?php if ( $_REQUEST['optionsupdated'] ) { ?><?php echo "The options for $this_theme were saved";  } ?>

	<table>

<?php

		foreach ($options as $optionvalue)
		{

			if ( $optionvalue['optiontype'] <> "heading" )
			{

?>
				<tr>
				<td valign="top" style="margin:0px 25px 30px 0px;background:#eeeeee;padding:10px;"><?php echo $optionvalue['optionname']; ?></td>
				<td style="margin:0px 25px 30px 0px;background:#eeeeee;padding:10px;">
<?php
			}

				switch ( $optionvalue['optiontype'] )
				{
					case 'text':

?>
					<input name="<?php echo $optionvalue['optionid']; ?>" id="<?php echo $optionvalue['optionid']; ?>" type="<?php echo $optionvalue['optiontype']; ?>" value="<?php if ( get_settings( $optionvalue['optionid'] ) != "") { echo get_settings($optionvalue['optionid']); } else { echo $optionvalue['optionselectoptiondef']; } ?>" />

<?php

					break;
					case 'select':
?>
						<select name="<?php echo $optionvalue['optionid']; ?>" id="<?php echo $optionvalue['optionid']; ?>">
<?php

					foreach ($optionvalue['options'] as $option)
					{

?>
						<option<?php if ( get_settings( $optionvalue['optionid'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $optionvalue['optionselectoptiondef']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>

<?php
					}

?>
						</select>

<?php
					break;
					case 'textarea':
					$textareainput = $optionvalue['options'];

?>
						<textarea name="<?php echo $optionvalue['optionid']; ?>" id="<?php echo $optionvalue['optionid']; ?>" cols="100" rows="8"><?php  if( get_settings($optionvalue['optionid']) != "") { echo stripslashes(get_settings($optionvalue['optionid'])); } else { echo $optionvalue['optionselectoptiondef']; } ?></textarea>
<?php

					break;
					case "heading":

?>
						</table>
   						<h3 class="title"><?php echo $optionvalue['optionname']; ?></h3>
						<table>

<?php

					break;
					default:
					break;

				}

?>

<?php

				if ( $optionvalue['optiontype'] <> "heading" )
				{

?>
					<span><?php echo $optionvalue['optiondescription']; ?></span>
					</td></tr>

<?php

				}

?>

<?php

			}

?>

					</table>

					<p class="submit">
					<input name="updateoptions" type="submit" value="<?php _e("Update Options",'KarisanMediaTheme');?>" />
					<input type="hidden" name="action" value="updateoptions" />
					</p></form>
					</div>
<?php

}

add_action('admin_menu', 'do_options_update_theme');



?>
