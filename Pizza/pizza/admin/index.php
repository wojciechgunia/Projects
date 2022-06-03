<?php session_start(); unset($_SESSION['userid']);?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./style1.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="./css/fontello.css">
    <link rel="icon shortcut" type="image/png" href="../img/iconka.png">
  </head>
  <body>
    <form action="login.php" method="post">
        <img src="../img/logo.png" alt="logo"><br>
        <h1>Logowanie</h1>

    <div class="form-section">

        <input class="form-input" type="text" name="name" autocomplete='off' required >
        <label class="input-label" for="name">
          <span class="label-name">Login</span>
        </label>

    </div>
    <?php
      if(isset($_SESSION['fail']))
      {
        echo "<p style='color: #e64805'>".$_SESSION['fail']."</p>";
        unset($_SESSION['fail']);
      }
     ?>
    <div class="form-section">

        <input class="form-input" type="password" name="password" autocomplete='off' required >
        <label class="input-label" for="password">
            <span class="label-name">Hasło</span>
        </label>

    </div>
    <?php
      if(isset($_SESSION['fail1']))
      {
        echo "<p style='color: #e64805'>".$_SESSION['fail1']."</p>";
        unset($_SESSION['fail1']);
      }
     ?>
    <button type="submit">Zaloguj</button>

    </form>
  </body>
</html>
