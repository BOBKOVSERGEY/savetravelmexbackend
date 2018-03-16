<?php get_header(); ?>
<section class="blog-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
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
              <?php the_content(); ?>
            </div>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
