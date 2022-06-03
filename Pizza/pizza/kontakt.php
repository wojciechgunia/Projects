<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Sorento</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fontello.css">
    <link rel="icon shortcut" type="image/png" href="./img/iconka.png">
  </head>
  <body>
    <div id="tlo" class="tlo cover">

    </div>
    <header>
      <nav>
        <div class="logo">
          <img src="./img/logo.png" alt="logo sorento"/>
          <div id="burger-btn" class="cover-big">
                  <div id="h-icon" class="close">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
          </div>
        </div>
        <div id="menu" class="menu cover">
          <a href="home"> <i class="icon-home"></i> </a>
          <a href="menu">MENU</a>
          <a href="zamów-online">ZAMÓW ONLINE</a>
          <a href="o-nas">O NAS</a>
          <a href="">KONTAKT</a>
          <a href="koszyk"> <i class="icon-basket"></i> </a>
        </div>
        <div class="cover">

        </div>
      </nav>
    </header>
    <main>
      <section class="kontakt-sec">
        <div class="naglowek"> <p>Kontakt</p> </div>
        <div class="kontakt-box">
          <div class="kontakt-elem">
            <p><b>Pizzeria&nbsp;Sorento</b></p>
            <p>ul.&nbsp;Świerkowa&nbsp;7</p>
            <p>Murowana&nbsp;Goślina</p>
            <p><b>Telefon:</b></p>
            <p>Stacjonarny: 61&nbsp;307&nbsp;77&nbsp;03</p>
            <p>Komórkowy: 537&nbsp;497&nbsp;697</p>
          </div>
          <div class="kontakt-elem">
            <p><b>Godziny otwarcia:</b></p>
            <p>Pon.&nbsp;-&nbsp;Czw. 12-22</p>
            <p>Pią.&nbsp;-&nbsp;Sob. 12-23</p>
            <p>Niedziela 12-22</p>
            <p style="margin-top: 3vh;"><b>Zapraszamy!</b></p>
          </div>
          <div class="kontakt-elem">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d151.58137766412855!2d16.995182772860016!3d52.56414886414257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4704689ad686be4d%3A0xef9e8d187d45543!2sSorento!5e0!3m2!1sen!2spl!4v1644147190833!5m2!1sen!2spl" class="map" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
      </section>
    </main>
    <script>
        document.getElementById("burger-btn").onclick = () =>
        {
            if( document.getElementById("h-icon").classList.contains('close') )
                {
                    document.getElementById("h-icon").classList.add('open');
                    document.getElementById("menu").classList.remove('cover');
                    document.getElementById("tlo").classList.remove('cover');
                    document.getElementById("h-icon").classList.remove('close');
                }
            else
                {
                  document.getElementById("h-icon").classList.remove('open');
                  document.getElementById("menu").classList.add('cover');
                  document.getElementById("tlo").classList.add('cover');
                  document.getElementById("h-icon").classList.add('close');
                }
        }
    </script>
  </body>
</html>
