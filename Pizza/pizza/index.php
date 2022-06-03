<?php session_start();?>
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
          <img src="./img/logo.svg" alt="logo sorento"/>
          <div id="burger-btn" class="cover-big">
                  <div id="h-icon" class="close">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
          </div>
        </div>
        <div id="menu" class="menu cover">
          <a href=""> <i class="icon-home"></i> </a>
          <a href="menu">MENU</a>
          <a href="zamów-online">ZAMÓW ONLINE</a>
          <a href="o-nas">O NAS</a>
          <a href="kontakt">KONTAKT</a>
          <a href="koszyk"> <i class="icon-basket"></i> </a>
        </div>
        <div class="cover">

        </div>
      </nav>
    </header>
    <main>
      <section class="home-sec">
        <div class="promo" style="--bgi: url(../img/order.png)">
          <p>Sprawdź aktualne promocje</p>
        </div>
        <div class="promo" style="--bgi: url(../img/napoj.jpg)">
          <p>Duża pizza w cenie małej,<br>przy zakupie napoju<sup>*</sup></p>
          <p>*Obowiązuje tylko dla pizzy: Vezuvio, Roma, Kebab</p>
        </div>
        <div class="promo" style="--bgi: url(../img/druga.jpg)">
          <p>-50% na drugą dużą pizzę</p>
          <p>*Rabat naliczany na najtańszą dużą pizzę w zamówieniu</p>
        </div>
        <div class="promo" style="--bgi: url(../img/dowoz.jpg)">
          <p>Darmowy dowóz zamówienia</p>
          <p>*Dowozimy maksymalnie 20km od restauracji</p>
        </div>
      </section>
      <section class="home-sec">
        <div class="promo" style="--bgi: url(../img/order.png)">
          <p>Aktualności</p>
        </div>

        <div class="promo" style="--bgi: url(../img/pizzaday.png);height: 23vh;">
          <p>Już w krótce dzień pizzy w Sorento<br>Wpadnij do nas i zgarnij super promocje</p>
        </div>
        <div class="promo" style="--bgi: url(../img/droga.jpg);height: 32vh;">
          <p><br>Poszukujemy kierowcy/dostawcy<br>Jesteś chętny, zgłoś się do nas <br>i dołącz do naszego zespołu<br></p>
          <p>Wymagane prawo jazdy kat.B</p>
        </div>
      </section>
    </main>
    <div style="height: 9vh;"></div>
    <footer><img src="./img/logo.svg" alt="logo sorento"/> <p>&copy; Copyright 2022 Sorento | Wojciech Gunia</p> </footer>
    <?php
    if(!isset($_SESSION["hello"]))
    {
      $_SESSION["hello"]=1;
      require("connect.php");
      $db->query("UPDATE `statystyki` SET `wejsc`=`wejsc`+1 WHERE `id`=1");
      $db->close();
      echo<<<COOKIE
      <div id="cookies">
         <span><img src="img/cookies.png" alt="ciastko"> <h2>&nbsp;&nbsp;Pliki cookies</h2></span>
         <p>Przeglądając naszą stronę internetową bez zmian w swojej przeglądarce, wyrażasz zgodę na wykorzystywanie przez nas plików cookies. Dzięki temu serwis internetowy może być maksymalnie bezpieczny i wygodny.</p>
         <button id="cookbtn">Zamknij</button>
      </div>
COOKIE;
    }

     ?>

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
        cookbtn.onclick =()=>
        {
          document.getElementById("cookies").classList.toggle('unsee');
        }
    </script>
  </body>
</html>
