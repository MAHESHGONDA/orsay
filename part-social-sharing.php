<?php
/**
 * Add social share icons to articles
 *
 */

if( in_the_loop() ): ?>
	<ul class="socials">
		<?php
			$thumb_id = get_post_thumbnail_id();

			$target = '';
			if ( get_theme_mod( 'social_target', 1 ) == 1 ) {
				$target = 'target="_blank"';
			}

			$facebook = add_query_arg( array(
				'u' => get_permalink(),
			), 'https://www.facebook.com/sharer.php' );

			$twitter = add_query_arg( array(
				'url' => get_permalink(),
			), 'https://twitter.com/share' );

			$gplus = add_query_arg( array(
				'url' => get_permalink(),
			), 'https://plus.google.com/share' );

			$pinterest = add_query_arg( array(
				'url'         => get_permalink(),
				'description' => get_the_title(),
				'media'       => orsay_get_image_src( get_post_thumbnail_id(), 'large' ),
			), 'https://pinterest.com/pin/create/bookmarklet/' );
		?>
		<li><a href="<?php echo esc_url( $facebook ); ?>" <?php echo $target; ?> class="social-icon"><i class="fa fa-facebook"></i> Share</a></li>
		<li><a href="<?php echo esc_url( $twitter ); ?>" <?php echo $target; ?> class="social-icon"><i class="fa fa-twitter"></i> Tweet</a></li>
		<li><a href="<?php echo esc_url( $gplus ); ?>" <?php echo $target; ?> class="social-icon"><i class="fa fa-google-plus"></i> Share</a></li>
		<?php if ( ! empty( $thumb_id ) ): ?>
			<li><a href="<?php echo esc_url( $pinterest ); ?>" <?php echo $target; ?> class="social-icon"><i class="fa fa-pinterest"></i> Pin</a></li>
		<?php endif; ?>
	</ul>
<?php endif; ?>
