<?php
/**
 * Template Name: Блог
 * Template Post Type: post, page, product
 */
$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // определяем текущую страницу блога
$args = array(
  'posts_per_page' => get_option('posts_per_page'), // значение по умолчанию берётся из настроек, но вы можете использовать и собственное
  'paged'          => $current_page // текущая страница
);
query_posts( $args );

$wp_query->is_archive = true;
$wp_query->is_home = false;

while(have_posts()): the_post();
  ?>
  <h2><?php the_title() /* заголовок */ ?></h2>
  <p><?php the_content() /* содержимое поста */ ?></p>
  <?php
endwhile;
