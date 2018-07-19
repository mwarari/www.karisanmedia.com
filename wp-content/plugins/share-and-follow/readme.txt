=== Share and Follow ===
Contributors: andykillen
Donate link: http://phat-reaction.com/share-and-follow/donations
Tags: share, follow, facebook, youtube, reddit, digg, stumble, hyves, delicious, myspace, orkut, twitter, rss, social, bookmark, nofollow, new window, sidebar, shortcode, theme, widget, posts, pages, plugin, links, floating, fixed location, tab, google, pagerank, mixx, linkedin, yelp, rss comments, links, images, icons, flickr, email, mailto, newsfeed, google buzz, yahoo buzz, buzz, gravatar, Portuguese, newsletter, tumblr, xfire
Requires at least: 2.9.0
Tested up to: 2.9.2
Stable tag: 1.15.1

An easy Method of adding Share and Follow Links to Social Networking sites and RSS. Does not give away pagerank or stats to 3rd parties.

== Description ==

Designed for average users to use, ideal for developers who want to save time, this plugin gives links to the most prominent Social Networking sites for sharing and following, presented in many different formats (widgets/shortcode/template tag/auto added).  It offers the following features.

* a follow tab (facebook/rss/twitter/ etc.. ) to the top/bottom/left/right of the screen
* Automatic addition of the most popular share links to posts, pages, homepage or archive pages 
* Widget to manage Follow action
* Widget to manage Share actions
* Shortcode version for inside post or page for sharing
* Function access for theme tags for sharing or following
* Icons come in sizes 16, 24, 32, 48, 60 px
* Can be displayed as Icon, Icon + Text or Text only
* Users can change all link text at will
* Head section Style or external CSS control of content
* Does not give away pagerank ( rel="nofollow" is set in links )
* All items open in a new tab keeping focus on the original blog
* Configuration of default Share Image on a post, page, archive or homepage level (the image facebook shows in news feed).
* Support for English, Dutch, French and Portuguese words for text replacement

