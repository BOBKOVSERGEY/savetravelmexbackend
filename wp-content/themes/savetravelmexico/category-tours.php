<?php get_header(); ?>
  <article class="content content_category">
    <div class="container">
      <?php echo category_description();
      ?>

      <?php
      // вывод картинки самой категории
      /*$term = get_category(get_query_var('cat'));
      $cat_id = $term->cat_ID;
      $image_id = get_term_meta($cat_id, 'id-cat-images', true);
      echo '<div class="image_id">'.wp_get_attachment_image($image_id, ['','']).'</div>';*/
      ?>


    </div>
  </article>
  <section class="categories-tours categories-tours_category">
    <div class="container-fluid">
      <h2 class="categories-tours__heading">Категории туров</h2>
      <div class="row categories-tours__wrapper-item">
        <?php mayak_cats_images(); ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>