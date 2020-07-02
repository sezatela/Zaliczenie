<?php
  session_start();

   if (!isset($_SESSION['logged']['email'])) {
    header('location: ../');

   }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Strona startowa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="../dist/css/adminlte.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="../dist/img/download.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
        echo "<img src=\"{$_SESSION['logged']['avatar']}\" class='img-circle elevation-2' alt='User Image'>";
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
              echo $_SESSION['logged']['name'], ' ', $_SESSION['logged']['surname'];
            ?>
          </a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Strona Startowa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              </li>
          <li class="nav-item">
            <a href="../scripts/logout.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                <img src="../dist/img/sign-out-alt-solid.svg" alt="image"  style="opacity: .4" width="25" height="25">
                Wyloguj się
              </p>
            </a>

          </li>
        </ul>
      </nav>
  </aside>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Witaj
              <?php
                echo $_SESSION['logged']['name'];
              ?>
            </h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">

            <?php

              //ilość użytkowników o odpowiednich uprawnieniach
              require_once '../scripts/connect.php';

              $sql = "SELECT permission, count(*) as 'num' FROM `user` as u INNER JOIN `permission` as p ON u.permissionid=p.id GROUP BY `permissionid` ORDER BY p.id";

              $result = $conn->query($sql);

              $i = 0;
              while ($row = $result->fetch_assoc()) {
                $tab[$i] = $row['num'];
                $i++;
              }

              //użytkownicy nieaktywni
              $sql = "SELECT active, count(*) as 'num' FROM `user` GROUP BY active";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                if ($row['active'] == 0) {
                  $blocked = $row['num'];
                }
              }

            ?>
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $tab[2] ?></h3>

                <p>Moderatorzy</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"><?php echo $tab[2] ?></i>
              </div>
              <a href="#"i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $tab[1] ?></h3>

                <p>Użytkownicy</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"><?php echo $tab[1] ?></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $blocked ?></h3>

                <p>Nieaktywni</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"><?php echo $blocked ?></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $tab[0] ?></h3>

                <p>Administratorzy</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"><?php echo $tab[0] ?></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
    <div class="col-md-12">

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Użytkownicy</h3>

            <div class="card-tools">
              <span class="badge badge-danger">8 ostatnio zalogowanych</span>
          </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-1">
            <ul class="users-list clearfix" >
<?php
// Pobranie 8 ostatnio zalogowanych użytkowników
$sql = "SELECT * FROM `user` ORDER BY `last_login` DESC limit 8";
$result = $conn->query($sql);
while($user1 = $result->fetch_assoc()){

echo <<<USER
<li>
<img src="$user1[avatar]" alt="User Image">
<a class="users-list-name" href="#">$user1[name]</a>
<span class="users-list-date">
USER;

//oblicz kiedy byl ostatnio zalogowany
//dzisiaj, wczoraj, ile dni temu (od miesiaca), mieciac temu, roktemu
require_once '../scripts/function.php';

$last_login = $user1['last_login'];
echo countDay($last_login);

echo <<<USER
</span>
</li>
USER;
}
?>

          </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nowi użytkownicy</h3>

          <div class="card-tools">
            <span class="badge badge-danger">8 ostatnio dodanych</span>
   </div>
          </div>
        <div class="card-body p-1">
          <ul class="users-list clearfix">
<?php
// Pobranie 8 ostatnio dodanych użytkowników
$sql = "SELECT * FROM `user` ORDER BY `create_user` DESC limit 8";
$result = $conn->query($sql);
while($user1 = $result->fetch_assoc()){

echo <<<USER
<li>
<img src="$user1[avatar]" alt="User Image">
<a class="users-list-name" href="#">$user1[name]</a>
<span class="users-list-date">
USER;

//obliczenie ile dni temu zostało dodane konto
//dzisiaj, wczoraj, ile dni temu (od miesiaca), mieciac temu, roktemu
require_once '../scripts/function1.php';

$create_user = $user1['create_user'];
echo countDay1($create_user);

echo <<<USER
</span>
</li>
USER;
}

