<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage WPBlank
 * @since WPBlank 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php the_content(); ?>
</article><!-- .post -->
