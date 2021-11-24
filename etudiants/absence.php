<?php

session_start();
require_once('./../db_connect.php');

if (!isset($_SESSION['id_etudiant'])) {
    header('Location: ./../index.html');
}

$id = $_SESSION['id_etudiant'];


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
                <?php include('./../includes/leftbar_etudiants.php'); ?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">
                        <div class="bg-light mt-4 p-3 border">
                            <h6>Details De Votre Absence</h6>
                        </div>
                        <div class="bg-light container border">
                            <?php
                            $sql = "SELECT * FROM etudiants NATURAL JOIN filieres WHERE id_etudinant = '{$_SESSION['id_etudiant']}'";
                            $req = mysqli_query($connect, $sql);
                            $dt = mysqli_fetch_object($req);
                            ?>
                            <div class="row w-100 py-4">
                                <div class="col-12 mb-2 col-md-4 p-2 ml-3 ml-md-4 bg-white border"><?= $dt->nom ?></div>
                                <div class="col-12 mb-2 col-md-4 p-2 bg-white border ml-3"><?= $dt->prenom ?></div>
                                <div class="col-12 mb-2 col-md-4 p-2 ml-3 ml-md-4 bg-white border"><?= $dt->filiere_nom . '' . $dt->filiere_session ?></div>
                                <div class="col-12 mb-2 col-md-4 p-2 bg-white border ml-3">2021/2022</div>
                            </div>
                            <div class="w-75 border-top">
                            </div>
                            <?php
                            $sql = "SELECT * FROM absences WHERE etudiant_id = '{$id}'  AND annee_scolaire = '2021/2022'";
                            $req1 = mysqli_query($connect, $sql);
                            if (mysqli_num_rows($req1) > 0) {  ?>
                                <table class="table w-75 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date D'absence</th>
                                            <th>Nombre Heures</th>
                                            <th>Justifiee</th>
                                            <th>Anée Scolaire</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($r = mysqli_fetch_object($req1)) :
                                        ?>

                                            <tr>
                                                <td><?= $r->date_absence ?></td>
                                                <td><?= $r->nombre_heures ?></td>
                                                <td><?= $r->justifiee == 1 ? "Oui" : "Non" ?></td>
                                                <td><?= $r->annee_scolaire ?></td>
                                            </tr>
                                        <?php
                                        endwhile; ?>
                                    </tbody>
                                </table>
                            <?php } else {
                            ?>
                                <div class="w-75 pt-4">
                                    <p class="pl-3">Aucune Absence </p>
                                </div>
                            <?php } ?>
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