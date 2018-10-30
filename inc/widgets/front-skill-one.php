<?php


/*************************************************
 * Skill One Widget
 **************************************************/

/**
 * Register the Widget
 */
function curriculumvitae_skill_one_widget()
{
  register_widget('curriculumvitae_skill_one_widget');
}
add_action('widgets_init', 'curriculumvitae_skill_one_widget');


class curriculumvitae_Skill_One_Widget extends WP_Widget
{
  /**
   * Constructor
   **/
  public function __construct()
  {
    $widget_ops = array(
      'classname'                   => 'curriculumvitae_skill_one_widget',
      'description'                 => esc_html__('curriculumvitae Skill One Widget', 'curriculumvitae'),
      'customize_selective_refresh' => true
    );

    parent::__construct('curriculumvitae_skill_one_widget', 'Skill One Widget', $widget_ops);

    add_action('wp_enqueue_scripts', array(&$this, 'curriculumvitae_intro1_css'));

  }



  /**
   * Enqueue scripts.
   *
   * @since 1.0
   *
   * @param string $hook_suffix
   */
  public function enqueue_scripts($hook_suffix)
  {
    if ('widgets.php' !== $hook_suffix) {
      return;
    }

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('underscore');
  }



  /**
   * Print scripts.
   *
   * @since 1.0
   */
  public function print_scripts()
  {
    ?>
    <script>
      ( function( $ ){
        function initColorPicker( widget ) {
          widget.find( '.color-picker' ).wpColorPicker( {
            change: _.throttle( function() { // For Customizer
              $(this).trigger( 'change' );
            }, 3000 )
          });
        }

        function onFormUpdate( event, widget ) {
          initColorPicker( widget );
        }

        $( document ).on( 'widget-added widget-updated', onFormUpdate );

        $( document ).ready( function() {
          $( '#widgets-right .widget:has(.color-picker)' ).each( function () {
            initColorPicker( $( this ) );
          } );
        } );
      }( jQuery ) );
    </script>
    <?php

  }



  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget($args, $instance)
  {



    $title            = isset($instance['title']) ? apply_filters('widget_title', $instance['title'], $instance, $this->id_base) : esc_attr__('Experience', 'curriculumvitae');
    $num              = isset($instance['num']) ? apply_filters('', $instance['num']) : esc_attr__('01', 'curriculumvitae');

    $text1           = isset($instance['text1']) ? apply_filters('', $instance['text1']) : __('  
    <h3>CREATIVITY</h3>
    <h3>HARD WORKING</h3>
    <h3>AVID LISTENER</h3>
    <h3>SOFTWARE</h3>
    <h3>CREATIVE</h3>
    <h3>TEAMWORK</h3>
    <h3>SOFTSWARE</h3>
    <h3>TEAMWORK</h3>
    <h3>COMMUNICATION</h3>
    <h3>SOFTWARE</h3>', 'curriculumvitae');


    $textcolor              = isset($instance['textcolor']) ? $instance['textcolor'] : '';
    $titlecolor             = isset($instance['titlecolor']) ? $instance['titlecolor'] : '';
    $leftlineecolor         = isset($instance['leftlineecolor']) ? $instance['leftlineecolor'] : '';
    $rightlineecolor        = isset($instance['rightlineecolor']) ? $instance['rightlineecolor'] : '';
    $bgcolor                = isset($instance['bgcolor']) ? $instance['bgcolor'] : '';
            
          
 
    /* Before widget (defined by themes). */
    echo $args['before_widget'];

    echo '<div class="cvparent"><section class="skill">
             <div class="wrap">
             <div class="one">';


    if (isset($num)) {
        echo '<h3 itemprop="text">' . esc_html(do_shortcode($num)) . '</h3>';
    }

    if (isset($title) && !empty($title)) {
        echo '<p itemprop="text">' . esc_html(do_shortcode($title)) . '</p>';
    }

    echo '</div> 
          <div class="two">
          <div class="space"></div>';

    if (isset($text1)  && !empty($text1)){
        echo '<div class="first skwrapper">' . (do_shortcode($text1)) . '</div>';
      }

    echo '</div></div></section></div>';


    if (is_customize_preview()) {
      $id = $this->id;


      $textcolor                 = 'color:#000;';
      $titlecolor                = 'color:#000;';
      $leftlineecolor            = 'color:#000;';
      $rightlineecolor           = 'border-color:#000;';
      $bgcolor                   = 'background-color:rgba(93,187,97,.05882);';



    if (!empty($instance['textcolor'])) {
        $textcolor                  = 'color: ' . $instance['textcolor'] . '; ';
    }
    if (!empty($instance['titlecolor'])) {
        $titlecolor                 = 'color: ' . $instance['titlecolor'] . '; ';
    }
    if (!empty($instance['leftlineecolor'])) {
        $leftlineecolor             = 'color: ' . $instance['leftlineecolor'] . '; ';
    }
    if (!empty($instance['rightlineecolor'])) {
        $rightlineecolor            = 'border-color: ' . $instance['rightlineecolor'] . '; ';
    }
    if (!empty($instance['bgcolor'])) {
        $bgcolor                    = 'background-color:' . $instance['bgcolor'] . '; ';
    }


      echo '<style>' . '#' . $id . ' .skill .one h3, .skill .one p {' . $titlecolor . '}#' . $id . ' .skill .{ ' . $bgcolor . '}#' . $id . ' .skill .one h3::after {' . $leftlineecolor . '}#' . $id . ' .skill .first {' . $textcolor . '}#' . $id . ' .skill .two {' . $rightlineecolor . '}#' . $id . ' .skill .wrap {' . $bgcolor . '}</style>';

    }
  
            /* After widget (defined by themes). */
    echo $args['after_widget'];

  }


  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form($instance)
  {
        /* Set up some default widget settings. */
    $defaults = array(
      'title'                 => esc_attr__('Skill', 'curriculumvitae'),
      'num'                   => esc_attr__('01', 'curriculumvitae'),
      'titlecolor'            => '#000',
      'bgcolor'               => 'rgba(93,187,97,.05882)',
      'textcolor'             => '#000',
      'leftlineecolor'        => '#000',
      'rightlineecolor'       => '#000',
      'text1'                 => '<h3>CREATIVITY</h3>
      <h3>HARD WORKING</h3>
      <h3>AVID LISTENER</h3>
      <h3>SOFTWARE</h3>
      <h3>CREATIVE</h3>
      <h3>TEAMWORK</h3>
      <h3>SOFTSWARE</h3>
      <h3>TEAMWORK</h3>
      <h3>COMMUNICATION</h3>
      <h3>SOFTWARE</h3>'
    );


    $instance = wp_parse_args((array)$instance, $defaults);


    ?>

      <!-- Title -->
      <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php esc_html_e('Title', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('num'); ?>"><?php esc_html_e('Serial', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="text" value="<?php echo esc_attr($instance['num']); ?>" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('titlecolor'); ?>"><?php _e('Color', 'curriculumvitae') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('titlecolor'); ?>" name="<?php echo $this->get_field_name('titlecolor'); ?>" value="<?php echo $instance['titlecolor']; ?>" type="text" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('leftlineecolor'); ?>"><?php _e('Title Line Color', 'curriculumvitae') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('leftlineecolor'); ?>" name="<?php echo $this->get_field_name('leftlineecolor'); ?>" value="<?php echo $instance['leftlineecolor']; ?>" type="text" />
        </p>

        <br>
        <br>

        <p>
        <label for="<?php echo $this->get_field_name('text1'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
        <textarea class="widefat" rows="8" cols="10" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>"><?php echo esc_attr($instance['text1']); ?></textarea>
        </p>
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('textcolor'); ?>"><?php _e('Color', 'curriculumvitae') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('textcolor'); ?>" name="<?php echo $this->get_field_name('textcolor'); ?>" value="<?php echo $instance['textcolor']; ?>" type="text" />
        </p>

        <br>
        <br>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('bgcolor'); ?>"><?php _e('Background Color', 'curriculumvitae') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('bgcolor'); ?>" name="<?php echo $this->get_field_name('bgcolor'); ?>" value="<?php echo $instance['bgcolor']; ?>" type="text" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('rightlineecolor'); ?>"><?php _e('Right Line Color', 'curriculumvitae') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('rightlineecolor'); ?>" name="<?php echo $this->get_field_name('rightlineecolor'); ?>" value="<?php echo $instance['rightlineecolor']; ?>" type="text" />
        </p>
        
    <?php

  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update($new_instance, $old_instance)
  {

        // update logic goes here
    $instance                         = $new_instance;
    $instance['title']                = wp_kses_post($new_instance['title']);
    $instance['num']                  = wp_kses_post($new_instance['num']);
    $instance['text1']                = wp_kses_post($new_instance['text1']);

    $instance['bgcolor']              = sanitize_hex_color($new_instance['bgcolor']);
    $instance['titlecolor']           = sanitize_hex_color($new_instance['titlecolor']);
    $instance['textcolor']            = sanitize_hex_color($new_instance['textcolor']);
    $instance['leftlineecolor']       = sanitize_hex_color($new_instance['leftlineecolor']);
    $instance['rightlineecolor']      = sanitize_hex_color($new_instance['rightlineecolor']);

    return $instance;
  }

    //ENQUEUE CSS
  function curriculumvitae_intro1_css()
  {

    $settings = $this->get_settings();
    if (!is_customize_preview()) {
      if (empty($settings)) {
        return;
      }

      foreach ($settings as $instance_id => $instance) {
        $id = $this->id_base . '-' . $instance_id;

        if (!is_active_widget(false, $id, $this->id_base)) {
          continue;
        }

        $textcolor                 = 'color:#000;';
        $titlecolor                = 'color:#000;';
        $leftlineecolor            = 'color:#000;';
        $rightlineecolor           = 'border-color:#000;';
        $bgcolor                   = 'background-color:rgba(93,187,97,.05882);';
  
  
  
      if (!empty($instance['textcolor'])) {
          $textcolor                  = 'color: ' . $instance['textcolor'] . '; ';
      }
      if (!empty($instance['titlecolor'])) {
          $titlecolor                 = 'color: ' . $instance['titlecolor'] . '; ';
      }
      if (!empty($instance['leftlineecolor'])) {
          $leftlineecolor             = 'color: ' . $instance['leftlineecolor'] . '; ';
      }
      if (!empty($instance['rightlineecolor'])) {
          $rightlineecolor            = 'border-color: ' . $instance['rightlineecolor'] . '; ';
      }
      if (!empty($instance['bgcolor'])) {
          $bgcolor                    = 'background-color:' . $instance['bgcolor'] . '; ';
      }


        $widget_style = '#' . $id . ' .skill .one h3, .skill .one p {' . $titlecolor . '}#' . $id . ' .skill .{ ' . $bgcolor . '}#' . $id . ' .skill .one h3::after {' . $leftlineecolor . '}#' . $id . ' .skill .first {' . $textcolor . '}#' . $id . ' .skill .two {' . $rightlineecolor . '}#' . $id . ' .skill .wrap {' . $bgcolor . '}';
        wp_add_inline_style('curriculumvitae-style', $widget_style);
      }
    }

  }


}