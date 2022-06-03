<?php get_header();
/*
Template Name: Kontakt Page

*/

?>
<main class="pb-4">
  <div class="banner2">
    <h1><?php the_title();?></h1>
  </div>
  <div class="container bg-white pt-4 pb-4" style="text-align: center; font-size: 2rem;">
    <?php
    $store_name = get_option( 'woocommerce_store_address' );
    $store_address = get_option( 'woocommerce_store_address_2' );
    $store_city = get_option( 'woocommerce_store_city' );
     ?>
    <b><?php echo $store_name; ?></b><br><br>
    Adres: <?php echo $store_address; ?>, <?php echo $store_city; ?><br><br>
    <i class="icon-phone"></i>: +48 583 273 332<br>
    <i class="icon-mail-alt"></i>: techhome@biuro.pl<br><br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.019833091463!2d16.907872215801902!3d52.37006037978609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47045ac0d3a5c835%3A0x48652daa7d5c87e5!2sMalinowa%2012%2C%2060-116%20Pozna%C5%84!5e0!3m2!1sen!2spl!4v1646133823528!5m2!1sen!2spl" width="100%" height="450" style="border:0; border-radius: 10px;" allowfullscreen=""></iframe>
  </div>
</main>

<?php get_footer(); ?>
