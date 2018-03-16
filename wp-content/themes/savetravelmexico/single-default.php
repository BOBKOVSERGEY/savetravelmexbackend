<?php get_header(); ?>
<section class="blog-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
          <article class="blog-page__item" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
            <?php the_content(); ?>
          </article>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
