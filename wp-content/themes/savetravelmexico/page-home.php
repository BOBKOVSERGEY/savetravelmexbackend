<?php get_header(); ?>
<?php get_header(); ?>
<?php $slider = new WP_Query(
  [
    'post_type' => 'slider',
    'order' => 'ASC',
    'posts_per_page' => 10
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
  <section  class="about">
    <div class="container">
      <?php $about = new WP_Query( 'pagename=o-kompanii' ); ?>
      <?php if ($about->have_posts()) :  while ($about->have_posts()) : $about->the_post(); ?>
        <?php if (get_post_meta(get_the_ID(), 'who_is_we_main_about', true)) {?>
          <h2 class="about__heading">
            <?php echo get_post_meta(get_the_ID(), 'who_is_we_main_about', true); ?>
          </h2>
        <?php } ?>
        <?php if (get_post_meta(get_the_ID(), 'description_main_about', true)) {?>
          <div class="about__heading-description">
            <?php echo get_post_meta(get_the_ID(), 'description_main_about', true); ?>
          </div>
        <?php } ?>

        <?php the_content(); ?>

      <?php endwhile; ?>
      <?php endif; ?>
      <div class="about__wrapper-button">
        <a href="/o-kompanii/" class="about__button about__button_blue">Подробнее</a>
      </div>
    </div>
  </section>
  <section class="reservation">
    <div class="reservation__wrapper">
      <div class="reservation__wrapper-bg">
        <div class="container">
          <h2 class="reservation__heading">Зарезервируй свое путешествие с нами</h2>
          <div class="reservation__description">
            <p>Наслаждайтесь своим временем в Мексике. Наша компания позаботиться о вашем отдыхе с индивидуальным сервисом для Вас и вашей семьи. Мы не только сохраним Ваши время и деньги, но и сделаем Ваш отдых незабываемым.</p>
          </div>
          <div class="reservation__button">
            <a href="/tours/" class="reservation__btn reservation__btn_blue">Зарезервировать тур</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>