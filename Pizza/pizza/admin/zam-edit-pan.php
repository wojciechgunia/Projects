<?php session_start();
if(isset($_SESSION['userid']))
{
  require("../connect.php");
  $qwe = $db->query("SELECT * FROM `user` WHERE `id`='".$_SESSION['userid']."';");
  if($qwe->num_rows<1)
  {
    header("Location: ./logowanie");
  }
  else {

  }
  $db->close();
}
else {
  header("Location: ./logowanie");
}
if(empty($_POST['id']))
{
  header("Location: panel");
}
?>
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
          <div class="Orders2" style="min-width: 1100px;">
            <div class="cardHeader">
              <h2>Edytuj zamówienie o nr <?php echo $_POST['id'] ?></h2>
              <a onclick="history.go(-1);" class="btn">Wróć</a>
            </div>
            <?php require("../connect.php");
            $a2=", `status`.`nazwa`, `zamówienie`.`kasa`, `zamówienie`.`platnosc`, `zamówienie`.`status` FROM `zamówienie` LEFT JOIN `platnosc` ON `zamówienie`.`platnosc` = `platnosc`.`id` LEFT JOIN `status` ON `zamówienie`.`status` = `status`.`id` WHERE `zamówienie`.`id`=".$_POST["id"].";";
            $data = $db->query("SELECT `zamówienie`.`id`, `zamówienie`.`ulica`, `zamówienie`.`nr_domu`, `zamówienie`.`nr_mieszkania`, `zamówienie`.`miejscowosc`, `zamówienie`.`email`, `zamówienie`.`telefon`, `platnosc`.`rodzaj`, `zamówienie`.`zamówienie`".$a2);

            while ($row = $data->fetch_assoc()) { ?>

            <form action="zam-edit.php" method="post" id="edit-zam" class="edit-zam">
              <?php if(isset($_SESSION["info"])){echo $_SESSION["info"]; unset($_SESSION["info"]);} ?>
              <input type="text" style="display: none;" name="id" placeholder="id" maxlength="140" value="<?php echo $_POST['id'] ?>"><br>
              <input type="text" name="ulica" placeholder="ulica" maxlength="140" value="<?php echo $row["ulica"] ?>"><br>
              <input type="text" name="nrdom" placeholder="nr domu" maxlength="4" value="<?php echo $row["nr_domu"] ?>"><br>
              <input type="text" name="nrmiesz" placeholder="nr mieszkania - (nie wymagane)" maxlength="4" value="<?php echo $row["nr_mieszkania"] ?>"><br>
              <input type="text" name="miasto" placeholder="miejscowość" maxlength="120" value="<?php echo $row["miejscowosc"] ?>"><br>
              <input type="email" name="e-mail" placeholder="e-mail" maxlength="240" value="<?php echo $row["email"] ?>"><br>
              <input type="tel" name="telefon" placeholder="telefon" maxlength="12" value="<?php echo $row["telefon"] ?>"><br>
              <input type="text" name="razem" placeholder="razem (zł)" maxlength="12" value="<?php echo $row["kasa"] ?>"><br>
              <select name="platnosc">
                <option value="1" <?php if ($row["platnosc"]==1) {echo "selected";}  ?>>u dostawcy</option>
                <option value="2" <?php if ($row["platnosc"]==2) {echo "selected";}  ?>>dotpay</option>
                <option value="3" <?php if ($row["platnosc"]==3) {echo "selected";}  ?>>blik</option>
              </select><br>
              <select name="status">
                <option value="1" <?php if ($row["status"]==1) {echo "selected";}  ?>>zamówione</option>
                <option value="2" <?php if ($row["status"]==2) {echo "selected";}  ?>>w przygotowaniu</option>
                <option value="3" <?php if ($row["status"]==3) {echo "selected";}  ?>>w drodze</option>
                <option value="4" <?php if ($row["status"]==4) {echo "selected";}  ?>>reklamacja</option>
                <option value="5" <?php if ($row["status"]==5) {echo "selected";}  ?>>zakończone</option>
              </select>
              <input type="submit" value="Zapisz">
            </form>
            <div class="zamówienie">
              <h2>Zamówienie</h2>
              <textarea name="zamowienie" rows="8" cols="45" form="edit-zam"><?php echo str_replace("<br>", "\n", $row["zamówienie"]);  ?></textarea>
            </div>

          <?php } ?>
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
