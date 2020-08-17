<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage WPBlank
 * @since WPBlank 1.0
 */

 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

?>
	<!--====== .wrapper END ======-->
	</div>
			<!--====== FOOTER PART START ======-->
			<footer>
			    <div class="copyright-area pt-20 pb-20">
			        <div class="container">
			            <div class="row align-items-center">
			                <div class="col-md-5 order-2 order-md-1">
			                    <p class="copyright-text">&copy;
									<?php
									echo date_i18n(
										/* translators: Copyright date format, see https://www.php.net/date */
										_x( 'Y', 'copyright date format', 'wpblank' )
									);
									?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
								</p>
			                </div>

							<?php $social = get_field('media', 'options');
							if($social) {
								echo '<div class="col-md-7 order-1 order-md-2">
				                    <div class="social-links">';

									foreach($social as $media) {

										$class = $media['media'];
										$url = $media['url'];

										echo'<a href="'. esc_url($url) .'" target="_blank" rel="nofollow">
											<i class="fab '. esc_attr($class) .'"></i>
										</a>';

									}

									echo '</div>
								</div>';
							} ?>

			            </div>
			        </div>
			    </div>
			</footer>
			<!--====== FOOTER PART END ======-->


		<?php wp_footer(); ?>

	</body>
</html>
