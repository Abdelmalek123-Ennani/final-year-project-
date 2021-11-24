<?php

session_start();
require_once('./db_connect.php');

if (isset($_POST['connexion_admin'])) {
  $email = $_POST['email_admin'];
  $psd = $_POST['password_admin'];

  $sql = "SELECT * FROM employee WHERE email = '$email' AND password = '$psd'";
  $req = mysqli_query($connect, $sql);

  if (mysqli_num_rows($req) > 0) {
    $dt = mysqli_fetch_object($req);

    if ($dt->role == "admin") {
      $_SESSION['admin_id'] = $dt->id_employee;
      header('Location: ./administration/dashboard.php');
    } elseif ($dt->role == "prof") {
      $_SESSION['prof_id'] = $dt->id_employee;
      header('Location: ./prof/');
    } else {
      $error = "Email ou mot de passe est incorrect";
    }
  }
}

if (isset($_POST['connexion_etudiant'])) {
  $email = $_POST['email_etudiant'];
  $psd = $_POST['password_etudiant'];

  $sql = "SELECT * FROM etudiants WHERE email = '$email' AND Password = '$psd'";
  $req = mysqli_query($connect, $sql);

  if (mysqli_num_rows($req) > 0) {
    $dt = mysqli_fetch_object($req);

    $_SESSION['id_etudiant'] = $dt->id_etudinant;
    header('Location: ./etudiants/student.php');
  } else {
    $error = "Email ou mot de passe est incorrect";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion </title>
  <link rel="shortcut icon" href="./images/bts_1.jpg" type="image/x-icon">
  <link rel="stylesheet" href="./bs4/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/css/all.css" />
  <link rel="stylesheet" href="./css/css/index_style.css" />
  <!-- <link rel="stylesheet" href="./connexion.css" /> -->
</head>

<body>

  <div class="container-fluid bg-light shadow-sm" id="Porfolio">
    <div class="container">
      <div class="row py-2">
        <div class="phone-email col-9 col-md-8 mr-md-auto">
          <span class="mr-5"><i class="far fa-envelope mr-2"></i>errachidya.bts@gmail.com</span>
          <span><i class="fas fa-mobile-alt mr-2"></i>+212 587321429</span>
        </div>
        <div class="social-media col-3 col-lg-2 d-flex justify-content-between">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-google-plus-g"></i>
          <i class="fab fa-twitter"></i>
          <i class="far fa-user"></i>
          <i class="fab fa-instagram"></i>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid bg-white mt-1 position-relative nav-bar-top">
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-lg w-100">
          <a class="navbar-brand logo" href="#Porfolio"><img src="images/logo.png" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto ">
              <li class="nav-item">
                <a class="nav-link px-2" href="index.html">Acceuil<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-2" href="index.htm">Filiéres</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link px-2" href="index.html">Informations </a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-2" href="contact.html">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-2" href="connexion.php">Connexion</a>
              </li>
              <!-- <li class="nav-item">
                        <a class="nav-link px-2" href="#Contact">contact</a>
                      </li> -->
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <?php
  // if ($_SERVER['REQUEST_METHOD'] === "POST") {
  //   $email = $_POST['email'];
  //   $pswd = $_POST['password'];

  //   if (!empty($email) && !empty($pswd)) {

  //     $sql = "SELECT * FROM users WHERE email = '$email' && password = '$pswd'";
  //     $req = mysqli_query($connect, $sql);
  //     if (mysqli_num_rows($req) > 0) {
  //       $data = mysqli_fetch_object($req);
  //       $_SESSION['name'] = $data->nom;
  //       $_SESSION['role'] = $data->role;
  //       $_SESSION['id_user'] = $data->id_user;

  //       if ($data->role == 0) {
  //         header('./admin/index.php');
  //       } elseif ($data->role == 1) {
  //         header('./prof/index.php');
  //       } else {
  //         header('./etudiant/index.php');
  //       }
  //     } else {
  //       $error = "aucune utilisteur avec se nom";
  //     }
  //   } else {
  //     $error = "vide";
  //   }
  // }
  ?>

  <!-- <div class="center w-50 m-auto">
    <h2>Connexion</h2>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="text_field">
        <input type='text' name='email' required>
        <span></span>
        <label>Email :</label>
      </div>
      <div class="text_field">
        <input type='password' name='password' required>
        <span></span>
        <label>Mote De Passe :</label>
      </div>
      <input type='submit' name='connextion' value='Connextion'>
    </form>

  </div> -->
  <div class="col-sm-5 mt-5 ml-auto mr-auto">
    <?php if (isset($error)) : ?>
      <div class="alert text-right alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?= $error ?>
      </div>
      <?php
      ?>
    <?php endif; ?>

    <ul class="nav nav-pills nav-fill mb-1" id="pills-tab" role="tablist">
      <li class="nav-item"> <a class="nav-link active" id="pills-signin-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin" aria-selected="true">Etudiants</a> </li>
      <li class="nav-item"> <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">Employee</a> </li>
      <!-- <li class="nav-item"> <a class="nav-link" id="pills-admin-tab" data-toggle="pill" href="#pills-admin" role="tab" aria-controls="pills-signup" aria-selected="false">Admin</a> </li> -->
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab">
        <div class="col-sm-12 pb-4 border-orange shadow rounded pt-2">
          <div class="text-center py-3">
            <h5>Etudiants <i class="fas fa-user text-warning"></i></h5>
          </div>
          <form method="post" action="" id="singninFrom">
            <div class="form-group">
              <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
              <input type="email" name="email_etudiant" id="email" class="form-control" placeholder="Email..." required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold ">Mot de pass<span class="text-danger">*</span></label>
              <input type="password" name="password_etudiant" id="password" class="form-control" placeholder="***********" required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col"> <a href="javascript:;" data-toggle="modal" data-target="#forgotPass">Oublier Le mot de pass? </a> </div>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="connexion_etudiant" value="Connexion" class="btn btn-block bg-orange my-2 text-white">
            </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
        <div class="col-sm-12 pb-4 border-orange pb-4 shadow rounded pt-2">
          <div class="text-center py-3">
            <h5>Employee <i class="fas fa-user text-warning"></i></h5>
          </div>
          <form method="post" action="" id="singninFrom">
            <div class="form-group">
              <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
              <input type="email" name="email_admin" id="email" class="form-control" placeholder="Email..." required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold ">Mot de pass<span class="text-danger">*</span></label>
              <input type="password" name="password_admin" id="password" class="form-control" placeholder="***********" required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col"> <a href="javascript:;" data-toggle="modal" data-target="#forgotPass">Oublier Le mot de pass? </a> </div>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="connexion_admin" value="connexion" class="btn btn-block bg-orange my-2 text-white">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="bs4/js/jquery-3.5.1.min.js"></script>
  <script src="bs4/js/popper.js"></script>
  <script src="bs4/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
</body>

</html>