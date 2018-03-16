<?php get_header(); ?>

  <section class="blog-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
            <article class="blog-page__item" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
              <?php if ( has_post_thumbnail() ) {?>
                <div class="blog-page__item-img">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail();?>
                  </a>
                </div>
              <?php }?>
              <div class="blog-page__item-date">
                <?php echo get_the_date(); ?>
              </div>
              <h2 class="blog-page__item-heading">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <div class="blog-page__item-description">
                <p><?php the_excerpt(); ?></p> <?php //echo get_post_meta($post->ID, 'keywords', true); ?>
              </div>
            </article>
          <?php endwhile; ?>
          <?php endif; ?>
          <div class="pagination-page">
            <?php
            if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
            ?>
          </div>
        </div>
        <div class="col-md-3 col-md-pull-9">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </section>


<?php get_footer(); ?>