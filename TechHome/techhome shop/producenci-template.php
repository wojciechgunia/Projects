<?php get_header();
/*
Template Name: Producenci Page

*/

?>
<main>
  <div class="banner2">
    <h1><?php the_title();?></h1>
  </div>
  <div class="producent-box">
    <?php
    $args = array( 'post_type' => 'custompost_producent', 'posts_per_page' => 10 );
    $the_query = new WP_Query( $args );
    ?>
    <?php if ( $the_query->have_posts() ) : ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <div class="producent-elem">

        <div><?php the_post_thumbnail(); ?></div>
        <div><a href="<?php echo esc_attr(get_post_meta( get_the_ID(), 'producent_url', true )); ?>"><?php the_title(); ?></a><br></div>

    </div>

    <?php endwhile;
    wp_reset_postdata(); ?>
    <?php else:  ?>
    <div class="producent-elem">
        <?php _e( 'Brak producentów w bazie' ); ?>
    </div>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
