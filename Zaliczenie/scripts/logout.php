<?php
session_start();
  if (isset($_SESSION['logged']['email'])) {
    require_once 'connect.php';
    $online = '0';
$email = $_SESSION['logged']['email'];
    $sql = "UPDATE `user` SET `online`='$online' WHERE `email` = '$email'";
    session_destroy();
      header('location: ../?logout=success');
      exit();
  }

  header('location: ../');
?>
