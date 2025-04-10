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
  header("Location: produkty");
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
          <div class="Orders2">
            <div class="cardHeader">
              <h2>Edytuj dane produktu</h2>
              <a href="produkty" class="btn">Wróć</a>
            </div>

            <?php require("../connect.php");

            $data = $db->query("SELECT * FROM `produkty` WHERE `id` =".$_POST["id"]);

            while ($row = $data->fetch_assoc()) { ?>
            <form action="pro-edit.php" method="post" class="edit-zam" enctype="multipart/form-data">
              <?php if(isset($_SESSION["info"])){echo $_SESSION["info"]; unset($_SESSION["info"]);} ?>
              <input type="text" name="id" placeholder="id" style="display: none;" maxlength="60" value="<?php echo $row["id"] ?>"><br>
              <input type="text" name="nazwa" placeholder="nazwa" maxlength="60" value="<?php echo $row["nazwa"] ?>"><br>
              <input type="text" name="opis" placeholder="opis" maxlength="240" value="<?php echo $row["opis"] ?>"><br>
              <select name="rodzaj">
                <?php
                require("../connect.php");
                $qwe2 = $db->query("SELECT * FROM `rodzaj`");
                while ($row2 = $qwe2->fetch_assoc()) {
                  echo "<option value='$row2[id]'"; if ($row["typ"]==$row2["id"]) {echo "selected";}  echo ">$row2[nazwa]</option>";
                }
                 ?>
              </select><br>
              <input type="text" name="cenam" placeholder="cena1" maxlength="7" value="<?php echo $row["cenam"] ?>"><br>
              <input type="text" name="cenad" placeholder="cena2" maxlength="7" value="<?php echo $row["cenad"] ?>"><br>
              <input type="text" name="zdjecieob" placeholder="" maxlength="90" style="display: none;" value="<?php echo $row["zdjecie"] ?>"><br>
              <input type="file" name="zdjecie" id="imginp" accept=".jpg, .jpeg, .png">
              <input type="submit" value="Zapisz">
              <p style="margin-top: 30px; font-size: 80%;">Cena1 - cena produktu/cena pizzy (25cm) | Cena2 - cena pizzy (40cm)</p>
            </form>

            <div class="podglad">
              <h3>Wybrane zdjęcie</h3><br>
              <img id="previmg" src="../img/pizza/<?php echo $row["zdjecie"] ?>" alt="wybrane zdjęcie">
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

      imginp.onchange = () => {
        const [file] = imginp.files
        if (file) {
          previmg.src = URL.createObjectURL(file)
      }};
    </script>
  </body>
</html>
