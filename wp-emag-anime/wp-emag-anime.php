<?php
/*
Plugin Name: WP EMAG Anime
Description: Sets the anime EMAG is watching
Version: 1.0
Author: Keith Brown
License: GPL2
*/
/*

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('wp_EMAG_next'))
{
    class wp_EMAG_next extends WP_Widget {
        
	    /**
	     * Register widget with WordPress.
	     */
	    function __construct()
        {
		    parent::__construct(
			    'wp_EMAG_next', // Base ID
			    __('Current Anime', 'text_domain'), // Name
			    array( 'description' => __( 'Displays the current anime we\'re watching', 'text_domain' ), ) // Args
		    );
	    }

	    // constructor
	    /*
        function wp_EMAG_next()
        {
		    parent::WP_Widget(false, $name = __('Current Anime', 'wp_widget_plugin') );
	    }
        */

	    // widget form creation
	    function form($instance)
        {
            // Check values
            if( $instance) {
                 $s1title = esc_attr($instance['s1title']);
                 $s1date = esc_attr($instance['s1date']);
                 $s1image = esc_url($instance['s1image']);
                 $s1no = esc_attr($instance['s1no']);
                 $s1lim = esc_attr($instance['s1lim']);
                 $s1delay = esc_attr($instance['s1delay']);
                 $s2title = esc_attr($instance['s2title']);
                 $s2date = esc_attr($instance['s2date']);
                 $s2image = esc_url($instance['s2image']);
                 $s2no = esc_attr($instance['s2no']);
                 $s2lim = esc_attr($instance['s2lim']);
                 $s2delay = esc_attr($instance['s2delay']);
            } else {
                 $s1title = '';
                 $s1date = '';
                 $s1image = '';
                 $s1no = '';
                 $s1lim = '';
                 $s1delay = '';
                 $s2title = '';
                 $s2date = '';
                 $s2image = '';
                 $s2no = '';
                 $s2lim = '';
                 $s2delay = '';
            }
            ?>
            <h3>Anime 1</h3>
            <p>
            <label for="<?php echo $this->get_field_id('s1title'); ?>"><?php _e('Anime 1 Name:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s1title'); ?>" name="<?php echo $this->get_field_name('s1title'); ?>" type="text" value="<?php echo $s1title; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id('s1date'); ?>"><?php _e('Anime 1 Start Date:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s1date'); ?>" name="<?php echo $this->get_field_name('s1date'); ?>" type="date" value="<?php echo $s1date; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id('s1no'); ?>"><?php _e('Anime 1 Start Episode:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s1no'); ?>" name="<?php echo $this->get_field_name('s1no'); ?>" type="nober" value="<?php echo $s1no; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id('s1lim'); ?>"><?php _e('Anime 1 Episode Limit:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s1lim'); ?>" name="<?php echo $this->get_field_name('s1lim'); ?>" type="nober" value="<?php echo $s1lim; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id('s1delay'); ?>"><?php _e('Anime 1 Meet Delay:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s1delay'); ?>" name="<?php echo $this->get_field_name('s1delay'); ?>" type="nober" value="<?php echo $s1delay; ?>" />
            </p>

            <p>
              <label for="<?php echo $this->get_field_id('s1image'); ?>"><?php _e('Anime 1 Image:', 'wp_widget_plugin'); ?></label><br />
              <input type="text" class="img" name="<?php echo $this->get_field_name('s1image'); ?>" id="<?php echo $this->get_field_id('s1image'); ?>" value="<?php echo $s1image; ?>" />
              <input type="button" class="select-img1" value="Select Image" />
            </p>

            <h3>Anime 2</h3>
            <p>
            <label for="<?php echo $this->get_field_id('s2title'); ?>"><?php _e('Anime 2 Name:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s2title'); ?>" name="<?php echo $this->get_field_name('s2title'); ?>" type="text" value="<?php echo $s2title; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id('s2date'); ?>"><?php _e('Anime 2 Start Date:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s2date'); ?>" name="<?php echo $this->get_field_name('s2date'); ?>" type="date" value="<?php echo $s2date; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id('s2no'); ?>"><?php _e('Anime 2 Start Episode:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s2no'); ?>" name="<?php echo $this->get_field_name('s2no'); ?>" type="nober" value="<?php echo $s2no; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id('s2lim'); ?>"><?php _e('Anime 2 Episode Limit:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s2lim'); ?>" name="<?php echo $this->get_field_name('s2lim'); ?>" type="nober" value="<?php echo $s2lim; ?>" />
            </p>

            <p>
            <label for="<?php echo $this->get_field_id('s2delay'); ?>"><?php _e('Anime 2 Meet Delay:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('s2delay'); ?>" name="<?php echo $this->get_field_name('s2delay'); ?>" type="nober" value="<?php echo $s2delay; ?>" />
            </p>

            <p>
              <label for="<?php echo $this->get_field_id('s2image'); ?>"><?php _e('Anime 2 Image:', 'wp_widget_plugin'); ?></label><br />
              <input type="text" class="img" name="<?php echo $this->get_field_name('s2image'); ?>" id="<?php echo $this->get_field_id('s2image'); ?>" value="<?php echo $s2image; ?>" />
              <input type="button" class="select-img2" value="Select Image" />
            </p>
            <?php
        }

	    // update widget
        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            // Fields
            $instance['s1title'] = strip_tags($new_instance['s1title']);
            $instance['s1date'] = strip_tags($new_instance['s1date']);
            $instance['s1image'] = strip_tags($new_instance['s1image']);
            $instance['s1no'] = strip_tags($new_instance['s1no']);
            $instance['s1lim'] = strip_tags($new_instance['s1lim']);
            $instance['s1delay'] = strip_tags($new_instance['s1delay']);

            $instance['s2title'] = strip_tags($new_instance['s2title']);
            $instance['s2date'] = strip_tags($new_instance['s2date']);
            $instance['s2image'] = strip_tags($new_instance['s2image']);
            $instance['s2no'] = strip_tags($new_instance['s2no']);
            $instance['s2lim'] = strip_tags($new_instance['s2lim']);
            $instance['s2delay'] = strip_tags($new_instance['s2delay']);
            return $instance;
        }

	    // widget display
	    function widget($args, $instance)
        {
           echo '<!--'.$args.'-->';
           echo '<!--'.$instance.'-->';
           extract( $args );
           // these are the widget options
           //$s1title = apply_filters()'widget_title', $instance['s1title']);
                 $s1title = $instance['s1title'];
                 $s1date = $instance['s1date'];
                 $s1image = $instance['s1image'];
                 $s1no = $instance['s1no'];
                 $s1lim = $instance['s1lim'];
                 $s1delay = $instance['s1delay'];
                 $s2title = $instance['s2title'];
                 $s2date = $instance['s2date'];
                 $s2image = $instance['s2image'];
                 $s2no = $instance['s2no'];
                 $s2lim = $instance['s2lim'];
                 $s2delay = $instance['s2delay'];
                 echo '<!--'.' '.$s1title.' '.$s1date.' '.$s1image.' '.$s1no.' '.$s1lim;
                 echo $s1delay.' '.$s2title.' '.$s2date.' '.$s2image.' '.$s2no.' '.$s2lim.' '.$s2delay.' '.'-->';
           //echo $before_widget;
           // Display the widget
           //echo '<div class="widget-text wp_widget_plugin_box">';

           // Check if title is set
           if ( $s1title ) {
              //echo $before_title . $s1title . $after_title;
           }

           // Check if text is set
           if( $text ) {
              //echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
           }
           // Check if textarea is set
           if( $textarea ) {
             //echo '<p class="wp_widget_plugin_textarea">'.$textarea.'</p>';
           }
            // basic output just for this example
            //echo '<a href="#"><img src="'.esc_url($instance['s1image']).'" /><h4>'.esc_html($instance['s1image']).'</h4></a>';

            $today = date("Y-m-d");

            echo '<!--Running Series Widget--><div id="runningseries">
						<h3 id="runhead">Next Meet\'s Showings:</h3>
                              <div id="series1"><!--'.$s1title.'-->
                              <img src="'.esc_url($instance['s1image']).'" class="running" alt="'.$s1title.'" />
                                   <p class="showtitle">'.$s1title.'</p>';
            while (strtotime($s1date)<strtotime($today)) { 
                $s1date = date("Y-m-d", strtotime("{$s1date} +14 days"));
                $s1no += 2;
            }
            for ($count = 0; $count < $s1delay; $count++)
            {
                $s1no -= 2;
            }
            if ($s1no > $s1lim)
            {
                $s1no = $s1lim;
            }
            if ($s1no != $s1lim)
            {
                echo '<!--multi episode-->';
                echo "<p>Episodes</p><p>".$s1no;
                if ($s1no + 1 <= $s1lim)
                {
                    echo " & ".($s1no + 1);
                }
                echo "</p><p>out of ".$s1lim."</p>";
            }
            else
            {
                echo '<!--single episode-->';
                echo "<p>Episode</p><p>".$s1no;
                echo " of ".$s1lim."</p>";
            }
            echo '</div>
                    <div id="series2"><!--Cannan-->
                    <img src="'.esc_url($instance['s2image']).'" class="running" alt="'.$s2title.'" />
                    <p class="showtitle">'.$s2title.'</p>';
                    while (strtotime($s2date)<strtotime($today)) { 
                        $s2date = date("d-m-Y", strtotime("{$s2date} +14 days"));
                        $s2no += 2;
                    }
                    for ($count = 0; $count < $s2delay; $count++)
                    {
                        $s2no -= 2;
                    }
                    if ($s2no > $s2lim)
                    {
                        $s2no = $s2lim;
                    }
                    if ($s2no != $s2lim)
                    {
                        echo '<!--multi episode-->';
                        echo "<p>Episodes</p><p>".$s2no;
                        if ($s2no + 1 <= $s2lim)
                        {
                            echo " & ".($s2no + 1);
                        }
                        echo "</p><p>out of ".$s2lim."</p>";
                    }
                    else
                    {
                         
                         echo '<!--single episode-->';
                        echo "<p>Episode</p><p>".$s2no;
                        echo " of ".$s2lim."</p>";
                    }
            echo '</div></div><!--Running Series Widget-->';
            echo '<div class="clearer"></div>';
	    }
    }
}

if(class_exists('wp_EMAG_next'))
{
    // register widget
    add_action('widgets_init', create_function('', 'return register_widget("wp_EMAG_next");'));

    // queue up the necessary js
    function hrw_enqueue()
    {
      wp_enqueue_style('thickbox');
      wp_enqueue_script('media-upload');
      wp_enqueue_script('thickbox');
      // moved the js to an external file, you may want to change the path
      wp_enqueue_script('hrw', '/wp-content/plugins/wp-emag-anime/script.js', null, null, true);
    }

    add_action('admin_enqueue_scripts', 'hrw_enqueue');

}
?>
