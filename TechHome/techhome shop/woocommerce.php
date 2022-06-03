<?php get_header(); ?>
<main>
  <div class="container bg-white border main-container p-0">
    <?php
    if (is_shop()) {
      echo '<div class="row">';
      echo '  <img src="'.get_template_directory_uri().'/img/baner.png" alt="baner" class="img-fluid logo">';
      echo '</div>';
    }
    else {
      echo '<div class="row" style="padding-top: 60px !important;">';
      echo '</div>';
    } ?>
    <div class="row p-3">
      <div class="col-12">
        <?php woocommerce_content(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
