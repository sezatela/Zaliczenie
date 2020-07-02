<?php
session_start();
require_once './scripts/connect.php';

if (!isset($_SESSION['logged']['email'])) {
 header('location: ./');
}
$email = $_SESSION['logged']['email'];
$sql2="SELECT `birthday` FROM `user` WHERE `email` = '$email'";
$result3 = $conn->query($sql2);
$user1 = $result3->fetch_assoc();
if ($user1['birthday'] > '2002-06-28') {
  header('location: ./');
}
$sql4= "SELECT `wybory` FROM `user` WHERE `email` = '$email'";
$resul = $conn->query($sql4);
$user2 = $resul->fetch_assoc();
if ($user2['wybory'] == 1) {
  header('location: ./');
}else {
  echo "Mozesz oddac głos";
}
 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wybory</title>
  </head>
  <?php
$sql="SELECT * FROM `candidates`";
$result = $conn->query($sql);
$i = 1;
while ($user = $result->fetch_assoc()) {

  $tab[$i] = $user['name'];
  $tab1[$i] = $user['surname'];
  $i++;
}

if (isset($_GET['wyb'])) {
$sql3 = "SELECT voices FROM `candidates` WHERE `name` = '$_GET[wyb]'";
$result1 = $conn->query($sql3);
$user3 = $result1->fetch_assoc();
$k = $user3['voices'];
$voice =  $k + 1;
$upd = "UPDATE `candidates` SET `voices` = '$voice' WHERE `name` = '$_GET[wyb]' ";
$conn->query($upd);

header('location: ./');

}
if (isset($_GET['wyb'])) {
$sqll= "UPDATE `user` SET `wybory`= '1'  WHERE `email` = '$email'";
$conn->query($sqll);
}
echo<<<WYB

  <body>
    <form class="" action="wybory.php" method="get">
    <input type="radio" name="wyb" value="$tab[1]">$tab[1] $tab1[1]<br>
    <input type="radio" name="wyb" value="$tab[2]">$tab[2] $tab1[2]<br>
    <input type="radio" name="wyb" value="$tab[3]">$tab[3] $tab1[3]<br>
    <input type="radio" name="wyb" value="$tab[4]">$tab[4] $tab1[4]<br>
    <input type="radio" name="wyb" value="$tab[5]">$tab[5] $tab1[5]<br>
    <input type="radio" name="wyb" value="$tab[6]">$tab[6] $tab1[6]<br>
    <input type="submit" name="wyslij" value="Wyślij">
  </form>
WYB;



  ?>
  </body>
</html>
