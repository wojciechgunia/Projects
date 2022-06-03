<?php session_start();
if(isset($_SESSION['userid']))
{
  require("../connect.php");
  $qwe = $db->query("SELECT * FROM `user` WHERE `id`='".$_SESSION['userid']."';");
  if($qwe->num_rows<1)
  {
    header("Location: ./logowanie");
  }
  $db->close();
}
else {
  header("Location: ./logowanie");
}
if (!empty($_POST["pass1"])&&!empty($_POST["pass1"]))
{
  include("../connect.php");
  if($_POST["pass1"]==$_POST["pass2"])
  {
    $db->query("UPDATE `user` SET `password`='".sha1($_POST["pass1"])."' WHERE `id`='$_SESSION[userid]'");
    $_SESSION["info"]="<p style='color: green; font-weight: bold;'>Hasło zostało zmienione</p>";
    header("Location: ustawienia");
  }
  else {
    $_SESSION["info"]="<p style='color: red; font-weight: bold;'>Hasła nie są takie same</p>";
    echo "<script>history.back();</script>";
  }

}
else {
  $_SESSION["info"]="<p style='color: red; font-weight: bold;'>Wystąpił błąd</p>";
  echo "<script>history.back();</script>";
} ?>
