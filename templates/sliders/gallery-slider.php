<?php

$images = $args['images'] ?? [];
$thumbnails = $args['thumbnails'] ?? $images;
$show_thumbnails = $args['show_thumbnails'] ?? count($thumbnails) > 1;
if (count($images) === 0) {
    return;
}
?>


<div class="easyrealestate-slider-container">
    <div class="swiper easyrealestate-slider">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach ($images as $image): ?>
                <!--  -->
                <div class="swiper-slide easyrealestate-slider-slide">
                    <img class="easyrealestate-slider-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['description']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination easyrealestate-slider-pagination"></div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev easyrealestate-slider-button-prev">
            <svg class="swiper-navigation-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                <path fill="currentColor" d="M20 11v2H8l5.5 5.5l-1.42 1.42L4.16 12l7.92-7.92L13.5 5.5L8 11z" />
            </svg>
        </div>
        <div class="swiper-button-next easyrealestate-slider-button-next">
            <svg class="swiper-navigation-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                <path fill="currentColor" d="M4 11v2h12l-5.5 5.5l1.42 1.42L19.84 12l-7.92-7.92L10.5 5.5L16 11z" />
            </svg>
        </div>
    </div>
    <?php if ($show_thumbnails): ?>
        <div class="swiper easyrealestate-slider-thumbnails">
            <div class="swiper-wrapper">
                <?php foreach ($thumbnails as $image): ?>
                    <div class="swiper-slide easyrealestate-slider-thumbnail-slide">
                        <img class="easyrealestate-slider-thumbnail-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['description']); ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>