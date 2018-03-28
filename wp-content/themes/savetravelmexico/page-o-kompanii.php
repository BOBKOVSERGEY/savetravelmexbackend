<?php get_header(); ?>

    <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

      <article class="content text-center">
        <div class="container">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
    <?php endif; ?>
<?php $ourThem = new WP_Query(
  [
    'post_type' => 'our-them',
    //'order' => 'ASC',
    'posts_per_page' => 12
  ]
); ?>
<?php if ($ourThem->have_posts()) {?>
<section class="our-team">
  <div class="container-fluid">
    <h2 class="our-team__heading">Наша команда</h2>
    <div class="row our-team__wrapper-item">
        <?php while ($ourThem->have_posts()) : $ourThem->the_post(); ?>
          <div class="col-md-3 col-sm-6">
            <div class="our-team__item">
              <div class="our-team__item-img-wrap"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>" alt="" class="img-responsive center-block"></div>
              <div class="our-team__item-content">
                <div>
                  <h5 class="our-team__item-content-heading"><?php the_title(); ?></h5>
                </div>
                <?php if (get_post_meta(get_the_ID(), 'position_team', true)) {?>
                  <div class="our-team__item-content-description">
                    <?php echo get_post_meta(get_the_ID(), 'position_team', true); ?>
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
<section class="reviews-three">
  <div class="container">
    <h2 class="reviews-three__heading">Что говорят клиенты</h2>
    <div class="owl-carousel js-reviews-three">
      <?php
      $args = [
        'category_name' => 'reviews',
        'posts_per_page' => 15
      ];
      $reviews = new WP_Query($args);
      ?>
      <?php if ($reviews->have_posts()) :  while ($reviews->have_posts()) : $reviews->the_post(); ?>
        <div class="owl-item">
          <div class="reviews-three__item">
            <?php if ( has_post_thumbnail() ) {?>
              <div class="reviews-three__item-img">
                <?php the_post_thumbnail([155,155]);?>
              </div>
            <?php }?>
            <div class="reviews-three__item-description">
              <?php the_excerpt(); ?>
            </div>
            <div class="reviews-three__item-name">
              <?php the_title(); ?>
            </div>
            <div class="reviews-three__item-dots">
              ...
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php else: ?>
        <p>Отзывов пока нет!</p>
      <?php endif; ?>
    </div>
    <div class="reviews-three__button-all-review">
      <a href="/reviews/" class="reviews-three__btn reviews-three__btn_blue">Все отзывы</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
