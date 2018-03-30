<?php
/**
 *
 * GZIP сжатие
 */
function obSaveCookieAfter($s)
{
  setcookie("page_size_after", strlen($s));
  return $s;
}
// Аналогично, но для Cookie page_size_before.
function obSaveCookieBefore($s)
{
  setcookie("page_size_before", strlen($s));
  return $s;
}
// Устанавливаем конвейер обработчиков.
ob_start("obSaveCookieAfter");
ob_start("ob_gzhandler", 9);
ob_start("obSaveCookieBefore");
/**
 *
 * END сжатие
 */

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
  if(in_category(1)) {
    return 30;
  } else if (is_page()) {
    return 60;
  } else {
    return 60;
  }
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



/**
 * Загрузка картинок в категорию
 */
add_action( 'category_edit_form_fields', 'mayak_update_category_image' , 10, 2 );
function mayak_update_category_image ( $term, $taxonomy ) {
  ?>
  <style>
    img{border:3px solid #ccc;}
    .term-group-wrap p{float:left;}
    .term-group-wrap input{font-size:18px;font-weight:bold;width:40px;}
    #bitton_images{font-size:18px;}
    #bitton_images_remove{font-size:18px;margin:5px 5px 0 0;}
  </style>
  <tr class="form-field term-group-wrap">
    <th scope="row">
      <label for="id-cat-images">Изображение</label>
    </th>
    <td>
      <p><input type="button" class="button bitton_images" id="bitton_images" name="bitton_images" value="+" /></br>
        <input type="button" class="button bitton_images_remove" id="bitton_images_remove" name="bitton_images_remove" value="&ndash;" /></p>
      <?php $id_images = get_term_meta ( $term -> term_id, 'id-cat-images', true ); ?>
      <input type="hidden" id="id-cat-images" name="id-cat-images" value="<?php echo $id_images; ?>">
      <div id="cat-image-miniature">
        <?php if (empty($id_images )) { ?>
          <img src="<?php bloginfo('template_url')?>/dist/images/icon-categories-img.png" alt="Zaglushka" width="84" height="89"/>
        <?php } else {?>
          <?php echo wp_get_attachment_image ( $id_images, 'thumbnail' ); ?>
        <?php } ?>
      </div>
    </td>
  </tr>
  <?php
}

if(preg_match("#tag_ID=([0-9.]+)#", $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']))
  add_action( 'admin_footer', 'mayak_loader'  );
function mayak_loader() { ?>
  <script>
    jQuery(document).ready( function($) {
      function mayak_image_upload(button_class) {
        var mm = true,
          _orig_send_attachment = wp.media.editor.send.attachment;
        $('body').on('click', button_class, function(e) {
          var mb = '#'+$(this).attr('id');
          var mt = $(mb);
          mm = true;
          wp.media.editor.send.attachment = function(props, attachment){
            if (mm) {
              $('#id-cat-images').val(attachment.id);
              $('#cat-image-miniature').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
              $('#cat-image-miniature .custom_media_image').attr('src',attachment.sizes.thumbnail.url).css('display','block');
            } else {
              return _orig_send_attachment.apply( mb, [props, attachment] );
            }
          }
          wp.media.editor.open(mt);
          return false;
        });
      }
      mayak_image_upload('.bitton_images.button');
      $('body').on('click','.bitton_images_remove',function(){
        $('#id-cat-images').val('');
        $('#cat-image-miniature').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
      });
      $(document).ajaxComplete(function(event, xhr, settings) {
        var mk = settings.data.split('&');
        if( $.inArray('action=add-tag', mk) !== -1 ){
          var mh = xhr.responseXML;
          $mr = $(mh).find('term_id').text();
          if($mr!=""){
            $('#cat-image-miniature').html('');
          }
        }
      });
    });
  </script>
<?php }

add_action( 'edited_category','mayak_updated_category_image' , 10, 2 );
function mayak_updated_category_image ( $term_id, $tt_id ) {
  if( isset( $_POST['id-cat-images'] ) && '' !== $_POST['id-cat-images'] ){
    $image = $_POST['id-cat-images'];
    update_term_meta ( $term_id, 'id-cat-images', $image );
  } else {
    update_term_meta ( $term_id, 'id-cat-images', '' );
  }
}

// вывод картинок подрубрик
function mayak_cats_images(){
  $ags = array(
    'taxonomy' => 'category',
    'hide_empty' => 0,
    'parent' => get_query_var('cat'),
    'meta_query' => array(array('key' => 'id-cat-images',)),
  );
  $terms = get_terms($ags);
  $count = count($terms);
  if($count > 0){
    //echo '<div class="cat-thumbnail"><ul>';
    foreach ($terms as $term) {
      $term_taxonomy_id = $term->term_taxonomy_id;
      $image_id = get_term_meta ( $term_taxonomy_id, 'id-cat-images', true );
      echo '<div class="col-md-4 col-sm-6">
          <div class="categories-tours__item">
            <div class="categories-tours__item-img-wrap">'.
              wp_get_attachment_image ( $image_id, ['641','516'] ).
            '</div>
            <div class="categories-tours__item-body">

              <h2 class="categories-tours__item-heading">'.
                 $term->name
           . '</h2>
              <div class="categories-tours__item-description">'.
        wp_trim_words( $term->description, 10, ' ...' ).
              '</div>
              <div class="categories-tours__item-button">
                <a href="'.get_category_link($term_taxonomy_id).'" class="categories-tours__item-btn categories-tours__item-btn_primary">Подробнее</a>
              </div>
            </div>
          </div>
        </div>';
    }
  }
}
/**
 * End Загрузка картинок в категорию
 */


/**
 * редактор в категориях
 */

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

function mayak_category_description($container = ''){
  $content = is_object($container) && isset($container->description) ? html_entity_decode($container->description) : '';
  $editor_id = 'tag_description';
  $settings = 'description';
  ?>
  <tr class="form-field">
    <th scope="row" valign="top"><label for="description">Описание</label></th>
    <td><?php wp_editor($content, $editor_id, array(
        'textarea_name' => $settings,
        'editor_css' => '<style>.html-active .wp-editor-area{border:0;}</style>',
      )); ?><br />
      <span class="description">Описание по умолчанию не отображается, однако некоторые темы могут его показывать.</span></td>
  </tr>
  <?php
}
add_filter('edit_category_form_fields', 'mayak_category_description');
add_filter('edit_tag_form_fields', 'mayak_category_description');


function mayak_remove_category_description(){
  global $mk_description;
  if ( $mk_description->id == 'edit-category' or 'edit-tag' ){
    ?>
    <script type="text/javascript">
      jQuery(function($) {
        $('textarea#description').closest('tr.form-field').remove();
      });
    </script>
    <?php
  }
}
add_action('admin_head', 'mayak_remove_category_description');

/**
 * end редактор в категориях
 */

/**
 * обрезка текста
 */
function cutText($text, $numLetters)
{
  $num = strlen($text);

  if ($num > $numLetters) {
    $text = substr($text, 0, $numLetters);
    $text .= "...";
  }

  return $text;
}
/***
 * end обрезка текста
 */

/**
 * Кол-во постов
 */
function get_posts_4_st( $query ) {
  if ( !is_admin() && $query->is_main_query() && is_category('reviews') ) {
    $query->set( 'posts_per_page', 6 );
  }
}
add_action( 'pre_get_posts', 'get_posts_4_st' );
/**
 * end
 */

/**
 *
 * Область поиска
 */
function tp_search_filter( $query ) {
  if ( $query->is_search ) {
    $query->set( 'cat','-12, -4, -13, -14, -15, -16');
  }
  if ( $query->is_search ) {
    $query->set( 'post_type', array('post') );
  }
  return $query;
}
add_filter('pre_get_posts','tp_search_filter');

/**
 *
 * End Область поиска
 */

/**
 *
 * Опции в админке
 */
function myMoreOptions()
{
  // создает поле опции
  // $id, $title, $callback, $page, $section, $args
  add_settings_field(
    'phone',
    'Телефон',
    'displayPhone',
    'general'
  );
  add_settings_field(
    'address',
    'Адрес',
    'displayAddress',
    'general'
  );

  // регистрирует новую опцию и callback функцию
  register_setting(
    'general',
    'myAddress'
  );
}

add_action('admin_init', 'myMoreOptions');

function displayPhone()
{
  echo "<input type='text' class='regular-text' name='myPhone' value='" . esc_attr(get_option('myPhone')) . "'>";
}
function displayAddress()
{
  echo "<input type='text' class='regular-text' name='myAddress' value='" . esc_attr(get_option('myAddress')) . "'>";
}
/**
 *
 * end Опции в админке
 */

/**
Регистрируем новый тип записи
 */
add_action('init', 'stmPostTypes');

function stmPostTypes () {
  // регистрация слайдера
  register_post_type('slider', [
    'labels' => [
      'name'               => 'Слайдшоу на главной', // основное название для типа записи
      'singular_name'      => 'Слайд', // название для одной записи этого типа
      'add_new'            => 'Добавить новый', // для добавления новой записи
      'add_new_item'       => 'Добавить новый слайд', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование слайд', // для редактирования типа записи
      'new_item'           => 'Новый слайд', // текст новой записи
      'view_item'          => 'Смотреть слайд', // для просмотра записи этого типа.
      'search_items'       => 'Искать слайды', // для поиска по этим типам записи
      'not_found'          => 'Слайд не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине слайда', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Слайдшоу на главной', // название меню
    ],
    'public'              => true,
    'publicly_queryable'  => false, // убираем возможность перейти
    'exclude_from_search' => true, // убираем из поиска
    'menu_position'       => 25,
    'menu_icon'           => 'dashicons-images-alt2',
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail', 'custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'query_var'           => false
  ]);

  register_post_type('our-them', [
    'labels' => [
      'name'               => 'Наша команда', // основное название для типа записи
      'singular_name'      => 'Сотрудник', // название для одной записи этого типа
      'add_new'            => 'Добавить нового', // для добавления новой записи
      'add_new_item'       => 'Добавить нового сотрудника', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование сотрудника', // для редактирования типа записи
      'new_item'           => 'Новый сотрудник', // текст новой записи
      'view_item'          => 'Смотреть сотрудника', // для просмотра записи этого типа.
      'search_items'       => 'Искать сотрудника', // для поиска по этим типам записи
      'not_found'          => 'Сотрудник не найден', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине сотрудника', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Наша команда', // название меню
    ],
    'public'              => true,
    'publicly_queryable'  => false, // убираем возможность перейти
    'exclude_from_search' => true, // убираем из поиска
    'menu_position'       => 25,
    'menu_icon'           => 'dashicons-admin-users',
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail', 'custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'query_var'           => false
  ]);

  register_post_type('services', [
    'labels' => [
      'name'               => 'Услуги на главной и в услугах', // основное название для типа записи
      'singular_name'      => 'Услуга', // название для одной записи этого типа
      'add_new'            => 'Добавить новую', // для добавления новой записи
      'add_new_item'       => 'Добавить новую услугу', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
      'new_item'           => 'Новая услуга', // текст новой записи
      'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
      'search_items'       => 'Искать услугу', // для поиска по этим типам записи
      'not_found'          => 'Услуга не найдена', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине сотрудника', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Услуги на главной и в услугах', // название меню
    ],
    'public'              => true,
    'publicly_queryable'  => false, // убираем возможность перейти
    'exclude_from_search' => true, // убираем из поиска
    'menu_position'       => 25,
    'menu_icon'           => 'dashicons-palmtree',
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail', 'custom-fields', 'editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'query_var'           => false
  ]);

}
/**
End Регистрируем новый тип записи
 */



