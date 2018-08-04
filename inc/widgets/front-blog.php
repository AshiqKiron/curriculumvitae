<?php


/*************************************************
 * Blog Widget
 **************************************************/

/**
 * Register the Widget
 */
function curriculumvitae_blog_widget()
{
  register_widget('curriculumvitae_blog_widget');
}
add_action('widgets_init', 'curriculumvitae_blog_widget');


class curriculumvitae_blog_widget extends WP_Widget
{
  /**
   * Constructor
   **/
  public function __construct()
  {
    $widget_ops = array(
      'classname'                   => 'curriculumvitae_blog_widget',
      'description'                 => esc_html__('CurriculumVitae Blog  Widget', 'curriculumvitae'),
      'customize_selective_refresh' => true
    );

    parent::__construct('curriculumvitae_blog_widget', 'Blog Widget', $widget_ops);


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

    $title            = isset($instance['title']) ? apply_filters('widget_title', $instance['title'], $instance, $this->id_base) : esc_attr__('Blog', 'curriculumvitae');
    $num              = isset($instance['num']) ? apply_filters('', $instance['num']) : esc_attr__('01', 'curriculumvitae');

          
 
    /* Before widget (defined by themes). */
    echo $args['before_widget'];

    echo '<div class="cvparent"><section class="blog1">
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
          <div class="space"></div>
          <div class="blog_content">';  

    // the query
    $args = array(
      'orderby' => 'ASC',
      'posts_per_page' => '3',
      'post__in' => '',
      'ignore_sticky_posts' => 'false',

    );

    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

      <div class="second">
        <div class="one">
        <div class="articleWrapper">
        <div><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <?php 
        $post_date = get_the_date('F j ');
        echo '<div class="date">' . $post_date . "</div>"; ?>
          </div>
          
        
        </div>
      </div>

      
      <?php endwhile; ?>
      <!-- end of the loop -->

      <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'curriculumvitae'); ?></p>
    <?php endif; ?> <?php

    echo '</div></section></div>';



    /* After widget (defined by themes). */
    if (isset($after_widget)) {
      echo $after_widget;
    }

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
      'title'                   => esc_attr__('Blog', 'curriculumvitae'),
      'num'                     => esc_attr__('01', 'curriculumvitae'),
     
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
    $instance                               = $new_instance;
    $instance['title']                      = wp_kses_post($new_instance['title']);
    $instance['num']                        = wp_kses_post($new_instance['num']);


    return $instance;
  }



}