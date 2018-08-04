<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package curriculumvitae
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post_wrapper">
        <header class="entry-header">
        <div class="entry-meta">
                    <?php
                    curriculumvitae_posted_on();?> <br>
                    
                </div><!-- .entry-meta -->
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
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
            <?php curriculumvitae_post_thumbnail(); ?>

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