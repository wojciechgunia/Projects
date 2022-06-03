<?php
session_start();
if(!empty($_POST["name"])&&!empty($_POST["password"]))
{
    require("../connect.php");
    $stmt = $db->prepare("SELECT * FROM `user` WHERE `login`=?;");
    $stmt->bind_param('s', $_POST["name"]);
    $stmt->execute();
    $qwe = $stmt->get_result();
    if($qwe->num_rows<1)
    {
      $_SESSION['fail']='Nie ma takiego użytkownika';
      echo "<script>history.back();</script>";
    }
    while($row = $qwe->fetch_assoc())
    {
      if(hash_equals(sha1($_POST["password"]), $row["password"]))
      {
          $_SESSION['userid']=$row['id'];
          header("Location: panel");

      }
      else {
        $_SESSION['fail1']='Błędne hasło';
        echo "<script>history.back();</script>";
      }
    }
    $db->close();
}
else {
  header("<script>history.back();</script>");
}
 ?>
