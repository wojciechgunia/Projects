<?php session_start();
if(isset($_SESSION['userid']))
{
  require("../connect.php");
  $qwe = $db->query("SELECT * FROM `user` WHERE `id`='".$_SESSION['userid']."';");
  if($qwe->num_rows<1)
  {
    header("Location: logowanie");
  }
  else {

  }
  $db->close();
}
else {
  header("Location: logowanie");
}?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css/fontello.css">
    <link rel="icon shortcut" type="image/png" href="../img/iconka.png">
  </head>
  <body>
    <!-- navigation -->
    <div class="nav-cont">
      <nav>
        <div class="logo">
          <span class="icon"></span>
          <span class="tittle"><img src="../img/logo.png" alt="logo"></span>
        </div>
         <div class="nav-elem"><a href="panel">
          <span class="icon"><i class="icon-home"></i></span>
          <span class="tittle">Panel</span>
        </a></div>
        <div class="nav-elem"><a href="produkty">
          <span class="icon"><i class="icon-food"></i></span>
          <span class="tittle">Produkty</span>
        </a></div>
        <div class="nav-elem"><a href="archiwum">
          <span class="icon"><i class="icon-archive"></i></span>
          <span class="tittle">Archiwum</span>
        </a></div>
        <div class="nav-elem"><a href="ustawienia">
          <span class="icon"><i class="icon-cog"></i></span>
          <span class="tittle">Ustawienia</span>
        </a></div>
        <span class="nav-elem"><a href="logout.php">
          <span class="icon"><i class="icon-logout"></i></span>
          <span class="tittle">Wyloguj</span>
        </a>
      </span>
    </nav>
    </div>
    <main>
      <!-- toolbar -->
      <div class="topbar">
        <div class="toggle">
          <div id="burger-btn" class="cover-big">
            <div id="h-icon" class="close">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
        <img src="../img/user.png" alt="user">
      </div>

        <!-- orders -->
        <div class="details">
          <div class="Orders">
            <div class="cardHeader">
              <h2>Zamówienia - Archiwum</h2>
            </div>
            <table>
              <tr>
                <td>id</td>
                <td>ulica</td>
                <td>nr domu</td>
                <td>nr miesz.</td>
                <td>miejscowość</td>
                <td>email</td>
                <td>telefon</td>
                <td>płatność</td>
                <td>zamówienie</td>
                <td>status</td>
                <td>opcje</td>
              </tr>
              <?php
              require("../connect.php");
              $a2=", `status`.`nazwa` FROM `zamówienie` LEFT JOIN `platnosc` ON `zamówienie`.`platnosc` = `platnosc`.`id` LEFT JOIN `status` ON `zamówienie`.`status` = `status`.`id` WHERE `zamówienie`.`status` in(5);";
              $data = $db->query("SELECT `zamówienie`.`id`, `zamówienie`.`ulica`, `zamówienie`.`nr_domu`, `zamówienie`.`nr_mieszkania`, `zamówienie`.`miejscowosc`, `zamówienie`.`email`, `zamówienie`.`telefon`, `platnosc`.`rodzaj`, `zamówienie`.`zamówienie`".$a2);

              while ($row = $data->fetch_assoc()) {
                echo <<< HI

                <tr>
                  <td>$row[id]</td>
                  <td>$row[ulica]</td>
                  <td>$row[nr_domu]</td>
                  <td>$row[nr_mieszkania]</td>
                  <td>$row[miejscowosc]</td>
                  <td>$row[email]</td>
                  <td>$row[telefon]</td>
                  <td>$row[rodzaj]</td>
                  <td>$row[zamówienie]</td>
                  <td>$row[nazwa]</td>
                  <td style="width: 120px;"><form action="zam-edit-pan" method="post" style="float: left;"><input type="text" style="display: none;" name="id" value="$row[id]"><input class="btn" type="submit" value="edytuj"></form>
                  <form action="zam-del.php" method="post"><input type="text" style="display: none;" name="id" value="$row[id]"><input class="btn" type="submit" value="usuń"  onclick="return confirm('Czy napewno chcesz usunąć?')"></form></td>
                </tr>
HI;
              }
              $db->close();
               ?>
            </table>
          </div>
        </div>
      </div>
    </main>
    <script>
      let list = document.querySelectorAll('nav .nav-elem');
      function activeLink()
      {
        list.forEach((item) =>
        item.classList.remove('hovered'));
        this.classList.add('hovered');
      }
      list.forEach((item) =>
      item.addEventListener('mouseover',activeLink));

      let toggle = document.querySelector('.toggle');
      let nav = document.querySelector('nav');
      let main = document.querySelector('main');

      if (sessionStorage.getItem("menu")=="close")
      {
        nav.classList.toggle('active');
        main.classList.toggle('active');
      }
      toggle.onclick = ()=>
      {
        nav.classList.toggle('active');
        main.classList.toggle('active');
        if (sessionStorage.getItem("menu")=="open")
        {
          sessionStorage.setItem("menu", "close");
        }
        else
        {
          sessionStorage.setItem("menu", "open");
        }
      };

    </script>
  </body>
</html>
