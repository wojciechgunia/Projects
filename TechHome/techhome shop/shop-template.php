<?php get_header();
/*
Template Name: Shop Page

*/

?>
<main class="pt-3 pb-3">
  <div class="container ps-0 p-4 bg-white">
    <div class="row ms-0 ps-0">
      <div class="col-lg-12 ms-0 ps-0">
        <h1 class="ms-4"><?php the_title();?></h1>
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; else: endif; ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
