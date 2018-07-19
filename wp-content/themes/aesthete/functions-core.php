<?php
	
	function echo_select_catagories ($args)
	{
		global $wpdb;
		$defaults = array(
			'selected'=>false,
			'show_select_a_category' => 1,
			'show_all_categories' => 1,
			'html_select_id' => '',
			'html_select_class' =>'',
			'html_select_name' => '',
			'html_option_level_class' => 'level-'
		);
		$r = wp_parse_args( $args, $defaults );
		echo '<select'.(($r['html_select_id'])?' id="'.$r['html_select_id'].'"':'')
			. (($r['html_select_class'])?' class="'.$r['html_select_class'].'"':'')
			. (($r['html_select_name'])?' name="'.$r['html_select_name'].'"':'').'>';
		echo_option_catagories_deep($r);
		echo '</select>';
		
	}

	function echo_option_catagories_deep ($args, $parent_id = 0, $level = 0)
	{
		global $wpdb;
		/*
			$args must be provided with all parameters. See echo_select_catagories()
		*/
		
		if ($level == 0)
		{
			if ($args['show_select_a_category']) 
				echo '<option value=""'.(($args['selected'] === '')?' selected="selected"':'').'>'.__('select one',DOMAIN).'</option>';
			if ($args['show_all_categories']) 
				echo '<option value="0"'.(($args['selected'] === '0')?' selected="selected"':'').'>'.__('All Categories',DOMAIN).'</option>';
		}

		$sql = "SELECT t.term_id, t.name 
				FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt 
				ON t.term_id = tt.term_id
				WHERE tt.taxonomy = 'category' AND tt.parent = $parent_id";			

		$items = $wpdb->get_results ($sql);
		
		foreach ($items as $item)
		{
			$option = '<option value="'.$item->term_id.'"';// style="';
			if ($args['selected'] === $item->term_id) $option .= ' selected="selected"';
			if ($level == 0) $option .= '';
			elseif ($level == 1) $option .= 'class = "'.$args['html_option_level_class'].$level.'"';	//' font-size:90%; color:#777777;';
			else $option .= 'class = "'.$args['html_option_level_class'].'2"';	//' font-size:90%; color:#aaaaaa;';
			$option .= '>';
			
			$option .= str_repeat("- ", $level) . $item->name;
			$option .= '</option>';
			echo $option;
			$list = echo_option_catagories_deep ($args, $item->term_id, $level+1);
		}

		//return $list;
	}