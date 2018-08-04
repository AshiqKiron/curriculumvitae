<?php
/**
 * Template Name: Blog Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package curriculumvitae
 */
get_header(); ?>
<section class="blog_page">
    <header class="blog-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' , 'curriculumvitae'); ?>
            
    </header><!-- .entry-header -->


    <div class="blog_wrap"> 
    <section class="blog_wrapper"> <?php
    // the query
    $args = array(
      'orderby' => 'ASC',
      'posts_per_page' => '10',
      'post__in' => '',
      'ignore_sticky_posts' => 'false',

    );

    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      
      

        
          
        <section class="bloglist">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <div class="post_wrapper">
              <header class="entry-header">
              <div class="entry-meta">
                          <?php
                          curriculumvitae_posted_on();?> <br>
                          
                      </div><!-- .entry-meta -->
                  <?php
                  if ( is_singular() ) :
                      the_title( '<a href="<?php the_permalink(); ?>"><h1 class="entry-title">', '</h1></a>' );
                  else :
                      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                  endif;

                  if ( 'post' === get_post_type() ) :
                      ?>
                  <?php curriculumvitae_posted_by(); ?>
                  
                  <?php endif; ?>
                  <footer class="entry-footer">
                  <?php curriculumvitae_entry_footer(); ?>
              </footer><!-- .entry-footer -->
              </header><!-- .entry-header -->
              
              <div class="posts-content">
                  
                  <a href="<?php the_permalink(); ?>"> <?php curriculumvitae_post_thumbnail(); ?> </a>

                  <div class="entry-content">
                      
                      <p><?php echo substr(get_the_excerpt(), 0, 300); ?>...</p> <?php

                      wp_link_pages( array(
                          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'curriculumvitae' ),
                          'after'  => '</div>',
                      ) );
                      ?>
                  </div><!-- .entry-content -->
                  </div>
              </div>
          </article><!-- #post-<?php the_ID(); ?> -->
        </section>
       

      
      <?php endwhile; ?>
      <!-- end of the loop -->

      <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'curriculumvitae'); ?></p>
    <?php endif; ?> 
    </section>
     <div class="other">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2') ) :   endif; ?>
     </div>
            
        </div>

    <div class="blog_pagination">
             <?php previous_posts_link(__(' Newer Entries ', 'curriculumvitae')) ?>
             <?php next_posts_link(__('Older Entries ', 'curriculumvitae'), $the_query->max_num_pages) ?>
             <div class="clearfix"></div>
            </div>

     </div>

</section>


<div class="clearfix"></div>
    <section class="footer-widget">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) :   endif; ?>
        <div class="clearfix"></div>
    </section>
    <div class="clearfix"></div>
<?php
get_footer();