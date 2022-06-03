  <footer>
    <div class="foot-box">
      <?php wp_nav_menu(
          array(
            'theme_location' => 'bottom-menu'
          )
        ); ?>
    <hr>
    </div>
    <?php
    $store_name = get_option( 'woocommerce_store_address' );
    $store_address = get_option( 'woocommerce_store_address_2' );
    $store_city = get_option( 'woocommerce_store_city' );
     ?>
    <div class="foot-box">
      <b><?php echo $store_name; ?></b>
      <br>Adres: <?php echo $store_address; ?>, <?php echo $store_city; ?><br>
      <i class="icon-phone"></i>: +48 583 273 332<br>
      <i class="icon-mail-alt"></i>: techhome@biuro.pl<br><br>
    <hr>
    </div>
    <div class="foot-box">
      Korzystanie z serwisu oznacza akceptację <a href="<?php echo get_home_url(); ?>/polityka-prywatnosci/">regulaminu</a><br><br>
      Copyrihgt <?php echo date('Y'); ?> &copy; TechHome & <a href="https://www.wojciechgunia.pl">Wojciech Gunia</a>
    </div>
  </footer>
  <?php wp_footer(); ?>
  <script>
    document.getElementById("burger-btn").onclick = () =>
    {
        if( document.getElementById("switch-icon").classList.contains('close') )
            {
                document.getElementById("switch-icon").classList.add('open');
                document.getElementById("menu").classList.remove('cover');
                document.getElementById("tlo").classList.remove('cover');
                document.getElementById("switch-icon").classList.remove('close');
            }
        else
            {
              document.getElementById("switch-icon").classList.remove('open');
              document.getElementById("menu").classList.add('cover');
              document.getElementById("tlo").classList.add('cover');
              document.getElementById("switch-icon").classList.add('close');
            }
    }
  </script>
  </body>
</html>
