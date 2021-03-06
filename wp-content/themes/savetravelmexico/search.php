<?php get_header(); ?>
  <section class="blog-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
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
                <?php the_date(); ?>
              </div>
              <h2 class="blog-page__item-heading">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <div class="blog-page__item-description">
                <p><?php the_excerpt(); ?></p> <?php //echo get_post_meta($post->ID, 'keywords', true); ?>
              </div>
            </article>
          <?php endwhile; ?>
            <?php else: ?>
            <p>По вашему запросу ничего не найдено</p>
          <?php endif; ?>
          <div class="pagination-page">
            <?php
            if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
            ?>
          </div>
        </div>
        <div class="col-md-3">
          <div class="search">
            <div class="search__heading">Поиск</div>
            <form action="<?php echo home_url(); ?>" method="get" class="search__blog-form">
              <div class="search__wrapper-input">
                <input class="search__input" type="text" autocomplete="off" name="s">
              </div>
              <button type="submit" class="search__btn-submit">
                <span class="fa fa-search"></span>
              </button>
            </form>
          </div>
          <div class="gallery-blog">
            <div class="gallery-blog__heading">
              Фотогалерея
            </div>
            <div data-photo-swipe-gallery="gallery" class="gallery-blog__wrapper-img">
              <a data-photo-swipe-item="" data-size="1280x720" href="<?php bloginfo('template_url')?>/dist/images/blog-post-1.jpg" class="gallery-blog__item">
                <img src="<?php bloginfo('template_url')?>/dist/images/blog-post-1.jpg" alt="">
              </a>
              <a data-photo-swipe-item="" data-size="1280x720" href="<?php bloginfo('template_url')?>/dist/images/blog-post-2.jpg" class="gallery-blog__item">
                <img src="<?php bloginfo('template_url')?>/dist/images/blog-post-2.jpg" alt="">
              </a>
              <a data-photo-swipe-item="" data-size="1280x720" href="<?php bloginfo('template_url')?>/dist/images/blog-post-3.jpg" class="gallery-blog__item">
                <img src="<?php bloginfo('template_url')?>/dist/images/blog-post-3.jpg" alt="">
              </a>
              <a data-photo-swipe-item="" data-size="1280x720" href="<?php bloginfo('template_url')?>/dist/images/gallery-1.jpg" class="gallery-blog__item">
                <img src="<?php bloginfo('template_url')?>/dist/images/gallery-1.jpg" alt="">
              </a>
              <a data-photo-swipe-item="" data-size="1280x720" href="<?php bloginfo('template_url')?>/dist/images/gallery-2.jpg" class="gallery-blog__item">
                <img src="<?php bloginfo('template_url')?>/dist/images/gallery-2.jpg" alt="">
              </a>
              <a data-photo-swipe-item="" data-size="1280x720" href="<?php bloginfo('template_url')?>/dist/images/gallery-3.jpg" class="gallery-blog__item">
                <img src="<?php bloginfo('template_url')?>/dist/images/gallery-3.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="category-blog">
            <div class="category-blog__heading">
              Категории
            </div>
            <ul class="list-marked category-blog__list">
              <li><a href="#">Еда</a></li>
              <li><a href="#">Здоровье</a></li>
              <li><a href="#">Фитнес</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php get_footer(); ?>