?>
          </ul>
        </div>
              </div>
                </div>
                </div>
                </div>
                <section class="content">

                    <div class="col-12">
                      <div class="card">
                        <div align="right" class="card-header">
                          <h3 class="card-title">Szybki podgląd</h3>
                          <a  href="http://127.0.0.1/phpmyadmin/sql.php?db=adminlteteb1&table=user&pos=0">Edytuj</a>
                        </div>
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>id</th>
                                <th>permissionid</th>
                                <th>name</th>
                                <th>surname</th>
                                <th>email</th>
                                <th>active</th>
                                <th>create_user</th>
                                <th>last_login</th>
                              </tr>

<?php
$all = "SELECT id, permissionid, name, surname, email, active, create_user, last_login  FROM `user`  limit 9;";
$result2 = $conn->query($all);

while ($r = $result2->fetch_assoc()) {
echo<<<TABLE
            <tr>
              <td>$r[id]</td>
              <td>$r[permissionid]</td>
              <td>$r[name]</td>
              <td>$r[surname]</td>
              <td>$r[email]</td>
              <td>$r[active]</td>
              <td>$r[create_user]</td>
              <td>$r[last_login]</td>
            </tr>
TABLE;
}

  ?>

</thead>
</table>
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->

<div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Wykres 4 U</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body text-center">


                <div class="progress vertical">


<div class="progress-bar bg-info" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                       aria-valuemax="100" style="height:20%">
                    <span class="sr-only">20%</span>
                  </div>
                </div>
                <div class="progress vertical">
                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                       aria-valuemax="100" style="height: 50%">
                    <span class="sr-only">20%</span>
                  </div>
</div>
                <div class="progress vertical">
                  <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                       aria-valuemax="100" style="height: 20%">
                    <span class="sr-only">60%</span>
                  </div>
                </div>
                <div class="progress vertical">
                  <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                       aria-valuemax="100" style="height: 30%">
                    <span class="sr-only">80%</span>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>


            </script>


            <canvas id="bar-chart" width="800" height="450"></canvas>
<?php
$sql1 ="SELECT * FROM `country`";
$result3 = $conn->query($sql1);

$i = 0;
while ($rrr = $result3->fetch_assoc()) {
  $rr[$i] = $rrr['name'];
  $aa[$i] = $rrr['id'];
  $i++;
}
 ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            <script>
            // Bar chart
new Chart(document.getElementById("bar-chart"), {
  type: 'bar',
  data: {
    labels: ["<?php echo $rr[0] ?>","<?php echo $rr[1] ?>","<?php echo $rr[2] ?>","<?php echo $rr[3] ?>"],
    datasets: [
      {
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
        data: [<?php echo $aa[0] ?>,<?php echo $aa[1] ?>,<?php echo $aa[2] ?>,<?php echo $aa[3] ?>,]
      }
    ]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: 'Predicted world population (millions) in 2050'
    }
  }
});
            </script>
          </style>
          <script type="text/javascript" src="js/jquery.min.js"></script>
          <script type="text/javascript" src="js/Chart.min.js"></script>


          </head>
          <body>
              <div id="chart-container">
                  <canvas id="graphCanvas"></canvas>
              </div>

              <script>
                  $(document).ready(function () {
                      showGraph();
                  });


                  function showGraph()
                  {
                      {
                          $.post("data.php",
                          function (data)
                          {
                              console.log(data);
                               var name = [];
                              var marks = [];

                              for (var i in data) {
                                  name.push(data[i].student_name);
                                  marks.push(data[i].marks);
                              }

                              var chartdata = {
                                  labels: name,
                                  datasets: [
                                      {
                                          label: 'Student Marks',
                                          backgroundColor: '#49e2ff',
                                          borderColor: '#46d5f1',
                                          hoverBackgroundColor: '#CCCCCC',
                                          hoverBorderColor: '#666666',
                                          data: marks
                                      }
                                  ]
                              };

                              var graphTarget = $("#graphCanvas");

                              var barGraph = new Chart(graphTarget, {
                                  type: 'bar',
                                  data: chartdata
                              });
                          });
                      }
                  }
                  </script>

</body>
</html>