Online demo here [example link](http://phat-reaction.com/share-and-follow/).  

Documentation for

* Using the [shortcode](http://phat-reaction.com/share-and-follow/share-and-follow-wordpress-plugin-documentation/using-the-shortcode-in-a-page-or-post/) for share links
* Implementing the plugin in a [theme](http://phat-reaction.com/share-and-follow/share-and-follow-wordpress-plugin-documentation/implementing-the-share-links-into-a-theme/)
* Using the [share widget](http://phat-reaction.com/share-and-follow/share-and-follow-wordpress-plugin-documentation/using-the-share-links-widget/)
* Using the [follow widget](http://phat-reaction.com/share-and-follow/share-and-follow-wordpress-plugin-documentation/using-the-follow-links-widget/)
* Administering the automatically added [share links](http://phat-reaction.com/share-and-follow/share-and-follow-wordpress-plugin-documentation/setting-up-the-share-links-through-the-admin-screen/)
* Administering the [Follow Tab](http://phat-reaction.com/share-and-follow/share-and-follow-wordpress-plugin-documentation/setting-up-the-follow-links-in-admin-screen/)
* Working with [popular themes](http://phat-reaction.com/share-and-follow/share-and-follow-wordpress-plugin-documentation/working-with-popular-themes/)

tell me what you want [in the next version](http://phat-reaction.com/share-and-follow/what-do-you-want/)?

many items have been added to this plugin based on suggestions or requests from others, please join the conversation.


== Installation ==

This section describes how to install the plugin and get it working.

It can be installed in two ways, firstly by downloading the plugin from the Wordpress directory website or by via the Wordpress admin page for adding a new plugin

Downloading from Wordpress Website

1. Download the plugin from the wordpress plugin directory
2. Unzip the plugin
3. Upload `/share-and-follow/` directory to the `/wp-content/plugins/` directory
4. Activate the plugin through the 'Plugins' menu in WordPress
5. Administer it from the 'Settings' menu using the 'Share and Follow' menu item

Using the Wordpress Admin page for installing

1. Go to the admin page and select the 'Plugins' menu, using the 'Add new' menu item
2. Search for 'share and follow'
3. Select install for the plugin 'Share and Follow' by Andy Killen
4. Activate the plugin through the 'Installing Plugin' page in WordPress
5. Administer it from the 'Settings' menu using the 'Share and Follow' menu item


**important** you must fill out the Follow links in the Share and Follow admin page for any follow link to display except RSS.  The RSS link is the standard one for your site, however you will need to enter your own links for your Fcebook fan page, YouTube Channel and other follow links.  If you leave the links blank the system will not display the icons or text on your pages/posts.

== Frequently Asked Questions ==

= Does this system use Javascript? =

Only on the link for MySpace Sharing,  it uses a javascript to open a nice window rather than a whole tab.  There is no other javascript used.  It does not load jquery or any other framework.

= Does phat reaction (makers of the plugin) or any other party collect stats about link clicks? =

We do not save any data about your links and if they are clicked. This means that your business is your own, you are not giving away a part of it to a 3rd party.

= What size icons can I use? =

You can any of the following sizes 16X16px, 24X24px, 32X32px, 48X48px, 60X60px

= How does it stop me loosing pagerank and why is that important? =

The plugin has the item rel="nofollow" item inside each of the links that are placed on a page.  This means that when the google bot comes to your site it will not follow those links and give them a part of your pagerank.  Your pagerank is important to you as it will place you higher in google organic rankings when it is higher than other information sources or your competitors.

= How does the Follow tab work =

The plugin adds a DIV at the bottom of the HTML just before the closing body tag, this div element is positioned absolutely in the place that you want, Top - Bottom - Left - Right.

* **Top :** If placed at the top of the page it also adds padding of the same height to the Body element, pushing your content down. There is no text replacement available, use CSS to style. Use #follow in CSS
* **Bottom :** If placed at the bottom of the page, there is no text replacement available as you can style your own text via CSS (use your theme CSS for best results). Use #follow in CSS
* **Left :** Places a tab on the left of the screen.  Icon only or Text replacement available (vertical text)
* **Right :** Places a tab on the Right of the screen.  Icon only or Text replacement available (vertical text)

= Does the Follow tab or the addition of share links to the bottom of posts and pages effect the widgets? =

No they all function independently. You can turn on an off each element as you like.  However for any of the Follow links to work, you will need to enter your details into the admin screen, using 'Settings' menu and the 'Share and Follow' menu item

= Can I have different widget configuration on different sidebars? =

The widgets are setup to allow you to use it differently on every sidebar you have, or the same on all.  They can be implemented on many sidebars at once.

= Does the share links have to display on every page and post? =

Nope you have quite a lot of control.  You can choose to show it or not show it on

* posts
* pages
* homepage
* archive pages such as tags, catalog, archive, date

Also you can exclude pages just by entering them in a comma seperated list. 

= Where do the icons come from ? =

For the default icon set it is a mix of [komodo social networking pack](http://www.komodomedia.com/blog/2009/06/social-network-icon-pack/) and [Social.me icon pack](http://jwloh.deviantart.com/art/Social-me-90694011) from jwhol, and some added icons created by Andy Killen.  All other sets are made by Neville Raven.

== Usage ==
= Setting up the Share Links in admin screen =

To configure the Share links in the admin screen, you will need to login as an administrator of your wordpress system.
Once logged into the admin screen of your wordpress, go to the *'Settings'* menu and then the *'Share and Follow'* menu item.

The Share options are at the Top of the screen (on the left if you are viewing in HD), in this section you can choose the settings of the automatically added links to all pages and posts.  The settings you can configure here are

* If the automatically added links display at all. there is a radio button to turn them on and off
* The Style of the link is offered as a drop down list.
* The Size of icons to use as a drop down list (16, 24, 32, 48 and 60px)
* The spacing in PX between your links
* The links to display as a checkbox on/off
* If it should display the word 'share' as a prefix to the icon list as a checkbox.
* The text of the links to display as a text entry

Once you have changed it all to be how you want, click the update settings box.

**important**  this only manages the automatically added share links, not any other kind (i.e. widget or function share options).

= Setting up the Follow Links in admin screen =

To configure the Follow links in the admin screen, you will need to login as an administrator of your wordpress system.
Once logged into the admin screen of your wordpress, go to the *'Settings'* menu and then the *'Share and Follow'* menu item.

The Follow options are in the middle that page (on the right if you are viewing in HD), in this section you can choose the settings of the Follow links to all web pages.  The settings you can configure here are

* If the Follow tab should be show at all. You can turn it on and off with the radio button
* The background and the border color of the Follow tab as text box entries (do not include the # in the HEX color number)
* The location on screen of the Follow tab is setup with a drop down list (top/bottom/left/right)
* The dispaly Style can be setup with a drop down list (Icon only, Text only, Text and Icon or Text replacement)
* The Follow word on text replacement the color it should be is setup with a drop down list
* The size of the icons 16, 24, 32, 48, 60 px as a drop down list
* Which links to display as a checkbox on/off
* What the links should say as textbox input
* Where the links should go as a textbox input

Once you have changed it all to be how you want, click the update settings box.

**important** none of the follow links except RSS will show until you have setup the Follow links setion here.

= Putting this plugin into a Wordpress Theme =

There are two ways of implementing this plugin directly into a theme, you can either use the simplified functions of

**the_share_links()** prints where it is placed a un-ordered &lt;ul&gt; list of links

        <?php the_share_links(); ?>

Or

**get_the_share_links()** returns the content of un-ordered &lt;ul&gt; list of links as a variable

        <?php get_the_share_links(); ?>

These will only return the share links for Facebook, Twitter, Digg, Delicious and Reddit, with Icons and text in a row.

Or the much more complex but useable **social_links($args)**

        <?php

        $perma=get_permalink();
        $title=get_the_title();
        $postid = get_the_ID();
        $args = array (
                    'page_id' => $postid,
                    'heading' => "1",
                    'size' => "16",
                    'list_style' => "icon_text",
                    'direction' => 'down',
                    'facebook' => 'yes',
                    'twitter'=>'yes',
                    'delicious'=>'yes',
                    'digg'=>'yes',
                    'reddit'=>'yes',
                    'mixx'=>'no',
                    'myspace'=>'no',
                    'hyves'=>'no',
                    'orkut'=>'no',
                    'share'=>'yes',
                    'email'=>'no',
                    'post_rss'=>'no',
                    'page_title'=>$title,
                    'page_link'=>$perma,
                    'echo'=>'0',
                    'facebook_share_text' => 'Recommend on Facebook',
                    'stumble_share_text'=> 'Share with Stumblers',
                    'twitter_share_text'=>'Tweet this',
                    'delicious_share_text'=>'Bookmark on Delicious',
                    'digg_share_text'=>'Digg this',
                    'reddit_share_text'=>'Share on Reddit',
                    'hyves_share_text'=>'Tip on Hyves',
                    'orkut_share_text'=>'Share on Orkut',
                    'myspace_share_text'=>'Share via MySpace',
                    'mixx_share_text'=>'Mixx it up',
                    'email_share_text'=>'Tell a friend',
                    'post_rss_share_text'=>'Subscribe to the comments',
                    'email_body_text'=>'I found this link for you'

        );
        social_links($args);
        ?>

what the arguments do

* **page_id** ID of current post, use the *$postid = get_the_ID();* as suggested
* **heading** 0 = don't show a heading, 1= show the heading
* **size** can any of the follow 16, 24, 32, 48, 60
* **list_style** can be "icon_text", "iconOnly" or "text_only"
* **direction** can be with 'down' or 'row'. Down is a downwards list, row is on one line, best with icon only
* **facebook** display the facebook link 'yes' or 'no'
* **twitter** display the twitter link 'yes' or 'no'
* **delicious** display the delicious link 'yes' or 'no'
* **digg** display the digg link 'yes' or 'no'
* **reddit** display the reddit link 'yes' or 'no',
* **myspace** display the myspace link 'yes' or 'no'
* **mixx** display the mixx link 'yes' or 'no'
* **hyves** display the hyves link 'yes' or 'no'
* **orkut** display the orkut link 'yes' or 'no'
* **rss** display the rss link 'yes' or 'no' (links to RSS comments for that page or post)
* **share** display the word 'share' at the beginning of the list 'yes' or 'no'
* **page_title** the Title of the current post or page, use  *$title=get_the_title()* as suggested
* **page_link** the Permalink of the current page or post, use *$perma=get_permalink();* as suggested
* **echo**  Set to 0 to print the element, 1 to return the variable
* **facebook_share_text** lets you change the facebook share text away from the standard (don't make it blank, use another list_style)
* **stumble_share_text** lets you change the stumble upon share text away from the standard
* **twitter_share_text** lets you change the twitter share text away from the standard
* **delicious_share_text** lets you change the delicious  share text away from the standard
* **digg_share_text** lets you change the digg share text away from the standard
* **reddit_share_text** lets you change the reddit  share text away from the standard
* **hyves_share_text** lets you change the hyves share text away from the standard
* **orkut_share_text** lets you change the orkut share text away from the standard
* **myspace_share_text** lets you change the myspace share text away from the standard
* **post_rss_share_text** lets you change the RSS subscribe text away from the standard
* **email_body_text** lets you change the email body text text away from the standard (what actually goes into the email)
* **email_share_text** lets you change the email body text text away from the standard

**Important** you don't have to do all of these options, only the ones you want to change away from the norm.  The listed one inside the PHP tags is the standard set.

= Using the plugin as a shortcode directly in the post or page =

Yes there is a short code available *[share_links]*, it can be placed into any post or page in the Visual or HTML tab.

Basic version

    [share_links]

which can be placed anywhere in a post or page.  It shows as standard links to Facebook, stumble upon, orkut, digg, reddit, delicious, twitter and myspace without the words 'share' as the first list item and using icons of 16X16px and showing text.
**here are the defaults presented as an  array.**

        shortcode = array (
                                'size' => "16",
                                'list_style' => "icon_text",
                                'direction' => 'down',
                                'share'=>'no',
                                'facebook'=>'yes',
                                'stumble'=>'yes',
                                'hyves'=>'no',
                                'orkut'=>'yes',
                                'digg'=>'yes',
                                'reddit'=>'yes',
                                'delicious'=>'yes',
                                'twitter'=>'yes',
                                'myspace'=>'yes',
                                'mixx'=>'no',
                                'email'=>'no',
                                'post_rss'=>'yes',
    );

It can be used in the full version of

    [share_links facebook="yes" twitter="yes" hyves="yes" stumble="yes" twitter="yes" delicious="yes" digg="yes" reddit="yes" orkut="yes" myspace="yes" mixx="yes" post_rss="yes" share="yes" direction="row" size="24" style="iconOnly"]

* Change the word *yes* to *no* to make it not display that link or word (share)
* Changed the direction from *down* to *row* to change the way it displays on screen, or
* Change list_style to *text*, *icon_text* or *iconOnly*
* Change the size to any of the following 16, 24, 32, 48, 60

It can also be used in this format

    [share_links]
    <div style="float: right; width: 200px;">
    <h4>share this post</h4>
    [/share_links]
    </div>

This means that the content between the [share_links] [/share_links] will be displayed with the share links themselves.  The share links are placed where the [/share_links] is located.

= Share URL Images =

By configuring the admin screen for Share URL images, the system will setup default images that social networks like Facebook will default to in their Newsfeed and share URL applications.

The system can use a defaul gravatar image, dynamic gravatar based on author, a site logo, an image from the page or if wanted a default image for posts, pages, homepage or archive pages.

The on screen admin page has comprehensive instructions on it. 

== Screenshots ==

1. using &lt;?php the_share_links(); ?&gt; in a theme
2. using [share_links] inside the post
3. Share links widget in sidebar
4. Follow links widget in sidebar
5. Follow sidebar tab with text replacement
6. Share widget in admin screen
7. Follow widget in admin screen
8. Share and Follow admin screens
9. Auto added to the end of a post or page, 32x32 icon only example
10. example of top follow bar
11. Share image configuration

== Changelog ==

= 1.15.1 =

release fix

= 1.15 =

* xfire and tumblr added.
* removed a bunch of kb by crushing png's and removing unneeded files.
* significantly reduced install and upgrade time

= 1.14 =

* easy number system for releases
* changed follow links mouseover text


= 1.11.20 =

Added

* newletter to follow tab and follow widget and newsletter icon
* css/image control setting in widgets now seperate from share auto-added icons
* Added "Follow Me, Follow Us, Volg Onze, Vol mij, Juntar, Comunicar, Conectar, Rede, Resenhas, Siga-me, Siga-nos, Siguer" to the text replacement
* Added Portuguese suppoert

= 1.11.16 =

* added strip/add slashes to all link text fields so you can have 1'st or review's
* added default image to share-image URL, now defaults to website logo, so share image URL is always full
* fixed issues with curpageurl() that were hiding
* further enhanced the default theme support

= 1.11.15 = 

* Found an issue with the CSS builds where it was not adding theme support correcly.
* Enhanced default theme support
* Added Dojo theme support (thanks to John Marquess)
* Added missing LasftFM text replacement item.

= 1.11.14 =

same as 1.11.13 but released 2 times due to slowness at wordpress.


= 1.11.13 =

Added

* last FM icon
* proper localization for share/follow icons
* French, Dutch and English text replacement words
* Color picker for the follow tab
* changed the admin menu a bit to offer more clear info and better space usage

= 1.11.12 =

* fixed issues with share image not showing over-ride image
* Added share text heading admin function
* brought curPageUrl function into class so it would not interfear with other themes/plugins
* reduced overall code by 5K

= 1.11.11 =

Finally fixed the share image URL
added:

* alternate word choice for follow tab heading
* css image/html support extended to widgets also
* Can change text for follow heading also

= 1.11.10 =

Added print CSS support, fixed share image  URL issue on post and pages. Added Theme support to CSS area

= 1.11.9 =

re-release due to worpdress update process trying to download the wrong ZIP

= 1.11.8 =

Fixed print links and improved page excludes for auto share links, and offer html images also now

= 1.11.7 =
Added 

* print icon
* share image admin screen
* add css to css file from admin screen
* google buzz and yahoo buzz icons

= 1.11.5 =

email icon and mailto capibility added, fixed shortcode issue

= 1.11.5 =

* updated RSS text entry and capility in widget.
* Added localization.
* Sorted out RSS checkbox on admin.

= 1.11.4 =

Updated RSS links to deal with permalink and none permalink structure

= 1.11.3 =

Fixed follow widget text change issues.

= 1.11.2 =

* Added Flickr Linkedin and Yelp to follow tab and widget
* Added Mixx to share widget and auto added icons in posts
* Added "Subscribe to RSS Comments" icon to auto added items
* Made follow text replacement look better with improved images and css
* Updated Hyves icon to a new version
* Added greater definition  to link text with "blog" and "post" keyword.
* Changed the way the follow tab is administered.

= 1.11.1 =

fixed icon style in admin screen. improved documentation

= 1.11 =

Yet another attempt to release the same version as 1.1  release 1.1.2 did not even get zipped and 1.1 / 1.1.1 did not get propagated

= 1.1.2 =

try number 2 at releasing at update. 

= 1.1.1 =

wordpress did not propagating the last release, re-releasing.


= 1.1 =

* Fixed YouTube follow link problem
* replaced missing rel="nofollow" and target="_blank"
* fixed spelling mistake "Recommend" on share link defaults
* Improved documentation (readme.txt)


= 1.0 =
First edition no change log at present.

== Upgrade Notice ==

= 1.15.1 =

release fix.

= 1.15 =

xfire and tumblr added


= 1.14 =

change the way the follow mouse over text works. 

= 1.11.20 =

Added Portuguese, Newletter, Css/Image selection enhanced

= 1.11.16 =

more theme support for Default theme, better text support for links, better default image for share image URL


= 1.11.15 =

get some extra theme support. CSS works better than ever for default theme. and LastFM's text replacement now works.


= 1.11.13 =

New icons, new French, English and Dutch text replacement...  Better .po file support all round.

= 1.11.12 =

Simple upgrade to offer share heading text admin, bring a function into the class and remove 5k of code. Upgrade to Share Image also.

= 1.11.11 =

Finally fixed the Share Image URL from post/page issue.  do upgrade.......(other nice stuff too)

= 1.11.10 =

Added print CSS support, fixed share image  URL issue on post and pages. Added Theme support to CSS area

= 1.11.9 =

re-release due to worpdress update process trying to download the wrong ZIP

= 1.11.8 =

Fixed print links and improved page excludes for auto share links, and offer html images also now

= 1.11.7 =

added loads, important Facebook share configuration.

= 1.11.6 =

email icon and mailto capibility added, fixed shortcode issue

= 1.11.5 =

updated RSS text entry and capility in widget.  Added localization, rss checkbox fix.

= 1.11.4 =

Fixed RSS feeds for non permalink structure. 

= 1.11.3 =

Fixed follow widget.

= 1.11.2 =

New icons and functionality added to both Share and Follow options.

= 1.11.1 = 

upgrades documentation and fixes automatically added icons display style

= 1.11 =

another attempt to release version 1.0 properly.

= 1.1.2 = 

release of 1.0 

= 1.1.1 =

re-releasing due to wordpress not propagating 1.1

= 1.1 =

Important to update if you use the YouTube follow link

= 1.0 =
First edition