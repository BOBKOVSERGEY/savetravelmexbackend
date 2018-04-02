<?php get_header(); ?>
  <article class="content content_tour">
    <div class="container">
      <?php echo category_description(); ?>
    </div>
  </article>


<?php
$id = 6;
$categoryTours = new WP_Query([
  'cat' => $id,
  'posts_per_page' => 50,
  //'order' => 'ASC'
]);
?>
<?php if ($categoryTours->post_count < 4) {?>
  <section class="tours">
    <div class="container">
      <h2 class="tours__heading">Туры</h2>
      <div class="row">
        <?php if ($categoryTours->have_posts()) :  while ($categoryTours->have_posts()) : $categoryTours->the_post(); ?>
          <div class="col-md-4 col-sm-4">
            <div class="tours__item">
              <?php if ( has_post_thumbnail() ) {?>
                <div class="tours__item-img">
                  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                </div>
              <?php }?>
              <div class="tours__item-heading">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="tours__item-price"><?php if (get_post_meta(get_the_ID(), 'price_tour', true)) {?><?php echo get_post_meta(get_the_ID(), 'price_tour', true); ?> <i class="fa fa-rub" aria-hidden="true"></i><?php } ?></div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php else: ?>
          <p>Туров пока нет!</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php } else { ?>
  <section class="tours">
    <div class="container">
      <h2 class="tours__heading">Туры</h2>
      <div class="owl-carousel js-tours">
        <?php if ($categoryTours->have_posts()) :  while ($categoryTours->have_posts()) : $categoryTours->the_post(); ?>
          <div class="owl-item">
            <div class="tours__item">
              <?php if ( has_post_thumbnail() ) {?>
                <div class="tours__item-img">
                  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>">
                </div>
              <?php }?>
              <div class="tours__item-heading">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="tours__item-price"><?php if (get_post_meta(get_the_ID(), 'price_tour', true)) {?><?php echo get_post_meta(get_the_ID(), 'price_tour', true); ?> <i class="fa fa-rub" aria-hidden="true"></i><?php } ?></div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php else: ?>
          <p>Туров пока нет!</p>
        <?php endif; ?>
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
                    <input class="reservation-tours__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя" >
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
                <input id="chk" type="checkbox" name="policy" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="/soglasie-na-obrabotku-dannyh/">обработку</a> персональных данных</label>
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