<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$subTitle = get_field('subtitle');
$title = get_field('title');
$buttons = get_field('buttons');
$button1 = $buttons['button_1'];
$button2 = $buttons['button_2'];
$slider = get_field('slider');


echo '<!--====== BLOCK HERO START ======-->
<section class="block-hero acf-block banner-area banner-style-one">
	<div class="container container-custom-two">

		<div class="row align-items-center">

			<div class="col-lg-6 col-md-6">
				<div class="banner-content">

					<span class="promo-tag wow fadeInDown" data-wow-delay=".3s">'. esc_html($subTitle) .'</span>

					<h1 class="title wow fadeInLeft" data-wow-delay=".5s">'. esc_html($title) .'</h1>';

					if($button1 || $button2){
					echo '<ul>';
						if($button1){
							echo '<li>
								<a class="main-btn btn-filled wow fadeInUp" data-wow-delay=".7s" href="'. esc_url($buttons['button_1_url']) .'">'. esc_html($button1) .'</a>
							</li>';
						}
						if($button2){
							echo '<li>
								<a class="main-btn btn-filled wow fadeInUp" data-wow-delay=".9s" href="'. esc_url($buttons['button_2_url']) .'">'. esc_html($button2) .'</a>
							</li>';
						}

					echo '</ul>';
					}

				echo '</div>
			</div>';

			if($slider) {
				echo '<div class="col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0.5s">
					<div class="banner-thumb d-none d-md-block">
						<div class="hero-slider-one">';

						foreach($slider as $slide) {
							echo '<div class="single-thumb">
								<img src="'. esc_url($slide['url']) .'" alt="images">
							</div>';
						}

						echo '</div>
					</div>
				</div>';
			}

		echo '</div>';

		$reviews = get_field('reviews');
		if($reviews) {
		echo '<section class="booking-form boxed-layout">

		<div class="row justify-content-center">
			<div class="col-xl-10 col-11">
				<div class="booking-form-inner">
						<div class="row align-items-end">';

						foreach($reviews as $review) {

							$logo = $review['logo'];
							$rating = $review['rating'];

							echo '<div class="col-lg-3 col-md-6">
								<div class="review-logo" style="background-image:url('. esc_url($logo) .')"></div>
								<div class="review-rating">'. esc_html($rating) .'</div>
							</div>';

						}

							echo' <div class="col-lg-3 col-md-6">
								<a class="main-btn btn-filled wow fadeInUp" data-wow-delay=".7s" href="#1">Резервация</a>
							</div>
						</div>
				</div>
			</div>
		</div>

		</section>';
		}


	echo '</div>
</section>
<!--====== BLOCK HERO ENDS ======-->';
?>
