<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$infos = get_field('infos');

echo '<!--====== CONTENT SLIDER START ======-->
<section class="room-slider">
	<div class="container-fluid p-0">
		<div class="row rooms-slider-one">';

						foreach($infos as $info) {

							$image = $info['image'];

							echo '<!-- info image -->
							<div class="col">
								<div class="slider-img" style="background-image: url('. esc_url($image) .');">
								</div>
							</div>';
						}

                    echo '</div>
				</div>';

				echo '<div class="rooms-content-wrap">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-xl-4 col-lg-5 col-sm-8">
								<div class="room-content-box">
									<div class="slider-count"></div>
									<div class="slider-count-big"></div>
									<div class="room-content-slider">';

									foreach($infos as $info) {

										$title = $info['title'];
										$info = $info['description'];


										echo '<div class="single-content">
											<div class="icon">
												<i class="flaticon-sign-1"></i>
											</div>
											<h3>'. esc_html($title) .'</h3>
											<p>'. esc_html($info) .'</p>
										</div>';

									}

									echo '</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
<!--====== INFO SLIDER END ======--> ';
?>
