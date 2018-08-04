<?php


/*************************************************
 * Education One Widget
 **************************************************/

/**
 * Register the Widget
 */
function curriculumvitae_education_one_widget()
{
    register_widget('curriculumvitae_education_one_widget');
}
add_action('widgets_init', 'curriculumvitae_education_one_widget');


class curriculumvitae_Education_One_Widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname'                   => 'curriculumvitae_education_one_widget',
            'description'                 => esc_html__('CurriculumVitae Education Widget One', 'curriculumvitae'),
            'customize_selective_refresh' => true
        );

        parent::__construct('curriculumvitae_education_one_widget', 'Education Widget One', $widget_ops);

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

    $title       = isset($instance['title']) ? apply_filters('widget_title', $instance['title'], $instance, $this->id_base) : esc_attr__('Education', 'curriculumvitae');
    $num         = isset($instance['num']) ? apply_filters('', $instance['num']) : esc_attr__('01', 'curriculumvitae');


   
    $edu1desig   = isset($instance['edu1desig']) ? apply_filters('', $instance['edu1desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'curriculumvitae');
    $edu1com     = isset($instance['edu1com']) ? apply_filters('', $instance['edu1com']) : esc_attr__('Arthus University', 'curriculumvitae');
    $edu1time    = isset($instance['edu1time']) ? apply_filters('', $instance['edu1time']) : esc_attr__('September 2013 - February 2014', 'curriculumvitae');
   


    $edu2desig   = isset($instance['edu2desig']) ? apply_filters('', $instance['edu2desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'curriculumvitae');
    $edu2com     = isset($instance['edu2com']) ? apply_filters('', $instance['edu2com']) : esc_attr__('Arthus University', 'curriculumvitae');
    $edu2time    = isset($instance['edu2time']) ? apply_filters('', $instance['edu2time']) : esc_attr__('September 2013 - February 2014', 'curriculumvitae');


    
    $edu3desig    = isset($instance['edu3desig']) ? apply_filters('', $instance['edu3desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'curriculumvitae');
    $edu3com      = isset($instance['edu3com']) ? apply_filters('', $instance['edu3com']) : esc_attr__('Arthus University', 'curriculumvitae');
    $edu3time     = isset($instance['edu3time']) ? apply_filters('', $instance['edu3time']) : esc_attr__('September 2013 - February 2014', 'curriculumvitae');


   
    $edu4desig    = isset($instance['edu4desig']) ? apply_filters('', $instance['edu4desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'curriculumvitae');
    $edu4com      = isset($instance['edu4com']) ? apply_filters('', $instance['edu4com']) : esc_attr__('Arthus University', 'curriculumvitae');
    $edu4time     = isset($instance['edu4time']) ? apply_filters('', $instance['edu4time']) : esc_attr__('September 2013 - February 2014', 'curriculumvitae');


    
    $edu5desig    = isset($instance['edu5desig']) ? apply_filters('', $instance['edu5desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'curriculumvitae');
    $edu5com      = isset($instance['edu5com']) ? apply_filters('', $instance['edu5com']) : esc_attr__('Arthus University', 'curriculumvitae');
    $edu5time     = isset($instance['edu5time']) ? apply_filters('', $instance['edu5time']) : esc_attr__('September 2013 - February 2014', 'curriculumvitae');






          
 
    /* Before widget (defined by themes). */
    echo $args['before_widget'];

    echo '<div class="cvparent">
            <section class="education">
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


    if (isset($edu1desig) && !empty($edu1desig)) {
        echo '<div class="first"><h3 itemprop="text">' . wp_kses_post(do_shortcode($edu1desig)) . '</h3>';
    }
    if (isset($edu1com) && !empty($edu1com)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu1com)) . '</p>';
    }
    if (isset($edu1time) && !empty($edu1time)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu1time)) . '</p></div>';
    }


    if (isset($edu2desig) && !empty($edu2desig)) {
        echo '<div class="first"><h3 itemprop="text">' . wp_kses_post(do_shortcode($edu2desig)) . '</h3>';
    }
    if (isset($edu2com) && !empty($edu2com)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu2com)) . '</p>';
    }
    if (isset($edu2time) && !empty($edu2time)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu2time)) . '</p></div>';
    }


    if (isset($edu3desig) && !empty($edu3desig)) {
        echo '<div class="first"><h3 itemprop="text">' . wp_kses_post(do_shortcode($edu3desig)) . '</h3>';
    }
    if (isset($edu3com) && !empty($edu3com)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu3com)) . '</p>';
    }
    if (isset($edu3time) && !empty($edu3time)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu3time)) . '</p></div>';
    }


    if (isset($edu4desig) && !empty($edu4desig)) {
        echo '<div class="first"><h3 itemprop="text">' . wp_kses_post(do_shortcode($edu4desig)) . '</h3>';
    }
    if (isset($edu4com) && !empty($edu4com)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu4com)) . '</p>';
    }
    if (isset($edu4time) && !empty($edu4time)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu4time)) . '</p></div>';
    }


    if (isset($edu5desig) && !empty($edu5desig)) {
        echo '<div class="first"><h3 itemprop="text">' . wp_kses_post(do_shortcode($edu5desig)) . '</h3>';
    }
    if (isset($edu5com) && !empty($edu5com)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu5com)) . '</p>';
    }
    if (isset($edu5time) && !empty($edu5time)) {
        echo '<p class="text" itemprop="text">' . wp_kses_post(do_shortcode($edu5time)) . '</p></div>';
    }







    echo '</div></section></div>';

  
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
        'title'             => esc_attr__('Education', 'curriculumvitae'),
        'num'               => esc_attr__('01', 'curriculumvitae'),
        'edu1desig'         => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology        ', 'curriculumvitae'),
        'edu1com'           => esc_attr__('Arthus University', 'curriculumvitae'),
        'edu1time'          => esc_attr__('September 2013 - February 2014', 'curriculumvitae'),
        'edu2desig'         => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology        ', 'curriculumvitae'),
        'edu2com'           => esc_attr__('Arthus University', 'curriculumvitae'),
        'edu2time'          => esc_attr__('September 2013 - February 2014', 'curriculumvitae'),
        'edu3desig'         => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology        ', 'curriculumvitae'),
        'edu3com'           => esc_attr__('Arthus University', 'curriculumvitae'),
        'edu3time'          => esc_attr__('September 2013 - February 2014', 'curriculumvitae'),
        'edu4desig'         => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology        ', 'curriculumvitae'),
        'edu4com'           => esc_attr__('Arthus University', 'curriculumvitae'),
        'edu4time'          => esc_attr__('September 2013 - February 2014', 'curriculumvitae'),
        'edu5desig'         => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology        ', 'curriculumvitae'),
        'edu5com'           => esc_attr__('Arthus University', 'curriculumvitae'),
        'edu5time'          => esc_attr__('September 2013 - February 2014', 'curriculumvitae'),
       
    );


    
    $instance = wp_parse_args((array)$instance, $defaults);


    ?>
      

        
        <br>
        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php esc_html_e('Title', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('num'); ?>"><?php esc_html_e('Serial', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="text" value="<?php echo esc_attr($instance['num']); ?>" />
        </p>


        <br>
            
        <!-- edu1 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu1desig'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu1desig'); ?>" name="<?php echo $this->get_field_name('edu1desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu1desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu1com'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu1com'); ?>" name="<?php echo $this->get_field_name('edu1com'); ?>" type="text" value="<?php echo esc_attr($instance['edu1com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu1time'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu1time'); ?>" name="<?php echo $this->get_field_name('edu1time'); ?>" type="text" value="<?php echo esc_attr($instance['edu1time']); ?>" />
        </p>


        <br>
        <br>

        <!-- edu2 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu2desig'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu2desig'); ?>" name="<?php echo $this->get_field_name('edu2desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu2desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu2com'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu2com'); ?>" name="<?php echo $this->get_field_name('edu2com'); ?>" type="text" value="<?php echo esc_attr($instance['edu2com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu2time'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu2time'); ?>" name="<?php echo $this->get_field_name('edu2time'); ?>" type="text" value="<?php echo esc_attr($instance['edu2time']); ?>" />
        </p>

        <br>
        <br>


        
        <!-- edu3 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu3desig'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu3desig'); ?>" name="<?php echo $this->get_field_name('edu3desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu3desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu3com'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu3com'); ?>" name="<?php echo $this->get_field_name('edu3com'); ?>" type="text" value="<?php echo esc_attr($instance['edu3com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu3time'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu3time'); ?>" name="<?php echo $this->get_field_name('edu3time'); ?>" type="text" value="<?php echo esc_attr($instance['edu3time']); ?>" />
        </p>
        <br>
        <br>


        <!-- edu4 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu4desig'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu4desig'); ?>" name="<?php echo $this->get_field_name('edu4desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu4desig']); ?>" />
        </p>
  

        <p>
            <label for="<?php echo $this->get_field_name('edu4com'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu4com'); ?>" name="<?php echo $this->get_field_name('edu4com'); ?>" type="text" value="<?php echo esc_attr($instance['edu4com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu4time'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu4time'); ?>" name="<?php echo $this->get_field_name('edu4time'); ?>" type="text" value="<?php echo esc_attr($instance['edu4time']); ?>" />
        </p>
        <br>
        <br>

        <!-- edu5 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu5desig'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu5desig'); ?>" name="<?php echo $this->get_field_name('edu5desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu5desig']); ?>" />
        </p>
  

        <p>
            <label for="<?php echo $this->get_field_name('edu5com'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu5com'); ?>" name="<?php echo $this->get_field_name('edu5com'); ?>" type="text" value="<?php echo esc_attr($instance['edu4com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu5time'); ?>"><?php esc_html_e('Text', 'curriculumvitae'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu5time'); ?>" name="<?php echo $this->get_field_name('edu5time'); ?>" type="text" value="<?php echo esc_attr($instance['edu5time']); ?>" />
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
    $instance                    = $new_instance;
    $instance['title']           = wp_kses_post($new_instance['title']);
    $instance['num']             = wp_kses_post($new_instance['num']);


    $instance['edu1desig']       = wp_kses_post($new_instance['edu1desig']);
    $instance['edu1com']         = wp_kses_post($new_instance['edu1com']);
    $instance['edu1time']        = wp_kses_post($new_instance['edu1time']);

    $instance['edu2desig']       = wp_kses_post($new_instance['edu2desig']);
    $instance['edu2com']         = wp_kses_post($new_instance['edu2com']);
    $instance['edu2time']        = wp_kses_post($new_instance['edu2time']);

    $instance['edu3desig']       = wp_kses_post($new_instance['edu3desig']);
    $instance['edu3com']         = wp_kses_post($new_instance['edu3com']);
    $instance['edu3time']        = wp_kses_post($new_instance['edu3time']);

    $instance['edu4desig']       = wp_kses_post($new_instance['edu4desig']);
    $instance['edu4com']         = wp_kses_post($new_instance['edu4com']);
    $instance['edu4time']        = wp_kses_post($new_instance['edu4time']);

    $instance['edu5desig']       = wp_kses_post($new_instance['edu5desig']);
    $instance['edu5com']         = wp_kses_post($new_instance['edu5com']);
    $instance['edu5time']        = wp_kses_post($new_instance['edu5time']);

    


    return $instance;
}


}


