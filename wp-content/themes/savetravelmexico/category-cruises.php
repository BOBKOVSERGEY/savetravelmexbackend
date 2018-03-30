<?php get_header(); ?>
  <article class="content text-center">
    <div class="container">
      <?php echo category_description(); ?>
    </div>
  </article>
<?php
$id = 18; // номер категории
$cruises = new WP_Query([
  'cat' => $id,
  'posts_per_page' => 30,
  //'order' => 'ASC'
]);
?>
<?php if ($cruises->post_count < 4) {?>
  <?php if ($cruises->have_posts()) {?>
    <section class="cruises">
      <div class="container">
        <h2 class="cruises__heading">Направления</h2>
        <div class="row">
          <?php while ($cruises->have_posts()) : $cruises->the_post(); ?>
            <div class="col-md-4 col-sm-4">
              <div class="cruises__item">
                <?php if ( has_post_thumbnail() ) {?>
                  <div class="cruises__item-img">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                  </div>
                <?php }?>

                <div class="cruises__item-heading">
                  <h2><?php the_title(); ?></h2>
                  <?php if (get_post_meta(get_the_ID(), 'price_cruise', true)) {?>
                    <div class="cruises__item-price"><?php echo get_post_meta(get_the_ID(), 'price_cruise', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
                  <?php } ?>
                  <?php if (get_post_meta(get_the_ID(), 'cruise_quantity_day', true)) {?>
                    <div class="cruises__item-quantity-day"><?php echo get_post_meta(get_the_ID(), 'cruise_quantity_day', true); ?></div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php } else { ?>
    <p>Пока нет направлений</p>
  <?php } ?>
<?php } else {?>
  <?php if ($cruises->have_posts()) {?>
    <section class="cruises">
      <div class="container">
        <h2 class="cruises__heading">Направления</h2>
        <div class="owl-carousel js-cruises">
          <?php while ($cruises->have_posts()) : $cruises->the_post(); ?>
            <div class="owl-item">
              <div class="cruises__item">
                <?php if ( has_post_thumbnail() ) {?>
                  <div class="cruises__item-img">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                  </div>
                <?php }?>

                <div class="cruises__item-heading">
                  <h2><?php the_title(); ?></h2>
                  <?php if (get_post_meta(get_the_ID(), 'price_cruise', true)) {?>
                    <div class="cruises__item-price"><?php echo get_post_meta(get_the_ID(), 'price_cruise', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
                  <?php } ?>
                  <?php if (get_post_meta(get_the_ID(), 'cruise_quantity_day', true)) {?>
                    <div class="cruises__item-quantity-day"><?php echo get_post_meta(get_the_ID(), 'cruise_quantity_day', true); ?></div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php } else { ?>
    <p>Пока нет направлений</p>
  <?php } ?>
<?php }?>
  <section class="reservation-cruises">
    <div class="reservation-cruises__wrapper">
      <div class="reservation-cruises__wrapper-bg">
        <div class="container">
          <h2 class="reservation-cruises__heading">Зарезервируй круиз с нами</h2>
          <div class="reservation-cruises__description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis deleniti doloremque eaque labore libero minus praesentium quo repudiandae temporibus? Consectetur eaque expedita harum illo in iusto nesciunt rem tenetur.</p>
          </div>
          <div class="reservation-cruises__form-wrapper">
            <form class="reservation-cruises__form" action="#" method="post">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-cruises__wrapper-input">
                    <input class="reservation-cruises__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-cruises__wrapper-input">
                    <input class="reservation-cruises__input" type="text" autocomplete="off" name="phone" placeholder="Телефон">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-cruises__wrapper-input">
                    <input class="reservation-cruises__input" type="text" autocomplete="off" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-cruises__wrapper-input">
                    <input class="reservation-cruises__input" type="text" autocomplete="off" name="hotel" placeholder="Ваш отель">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-cruises__wrapper-input">
                    <input class="reservation-cruises__input" id="time" autocomplete="off" type="text" name="date" placeholder="Дата и время поездки">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-cruises__wrapper-input">
                    <input class="reservation-cruises__input" type="text" autocomplete="off" name="language" placeholder="Язык">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="reservation-cruises__wrapper-textarea">
                    <textarea class="reservation-cruises__textarea" name="comment" placeholder="Комментарий"></textarea>
                  </div>
                </div>
              </div>
              <div class="reservation-cruises__wrapper-checkbox">
                <input id="chk" type="checkbox" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="#">обработку</a> персональных данных</label>
              </div>
              <div class="reservation-cruises__wrapper-button">
                <button class="reservation-cruises__btn reservation-cruises__btn_blue" type="submit">Зарезервировать</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>