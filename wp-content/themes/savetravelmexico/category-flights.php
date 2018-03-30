<?php get_header(); ?>
<article class="content text-center">
  <div class="container">
    <?php echo category_description(); ?>
  </div>
</article>
<?php
$id = 16; // номер категории
$flights = new WP_Query([
  'cat' => $id,
  'posts_per_page' => 30,
  //'order' => 'ASC'
]);
?>
<?php if ($flights->post_count < 4) {?>
  <?php if ($flights->have_posts()) {?>
    <section class="flights">
      <div class="container">
        <h2 class="flights__heading">Направления</h2>
        <div class="row">
          <?php while ($flights->have_posts()) : $flights->the_post(); ?>
            <div class="col-md-4 col-sm-4">
              <div class="flights__item">
                <?php if ( has_post_thumbnail() ) {?>
                  <div class="flights__item-img">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                  </div>
                <?php }?>

                <div class="flights__item-heading">
                  <h2><?php the_title(); ?></h2>
                  <?php if (get_post_meta(get_the_ID(), 'price_flights', true)) {?>
                    <div class="flights__item-price"><?php echo get_post_meta(get_the_ID(), 'price_flights', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
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
  <?php if ($flights->have_posts()) {?>
    <section class="flights">
      <div class="container">
        <h2 class="flights__heading">Направления</h2>
        <div class="owl-carousel js-flights">
          <?php while ($flights->have_posts()) : $flights->the_post(); ?>
            <div class="owl-item">
              <div class="flights__item">
                <?php if ( has_post_thumbnail() ) {?>
                  <div class="flights__item-img">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                  </div>
                <?php }?>

                <div class="flights__item-heading">
                  <h2><?php the_title(); ?></h2>
                  <?php if (get_post_meta(get_the_ID(), 'price_flights', true)) {?>
                    <div class="flights__item-price"><?php echo get_post_meta(get_the_ID(), 'price_flights', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
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

<section class="reservation-flights">
  <div class="reservation-flights__wrapper">
    <div class="reservation-flights__wrapper-bg">
      <div class="container">
        <h2 class="reservation-flights__heading">Зарезервируй перелет с нами</h2>
        <div class="reservation-flights__description">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis deleniti doloremque eaque labore libero minus praesentium quo repudiandae temporibus? Consectetur eaque expedita harum illo in iusto nesciunt rem tenetur.</p>
        </div>
        <div class="reservation-flights__form-wrapper">
          <form class="reservation-flights__form" action="#" method="post">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="reservation-flights__wrapper-input">
                  <input class="reservation-flights__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-flights__wrapper-input">
                  <input class="reservation-flights__input" type="text" autocomplete="off" name="phone" placeholder="Телефон">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-flights__wrapper-input">
                  <input class="reservation-flights__input" type="text" autocomplete="off" name="email" placeholder="Email">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-flights__wrapper-input">
                  <input class="reservation-flights__input" type="text" autocomplete="off" name="departure" placeholder="Место вылета">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-flights__wrapper-input">
                  <input class="reservation-flights__input" type="text" autocomplete="off" name="arrival" placeholder="Место прилета">
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="reservation-flights__wrapper-input">
                  <input class="reservation-flights__input" id="time" autocomplete="off" type="text" name="date" placeholder="Дата и время вылета">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="reservation-flights__wrapper-textarea">
                  <textarea class="reservation-flights__textarea" name="comment" placeholder="Комментарий"></textarea>
                </div>
              </div>
            </div>
            <div class="reservation-flights__wrapper-checkbox">
              <input id="chk" type="checkbox" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="#">обработку</a> персональных данных</label>
            </div>
            <div class="reservation-flights__wrapper-button">
              <button class="reservation-flights__btn reservation-flights__btn_blue" type="submit">Зарезервировать</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
