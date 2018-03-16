<?php
/*
 * Template name: Главная
 */
get_header(); ?>

Главная
<?php
// вывод картинки самой категории
$term = get_category(get_query_var('cat'));
$cat_id = $term->cat_ID;
$image_id = get_term_meta($cat_id, 'id-cat-images', true);
echo '<div class="image_id">'.wp_get_attachment_image($image_id, ['','']).'</div>';
?>

<?php get_footer(); ?>