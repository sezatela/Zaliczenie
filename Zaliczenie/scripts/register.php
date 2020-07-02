<?php
  session_start();

  if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email1']) && !empty($_POST['email2']) && !empty($_POST['pass1']) && !empty($_POST['pass2']) && $_POST['terms'] == 'on') {
    require_once './connect.php';
    if ($conn->connect_errno != 0) {
      $_SESSION['error'] = 'Błędne połączenie z bazą danych!';
      header('location: ../register.php');
    }else{
      //prawidłowe połączenie z bazą danych i wypełniono wszystkie pola
      if ($_POST['email1'] != $_POST['email2']) {
        $_SESSION['error'] = 'Adresy email są różne!';
        header('location: ../register.php');
        exit();
      }

      if ($_POST['pass1'] != $_POST['pass2']) {
        $_SESSION['error'] = 'Hasła są różne!';
        header('location: ../register.php');
        exit();
      }

      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $email1 = $_POST['email1'];
      $pass1 = $_POST['pass1'];
      $avatar = "http://ledox.com.pl/wp-content/uploads/2014/12/avatar.png";
      $la = md5(date("Y:m:d"));


      $permission = 2;

      //szyfrowanie hasła za pomocą ARGON2ID
      $pass = password_hash($pass1, PASSWORD_ARGON2ID);


      $sql = "INSERT INTO `user` (`permissionid`, `name`, `surname`, `email`, `pass` , `avatar`, `genKey`) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sssssss", $permission, $name, $surname, $email1, $pass,  $avatar, $la);


      if ($stmt->execute()) {

        header("location: ../mail.php?email1=$la");
        exit();
      }else{
        $_SESSION['error'] = 'Nie udało się dodać nowego użytkownika!';
        header('location: ../register.php');
        exit();
      }

      $stmt->close();

      // echo $conn->affected_rows;

      $conn->close();
    }
  }else{
    $_SESSION['error'] = 'Wypełnij wszystkie pola!';
    header('location: ../register.php');
  }
?>
