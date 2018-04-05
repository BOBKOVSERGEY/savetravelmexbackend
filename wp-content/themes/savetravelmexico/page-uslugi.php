<?php get_header(); ?>
    <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
      <article class="content content_category">
        <div class="container">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
    <?php endif; ?>
<?php
$services = new WP_Query([
  'post_type' => 'services',
  'meta_key' => 'order_service',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'posts_per_page' => 30
]);
?>
<?php if ($services->have_posts()) {?>
  <section class="categories-tours categories-tours_category">
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

<?php get_footer(); ?>
