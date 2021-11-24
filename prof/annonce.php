<?php

session_start();
require_once('./../db_connect.php');


if (!isset($_SESSION['prof_id'])) {
    header('Location: ./../index.html');
}

if (!isset($_GET['id_annonce'])) {
    header('Location: student.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un etudiant< </title>
            <link rel="stylesheet" href="./../css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="./../css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="./../css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="./../css/lobipanel/lobipanel.min.css" media="screen">
            <link rel="stylesheet" href="./../css/prism/prism.css" media="screen">
            <link rel="stylesheet" href="./../css/select2/select2.min.css">
            <link rel="stylesheet" href="./../css/main.css" media="screen">
            <link rel="stylesheet" href="./../bs4/css/bootstrap.min.css" />
            <link rel="stylesheet" href="./../css/css/absence_style.css" />
            <link rel="stylesheet" href="./../css/css/all.css" />
            <link rel="stylesheet" href="../bs4/css/bootstrap.min.css">
            <script src="./../js/modernizr/modernizr.min.js"></script>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('./../includes/topbar.php'); ?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('./../includes/leftbar_prof.php'); ?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">
                        <?php
                        $sql = "SELECT * FROM annonces WHERE annonce_id = '{$_GET['id_annonce']}'";
                        $req = mysqli_query($connect, $sql);
                        $data = mysqli_fetch_object($req);
                        ?>
                        <div class="bg-light mt-4 p-3 border">
                            <h6>Annonce Numéro : <?= $data->annonce_id ?></h6>
                        </div>
                        <div class="bg-light container border">
                            <h5 class="my-3"><?= $data->titre ?></h5>
                            <?= $data->imageAnnone ?  '<img src="./../images/item1.jpg" class="w-75 d-block m-auto" alt="image">' : "" ?>
                            <div class="p-4 bg-white border my-4">
                                <p style="font-size: 15px;  text-align: left;font-family: sans-serif;font-weight: 200 !important;"><?= $data->annonce_fond ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /.main-wrapper -->
    <script src="../bs4/js/jquery-3.5.1.min.js"></script>
    <script src="../bs4/js/popper.js"></script>
    <script src="../bs4/js/bootstrap.min.js"></script>
    <script src="./../bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./../bs4/js/popper.js"></script>
    <script src="./../bs4/js/bootstrap.min.js"></script>
    <script src="./../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.min.js"></script>
    <script src="./../js/pace/pace.min.js"></script>
    <script src="./../js/lobipanel/lobipanel.min.js"></script>
    <script src="./../js/iscroll/iscroll.js"></script>
    <script src="./../js/prism/prism.js"></script>
    <script src="./../js/select2/select2.min.js"></script>
    <script src="./../js/main.js"></script>
</body>

</html>