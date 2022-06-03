<?php get_header();
/*
Template Name: Dostawa Page

*/

?>
<main>
  <div class="banner2">
    <h1><?php the_title();?></h1>
  </div>
  <div class="dostawa-box">
    <div class="dostawa-elem">
        <img src="<?php echo get_template_directory_uri(); ?>/img/dostawa/1.png" alt="Pocztex">
        <span>Pocztex<br>
        15.99zł</span>
    </div>
    <div class="dostawa-elem">
        <img src="<?php echo get_template_directory_uri(); ?>/img/dostawa/2.png" alt="Kurier InPost">
        <span>Kurier InPost<br>
        12.99zł</span>
    </div>
    <div class="dostawa-elem">
        <img src="<?php echo get_template_directory_uri(); ?>/img/dostawa/3.png" alt="Odbiór osobisty">
        <span>Odbiór osobisty<br>
        0.00zł</span>
    </div>
  </div>
</main>

<?php get_footer(); ?>
