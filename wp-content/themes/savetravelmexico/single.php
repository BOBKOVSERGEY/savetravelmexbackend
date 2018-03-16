<?php
$post = $wp_query->post;

if (in_category('blog')) {
  include(TEMPLATEPATH.'/single-default.php');
} else {
  include(TEMPLATEPATH.'/single-tour.php');
}
?>
