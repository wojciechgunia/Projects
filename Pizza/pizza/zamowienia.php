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

    <div id="tlo2" class="tlo2 <?php if(isset($_SESSION["nowy"])){unset($_SESSION["nowy"]);} else {echo "cover2";}?>">
      <button id="btn1">Dodaj kolejny produkt</button><button id="btn2">Przejdź do koszyka</button>
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
          <a href="">ZAMÓW ONLINE</a>
          <a href="o-nas">O NAS</a>
          <a href="kontakt">KONTAKT</a>
          <a href="koszyk"> <i class="icon-basket"></i> </a>
        </div>
        <div class="cover">

        </div>
      </nav>
    </header>
    <main>
      <section class="menu-sec">
        <div class="naglowek"> <p>Zamów online</p> </div>
        <div class="menu-bar">
          <?php
            require("connect.php");
            $que = $db->query("SELECT `id`, `nazwa`, `cenam`, `cenad`, `opis`, `typ`, `zdjecie` FROM `produkty`");
            while ($row = $que->fetch_assoc()) {
              echo <<< Elempiz
              <div class="menu-elem">
                <img src="./img/pizza/$row[zdjecie]" alt="$row[nazwa]" style="width: 40%;">
                <div class="opis">
                  <p><span>$row[id].</span>&nbsp;$row[nazwa]</p>
                  <p>$row[opis]</p>
                  <div class="elem-form">
                  <form action="zamow.php" method="post">
                    <input type="text" name="nazwa" value="$row[nazwa]" style="display: none;">
                    <select name="rozmiar">
Elempiz;
                      if($row["typ"]==1)
                      {
                        echo "<option value='mała'>Mała (25cm) - $row[cenam]zł</option>";
                        echo "<option value='duża' selected>Duża (40cm) - $row[cenad]zł</option>";
                      }
                      else
                      {
                        echo "<option value='mała'>$row[cenam]zł</option>";
                      }

                    echo <<< Elempiz
                    </select><br>
                    <button type="submit" name="button">Dodaj do zamówienia</button>
                  </form></div>
                </div>
              </div>
Elempiz;
            }
           ?>
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
        document.getElementById("btn1").onclick = () =>
        {
            document.getElementById("tlo2").classList.add('cover2');
        }
        document.getElementById("btn2").onclick = () =>
        {
            location.replace('koszyk');
        }
    </script>
  </body>
</html>
