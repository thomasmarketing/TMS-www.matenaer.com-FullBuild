<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="row">
        <?php 
        if ( has_post_thumbnail( $post->ID ) ) : ?>
    <div class="col-12 col-lg-3">
        <?php 
        $featured_img_url = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
        $featured_title = ucwords( get_the_title() );
        ?>
        <img src="<?php echo esc_url( $featured_img_url ); ?>" 
             alt="<?php echo esc_attr( $featured_title ); ?>" 
             title="<?php echo esc_attr( $featured_title ); ?>" 
             class="featured-img">
    </div>
<?php endif; ?>
        <div class="col-12 col-lg-9">
            <header class="entry-header">

                <?php
				the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
				?>

                <?php if ( 'post' == get_post_type() ) : ?>

                <div class="entry-meta">
                    <?php understrap_posted_on(); ?>
                </div><!-- .entry-meta -->

                <?php endif; ?>

            </header><!-- .entry-header -->
            <div class="entry-content">

                <?php the_excerpt(); ?>

                <?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
						'after'  => '</div>',
					)
				);
				?>

            </div><!-- .entry-content -->

            <footer class="entry-footer">

                <?php //understrap_entry_footer(); ?>

            </footer><!-- .entry-footer -->
        </div>
    </div>

</article><!-- #post-## -->