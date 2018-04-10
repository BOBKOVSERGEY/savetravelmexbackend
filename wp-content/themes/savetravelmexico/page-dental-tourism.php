<?php get_header('tour'); ?>
<section class="dentist-slider">
  <?php
  $slider = get_post_meta(get_the_ID(), 'slider_dentist', true)
  ?>
  <?php if(!empty($slider)) { $slider = explode(",", $slider); ?>
  <div class="swiper-container dentist-slider__container">
    <div class="swiper-wrapper">
      <?php foreach ($slider as $item) {?>
      <div class="swiper-slide dentist-slider__item" style="background-image: url(<?php echo wp_get_attachment_image_url($item, 'full') ?>);">

      </div>
      <?php } ?>
    </div>
    <!-- Add Arrows
    <div class="swiper-button-white swiper-button-next"></div>
    <div class="swiper-button-white swiper-button-prev"></div>-->
  </div>
  <?php } ?>
  <div class="dentist-slider__caption">
    <div class="container">
      <h1 class="dentist-slider__heading"><?php the_title();?></h1>
      <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' / '); ?>
    </div>
  </div>
  <div class="dentist-slider__bottom-panel" id="description">
    <svg width="104" height="33">
      <path style="fill:#ffffff;fill-opacity:1" d="m 0.01291655,16.605668 0,-16.62382923 5.25000005,0.439007 C 12.962198,1.0646618 18.007648,4.7929098 22.364223,13.057557 c 6.80539,12.91018 16.468604,19.152403 29.648693,19.152403 13.180088,0 22.843308,-6.242223 29.648698,-19.152403 4.35657,-8.2646472 9.40202,-11.9928952 17.1013,-12.63671123 l 5.250006,-0.439007 0,16.62382923 0,16.62383 -52.000004,0 -51.99999945,0 0,-16.62383 z"></path>
    </svg><i data-custom-scroll-to="description" class="fa fa-chevron-down slider__bottom-panel-icon" aria-hidden="true"></i>
  </div>
</section>
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
  <article class="content text-center">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>
<?php endif; ?>
<?php
$dentist = new WP_Query([
  'post_type' => 'dentist',
  'order' => 'ASC',
  'posts_per_page' => 30
]);
?>
<?php if ($dentist->post_count < 4) {?>
  <?php if ($dentist->have_posts()) {?>
    <section class="dentist">
      <div class="container">
        <h2 class="dentist__heading">Пакеты</h2>
        <div class="row">
          <?php while ($dentist->have_posts()) : $dentist->the_post(); ?>
            <div class="col-md-4 col-sm-4">
              <div class="dentist__item">
                <?php if ( has_post_thumbnail() ) {?>
                  <div class="dentist__item-img">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                  </div>
                <?php }?>

                <div class="dentist__item-heading">
                  <h2><?php the_title(); ?></h2>
                  <?php if (get_post_meta(get_the_ID(), 'price_dentist_package', true)) {?>
                    <div class="dentist__item-price"><?php echo get_post_meta(get_the_ID(), 'price_dentist_package', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php } else { ?>
  <?php } ?>
<?php } else {?>
  <?php if ($dentist->have_posts()) {?>
    <section class="dentist">
      <div class="container">
        <h2 class="dentist__heading">Пакеты</h2>
        <div class="owl-carousel js-dentist">
          <?php while ($dentist->have_posts()) : $dentist->the_post(); ?>
      <div class="owl-item">
        <div class="dentist__item">
          <?php if ( has_post_thumbnail() ) {?>
            <div class="dentist__item-img">
              <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
            </div>
          <?php }?>

          <div class="dentist__item-heading">
            <h2><?php the_title(); ?></h2>
            <?php if (get_post_meta(get_the_ID(), 'price_dentist_package', true)) {?>
              <div class="dentist__item-price"><?php echo get_post_meta(get_the_ID(), 'price_dentist_package', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
            <?php } ?>
          </div>
        </div>
      </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php } else { ?>

  <?php } ?>
<?php }?>
<section class="reservation-dentist">
  <div class="reservation-dentist__wrapper">
    <div class="reservation-dentist__wrapper-bg">
      <div class="container">
        <h2 class="reservation-dentist__heading">Зарезервируй стоматолога с нами</h2>
        <div class="reservation-dentist__description">
          <p>Наслаждайтесь своим временем в Мексике. Наша компания позаботиться о вашем отдыхе с индивидуальным сервисом для Вас и вашей семьи. Мы не только сохраним Ваши время и деньги, но и сделаем Ваш отдых незабываемым.</p>
        </div>
        <div class="reservation-dentist__form-wrapper">
          <form class="reservation-dentist__form" action="#" method="post">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="reservation-dentist__wrapper-input">
                  <input class="reservation-dentist__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-dentist__wrapper-input">
                  <input class="reservation-dentist__input" type="text" autocomplete="off" name="phone" placeholder="Телефон">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-dentist__wrapper-input">
                  <input class="reservation-dentist__input" type="text" autocomplete="off" name="email" placeholder="Email">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-dentist__wrapper-input">
                  <input class="reservation-dentist__input" type="text" autocomplete="off" name="hotel" placeholder="Ваш Отель">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-dentist__wrapper-input">
                  <input class="reservation-dentist__input" id="time" autocomplete="off" type="text" name="date" placeholder="Дата">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-dentist__wrapper-input">
                  <input class="reservation-dentist__input" type="text" autocomplete="off" name="language" placeholder="Язык">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="reservation-dentist__wrapper-textarea">
                  <textarea class="reservation-dentist__textarea" name="comment" placeholder="Комментарий"></textarea>
                </div>
              </div>
            </div>
            <div class="reservation-dentist__wrapper-checkbox">
              <input id="chk" type="checkbox" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="#">обработку</a> персональных данных</label>
            </div>
            <div class="reservation-dentist__wrapper-button">
              <button class="reservation-dentist__btn reservation-dentist__btn_blue" type="submit">Зарезервировать тур</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
