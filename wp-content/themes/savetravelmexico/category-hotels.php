<?php get_header();?>
<article class="content text-center">
  <div class="container">
    <?php echo category_description(); ?>
  </div>
</article>
<?php
$id = 17; // номер категории
$hotels = new WP_Query([
  'cat' => $id,
  'posts_per_page' => 30,
  //'order' => 'ASC'
]);
?>
<?php if ($hotels->post_count < 4) {?>
  <?php if ($hotels->have_posts()) {?>
    <section class="hotels">
      <div class="container">
        <h2 class="hotels__heading">Отели</h2>
        <div class="row">
          <?php while ($hotels->have_posts()) : $hotels->the_post(); ?>
            <div class="col-md-4 col-sm-4">
              <div class="hotels__item">
                <?php if ( has_post_thumbnail() ) {?>
                  <div class="hotels__item-img">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                  </div>
                <?php }?>

                <div class="hotels__item-heading">
                  <h2><?php the_title(); ?></h2>
                  <?php if (get_post_meta(get_the_ID(), 'price_hotel', true)) {?>
                    <div class="hotels__item-price"><?php echo get_post_meta(get_the_ID(), 'price_hotel', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php } else { ?>
    <p>Пока нет отелей</p>
  <?php } ?>
<?php } else {?>
  <?php if ($hotels->have_posts()) {?>
    <section class="hotels">
      <div class="container">
        <h2 class="hotels__heading">Направления</h2>
        <div class="owl-carousel js-hotels">
          <?php while ($hotels->have_posts()) : $hotels->the_post(); ?>
            <div class="owl-item">
              <div class="hotels__item">
                <?php if ( has_post_thumbnail() ) {?>
                  <div class="hotels__item-img">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                  </div>
                <?php }?>

                <div class="hotels__item-heading">
                  <h2><?php the_title(); ?></h2>
                  <?php if (get_post_meta(get_the_ID(), 'price_hotel', true)) {?>
                    <div class="hotels__item-price"><?php echo get_post_meta(get_the_ID(), 'price_hotel', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php } else { ?>
    <p>Пока нет отелей</p>
  <?php } ?>
<?php }?>
  <section class="reservation-hotels">
    <div class="reservation-hotels__wrapper">
      <div class="reservation-hotels__wrapper-bg">
        <div class="container">
          <h2 class="reservation-hotels__heading">Зарезервируй отель с нами</h2>
          <div class="reservation-hotels__description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis deleniti doloremque eaque labore libero minus praesentium quo repudiandae temporibus? Consectetur eaque expedita harum illo in iusto nesciunt rem tenetur.</p>
          </div>
          <div class="reservation-hotels__form-wrapper">
            <form class="reservation-hotels__form" action="#" method="post">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-hotels__wrapper-input">
                    <input class="reservation-hotels__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-hotels__wrapper-input">
                    <input class="reservation-hotels__input" type="text" autocomplete="off" name="phone" placeholder="Телефон">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-hotels__wrapper-input">
                    <input class="reservation-hotels__input" type="text" autocomplete="off" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-hotels__wrapper-input">
                    <input class="reservation-hotels__input time-reserve-hotels" autocomplete="off" type="text" name="date_arrival" placeholder="Дата заезда">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-hotels__wrapper-input">
                    <input class="reservation-hotels__input time-reserve-hotels" autocomplete="off" type="text" name="date_departure" placeholder="Дата выезда">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-hotels__wrapper-input">
                    <input class="reservation-hotels__input" type="text" autocomplete="off" name="person" placeholder="Количество человек">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="reservation-hotels__wrapper-textarea">
                    <textarea class="reservation-hotels__textarea" name="comment" placeholder="Комментарий"></textarea>
                  </div>
                </div>
              </div>
              <div class="reservation-hotels__wrapper-checkbox">
                <input id="chk" type="checkbox" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="#">обработку</a> персональных данных</label>
              </div>
              <div class="reservation-hotels__wrapper-button">
                <button class="reservation-hotels__btn reservation-hotels__btn_blue" type="submit">Зарезервировать</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer();?>