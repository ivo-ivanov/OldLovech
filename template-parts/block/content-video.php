<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text = get_field('description');
$video = get_field('youtube_url');
$videoThumb = get_field('video_thumbnail');


echo '<!--====== TEXT BLOCK START ======-->
<section class="block-video acf-block text-block pt-115">
    <div class="container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
			<div class="col-lg-7 col-md-10 wow fadeInRight" data-wow-delay=".5s">
				<div class="video-wrap" style="background-image: url('. esc_url($videoThumb) .');">
					<a href="'. esc_url($video) .'" class="popup-video"><i class="fas fa-play"></i></a>
				</div>
			</div>
            <div class="col-lg-5 col-md-8 col-sm-10 wow fadeInLeft" data-wow-delay=".3s">
                <div class="block-text mb-small">
                    <div class="section-title mb-20">
                        <h2 class="video-heading">'. esc_html($text) .'</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== TEXT BLOCK END ======-->';
?>
