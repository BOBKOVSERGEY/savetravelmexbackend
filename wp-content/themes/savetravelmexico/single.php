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
        <!--<section class="comments">
          <div class="row">
            <div class="col-md-12">
              <h2 class="comments__heading">Комментарии</h2>
              <div class="comments__box comments__boxed">
                <div class="comments__item">
                  <div class="comments__item-avatar">
                    <img src="<?php bloginfo('template_url')?>/dist/images/reviws-1.jpg" alt="">
                  </div>
                  <div class="comments__item-body">
                    <header class="comments__item-body-header"><span class="text-middle">John Doe</span> <i class="material-icons text-middle" >query_builder</i> <time class="text-middle" datetime="21.12.2017">21.12.2017</time></header>
                    <div class="comments__item-body-comment">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis ea explicabo quis rerum voluptatum. Culpa ducimus eius error eveniet, exercitationem expedita numquam, omnis provident quaerat quam quos repellendus vitae.</p>
                    </div>
                  </div>
                </div>
                <div class="comments__box comments__boxed">
                  <div class="comments__item">
                    <div class="comments__item-avatar">
                      <img src="<?php bloginfo('template_url')?>/dist/images/reviws-1.jpg" alt="">
                    </div>
                    <div class="comments__item-body">
                      <header class="comments__item-body-header"><span class="text-middle">John Doe</span> <i class="material-icons text-middle" >query_builder</i> <time class="text-middle" datetime="21.12.2017">21.12.2017</time></header>
                      <div class="comments__item-body-comment">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis ea explicabo quis rerum voluptatum. Culpa ducimus eius error eveniet, exercitationem expedita numquam, omnis provident quaerat quam quos repellendus vitae.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="comments__box comments__boxed">
                  <div class="comments__item">
                    <div class="comments__item-avatar">
                      <img src="<?php bloginfo('template_url')?>/dist/images/reviws-1.jpg" alt="">
                    </div>
                    <div class="comments__item-body">
                      <header class="comments__item-body-header"><span class="text-middle">John Doe</span> <i class="material-icons text-middle" >query_builder</i> <time class="text-middle" datetime="21.12.2017">21.12.2017</time></header>
                      <div class="comments__item-body-comment">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis ea explicabo quis rerum voluptatum. Culpa ducimus eius error eveniet, exercitationem expedita numquam, omnis provident quaerat quam quos repellendus vitae.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comments__box comments__boxed">
                <div class="comments__item">
                  <div class="comments__item-avatar">
                    <img src="<?php bloginfo('template_url')?>/dist/images/reviws-1.jpg" alt="">
                  </div>
                  <div class="comments__item-body">
                    <header class="comments__item-body-header"><span class="text-middle">John Doe</span> <i class="material-icons text-middle" >query_builder</i> <time class="text-middle" datetime="21.12.2017">21.12.2017</time></header>
                    <div class="comments__item-body-comment">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi debitis ea explicabo quis rerum voluptatum. Culpa ducimus eius error eveniet, exercitationem expedita numquam, omnis provident quaerat quam quos repellendus vitae.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comments__form-wrapper">
                <h3 class="comments__form-heading">Добавить комментарий</h3>
                <form action="#" class="comments__form" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="comments__wrapper-input">
                        <input class="comments__input" type="text" autocomplete="off" name="name" placeholder="Ваше имя">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="comments__wrapper-input">
                        <input class="comments__input" type="text" autocomplete="off" name="email" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="comments__wrapper-textarea">
                        <textarea class="comments__textarea" name="comment" placeholder="Комментарий"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="comments__wrapper-button">
                    <button class="comments__btn comments__btn_blue" type="submit">Отправить</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>-->
      </div>
      <div class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
