<?php
session_start();
require_once('./../db_connect.php');

if (!isset($_SESSION['id_etudiant'])) {
    header('Location : ./../index.html');
}

$id = $_SESSION['id_etudiant'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absence< </title>
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
                        <section class="content mt-4 bg-light py-4">
                            <h5 class="ml-3 mb-1">Suivi Les Notes</h5>
                            <form action="" method="post" class="container d-flex flex-columns bg-white border p-2 mt-3">
                                <div class="form-group col-5 col-md-3 mr-2">
                                    <label for="email">Année Scolaire:</label>
                                    <select name="annee" class="form-control" id="sel1">
                                        <?php for ($i = 2021; $i <= date('Y'); $i += 1) :
                                            $i2 = $i + 1;
                                        ?>
                                            <option value="<?= $i . '/' . $i2 ?>"><?= $i . '/' . $i2 ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group col-5 col-md-3 mr-2">
                                    <label for="pwd">Session:</label>
                                    <select name="session" class="form-control" id="sel1">
                                        <option value="1">session 1</option>
                                        <option value="2">session 2</option>
                                    </select>
                                </div>
                                <div class="col-3 d-flex justify-content-start align-items-center">
                                    <button type="submit" name="chercher" class="btn btn-primary mt-3"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                            <div class="resultat_note container bg-white border mt-3 p-2 p-5">

                                <?php
                                // if (isset($_POST['chercher'])) {
                                // $annee = $_POST['annee'];
                                // $session = $_POST['session'];

                                // if ($session == 1) {
                                // $sql = "SELECT note_1 , note_2 FROM matiere m INNER JOIN notes n ON m.id_matiere = n.matiere_id WHERE etudiant_id = 5";

                                if (isset($_POST['chercher'])) { ?>
                                    <table class="table table-bordered m-auto bg-light">
                                        <thead>
                                            <tr>
                                                <td class="text-center">Matiére</td>
                                                <td>Premier contrôle</td>
                                                <td>Deuxième contrôle</td>
                                                <td>Troisième contrôle</td>
                                                <td>Activités intégrées</td>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php

                                            $annee = $_POST['annee'];
                                            $session = $_POST['session'];
                                            $sqlF = "SELECT filiere_id FROM etudiants WHERE id_etudinant = '$id'";
                                            $reqF = mysqli_query($connect, $sqlF);
                                            $dtF = mysqli_fetch_object($reqF);

                                            $sql = "SELECT id_matiere, nom_matiere , matiere_coffecient FROM matiere m INNER JOIN filieres f ON m.filiere_id = f.filiere_id WHERE f.filiere_id = '{$dtF->filiere_id}'";
                                            $req = mysqli_query($connect, $sql);
                                            // $data = 

                                            if ($session == 1) {

                                                while ($r = mysqli_fetch_object($req)) {

                                                    $sql2 = "SELECT note_1 , note_2 FROM notes WHERE matiere_id = '{$r->id_matiere}' AND etudiant_id = '$id' AND annee_scolaire = '$annee'";
                                                    $req2 = mysqli_query($connect, $sql2);

                                                    if (mysqli_num_rows($req2) > 0) {
                                                        $data = mysqli_fetch_object($req2);
                                            ?>
                                                        <tr>
                                                            <td><?= $r->nom_matiere ?></td>
                                                            <td><?= $data->note_1  ? $data->note_1 : "" ?></td>
                                                            <td><?= $data->note_2  ? $data->note_2 : "" ?></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php  } else ?>

                                                    <tr>
                                                        <td><?= $r->nom_matiere ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php  }
                                            } else {
                                                while ($r = mysqli_fetch_object($req)) {

                                                    $sql2 = "SELECT note_3 , note_4 FROM notes WHERE matiere_id = '{$r->id_matiere}' AND etudiant_id = '$id' AND annee_scolaire = '$annee'";
                                                    $req2 = mysqli_query($connect, $sql2);

                                                    if (mysqli_num_rows($req2) > 0) {
                                                        $data = mysqli_fetch_object($req2);
                                                    ?>
                                                        <tr>
                                                            <td><?= $r->nom_matiere ?></td>
                                                            <td><?= $data->note_3  ? $data->note_3 : "" ?></td>
                                                            <td><?= $data->note_4  ? $data->note_4 : "" ?></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php    } else { ?>
                                                        <tr>
                                                            <td><?= $r->nom_matiere ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                            <?php }
                                                }
                                            } ?>
                                            <tr>
                                                <td class="bg-secondary text-white">La Note Générale : </td>
                                                <td colspan="4"></td>
                                            </tr>
                                        <?php }
                                        ?>

                                        </tbody>
                                    </table>
                                    <hr />
                            </div>
                        </section>
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
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.min.js"></script>
    <script src="./../js/pace/pace.min.js"></script>
    <script src="./../js/lobipanel/lobipanel.min.js"></script>
    <script src="./../js/iscroll/iscroll.js"></script>
    <script src="./../js/prism/prism.js"></script>
    <script src="./../js/select2/select2.min.js"></script>
    <script src="./../js/main.js"></script>
</body>

</html>