<?php
if ( !is_page( 'tours' ) && $post->post_parent )
  include __DIR__ . '/inc/form-tour.php';
if ( is_page( 'contacts' ) )
  include __DIR__ . '/inc/form-contacts.php';

?>
<section class="footer">
  <div class="footer__wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="footer__logo">
            <img src='<?php bloginfo('template_url')?>/dist/images/logo-new-m.png' alt=''>
          </div>
          <div class="footer__social">
            <div class="footer__social-heading">Подпишитесь на нас</div>
            <div class="footer__social-icon">
              <a class="footer__social-item" href="#">
                <div class="footer__social-item-wrap">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </div>
              </a>
              <a class="footer__social-item" href="#">
                <div class="footer__social-item-wrap">
                  <i class="fa fa-vk" aria-hidden="true"></i>
                </div>
              </a>
              <a class="footer__social-item" href="#">
                <div class="footer__social-item-wrap">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </div>
              </a>
              <a class="footer__social-item" href="#">
                <div class="footer__social-item-wrap">
                  <i class="fa fa-google-plus" aria-hidden="true"></i>
                </div>
              </a>
              <a class="footer__social-item" href="#">
                <div class="footer__social-item-wrap">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="footer__contacts-heading">
            Связаться с нами
          </div>
          <div class="footer__contacts-container">
            <div class="footer__contacts-icon">
              <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
            <div class="footer__contacts-description">
              <?php echo get_option('myPhone'); ?>
            </div>
          </div>
          <div class="footer__contacts-container">
            <div class="footer__contacts-icon">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
            <div class="footer__contacts-description">
              <?php bloginfo('admin_email')?>
            </div>
          </div>
          <div class="footer__contacts-container">
            <div class="footer__contacts-icon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
            </div>
            <div class="footer__contacts-description">
              <?php echo get_option('myAddress'); ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="footer__letter-heading">
            Новостная рассылка
          </div>
          <div class="footer__letter-description">
            Подпишитесь на нашу рассылку, чтобы получать эксклюзивные предложения и последние новости
          </div>
          <div>
            <form action="#" method="post">
              <div class="footer__letter-input-wrapper">
                <input type="text" name="email" placeholder="Ваш email">
              </div>
              <div class="footer__letter-input-submit-wrapper">
                <input type="submit" value="Подписаться">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer__copyright">
        © <span id="copyright-year"></span>. Все права защизены. <a href="/soglasie-na-obrabotku-dannyh/">Политика обработки персональных данных</a>.
      </div>
    </div>
  </div>
</section>
<!-- PhotoSwipe Gallery-->
<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
        <button title="Share" class="pswp__button pswp__button--share"></button>
        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
      <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__cent"></div>
      </div>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
