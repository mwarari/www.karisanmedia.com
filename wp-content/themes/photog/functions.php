<?php
if (function_exists('register_sidebars')) {
	register_sidebars(1,array(
		'before_widget' => '<div class="wdgtbox">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
		));
    }
?>