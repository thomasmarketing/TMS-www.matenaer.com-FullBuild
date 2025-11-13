<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">


			<?php if ( have_posts() ): ?>
				<?php if ( is_day() ) : ?>
				<h2>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h2>							
				<?php elseif ( is_month() ) : ?>
				<h2>Archive: <?php echo  get_the_date( 'M Y' ); ?></h2>	
				<?php elseif ( is_year() ) : ?>
				<h2>Archive: <?php echo  get_the_date( 'Y' ); ?></h2>	
				<?php else: ?>
				
			<?php endif; ?>							
				<article class="site-content-primary"> 
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="blog-sinlge-row-img">
						<div class="post-image">					
							<?php if (has_post_thumbnail()): ?>
								<?php $title= get_the_title(); ?>
								<?php the_post_thumbnail('large',array('alt' =>$title, 'title' =>$title)); ?>
				    	<?php endif; ?>
						</div>
						<div class="bsr-content">
							<h3 class="post-title"><?php the_title(); ?></h3>								
							<?php the_excerpt(); ?>		
							<a href="<?php if( get_field('enl_link')): ?><?php the_field('enl_link'); ?><?php else:?><?php esc_url( the_permalink() ); ?><?php endif; ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark" class="btn btn-primary">Read More</a>				
						</div>	
					</article>
						<hr>					
				<?php endwhile; ?>
				</article>
				<?php endif; ?>
		<?php wp_pagenavi(); ?>




	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
