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

        <?php the_excerpt(); ?>

      <?php endwhile; ?>
      <?php endif; ?>
      <div class="about__wrapper-button">
        <a href="/o-kompanii/" class="about__button about__button_blue">Подробнее</a>
      </div>
    </div>
  </section>
<?php
$services = new WP_Query([
  'post_type' => 'services',
  //'order' => 'ASC',
  'posts_per_page' => 6
]);
?>
<?php if ($services->have_posts()) {?>
  <section class="categories-tours">
    <div class="container-fluid">
      <h2 class="categories-tours__heading">Наши услуги</h2>
      <div class="row categories-tours__wrapper-item">
        <?php while ($services->have_posts()) : $services->the_post(); ?>
          <div class="col-md-4 col-sm-6">
            <div class="categories-tours__item">
              <?php if ( has_post_thumbnail() ) {?>
                <div class="categories-tours__item-img-wrap">
                  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" width="641" height="516"  alt="<?php the_title(); ?>">
                </div>
              <?php }?>

              <div class="categories-tours__item-body">

                <h2 class="categories-tours__item-heading">
                  <?php the_title(); ?>
                </h2>
                <div class="categories-tours__item-description">
                  <?php
                  echo wp_trim_words(get_the_content() , 10);
                  ?>
                </div>
                <?php if (get_post_meta(get_the_ID(), 'service_link', true)) {?>
                  <div class="categories-tours__item-button">
                    <a href="<?php echo get_post_meta(get_the_ID(), 'service_link', true); ?>" class="categories-tours__item-btn categories-tours__item-btn_primary">Подробнее</a>
                  </div>
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

<?php
$id = 13; // номер категории
$advantages = new WP_Query([
  'cat' => $id,
  'posts_per_page' => 3,
  'order' => 'DESC'
]);
?>
<?php if ($advantages->have_posts()) {?>
  <section class="our-services">
    <div class="container">
      <h2 class="our-services__heading"><?php echo get_cat_name(13)?></h2>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <div class="our-services__description"><?php echo category_description(13); ?></div>
        </div>
      </div>
    <div class="row">

              <?php while ($advantages->have_posts()) : $advantages->the_post(); ?>
                <div class="col-md-4">
                  <div class="our-services__item">

                    <?php if (get_post_meta(get_the_ID(), 'icon_advantages_main', true)) {?>
                      <div class="our-services__item-icon">
                        <?php echo get_post_meta(get_the_ID(), 'icon_advantages_main', true); ?>
                      </div>
                    <?php } ?>
                    <div class="our-services__item-heading"><?php the_title(); ?></div>
                    <div class="our-services__item-description">
                      <?php the_content(); ?>
                    </div>

                    <div class="our-services__item-dot">...</div>
                  </div>
                </div>
              <?php endwhile; ?>
    </div>
    </div>
  </section>
<?php } else { ?>
  <!-- no-post-found -->
<?php } ?>
<?php
$args = [
  'category_name' => 'reviews',
  'posts_per_page' => 6
];
$reviews = new WP_Query($args);
?>
<?php if ($reviews->have_posts()) {?>
  <section class="reviews">
    <div class="reviews__wrapper">
      <div class="container">
        <h2 class="reviews__heading">Что говорят клиенты</h2>
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <div class="owl-carousel js-reviews">
              <?php while ($reviews->have_posts()) : $reviews->the_post(); ?>
                <div class="owl-item">
                  <div class="reviews__item">
                    <div class="reviews__item-img">
                      <?php the_post_thumbnail([126,126]);?>
                    </div>
                    <div class="reviews__item-description">
                      <?php the_excerpt(); ?>
                    </div>
                    <div class="reviews__item-author">
                      <?php the_title(); ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
              </div>
              <div class="reviews__button-all-review">
                <a href="/reviews/" class="reviews__btn reviews__btn_blue">Все отзывы</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php } else { ?>
  <!-- no-post-found -->
<?php } ?>
<?php
$id = 1; // номер категории
$blogPosts = new WP_Query([
  'cat' => $id,
  'posts_per_page' => 6,
  'order' => 'DESC'
]);
?>
<?php if ($blogPosts->have_posts()) {?>
  <section class="blog">
  <div class="container">
  <h2 class="blog__heading">Блог</h2>
  <div class="blog__intro">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <?php echo category_description(1); ?>
      </div>
    </div>
  </div>
  <div class="owl-carousel js-blog">

    <?php while ($blogPosts->have_posts()) : $blogPosts->the_post(); ?>
      <div class="owl-item">
        <div class="blog__item">
          <?php if (get_post_meta(get_the_ID(), 'blog_img_main', true)) {?>
            <div class="blog__item-img">
              <img src="<?php echo get_post_meta(get_the_ID(), 'blog_img_main', true); ?>" alt="">
            </div>
          <?php } else {?>
            <div class="blog__item-img">
              <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
            </div>
      <?php } ?>
          <div class="blog__item-heading">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          </div>
        </div>
      </div>
    <?php endwhile; ?>

  </div>
    <div class="blog__button-all-article">
      <a href="<?php echo get_category_link(1)?>" class="blog__btn blog__btn_blue">Все статьи</a>
    </div>
  </div>
  </section>
<?php } else { ?>
  <!-- no-post-found -->
<?php } ?>
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