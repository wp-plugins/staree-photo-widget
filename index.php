<?php
/*
Plugin Name: Staree WP Widget
Plugin URI: http://staree.com
Description: Pulls photo thumbnails into your sidebar
Author: IZEA, Inc.
Version: 1
Author URI: http://www.izea.com
*/


class StareeWidget extends WP_Widget{

	function StareeWidget(){
		$widget_ops = array('classname' => 'StareeWidget', 'description' => 'Staree Widget' );
		$this->WP_Widget('StareeWidget', 'Staree Widget', $widget_ops);
	}

	function form($instance){
		$instance = wp_parse_args( (array) $instance, array(
												'title' 			=> 'Staree Widget',
												'username' 			=> 'tedmurphy',
												'photos_per_row'	=> '4',
												'num_rows'			=> '4',
												'padding'			=> '10',
												'width'				=> '200',
												'height'			=> '250',
												'background'		=> 'ffffff',
												'stroke_color'		=> 'de1fde',
												'stroke_weight'		=> '1',
												'corners'			=> 'Round',
												'wnmcss'			=> ''
												) 
												);
		$title 			= $instance['title'];
		$username 		= $instance['username'];
		$photos_per_row = $instance['photos_per_row'];
		$num_rows 		= $instance['num_rows'];
		$padding 		= $instance['padding'];
		$width 			= $instance['width'];
		$height 		= $instance['height'];
		$background 	= $instance['background'];
		$stroke_color 	= $instance['stroke_color'];
		$stroke_weight 	= $instance['stroke_weight'];
		$corners 		= $instance['corners'];
		$wnmcss			= $instance['wnmcss'];
	?>
	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title:
			<input class="widefat"
					id="<?php echo $this->get_field_id('title'); ?>"
					name="<?php echo $this->get_field_name('title'); ?>"
					type="text"
					value="<?php echo attribute_escape($title); ?>"/>
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('username'); ?>">Username:
			<input class="widefat"
					id="<?php echo $this->get_field_id('username'); ?>"
					name="<?php echo $this->get_field_name('username'); ?>"
					type="text"
					value="<?php echo attribute_escape($username); ?>"/>
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('photos_per_row'); ?>">Photos Per Row: (3-5)
			<input class="widefat"
					id="<?php echo $this->get_field_id('photos_per_row'); ?>"
					name="<?php echo $this->get_field_name('photos_per_row'); ?>"
					type="text"
					value="<?php echo attribute_escape($photos_per_row); ?>"/>
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('num_rows'); ?>">Number of Rows: (1-5)
			<input class="widefat"
					id="<?php echo $this->get_field_id('num_rows'); ?>"
					name="<?php echo $this->get_field_name('num_rows'); ?>"
					type="text"
					value="<?php echo attribute_escape($num_rows); ?>"/>
				
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('padding'); ?>">Padding between Photos: (px)
			<input class="widefat"
					id="<?php echo $this->get_field_id('padding'); ?>"
					name="<?php echo $this->get_field_name('padding'); ?>"
					type="text"
					value="<?php echo attribute_escape($padding); ?>"/>
					
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('height'); ?>">Height: (px)
			<input class="widefat"
					id="<?php echo $this->get_field_id('height'); ?>"
					name="<?php echo $this->get_field_name('height'); ?>"
					type="text"
					value="<?php echo attribute_escape($height); ?>"/>
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('width'); ?>">Width: (px)
			<input class="widefat"
					id="<?php echo $this->get_field_id('width'); ?>"
					name="<?php echo $this->get_field_name('width'); ?>"
					type="text"
					value="<?php echo attribute_escape($width); ?>"/>
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('background'); ?>">Background Color:
			<input class="widefat color"
					id="<?php echo $this->get_field_id('background'); ?>"
					name="<?php echo $this->get_field_name('background'); ?>"
					type="text"
					value="<?php echo attribute_escape($background); ?>"	/>
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('stroke_color'); ?>">Stroke Color:
			<input class="widefat color"
					id="<?php echo $this->get_field_id('stroke_color'); ?>"
					name="<?php echo $this->get_field_name('stroke_color'); ?>"
					type="text"
					value="<?php echo attribute_escape($stroke_color); ?>"/>
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('stroke_weight'); ?>">Stroke Weight: (px)
			<input class="widefat"
					id="<?php echo $this->get_field_id('stroke_weight'); ?>"
					name="<?php echo $this->get_field_name('stroke_weight'); ?>"
					type="text"
					value="<?php echo attribute_escape($stroke_weight); ?>"/>
		</label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('corners'); ?>">Corners: (round or not)
			<?php
				$opt = array('Round'=>'Round','Not Round'=>'Not Round');
				$js = 'id="'.$this->get_field_id('corners').'" onChange="some_function();" class="widefat"';
			?>
			<?php echo form_dropdown($this->get_field_name('corners'),$opt,attribute_escape($corners),$js);?>
		</label>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('wnmcss'); ?>">CSS Override:
			<textarea class="widefat"
					id="<?php echo $this->get_field_id('wnmcss'); ?>"
					name="<?php echo $this->get_field_name('wnmcss'); ?>"><?php echo trim($wnmcss); ?></textarea>
		</label>
	</p>
	<script>
	jQuery(document).ready(function(){
		jQuery('.color').ColorPicker({
			onShow: function (colpkr,el) {
				jQuery(colpkr).fadeIn(500);
				jQuery(this).ColorPickerSetColor(jQuery(el).val());
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb,el) {
				jQuery(el).val(hex);        
			}
		});

	});
	</script>
		
	<?php
	}

