<?php get_header(); ?>
  <article class="content text-center">
    <div class="container">
      <?php echo category_description(); ?>
    </div>
  </article>
<?php
$id = 15; // номер категории
$carRent = new WP_Query([
  'cat' => $id,
  'posts_per_page' => 20,
  //'order' => 'ASC'
]);
?>
<?php if ($carRent->have_posts()) {?>
  <section class="car-rent">
    <div class="container-fluid">
      <h2 class="car-rent__heading">Автомобили в аренду</h2>
      <div class="row car-rent__wrapper-item">
        <?php while ($carRent->have_posts()) : $carRent->the_post(); ?>
          <div class="col-md-3 col-sm-6">
            <div class="car-rent__item">
              <?php if ( has_post_thumbnail() ) {?>
                <div class="car-rent__item-img-wrap">
                  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="<?php the_title(); ?>" class="img-responsive center-block">
                </div>
              <?php }?>
              <div class="car-rent__item-content">
                <?php if (get_post_meta(get_the_ID(), 'price_rent-car', true)) {?>
                  <div class="car-rent__item-content-price">
                    В день <?php echo get_post_meta(get_the_ID(), 'price_rent-car', true); ?> <i class="fa fa-rub" aria-hidden="true"></i>
                  </div>
                <?php } ?>
                <div>
                  <h5 class="car-rent__item-content-heading"><?php the_title(); ?></h5>
                </div>
                <div class="car-rent__item-content-description">
                  <?php the_content(); ?>
                </div>
                <div class="car-rent__item-content-button">
                  <a href="#" data-custom-scroll-to="car" class="car-rent__item-content-btn">Зарезервировать</a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php } else { ?>
  <p>Авто в аренду пока нет</p>
<?php } ?>
  <section class="regulations">
    <div class="container">
      <?php $tenancyRules = new WP_Query( 'pagename=tenancy-rules' ); ?>
      <?php if ($tenancyRules->have_posts()) :  while ($tenancyRules->have_posts()) : $tenancyRules->the_post(); ?>
        <h2 class="regulations__heading"><?php the_title(); ?></h2>
        <?php the_content(); ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
  <section class="reservation-car" id="car">
    <div class="reservation-car__wrapper">
      <div class="reservation-car__wrapper-bg">
        <div class="container">
          <h2 class="reservation-car__heading">Зарезервируй машину с нами</h2>
          <div class="reservation-car__description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis deleniti doloremque eaque labore libero minus praesentium quo repudiandae temporibus? Consectetur eaque expedita harum illo in iusto nesciunt rem tenetur.</p>
          </div>
          <div class="reservation-car__form-wrapper">
            <form class="reservation-car__form" action="#" method="post">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-car__wrapper-input">
                    <input class="reservation-car__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-car__wrapper-input">
                    <input class="reservation-car__input" type="text" autocomplete="off" name="phone" placeholder="Телефон">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-car__wrapper-input">
                    <input class="reservation-car__input" type="text" autocomplete="off" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-car__wrapper-input">
                    <input class="reservation-car__input" type="text" autocomplete="off" name="departure" placeholder="Место отправления">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-car__wrapper-input">
                    <input class="reservation-car__input time-rent-car" autocomplete="off" type="text" name="datestart" placeholder="Дата и время получения">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="reservation-car__wrapper-input">
                    <input class="reservation-car__input time-rent-car" autocomplete="off" type="text" name="dateend" placeholder="Дата и время возврата">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="reservation-car__wrapper-textarea">
                    <textarea class="reservation-car__textarea" name="comment" placeholder="Комментарий"></textarea>
                  </div>
                </div>
              </div>
              <div class="reservation-car__wrapper-checkbox">
                <input id="chk" type="checkbox" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="#">обработку</a> персональных данных</label>
              </div>
              <div class="reservation-car__wrapper-button">
                <button class="reservation-car__btn reservation-car__btn_blue" type="submit">Оставить заявку</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>