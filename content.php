<?php
/**
 *
 * The template used for displaying articles & search results
 *
 * @package Orsay
 */
?>
					<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


							<div class="post-header">
								<span class="cat"><?php the_category( ' | ' ); ?></span>
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<span class="date"><?php
								if (get_theme_mod( 'orsay_hide_author' ) == false) {
								esc_html_e( 'By', 'orsay' ); ?> <?php the_author_posts_link(); ?> <?php esc_html_e( 'on', 'orsay' );
								} ?>
								<?php echo get_the_date(); ?></span>
							</div>
							<div class="post-image">
								<?php if ( has_post_thumbnail() ) : 

										$orsay_thumb_size = get_theme_mod( 'orsay_sidebar_position' );
										$orsay_thumbs_layout = get_theme_mod( 'orsay_thumbs_layout' );

										if ($orsay_thumbs_layout == "portrait") $orsay_thumbnail = 'orsay-portrait-thumbnail';
										else $orsay_thumbnail = 'orsay-landscape-thumbnail';
										if ($orsay_thumb_size == 'mz-full-width') $orsay_thumbnail = 'orsay-large-thumbnail';

									?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php echo get_the_post_thumbnail( get_the_ID(), $orsay_thumbnail ); ?>
									</a>
								<?php endif; ?>
							</div>
							<div class="post-entry">

								<?php if ( is_search() ) : // Only display Excerpts for Search
									the_excerpt();
									else :

										if ( ! get_theme_mod( 'orsay_excerpt' ) ) {
											the_content( '' );
										} else {
											the_excerpt();
										}

								endif; // endif is_search
								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'orsay' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
									'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'orsay' ) . ' </span>%',
									'separator'   => '<span class="screen-reader-text">, </span>',
								) );
								?>
								<p class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading', 'orsay' ); ?></a></p>
							</div>

							<div class="post-meta">
								<div class="post-share">

									<?php get_template_part( 'part', 'social-sharing' ); ?>

								</div>
								<div class="meta-info">
									<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
										<span><?php comments_popup_link( esc_html__( 'Leave a comment', 'orsay' ), esc_html__( '1 Comment', 'orsay' ), esc_html__( '% Comments', 'orsay' ) ); ?></span>
									<?php else: ?>
										<span class="post-comments-off"><?php esc_html_e( 'Comments Off', 'orsay' ); ?></span>
									<?php endif; ?>
								</div>
							</div>
							
					</article>
