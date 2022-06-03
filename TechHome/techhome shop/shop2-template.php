<?php get_header();
/*
Template Name: Shop Page2

*/?>
<main class="pt-3 pb-3">
  <div class="banner2">
    <h1><?php the_title();?></h1>
  </div>
  <div class="container p-4 bg-white">
    <div class="row">
      <div class="col-lg-12">
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; else: endif; ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
