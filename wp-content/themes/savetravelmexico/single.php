<?php
$post = $wp_query->post;

if (in_category('blog')) {
  include(TEMPLATEPATH.'/single-blog.php');
} else if(in_category([
  'istoriya-drevnej-tsivilizatsii-majya',
  'natsionalnye-zapovedniki-i-eko-tury',
  'morskie-progulki',
  'plavanie-s-zhivotnymi',
  'parki-razvlecheniy',
  'dayving'
])) {
  include(TEMPLATEPATH.'/single-tour.php');
} else if (in_category('reviews')) {
  include(TEMPLATEPATH.'/single-reviews.php');
} else {
  include(TEMPLATEPATH.'/single-default.php');
}
?>
