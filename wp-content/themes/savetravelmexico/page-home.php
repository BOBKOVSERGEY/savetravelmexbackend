<?php get_header(); ?>
<?php get_header(); ?>
<?php $slider = new WP_Query(
  [
    'post_type' => 'slider',
    'order' => 'ASC'
  ]
); ?>
<?php if ($slider->have_posts()) {?>
  <section class="slider">
    <div class="swiper-container slider__container">
      <div class="swiper-wrapper">
        <?php while ($slider->have_posts()) : $slider->the_post(); ?>
          <div class="swiper-slide slider__item" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>">
            <div class="slider__caption">
              <div class="container">
                <div class="row">
                  <div class="col-md-10 col-md-offset-1 text-center">
                    <h2 class="slider__heading"><?php the_title();?></h2>
                    <?php if (get_post_meta(get_the_ID(), 'description_slider', true)) {?>
                      <div class="slider__description">
                        <?php echo get_post_meta(get_the_ID(), 'description_slider', true); ?>
                      </div>
                    <?php } ?>
                    <?php if (get_post_meta(get_the_ID(), 'button_slider', true)) {?>
                      <div class="slider__buttons">
                        <?php echo get_post_meta(get_the_ID(), 'button_slider', true); ?>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <!-- Add Arrows
      <div class="swiper-button-white swiper-button-next"></div>
      <div class="swiper-button-white swiper-button-prev"></div>-->
    </div>
    <div class="slider__bottom-panel" id="about">
      <svg width="104" height="33">
        <path style="fill:#ffffff;fill-opacity:1" d="m 0.01291655,16.605668 0,-16.62382923 5.25000005,0.439007 C 12.962198,1.0646618 18.007648,4.7929098 22.364223,13.057557 c 6.80539,12.91018 16.468604,19.152403 29.648693,19.152403 13.180088,0 22.843308,-6.242223 29.648698,-19.152403 4.35657,-8.2646472 9.40202,-11.9928952 17.1013,-12.63671123 l 5.250006,-0.439007 0,16.62382923 0,16.62383 -52.000004,0 -51.99999945,0 0,-16.62383 z"></path>
      </svg><i data-custom-scroll-to="about" class="fa fa-chevron-down slider__bottom-panel-icon" aria-hidden="true"></i>
    </div>
  </section>
<?php } else { ?>
  <p>Место для слайдера</p>
<?php } ?>
<?php get_footer(); ?>