	function update($new_instance, $old_instance){
		$instance 					= $old_instance;
		$instance['title'] 			= $new_instance['title'];
		$instance['username'] 		= $new_instance['username'];
		$instance['photos_per_row'] = $new_instance['photos_per_row'];
		$instance['num_rows'] 		= $new_instance['num_rows'];
		$instance['padding'] 		= $new_instance['padding'];
		$instance['width'] 			= $new_instance['width'];
		$instance['height'] 		= $new_instance['height'];
		$instance['background'] 	= $new_instance['background'];
		$instance['stroke_color'] 	= $new_instance['stroke_color'];
		$instance['stroke_weight'] 	= $new_instance['stroke_weight'];
		$instance['corners'] 		= $new_instance['corners'];
		$instance['wnmcss'] 		= $new_instance['wnmcss'];
				
		return $instance;
	}

	function widget($args, $instance){
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$username = empty($instance['username']) ? ' ' : apply_filters('widget_title', $instance['username']);
		$photos_per_row = empty($instance['photos_per_row']) ? ' ' : apply_filters('widget_title', $instance['photos_per_row']);
		$num_rows = empty($instance['num_rows']) ? ' ' : apply_filters('widget_title', $instance['num_rows']);
		$padding = empty($instance['padding']) ? ' ' : apply_filters('widget_title', $instance['padding']);
		$width = empty($instance['width']) ? ' ' : apply_filters('widget_title', $instance['width']);
		$height = empty($instance['height']) ? ' ' : apply_filters('widget_title', $instance['height']);
		$background = empty($instance['background']) ? ' ' : apply_filters('widget_title', $instance['background']);
		$stroke_color = empty($instance['stroke_color']) ? ' ' : apply_filters('widget_title', $instance['stroke_color']);
		$stroke_weight = empty($instance['stroke_weight']) ? ' ' : apply_filters('widget_title', $instance['stroke_weight']);
		$corners = empty($instance['corners']) ? ' ' : apply_filters('widget_title', $instance['corners']);

		if (!empty($title))
		$border = $corners == 'Round' ? 'border-radius:7px;' : '';
		$ctr = 1;
		$count = 0;
		$limit = $num_rows * $photos_per_row;
		$total_border = ($padding * $photos_per_row * 2) - ($padding * 2);
		$image_width = floor(($width - $total_border ) / $photos_per_row);
	
		$divwidth = ($image_width * $photos_per_row) + $total_border ;
		
		
		echo "<div align=\"center\" id=\"wnm_staree_widget_wrap\" style=\"height:{$height}px; width:{$divwidth}px; overflow:hidden; background-color:#{$background} ;padding:10px; border:#$stroke_color {$stroke_weight}px solid; $border ; \">";
		echo $before_title . $title . $after_title;
		$rss = simplexml_load_file("http://staree.com/feed/$username.xml", null, LIBXML_NOCDATA);
		$images = $rss->channel->item;
		echo '<div style="margin:0;">';
		$first_div =  '<div class="wnm_staree_image_wrap" style="margin:auto;overflow:hidden;width:'.$divwidth.'px;line-height:0">';
		echo $first_div;
		foreach($images as $i):
			$last = '';
			$tr = '';
			$first = '';
			if($count == $limit):
				break;
			endif;
			if($photos_per_row == $ctr):
				$tr = '</div><div style="clear:both;"></div>'.$first_div;
				$last = 'padding-right:0;';
				$ctr = 1;
			else:
				if($ctr == 1):
					$first = 'padding-left:0;';
				endif;
				$ctr++;
			endif;
			
			
			$image = strip_tags($i->description,'<img><a>');
			
			$attr = " class=\"wnm_staree_images\" style=\"width:{$image_width}px ; $border padding:{$padding}px; $last $first \"";
	
			$code =  str_replace('img','img'.$attr,$image);
			$code = preg_replace('/\s\s+/', "", $code);  
			echo $code.$tr;  
	

			$count ++;
		endforeach;
		echo '</div>';
		echo '<h3 id="wnm_staree_widget_name"><a href="http://staree.com/'.$username.'/">'.$username.'</a> on <a href="http://staree.com">Staree</a></h3>';		
	
	echo $after_widget;
	}

}
add_action( 'widgets_init', create_function('', 'return register_widget("StareeWidget");') );

