<?php

require_once __DIR__ . '/integrationMenu.php';
require_once __DIR__ . '/integrationBreadcrumbs.php';
/**
* загружаемые  стили и скрипты
*/
function loadStyleScript()
{
// подключаем стили сайта
wp_enqueue_style('mainStyleSTM', get_template_directory_uri() . '/dist/css/main.css', [], null);
wp_enqueue_style('styleSTM', get_stylesheet_uri());

// подключаем скрипты
wp_enqueue_script('libSTM', get_template_directory_uri() . '/dist/js/lib.js', [], null, true);
wp_enqueue_script('bootstrapSTM', get_template_directory_uri() . '/dist/js/bootstrap.min.js', [], null, true);
wp_enqueue_script('mainScriptSTM', get_template_directory_uri() . '/dist/js/main.js', [], true, true);
}
// загружаем скрипты стили
add_action('wp_enqueue_scripts', 'loadStyleScript');
/**
 * end загружаемые  стили и скрипты
 */

/**
 * вывод title
 */
// хук для title
add_action('after_setup_theme', 'titleStm');

function titleStm()
{
  /*добавляем title*/
  add_theme_support('title-tag');
}
/**
 * end вывод title
 */

/**
 * удаляем теги из html
 */
add_filter('the_generator', '__return_empty_string');

remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
// убрать вывод коротких ссылок
remove_action('wp_head', 'wp_shortlink_wp_head');
// Убрать вывод канонических ссылок:
remove_action('wp_head','rel_canonical');

remove_action('wp_head','adjacent_posts_rel_link_wp_head');
remove_action('wp_head','feed_links_extra', 3);

remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');

remove_action( 'wp_head', 'wp_resource_hints', 2 );
// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Отключаем события REST API
remove_action( 'init',          'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

/**
 * удаляем теги из html
 */

/**
 * Добавляем виджиты
 */

register_sidebar([
  'name'          => 'Контакты в подвале',
  'id'          => 'contacts-footer',
  'class'         => '',
  'before_widget' => '',
  'after_widget'  => '',
]);

/**
 * END Добавляем виджиты
 */

/**
 *
 * Комментарии
 */

add_filter( 'comment_form_default_fields', 'wpsites_comment_form_fields' );

function wpsites_comment_form_fields( $fields ) {

  unset($fields['url']);



  $fields['author'] = '<div class="row"><div class="col-md-6">
                      <div class="comments__wrapper-input">
                        <input class="comments__input" type="text" autocomplete="off" id="author" name="author"  value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="Ваше имя" ' . $aria_req . $html_req . '>
                      </div>
                    </div>';

  $fields['email']  = '<div class="col-md-6">
                      <div class="comments__wrapper-input">
                        <input class="comments__input" type="text" autocomplete="off" name="email" id="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="Email" ' . $aria_req . '>
                      </div>
                    </div></div>';

  return $fields;
}

function wpb_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'] = '<div class="row">
                                          <div class="col-md-12">
                                            <div class="comments__wrapper-textarea">
                                              <textarea class="comments__textarea" id="comment" name="comment" placeholder="Комментарий"></textarea>
                                            </div>
                                          </div>
                                        </div>';
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;



  return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );



function stmListComments($comment, $args, $depth) {
  if ( 'div' === $args['style'] ) {
    $tag       = 'div ';
    $add_below = 'comments__item';
  } else {
    $tag       = 'div ';
    $add_below = 'comments__box comments__boxed';
  }?>
  <<?php echo $tag; comment_class( empty( $args['has_children'] ) ? 'comments__box comments__boxed' : 'comments__box comments__boxed parent' ); ?> id="comment-<?php comment_ID() ?>">
<div id="div-comment-<?php comment_ID() ?>" class="comment-body comments__item">
  <?php
  if ( 'div' != $args['style'] ) { ?>

    <div id="div-comment-<?php comment_ID() ?>" class="comment-body comments__item"><?php
  } ?>
  <?php if ( $args['avatar_size'] != 0 ) {?>
    <div class="comments__item-avatar">
      <?php echo get_avatar( $comment, $args['avatar_size'] );?>
    </div>
  <?php }?>
  <div class="comments__item-body">
  <header class="comments__item-body-header"><?php
  printf( __( '<span class="text-middle">%s</span>' ), get_comment_author_link() ); ?>
  <?php
  if ( $comment->comment_approved == '0' ) { ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php
  } ?>
  <i class="material-icons text-middle" >query_builder</i> <time class="text-middle" datetime="21.12.2017"><?php
      /* translators: 1: date, 2: time */
      printf(
        __('%1$s'),
        get_comment_date()
      ); ?></time>

    <?php
    edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
  </header>
  <div class="comments__item-body-comment">
  <?php comment_text(); ?>
    <div class="reply"><?php
      comment_reply_link(
        array_merge(
          $args,
          array(
            'add_below' => $add_below,
            'depth'     => $depth,
            'max_depth' => $args['max_depth']
          )
        )
      ); ?>
    </div>
  </div>
  </div>
  </div>
  <?php
  if ( 'div' != $args['style'] ) : ?>
    </div></div><?php
  endif;

}

