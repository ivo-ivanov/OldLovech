<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = get_field('description');
$background = get_field('background');
$photo1 = get_field('photo_1');
$photo2 = get_field('photo_2');
$photo3 = get_field('photo_3');

echo '<!--====== BLOCK PRESENTATION START ======-->
<section class="block-presentation acf-block room-gallery-cta " style="background-image: url('. esc_url($background).');">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="cta-text text-center">
					<h2>'. esc_html($title) .'</h2>
					<ul class="mt-50">
						<li class="wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><a class="main-btn btn-filled" href="#">Резервация</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="rotate-images">';
		if($photo1){
			echo '<img src="'. esc_url($photo1) .'" class="rotate-image-one" alt="Image">';
		}
		if($photo2){
			echo '<img src="'. esc_url($photo2) .'" class="rotate-image-two" alt="Image">';
		}
		if($photo3){
			echo '<img src="'. esc_url($photo3) .'" class="rotate-image-three" alt="Image">';
		}
	echo '</div>
</section>
<!--====== BLOCK PRESENTATION ENDS ======-->';
?>
