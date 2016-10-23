<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Orsay
 */

get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php orsay_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; wp_reset_query(); // end of the loop. ?>

<?php
get_sidebar();

get_footer();