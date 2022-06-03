<?php get_header(); ?>
<main class="pt-4 pb-4">
  <div class="container p-4 bg-white">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="pt-2 pb-4 ps-3"><?php the_title();?></h1>
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; else: endif; ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
