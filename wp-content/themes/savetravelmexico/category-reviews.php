<?php get_header(); ?>
  <section class="reviews-three">
    <div class="container">
      <!--<div class="button-wrapper">
        <a href="#" class="button button_blue" data-toggle="modal" data-target=".bs-example-modal-lg">Добавить отзыв</a>
      </div>-->
      <div class="row">
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
          <div class="col-md-4 reviews-three__item-wrap">
            <div class="reviews-three__item">
              <?php if ( has_post_thumbnail() ) {?>
                <div class="reviews-three__item-img">
                  <?php the_post_thumbnail([155,155]);?>
                </div>
              <?php }?>
              <div class="reviews-three__item-icon-quote">
                <i class="material-icons">format_quote</i>
              </div>
              <div class="reviews-three__item-description">
                <?php the_excerpt(); ?>
              </div>
              <div class="reviews-three__item-name reviews-three__item-name_black">
                <?php the_title(); ?>
              </div>
              <div class="reviews-three__item-dots">
                <a href="<?php the_permalink(); ?>">...</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php else: ?>
          <p>Отзывов пока нет!</p>
        <?php endif; ?>
      </div>
      <div class="pagination-page">
        <?php
        if ( function_exists('wp_bootstrap_pagination') )
          wp_bootstrap_pagination();
        ?>
      </div>
    </div>
  </section>
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-reviews">
        <div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <h2 class="modal-reviews__heading">Оставить свой отзыв</h2>
        <div class="modal-reviews__form-wrapper">
          <form class="modal-reviews__form" action="#" method="post">
            <div class="row">
              <div class="col-md-4">
                <div class="modal-reviews__wrapper-input">
                  <input class="modal-reviews__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                </div>
              </div>
              <div class="col-md-4">
                <div class="modal-reviews__wrapper-input">
                  <input class="modal-reviews__input" type="text" autocomplete="off" name="phone" placeholder="Телефон">
                </div>
              </div>
              <div class="col-md-4">
                <div class="modal-reviews__wrapper-input">
                  <input class="modal-reviews__input" type="text" autocomplete="off" name="email" placeholder="Email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="modal-reviews__wrapper-textarea">
                  <textarea class="modal-reviews__textarea" name="comment" placeholder="Отзыв"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-reviews__wrapper-file">
              <input id="file" autocomplete="off" type="file" class="hide-type-file inputfile" data-multiple-caption="{count} files selected" name="file">
              <label class="upload-file" for="file"><span>Загрузить фото</span></label>
            </div>
            <div class="modal-reviews__wrapper-checkbox">
              <input id="chk" type="checkbox" class="js-policy" checked><label for="chk">Подтверждаю свое согласие на <a href="#">обработку</a> персональных данных</label>
            </div>
            <div class="modal-reviews__wrapper-button">
              <button class="modal-reviews__btn modal-reviews__btn_blue" type="submit">Оставить отзыв</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
<?php get_footer(); ?>