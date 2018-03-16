<?php get_header(); ?>
<section class="blog-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
          <article class="blog-page__item" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="blog-page__item-date">
              <i class="material-icons text-middle" >query_builder</i> <time class="text-middle" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
            </div>
            <?php the_content(); ?>
          </article>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
        comments_template();
        endif; ?>
      </div>
      <div class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
