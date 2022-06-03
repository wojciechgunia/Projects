<?php get_header(); ?>
<main>
  <div class="container">
    <div class="row">
      <img src="<?php echo get_template_directory_uri(); ?>/img/baner.png" alt="baner" class="img-fluid logo">
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h1><?php the_title();?></h1>
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; else: endif; ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
