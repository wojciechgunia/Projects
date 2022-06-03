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
  if(!empty($_POST["id"]))
  {

    $id=$_POST["id"];
    require("../connect.php");
    $qwe=$db->query("SELECT `kasa` FROM `zamówienie` WHERE `id`='".$id."'");
    if($row=$qwe->fetch_assoc())
    {
    $qwe2="UPDATE `statystyki` SET `zakupow`=`zakupow`-1, `kasa`=`kasa`-$row[kasa] WHERE `id`=1";
    }
    $db->query($qwe2);
    $db->query("DELETE FROM `zamówienie` WHERE `id`='".$id."'");
    echo "<script>history.go(-1);</script>";

  }
  else {
    echo "<script>history.go(-1);</script>";
  }


 ?>
