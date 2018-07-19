<?php
        $buildCss =''; // start of CSS or head section build
        $buildCss .="/* cssid=".$devOptions['cssid']."                            */   \n";
        $buildCss .="/* WARNING!! this file is dynamicaly generated changes will  */ \n";
        $buildCss .="/* be overwritten with every change to the admin screen.      */ \n";
        $buildCss .="/* You can add css to this file in the admin screen.       */ \n\n\n\n\n";

        if ($devOptions['follow_location'] == "right" || $devOptions['follow_location'] == "left") {
            if ($devOptions['follow_location'] == "right") {$corner = 'left';}else{$corner = 'right';} // border corner
        $buildCss .= "#follow.".$devOptions['follow_location']." {width:";
            if ('text_replace'==$devOptions['follow_list_style'])
                {$buildCss .= "30";}
            else { $buildCss .= $devOptions['tab_size']+8;} // width of tab
           $buildCss .= "px;position:fixed; ";
           $buildCss .= $devOptions['follow_location']; // left or right side
           $buildCss .= ":0; top:100px;";
                if ($devOptions['background_transparent']!='yes')
                {$buildCss .= "background-color:#".$devOptions['background_color'].";";}
           $buildCss .= "padding:10px 0;font-family:impact,charcoal,arial, helvetica,sans-serif;-moz-border-radius-top".$corner.": 5px;-webkit-border-top-".$corner."-radius:5px;-moz-border-radius-bottom".$corner.":5px;-webkit-border-bottom-".$corner."-radius:5px;";
               if ($devOptions['border_transparent']!='yes'){ $buildCss .= "border:2px solid #".$devOptions['border_color'].";border-".$devOptions['follow_location']."-width:0}";}
               else {$buildCss .= "}";}
               $buildCss .= "#follow.".$devOptions['follow_location']." ul {padding:0; margin:0; list-style-type:none !important;font-size:24px;color:black;}\n #follow.".$devOptions['follow_location']." ul li {padding-bottom:10px;list-style-type:none !important;margin:4px;}\n";
            //end of box setup
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.".$devOptions['word_value']." {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/".$devOptions['word_value']."/".$devOptions['word_value']."-word-".$devOptions['follow_color']."-".$devOptions['follow_location'].".png) no-repeat;";
            switch($devOptions['word_value']){
                    case "follow":
                        $buildCss .="height:79px;";
                    break;
                    case "followme":
                        $buildCss .="height:114px;";
                    break;
                    case "followus":
                        $buildCss .="height:107px;";
                    break;
                    case "connect":
                        $buildCss .="height:99px;";
                    break;
                    case "aansluiten":
                        $buildCss .="height:125px;";
                    break;
                    case "ajouter":
                        $buildCss .="height:89px;";
                    break;
                    case "chat":
                        $buildCss .="height:64px;";
                    break;
                    case "communicate":
                        $buildCss .="height:155px;";
                    break;
                    case "deelnemen":
                        $buildCss .="height:129px;";
                    break;
                    case "join":
                        $buildCss .="height:56px;";
                    break;
                    case "mededeling":
                        $buildCss .="height:134px;";
                    break;
                    case "network":
                        $buildCss .="height:98px;";
                    break;
                    case "overzichten":
                        $buildCss .="height:132px;";
                    break;
                    case "publications":
                        $buildCss .="height:143px;";
                    break;
                    case "rejoindre":
                        $buildCss .="height:111px;";
                    break;
                    case "reseau":
                        $buildCss .="height:87px;";
                    break;
                    case "reviews":
                        $buildCss .="height:95px;";
                    break;
                    case "seconnecter":
                        $buildCss .="height:147px;";
                    break;
                    case "suivre":
                        $buildCss .="height:79px;";
                    break;
                    case "toevoegen":
                        $buildCss .="height:120px;";
                    break;
                     case "verbinden":
                        $buildCss .="height:117px;";
                    break;
                    case "volgen":
                        $buildCss .="height:82px;";
                    break;
                    case "volgonze":
                        $buildCss .="height:108px;";
                    break;
                    case "volgmij":
                        $buildCss .="height:95px;";
                    break;
                    case "comunicar":
                        $buildCss .="height:127px;";
                    break;
                    case "conectar":
                        $buildCss .="height:107px;";
                    break;
                    case "juntar":
                        $buildCss .="height:80px;";
                    break;
                    case "rede":
                        $buildCss .="height:63px;";
                    break;
                     case "resenhas":
                        $buildCss .="height:111px;";
                    break;
                    case "seguir":
                        $buildCss .="height:81px;";
                    break;
                    case "sigame":
                        $buildCss .="height:97px;";
                    break;
                    case "siganos":
                        $buildCss .="height:103px;";
                    break;
                    default:
                        $buildCss .="height:79px;";
                    break;
            }
            $buildCss .="margin:0 0 10px 4px;}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li a {display:block;}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.facebook {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/facebook-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
            $buildCss .=" height:91px;width:20px}\n";
            $buildCss .= "#follow.".$devOptions['follow_location']." ul li.text_replace a.facebook:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/facebook-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.twitter {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/twitter-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
            $buildCss .= "height:65px;width:20px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.twitter:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/twitter-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;\n}";}else{$buildCss .= "left;\n}";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.rss {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/rss-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:31px; width:20px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.rss:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/rss-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;\n}";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.stumble {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/stumble-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:134px; width:21px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.stumble:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/stumble-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.youtube {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/youtube-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:81px; width:21px}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.youtube:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/youtube-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.myspace {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/myspace-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:90px; width:19px}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.myspace:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/myspace-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.orkut {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/orkut-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:58px;width:20px}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.orkut:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/orkut-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.hyves {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/hyves-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:58px;width:20px}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.hyves:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/hyves-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.yelp {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/yelp-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:44px;width:21px}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.yelp:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/yelp-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.linkedin {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/linkedin-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:80px;width:20px}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.linkedin:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/linkedin-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.flickr {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/flickr-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .=" height:53px;width:20px}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.flickr:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/flickr-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.google_buzz {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/google_buzz-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:102px; width:21px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.google_buzz:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/google_buzz-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.yahoo_buzz {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/yahoo_buzz-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:97px; width:21px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.yahoo_buzz:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/yahoo_buzz-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.lastfm {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/lastfm-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:65px; width:21px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.lastfm:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/lastfm-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}

            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.newsletter {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/newsletter-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:105px; width:20px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.newsletter:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/newsletter-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}

            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.tumblr {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/tumblr-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:60px; width:20px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.tumblr:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/tumblr-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}

            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.xfire {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/xfire-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "left;";}else{$buildCss .= "right;";}
                $buildCss .="height:41px; width:20px}\n";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a.xfire:hover {background:transparent url(".WP_PLUGIN_URL."/share-and-follow/images/impact/xfire-word-".$devOptions['follow_location'].".png) no-repeat top ";
                if ($devOptions['follow_location']=='right'){$buildCss .= "right;}\n";}else{$buildCss .= "left;}\n";}



            $buildCss .="#follow.".$devOptions['follow_location']." ul li.".$devOptions['word_value']." span, #follow ul li a span {display:none}";
        }
        // end of text replacement stuff

        // do bottom area
        if ($devOptions['follow_location'] == "bottom"  && $devOptions['follow_list_style'] == "text_replace" ){
            $buildCss .="#follow.bottom {width:100%; position:fixed; left:0px; bottom:0px;";
            if ($devOptions['background_transparent']!='yes'){$buildCss .="background-color:#".$devOptions['background_color'].";}";}
            $buildCss .="font-family:impact,charcoal,arial, helvetica,sans-serif;";
            if ($devOptions['border_transparent']!='yes'){$buildCss .="border:2px solid #".$devOptions['border_color'].";border-width:2px 0 0 0;";}
            $buildCss .="}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul {padding:0 0 0 20px; margin:0; list-style-type:none !important;font-size:24px;color:black;}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li {";
            if ('text_replace'==$devOptions['follow_list_style']){$buildCss .="margin-left:4px;";}else { $buildCss .="margin:4px;";}
            $buildCss .="padding-bottom:10px;list-style-type:none !important; display:inline;}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.follow {color:#".$devOptions['follow_color'].";}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li a {margin-right:10px; background-image:none !important}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a {color:white;text-decoration:none;}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a:hover {color:black}";
        } else if ($devOptions['follow_location'] == "bottom"  && $devOptions['follow_list_style'] != "text_replace" ){
            $buildCss .="#follow.bottom {width:100%; position:fixed; left:0px; bottom:0px;";
            if ($devOptions['background_transparent']!='yes'){$buildCss .= "background-color:#".$devOptions['background_color'].";" ;}
            if ($devOptions['border_transparent']!='yes'){$buildCss .="border:2px solid #".$devOptions['border_color'].";border-width:2px 0 0 0;}";}
            $buildCss .="#follow.bottom ul {padding-left:20px;list-style-type:none;} #follow.bottom ul li {float:left;padding-top:4px;margin-right:10px;list-style-type:none;}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.follow {color:#".$devOptions['follow_color'].";line-height:".$devOptions['tab_size']."px;}";
        }
        //do top area
    if ($devOptions['follow_location'] == "top"  && $devOptions['follow_list_style'] == "text_replace" ){
            $buildCss .="#follow.top {width:100%; position:fixed; left:0px; top:0px;";
            if ($devOptions['background_transparent']!='yes'){ $buildCss .="background-color:#".$devOptions['background_color'].";";}
            $buildCss .="font-family:impact,charcoal,arial, helvetica,sans-serif;";
            if ($devOptions['border_transparent']!='yes'){ $buildCss .="border:2px solid #".$devOptions['border_color'].";border-width:0px 0 2px 0;}";}
            $buildCss .="#follow.".$devOptions['follow_location']." ul {padding:0 0 0 20px; margin:0; list-style-type:none !important;font-size:24px;color:black;}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li {";
            if ('text_replace'==$devOptions['follow_list_style']){$buildCss .="margin-left:4px;";}else { $buildCss .="margin:4px;";}
            $buildCss .="padding-bottom:10px;list-style-type:none !important; display:inline;}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.follow {color:#".$devOptions['follow_color'].";}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li a {margin-right:10px; background-image:none !important}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a {color:white;text-decoration:none;}";
            $buildCss .="#follow.".$devOptions['follow_location']." ul li.text_replace a:hover {color:black;}";
    } else if ($devOptions['follow_location'] == "top" && $devOptions['follow_list_style'] != "text_replace" ){
            $buildCss .="#follow.top {width:100%; position:fixed; left:0px; top:0px;";
            if ($devOptions['background_transparent']!='yes'){
                $buildCss .="background-color:#".$devOptions['background_color'].";";
            }
            if ($devOptions['border_transparent']!='yes'){
                $buildCss .="border:2px solid #".$devOptions['border_color'].";border-width:0 0 2px 0;}";
                $buildCss .="#follow.top ul {padding-left:20px;list-style-type:none;}";
                $buildCss .="#follow.top ul li {float:left;padding-top:4px;margin-right:10px;list-style-type:none;}";
                $buildCss .="#follow.".$devOptions['follow_location']." ul li.follow {color:#".$devOptions['follow_color'].";line-height:".$devOptions['tab_size']."px;}";
                $buildCss .="body {padding-top:". ($devOptions['tab_size']+8)."px}";
            }
    }
    // add icons to set
    $args=array(16,24,32,48,60);
    foreach ($args as $value){
        $buildCss .=".size".$value." .digg{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/digg.png) no-repeat}\n";
        $buildCss .=".size".$value." .twitter{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/twitter.png) no-repeat}\n";
        $buildCss .=".size".$value." .stumble{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/stumbleupon.png) no-repeat}\n";
        $buildCss .=".size".$value." .reddit{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/reddit.png) no-repeat}\n";
        $buildCss .=".size".$value." .delicious{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/delicious.png) no-repeat}\n";
        $buildCss .=".size".$value." .hyves{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/hyves.png) no-repeat}\n";
        $buildCss .=".size".$value." .facebook{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/facebook.png) no-repeat}\n";
        $buildCss .=".size".$value." .orkut{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/orkut.png) no-repeat}\n";
        $buildCss .=".size".$value." .myspace{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/myspace.png) no-repeat}\n";
        $buildCss .=".size".$value." .rss{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/rss.png) no-repeat}\n";
        $buildCss .=".size".$value." .youtube{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/youtube.png) no-repeat}\n";
        $buildCss .=".size".$value." .linkedin{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/linkedin.png) no-repeat}\n";
        $buildCss .=".size".$value." .yelp{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/yelp.png) no-repeat}\n";
        $buildCss .=".size".$value." .flickr{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/flickr.png) no-repeat}\n";
        $buildCss .=".size".$value." .mixx{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/mixx.png) no-repeat}\n";
        $buildCss .=".size".$value." .email{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/email.png) no-repeat}\n";
        $buildCss .=".size".$value." .print{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/print.png) no-repeat}\n";
        $buildCss .=".size".$value." .yahoo_buzz{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/yahoobuzz.png) no-repeat}\n";
        $buildCss .=".size".$value." .google_buzz{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/google_buzz.png) no-repeat}\n";
        $buildCss .=".size".$value." .feedback{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/feedback.png) no-repeat}\n";
        $buildCss .=".size".$value." .newsletter{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/newsletter.png) no-repeat}\n";
        $buildCss .=".size".$value." .lastfm{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/lastfm.png) no-repeat}\n";
        $buildCss .=".size".$value." .newsletter{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/newsletter.png) no-repeat}\n";
        $buildCss .=".size".$value." .xfire{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/xfire.png) no-repeat}\n";
        $buildCss .=".size".$value." .tumblr{background: transparent url(".WP_PLUGIN_URL."/share-and-follow/default/".$value."/tumblr.png) no-repeat}\n";
    }
    $buildCss .=".share {margin:0 ".$devOptions['spacing']."px ".$devOptions['spacing']."px 0;}\n";
    $buildCss .=".phat span {display:inline;}\n";
    $buildCss .=".size32 li.icon_text a {line-height:34px;padding-left:40px;}\n";
    $buildCss .=".size16 li.icon_text a {padding-left:20px;line-height:20px;}\n";
    $buildCss .=".size24 li.icon_text a {line-height:30px;padding-left:30px;}\n";
    $buildCss .=".size48 li.icon_text a {line-height:56px;padding-left:56px;}\n";
    $buildCss .=".size60 li.icon_text a {line-height:70px;padding-left:70px;}\n";
      if ($devOptions['css_images']=='yes'){
          $buildCss .="ul.row li {float:left;list-style-type:none;}\n";
          $buildCss .="li.icon_text a {background-position:left center;display:block}\n";
          $buildCss .="li.text_only a {background-image:none !important;padding-left:0;}\n";
          $buildCss .="li.iconOnly a span.head {display:none}\n";
          $buildCss .="li.iconOnly a {display:block;margin:0 ".$devOptions['spacing']."px ".$devOptions['spacing']."px 0; padding:0 !important;}\n";
          $buildCss .="#follow.left li.iconOnly a,  #follow.right li.iconOnly a {display:block;margin:0 auto; padding:0 !important;    background-color:transparent;}\n";
          $buildCss .="#follow.left ul.size16 li.follow{margin:0px auto !important}\n";
        }
      if ($devOptions['css_images']=='no'){
          $buildCss .="li.icon_text a {padding-left:0;}\n";
          $buildCss .="li.text_only a {background-image:none !important;padding-left:0;}\n";
          $buildCss .="li.iconOnly a span.head {display:none}\n";
          $buildCss .="li.iconOnly a {margin:0 ".$devOptions['spacing']."px ".$devOptions['spacing']."px 0; padding:0 !important;}\n";
          $buildCss .="ul.row li {display:inline}\n";
        }
    $buildCss .=".size16 li.iconOnly a {height:16px;width:16px;}\n";
    $buildCss .=".size24 li.iconOnly a {height:24px;width:24px;}\n";
    $buildCss .=".size32 li.iconOnly a {height:32px;width:32px;}\n";
    $buildCss .=".size48 li.iconOnly a {height:48px ;width:48px;}\n";
    $buildCss .=".size60 li.iconOnly a {height:60px ;width:60px;}\n";
    $buildCss .="ul.socialwrap {list-style-type:none;margin:0; padding:0}\n";
    $buildCss .="ul.socialwrap li {list-style-type:none;}\n";
    $buildCss .="ul.followwrap {list-style-type:none;margin:0; padding:0}\n";
    $buildCss .="ul.followrap li {list-style-type:none;}\n";
    $buildCss .="div.clean {clear:left;}\n";
    //
    // end of standard CSS style setup
    //

    //
    // theme support
    //
    if ($devOptions['theme_support']!= 'none') {
        $buildCss .=  "/* adding theme support for ".$devOptions['theme_support']."   */ \n";
            switch($devOptions['theme_support']){
                case "default":
                        $buildCss .= ".entry ul.socialwrap li:before, #sidebar ul li.share_links ul.socialwrap li:before, #sidebar ul li.follow_links ul.followwrap li:before, #content .entry ul.socialwrap li:before {content: \"\" !important;}
                        .entry ul.socialwrap li{padding:0;margin:0;}
                        .entry ul.socialwrap li a span {padding-left:9px;}
                        .entry ul.socialwrap {padding:0;margin-top:20px}
                        #follow ul {margin:0}\n";
                        break;
                case "choco":
                        $buildCss .= ".post ul.socialwrap {margin-left:0 !important; margin-top:20px; clear:left;}
                        .post .bg ul.socialwrap {margin-left:0 !important; margin-top:0px}\n";
                        break;
                case "arjuna":
                        $buildCss .= ".postContent ul.socialwrap li {margin-left:0; clear:left;}
                        .postContent ul.socialwrap {margin-top:20px;}\n";
                        if ($devOptions['follow_location']=='top'){
                            $buildCss .= ".headerBG {top:10px;}
                            .header {margin-top:10px;}\n";
                        }
                        break;
                case "dojo":
                    $buildCss .=  " .content ul.socialwrap li {margin-left:0px;}
                                    .content ul.socialwrap {margin-top:20px;}";
                        break;
                case "intrepidity":
                        $buildCss .= ".entry_content ul.socialwrap {padding-left:0 ;margin-top:20px}";
                        if ($devOptions['follow_location']=='top'){
                            $buildCss .= "#bg {margin-top:".($devOptions['size']+8)."px;}\n";
                        }
                        break;
                case "thesis":
                        $buildCss .= "#footer #follow a {border-width:0;}";
                        if ($devOptions['follow_location']=='left' || $devOptions['follow_location']=='right'){
                        $buildCss .= "#footer #follow li {display:block}";
                        }
                        break;
                default:
                break;
            }

    }
    //
    // support for extra CSS embeded into file from user
    //
    if (!empty($devOptions['extra_css'])) {
            $buildCss .= stripslashes($devOptions['extra_css']);
    }
    //
    // print support via CSS, this section excludes CSS selectors
    //

     $printCSS ="/* cssid=".$devOptions['cssid']."                            */   \n";
     $printCSS .="/* WARNING!! this file is dynamicaly generated changes will  */ \n";
     $printCSS .="/* be overwritten with every change to the admin screen.      */ \n";
     $printCSS .="/* You can add css to this file in the admin screen.       */ \n\n\n\n\n";
     $printCSS .= "body {background: white;font-size: 12pt;color:black;}
     * {background-image:none;}
     #wrapper, #content {width: auto;margin: 0 5%;padding: 0;border: 0;float: none !important;color: black;background: transparent none;}
     a { text-decoration : underline; color : #0000ff; }\n";
     //
     // excludes
     if (!empty($devOptions['css_print_excludes'])) {
            $printCSS .= $devOptions['css_print_excludes']." {display:none}\n";
    }
    //
    // user CSS for print
    if (!empty($devOptions['extra_print_css'])) {
            $printCSS .= stripslashes($devOptions['extra_print_css']);
    }


?>
