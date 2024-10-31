<?php
  /**
   * A Template for displaying pjax-loaded content.
   */
?>
<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

?></title> 
<?php while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
  <?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>