add_action('admin_enqueue_scripts', 'staree_assets');

function staree_assets() {
	
	wp_register_script('staree_custom',WP_PLUGIN_URL.'/staree/js/custom.js');
    wp_enqueue_script( 'staree_custom' );

	wp_register_script('staree_jquery',WP_PLUGIN_URL.'/staree/js/jquery.js');
    wp_enqueue_script( 'staree_jquery' );
	
 	wp_register_script('staree_colorpicker',WP_PLUGIN_URL.'/staree/js/colorpicker.js');
    wp_enqueue_script( 'staree_colorpicker' );

	wp_register_style('staree_color_picker',WP_PLUGIN_URL.'/staree/css/colorpicker.css');
    wp_enqueue_style( 'staree_color_picker' );
}

function form_dropdown($name = '', $options = array(), $selected = array(), $extra = ''){
	if ( ! is_array($selected)){
		$selected = array($selected);
	}

	// If no selected state was submitted we will attempt to set it automatically
	if (count($selected) === 0){
		// If the form name appears in the $_POST array we have a winner!
		if (isset($_POST[$name])){
			$selected = array($_POST[$name]);
		}
	}

	if ($extra != '') $extra = ' '.$extra;

	$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
	$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";

	foreach ($options as $key => $val){
		$key = (string) $key;

		if (is_array($val) && ! empty($val)){
			$form .= '<optgroup label="'.$key.'">'."\n";

			foreach ($val as $optgroup_key => $optgroup_val){
				$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

				$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
			}

			$form .= '</optgroup>'."\n";
		}else{
			$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

			$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
		}
	}
	$form .= '</select>';
	return $form;
}


function p($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';	
}


function theme_styles()  
{ 
  // Register the style like this for a theme:  
  // (First the unique name for the style (custom-style) then the src, 
  // then dependencies and ver no. and media type)
  wp_register_style( 'custom-style', 
    WP_PLUGIN_URL . '/staree/css/staree.css', 
    array(), 
    '20120208', 
    'all' );

  // enqueing:
  wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');