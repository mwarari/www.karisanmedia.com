<?php
if ( function_exists('register_sidebars') ) {
    register_sidebars(1);
}
function content($num) {  
$theContent = get_the_content();  
$theContent .= " ";
$limit = $num+1;  
$content = explode(' ', $theContent, $limit);  
array_pop($content);
if(sizeof($content)>=100)  
$content = implode(" ",$content)."...";  
else
$content = implode(" ",$content);
echo $content;  
}
?>
