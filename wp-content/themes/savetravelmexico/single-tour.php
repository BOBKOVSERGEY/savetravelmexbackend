<?php get_header('tour'); ?>
  <section class="tour-slider">
    <?php
    $slider = get_post_meta($post->ID, 'slider_tour', true);
    ?>
    <?php if(!empty($slider)) { $slider = explode(",", $slider); ?>
      <div class="swiper-container tour-slider__container">
        <div class="swiper-wrapper">
          <?php foreach ($slider as $item) {?>

            <div class="swiper-slide tour-slider__item" style="background-image: url(<?php echo wp_get_attachment_image_url($item, 'full') ?>);">
            </div>
          <?php } ?>
        </div>
        <!-- Add Arrows
        <div class="swiper-button-white swiper-button-next"></div>
        <div class="swiper-button-white swiper-button-prev"></div>-->
      </div>
    <?php } else {?>
      <div class="swiper-container tour-slider__container">
        <div class="swiper-wrapper">
          <div class="swiper-slide tour-slider__item" style="background-image: url('<?php bloginfo('template_url')?>/dist/images/slider-10.jpg');">

          </div>
          <div class="swiper-slide tour-slider__item" style="background-image: url('<?php bloginfo('template_url')?>/dist/images/slider-5.jpg');">

          </div>
        </div>
        <!-- Add Arrows
        <div class="swiper-button-white swiper-button-next"></div>
        <div class="swiper-button-white swiper-button-prev"></div>-->
      </div>
  <?php }  ?>
    <div class="tour-slider__caption">
      <div class="container">
        <h1 class="tour-slider__heading"><?php the_title();?></h1>
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' / '); ?>
      </div>
    </div>
    <div class="tour-slider__bottom-panel" id="description">
      <svg width="104" height="33">
        <path style="fill:#ffffff;fill-opacity:1" d="m 0.01291655,16.605668 0,-16.62382923 5.25000005,0.439007 C 12.962198,1.0646618 18.007648,4.7929098 22.364223,13.057557 c 6.80539,12.91018 16.468604,19.152403 29.648693,19.152403 13.180088,0 22.843308,-6.242223 29.648698,-19.152403 4.35657,-8.2646472 9.40202,-11.9928952 17.1013,-12.63671123 l 5.250006,-0.439007 0,16.62382923 0,16.62383 -52.000004,0 -51.99999945,0 0,-16.62383 z"></path>
      </svg><i data-custom-scroll-to="description" class="fa fa-chevron-down slider__bottom-panel-icon" aria-hidden="true"></i>
    </div>
  </section>
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
  <article class="content content_tour">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>
<?php endif; ?>

<?php
$gallery = get_post_meta($post->ID, 'gallery_tour', true);
?>
<?php if(!empty($gallery)) { $gallery = explode(",", $gallery); ?>
  <section class="photo-gallery">
    <div class="container-fluid">
      <h2 class="photo-gallery__heading">Фотогалерея</h2>
      <div data-photo-swipe-gallery="gallery" class="owl-carousel js-photo-gallery">
        <?php foreach ($gallery as $item) {?>
          <div class="owl-item">
            <a data-photo-swipe-item="" data-size="1280x720" href="<?php echo wp_get_attachment_image_url($item, 'full') ?>" class="thumbnail-rayen">
              <span class="figure"><img src="<?php echo wp_get_attachment_image_url($item, 'full') ?>" alt=""></span>
              <span class="figcaption"><span class="fa fa-search-plus"></span></span>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>

  <section class="reservation-tours">
    <div class="reservation-tours__wrapper">
      <div class="reservation-tours__wrapper-bg">
        <div class="container">
          <h2 class="reservation-tours__heading">Зарезервируй свое путешествие с нами</h2>
          <div class="reservation-tours__description">
            <p>Наслаждайтесь своим временем в Мексике. Наша компания позаботиться о вашем отдыхе с индивидуальным сервисом для Вас и вашей семьи. Мы не только сохраним Ваши время и деньги, но и сделаем Ваш отдых незабываемым.</p>
          </div>
          <div class="reservation-tours__form-wrapper">
            <form class="reservation-tours__form" action="#" method="post">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-tours__wrapper-input">
                    <input class="reservation-tours__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-tours__wrapper-input">
                    <input class="reservation-tours__input" type="text" autocomplete="off" name="phone" placeholder="Телефон">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-tours__wrapper-input">
                    <input class="reservation-tours__input" type="text" autocomplete="off" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-tours__wrapper-input">
                    <input class="reservation-tours__input" type="text" autocomplete="off" name="hotel" placeholder="Ваш Отель">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-tours__wrapper-input">
                    <input class="reservation-tours__input" id="time" autocomplete="off" type="text" name="date" placeholder="Дата поездки">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-tours__wrapper-input">
                    <input class="reservation-tours__input" type="text" autocomplete="off" name="language" placeholder="Язык">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="reservation-tours__wrapper-textarea">
                    <textarea class="reservation-tours__textarea" name="comment" placeholder="Комментарий"></textarea>
                  </div>
                </div>
              </div>
              <div class="reservation-tours__wrapper-checkbox">
                <input id="chk" type="checkbox" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="/soglasie-na-obrabotku-dannyh/">обработку</a> персональных данных</label>
              </div>
              <div class="reservation-tours__wrapper-button">
                <button class="reservation-tours__btn reservation-tours__btn_blue" type="submit">Зарезервировать тур</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>