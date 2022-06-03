<?php session_start(); ?>
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

    <div id="tlo3" class="tlo2 <?php if(!isset($_SESSION["nr"])){echo "cover2";}?>">
      <p><i class="icon-ok-circled"></i>Pomyślnie dodano zamówienie.<br>Nr zamówienia to: <?php if(isset($_SESSION["nr"])){echo $_SESSION["nr"];unset($_SESSION["nr"]);} ?></p>
      <button id="btn1">Zamknij</button>
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
          <a href="kontakt">KONTAKT</a>
          <a href=""> <i class="icon-basket"></i> </a>
        </div>
        <div class="cover">

        </div>
      </nav>
    </header>
    <main>
      <section class="kontakt-sec">
        <div class="naglowek"> <p>Koszyk</p> </div>
        <div class="koszyk-box">
          <div class="kontakt-elem">
            <?php
              if(isset($_SESSION["koszyk"])&&!empty($_SESSION["koszyk"]))
              {
                echo "<p><h2>Zamówienie:</h2></p>";
                $i=1;
                require("connect.php");
                $tab=$_SESSION["koszyk"];
                $razem=0;
                //promocje sprawdzenie
                $cenamalamin=0; $cenaduzamin=0; $duze=0; $male=0; $napoje=0; $dania=0; $cenamalarab=0;
                foreach ($tab as $row)
                {
                  $que = $db->query("SELECT `nazwa`, `cenam`, `cenad`, `opis`, `typ` FROM `produkty` where `nazwa`='".$row[0]."'");
                  while ($row2 = $que->fetch_assoc()) {
                    if($row2['typ']==1)
                    {
                      if($row[1]=="mała")
                      {
                        $cena=$row2['cenam'];
                        $male++;
                        if($cenamalamin==0||$cena<$cenamalamin)
                        {
                          $cenamalamin=$cena;
                        }
                      }
                      else {
                        $cena=$row2['cenad'];
                        $duze++;
                        if($cenaduzamin==0||$cena<$cenaduzamin)
                        {
                          $cenaduzamin=$cena;
                          $cenamalarab=$row2['cenam'];
                        }
                      }
                    }
                    if($row2['typ']==2)
                    {
                      $napoje++;
                      $cena=$row2['cenam'];
                    }
                    if($row2['typ']==3)
                    {
                      $dania++;
                      $cena=$row2['cenam'];
                    }
                  }
                  $z=$i-1;
                  echo $i.". ".$row[0]." ".$row[1]." ".$cena."zł "."<form class='usun' action='delete.php' method='post' style='display: inline;'><input type='text' name='delete' style='display: none;' value='$z'><input type='submit' value='usuń'></form><br>";

                  $razem=$razem+$cena;
                  $i++;
                }
                $rabat=0;
                if($duze>=2)
                {
                  $rabat=$cenaduzamin/2;
                }
                if($duze>=1&&$napoje>=1)
                {
                  if(($cenaduzamin-$cenamalarab)>$rabat)
                  {
                    $rabat=$cenaduzamin-$cenamalarab;
                  }
                }
                $razem=$razem-$rabat;
                if($rabat>0)
                  echo "Rabat -".number_format($rabat, '2', '.', ' ')."zł<br>";

                echo "<br><hr>Razem: ".number_format($razem, '2', '.', ' ')."zł";
                echo "<br><br><a class='dod' href='zamów-online'>Dodaj produkty</a>";
              }
              else {
                echo "Brak produktów w koszyku<br><hr>";
                echo "<a class='dod' href='zamów-online'>Dodaj produkty</a>";
              }
             ?>
             </div>
             <div class="kontakt-elem">
               <?php if(isset($_SESSION["info"])){echo $_SESSION["info"]; unset($_SESSION["info"]);} ?>
               <form action="dodajzam.php" method="post" class="order">
                 <input type="text" name="ulica" placeholder="ulica" maxlength="140"><br>
                 <input type="text" name="nrdom" placeholder="nr domu" maxlength="4"><br>
                 <input type="text" name="nrmiesz" placeholder="nr mieszkania - (nie wymagane)" maxlength="4"><br>
                 <input type="text" name="miasto" placeholder="miejscowość" maxlength="120"><br>
                 <input type="email" name="e-mail" placeholder="e-mail" maxlength="240"><br>
                 <input type="tel" name="telefon" placeholder="telefon" maxlength="12"><br>
                 Płatność:<br>
                 <input type="radio" name="platnosc" value="1" class="checkbox-pay" id="opt1" checked>
                 <label class="for-checkbox-pays" for="opt1">
                   <div class="pays-elem">
        							<i class="icon-dollar"></i><br>
                      U&nbsp;dostawcy
                    </div>
						     </label>
                 <input type="radio" name="platnosc" value="2" class="checkbox-pay" id="opt2" disabled>
                 <label class="for-checkbox-pays" for="opt2">
      							<!--DotPay-->
                    <div class="pays-elem">
                      <img src="./img/dotpay.png" alt="dotpay">
                    </div>
						     </label>
                 <input type="radio" name="platnosc" value="3" class="checkbox-pay" id="opt3" disabled>
                 <label class="for-checkbox-pays" for="opt3">
      							<!--Blik-->
                    <div class="pays-elem">
                      <img src="./img/Blik.png" alt="dotpay">
                    </div>
						     </label>
                 <input type="submit" value="Zamów">
               </form>
             </div>
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
            document.getElementById("tlo3").classList.add('cover2');
        }
    </script>
  </body>
</html>
