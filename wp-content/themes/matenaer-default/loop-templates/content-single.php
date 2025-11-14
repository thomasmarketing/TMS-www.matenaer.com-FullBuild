<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <p class="post-categories"><?php the_category(', '); ?></p>
		<!-- <h2 class="page-title entry-title single-title" itemprop="headline"><?php //the_title(); ?></h2>-->

    	<p class="single-post-date-wrap">On <time class="post-date" datetime="<?php echo get_the_date('F j, Y'); ?>" itemprop="datePublished"><?php echo get_the_date('m/d/Y'); ?></time> | By <?php the_author(); ?></p>

	</header><!-- .entry-header -->
    <div class="post-image">
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
     </div>
	<div class="entry-content">

		<?php the_content(); ?>
		<?php get_template_part('parts/shared/flexible-content'); ?>
		<?php
		   $post_id = get_the_ID();
			$tags = wp_get_post_tags($post_id);
			
			if ( !empty($tags) ) { // Check if $tags array is not empty
			    ?>
			    <div class="post-tag-list">
			        <span>TAGS:</span>
			        <?php
			        foreach ( $tags as $tag ) : ?>
			            <a class="post-tag-link" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a>
			        <?php endforeach; ?>
			    </div>
			    <?php
			}
			?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer> --><!-- .entry-footer -->

</article><!-- #post-## -->
