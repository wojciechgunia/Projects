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
          <a href="">MENU</a>
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
      <section class="menu-sec">
        <div class="naglowek"> <p>Menu</p> </div>
        <div class="menu-bar">

          <?php
            require("connect.php");
            $que = $db->query("SELECT `id`, `nazwa`, `cenam`, `cenad`, `typ`, `opis`, `zdjecie` FROM `produkty`");
            while ($row = $que->fetch_assoc()) {
              echo <<< Elempiz
              <div class="menu-elem">
                <img src="./img/pizza/$row[zdjecie]" alt="$row[nazwa]" style="width: 40%;">
                <div class="opis">
                  <p><span>$row[id].</span>&nbsp;$row[nazwa]</p>
                  <p>$row[opis]</p>
Elempiz;
                if($row["typ"]==1){echo "<p>Cena: (25cm)&nbsp;$row[cenam]zł, (40cm)&nbsp;$row[cenad]zł</p>";}
                else{echo "<p>Cena: $row[cenam]zł</p>";}

                echo "</div>";
              echo "</div>";

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
    </script>
  </body>
</html>
