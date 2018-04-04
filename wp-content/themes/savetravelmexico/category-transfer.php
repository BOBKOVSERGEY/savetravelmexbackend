<?php get_header(); ?>
  <article class="content">
    <div class="container">
      <?php echo category_description(); ?>
    </div>
  </article>
<?php
$id = 14; // номер категории
$transfer = new WP_Query([
  'cat' => $id,
  'posts_per_page' => 30,
  //'order' => 'ASC'
]);
?>
<?php if ($transfer->have_posts()) {?>
  <section class="directions">
    <div class="container">
    <h2 class="directions__heading">Направления</h2>
      <div class="owl-carousel js-directions">
        <?php while ($transfer->have_posts()) : $transfer->the_post(); ?>
          <div class="owl-item">
            <div class="directions__item">
              <?php if ( has_post_thumbnail() ) {?>
                <div class="directions__item-img">
                  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                </div>
              <?php }?>

              <div class="directions__item-heading">
                <h2><?php the_title(); ?></h2>
                <?php if (get_post_meta(get_the_ID(), 'price_transfer', true)) {?>
                  <div class="directions__item-price"><?php echo get_post_meta(get_the_ID(), 'price_transfer', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
                <?php } ?>
                <?php if (get_post_meta(get_the_ID(), 'price_transfer_vip', true)) {?>
                  <div class="directions__item-price-vip">Vip <?php echo get_post_meta(get_the_ID(), 'price_transfer_vip', true); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
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
  <section class="reservation-directions">
    <div class="reservation-directions__wrapper">
      <div class="reservation-directions__wrapper-bg">
        <div class="container">
          <h2 class="reservation-directions__heading">Зарезервируй трансфер с нами</h2>
          <div class="reservation-directions__description">
            <p>В комментарии укажите,  vip (личный, приватный)  или групповой трансфер. Alias blanditiis deleniti doloremque eaque labore libero minus praesentium quo repudiandae temporibus? Consectetur eaque expedita harum illo in iusto nesciunt rem tenetur.</p>
          </div>
          <div class="reservation-directions__form-wrapper">
            <form class="reservation-directions__form" action="#" method="post">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-directions__wrapper-input">
                    <input class="reservation-directions__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-directions__wrapper-input">
                    <input class="reservation-directions__input" type="text" autocomplete="off" name="phone" placeholder="Телефон">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-directions__wrapper-input">
                    <input class="reservation-directions__input" type="text" autocomplete="off" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-directions__wrapper-input">
                    <input class="reservation-directions__input" type="text" autocomplete="off" name="departure" placeholder="Место отправления">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-directions__wrapper-input">
                    <input class="reservation-directions__input" id="time" autocomplete="off" type="text" name="date" placeholder="Дата и время поездки">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-directions__wrapper-input">
                    <input class="reservation-directions__input" type="text" autocomplete="off" name="quantity" placeholder="Количество человек">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="reservation-directions__wrapper-textarea">
                    <textarea class="reservation-directions__textarea" name="comment" placeholder="Комментарий"></textarea>
                  </div>
                </div>
              </div>
              <div class="reservation-directions__wrapper-checkbox">
                <input id="chk" type="checkbox" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="#">обработку</a> персональных данных</label>
              </div>
              <div class="reservation-directions__wrapper-button">
                <button class="reservation-directions__btn reservation-directions__btn_blue" type="submit">Зарезервировать</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>