<?php
/*
 * Template name: Тур Чичен-Ица, сенот Сой Тун, Валльядолид
 */
include __DIR__ . '/inc/tour.php'; ?>

<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

  <article class="content text-center">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>