/**
 *
 * End  Комментарии
 */

/*menu*/
/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
      function wpt_setup() {
        register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
      } endif;

/* end menu*/

/**
 * Поддержка миниатюр
 */
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 1280,720 );
/**
 * End Поддержка миниатюр
 */

/**
Длина анонса в блоге
 */
function new_excerpt_length($length) {
  return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

/**
end Длина анонса в блоге
 */
/**
Окончание  анонса в блоге
 */
add_filter('excerpt_more', function($more) {
  return '...';
});
/**
end Окончание  анонса в блоге
 */

/**
 * постраничная навигация
 */

/**
 * WordPress Bootstrap Pagination
 */
function wp_bootstrap_pagination( $args = array() ) {

  $defaults = array(
    'range'           => 4,
    'custom_query'    => FALSE,
    'previous_string' => __( 'Previous', 'text-domain' ),
    'next_string'     => __( 'Next', 'text-domain' ),
    'before_output'   => '<nav><ul class="pagination-page__list list-marked list-marked-type-2 list-marked-type-2-dot-1 list-marked-silver-chalice">',
    'after_output'    => '</ul></nav>'
  );

  $args = wp_parse_args(
    $args,
    apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
  );

  $args['range'] = (int) $args['range'] - 1;
  if ( !$args['custom_query'] )
    $args['custom_query'] = @$GLOBALS['wp_query'];
  $count = (int) $args['custom_query']->max_num_pages;
  $page  = intval( get_query_var( 'paged' ) );
  $ceil  = ceil( $args['range'] / 2 );

  if ( $count <= 1 )
    return FALSE;

  if ( !$page )
    $page = 1;

  if ( $count > $args['range'] ) {
    if ( $page <= $args['range'] ) {
      $min = 1;
      $max = $args['range'] + 1;
    } elseif ( $page >= ($count - $ceil) ) {
      $min = $count - $args['range'];
      $max = $count;
    } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
      $min = $page - $ceil;
      $max = $page + $ceil;
    }
  } else {
    $min = 1;
    $max = $count;
  }

  $echo = '';
  $previous = intval($page) - 1;
  $previous = esc_attr( get_pagenum_link($previous) );

  $firstpage = esc_attr( get_pagenum_link(1) );
  if ( $firstpage && (1 != $page) )
   // $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( 'Первый', 'text-domain' ) . '</a></li>';
  if ( $previous && (1 != $page) )
    $echo .= '<li class="text-regular"><a href="' . $previous . '" title="' . __( 'Предыдущий', 'text-domain') . '" class="fa fa-chevron-left"></a></li>';

  if ( !empty($min) && !empty($max) ) {
    for( $i = $min; $i <= $max; $i++ ) {
      if ($page == $i) {
        $echo .= '<li class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</li>';
      } else {
        $echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
      }
    }
  }

  $next = intval($page) + 1;
  $next = esc_attr( get_pagenum_link($next) );
  if ($next && ($count != $page) )
    $echo .= '<li><a href="' . $next . '" title="' . __( 'Следующий', 'text-domain') . '" class="fa fa-chevron-right"></a></li>';

  $lastpage = esc_attr( get_pagenum_link($count) );
  if ( $lastpage ) {
    //$echo .= '<li class="next"><a href="' . $lastpage . '">' . __( 'Последний', 'text-domain' ) . '</a></li>';
  }
  if ( isset($echo) )
    echo $args['before_output'] . $echo . $args['after_output'];
}


/**
 * end постраничная навигация
 */

