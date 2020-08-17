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
</div><!-- .wrapper -->
		<footer id="site-footer" role="contentinfo">

			<div class="section-inner">

				<div class="footer-credits">

					<p class="footer-copyright">&copy;
						<?php
						echo date_i18n(
							/* translators: Copyright date format, see https://www.php.net/date */
							_x( 'Y', 'copyright date format', 'wpblank' )
						);
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					</p><!-- .footer-copyright -->

				</div><!-- .footer-credits -->

			</div><!-- .section-inner -->

		</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
