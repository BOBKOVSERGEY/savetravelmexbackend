<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Humescores
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
  return;
}
?>

<section class="comments">
  <div class="row">
    <div class="col-md-12">

  <?php
  // You can start editing here -- including this comment!
  if ( have_comments() ) : ?>
    <h2 class="comments__heading">
      <?php
      $comments_number = get_comments_number();
      if ( '1' === $comments_number ) {
        /* translators: %s: post title */
        printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'twentyseventeen' ), get_the_title() );
      } else {
        printf(
        /* translators: 1: number of comments, 2: post title */
          _nx(
            '%1$s Reply to &ldquo;%2$s&rdquo;',
            '%1$s Replies to &ldquo;%2$s&rdquo;',
            $comments_number,
            'comments title',
            'twentyseventeen'
          ),
          number_format_i18n( $comments_number ),
          get_the_title()
        );
      }
      ?>
    </h2>
  <?php
  wp_list_comments( array(
    'style'      => 'div',
    'short_ping' => true,
    //'format'     => 'html5',
    'callback' => 'stmListComments',
    'avatar_size'=> '70',
    'max_depth' => 2
  ) );
  ?>


    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
      <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'humescores' ); ?></h2>
        <div class="nav-links">

          <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'humescores' ) ); ?></div>
          <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'humescores' ) ); ?></div>

        </div><!-- .nav-links -->
      </nav><!-- #comment-nav-below -->
      <?php
    endif; // Check for comment navigation.

  endif; // Check for have_comments().


  // If comments are closed and there are comments, let's leave a little note, shall we?
  if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'humescores' ); ?></p>
    <?php
  endif;

  comment_form([
    'class_form'           => 'comments__form',
    'submit_button'        => '<div class="comments__wrapper-button">
                                 <button class="comments__btn comments__btn_blue %3$s" id="%2$s" name="%1$s" type="submit">Отправить</button>
                               </div>'
  ]);
  ?>
    </div>
  </div>
</section>