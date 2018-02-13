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