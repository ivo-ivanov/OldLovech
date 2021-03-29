<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$infos = get_field('infos');
$backgroundImage = get_field('image');
$count = 1;
$countAnimation = 3;


echo '<!--====== CALL TO ACTION END ======-->
<section class="cta-section pt-115 pb-50" id="about-block">
    <div class="container">
        <div class="cta-inner" style="background-image: url('. esc_url($backgroundImage) .');">
            <div class="row justify-content-center">

                <div class="col-lg-9 col-md-10 col-sm-11 col-10 order-1 order-lg-2">
                    <!-- feature loop -->
                    <div class="cta-features">';

						foreach($infos as $info) {

							$title = $info['title'];
							$text = $info['text'];
							$icon = $info['icon'];

							echo '<!-- feature box -->
							<div class="single-feature wow fadeInUp" data-wow-delay=".'. $countAnimation++ .'s">
							    <div class="icon">
							        <i class="flaticon-'. esc_attr($icon) .'"></i>
							    </div>
							    <div class="cta-desc">
							        <h3>'. esc_html($title) .'</h3>
							        '. wp_kses_post($text) .'
							        <span class="count">0'. $count++ .'</span>
							    </div>
							</div>';
						}

                    echo '</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== CALL TO ACTION END ======--> ';
?>
