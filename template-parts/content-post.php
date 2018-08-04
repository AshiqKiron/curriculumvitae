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
                <?php
                the_content( sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'curriculumvitae' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'curriculumvitae' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
            </div>
        </div>
        
</article><!-- #post-<?php the_ID(); ?> -->