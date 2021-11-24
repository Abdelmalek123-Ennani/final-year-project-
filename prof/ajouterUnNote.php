<?php

session_start();
require_once('./../db_connect.php');


if (!isset($_SESSION['prof_id'])) {
    header('Location: ./../index.html');
}


if (isset($_POST['ajouter_note'])) {
    $notes = $_POST['Notes'];
    $etudaints = $_POST['etudiant_id'];
    $annee_scolaire = $_POST['anner_scolaire'];
    $id_prof = $_SESSION['prof_id'];
    $sql = "SELECT matiere_id FROM employee e INNER JOIN matiere m ON e.filiere_id = m.id_matiere WHERE id_employee = '{$_SESSION['prof_id']}'";
    $req = mysqli_query($connect, $sql);
    $dbt = mysqli_fetch_object($req);
    $id_mat = $dbt->matiere_id;
    $note_number = $_POST['note_number'];


    if ($note_number == 1) {

        for ($i = 0; $i < count($etudaints); $i++) {
            $j = 0;

            $sqlOne = "SELECT * FROM notes WHERE etudiant_id = '{$etudaints[$i]}' AND matiere_id = '$id_mat' AND prof_id = '$id_prof'";
            $resOne = mysqli_query($connect, $sqlOne);
            if (mysqli_num_rows($resOne) > 0) {
                $data = mysqli_fetch_object($resOne);
                $sql = "UPDATE notes SET  note_1 = '{$notes[$i]}' WHERE note_id = '{$data->note_id}'";
                if (mysqli_query($connect, $sql)) {
                    $j++;
                }
            } else {
                $sql = "INSERT INTO notes VALUES ( '' , '{$notes[$i]}' , '' , '' , '', '$id_mat' , '$id_prof' , '{$etudaints[$i]}' , '$annee_scolaire' )";
                if (mysqli_query($connect, $sql)) {
                    $j++;
                }
            }
        }
    } elseif ($note_number == 2) {
        for ($i = 0; $i < count($etudaints); $i++) {
            $j = 0;

            $sqlOne = "SELECT * FROM notes WHERE etudiant_id = '{$etudaints[$i]}' AND matiere_id = '$id_mat' AND prof_id = '$id_prof'";
            $resOne = mysqli_query($connect, $sqlOne);
            if (mysqli_num_rows($resOne) > 0) {
                $data = mysqli_fetch_object($resOne);
                $sql = "UPDATE notes SET  note_2 = '{$notes[$i]}' WHERE note_id = '{$data->note_id}'";
                if (mysqli_query($connect, $sql)) {
                    $j++;
                }
            } else {
                $error = "Veullier entre Premiers Notes";
            }
        }
    } elseif ($note_number == 3) {
        for ($i = 0; $i < count($etudaints); $i++) {
            $j = 0;

            $sqlOne = "SELECT * FROM notes WHERE etudiant_id = '{$etudaints[$i]}' AND matiere_id = '$id_mat' AND prof_id = '$id_prof'";
            $resOne = mysqli_query($connect, $sqlOne);
            if (mysqli_num_rows($resOne) > 0) {
                $data = mysqli_fetch_object($resOne);
                $sql = "UPDATE notes SET  note_3 = '{$notes[$i]}' WHERE note_id = '{$data->note_id}'";
                if (mysqli_query($connect, $sql)) {
                    $j++;
                }
            } else {
                $error = "Veullier entre Premiers Notes";
            }
        }
    } else {
        for ($i = 0; $i < count($etudaints); $i++) {
            $j = 0;

            $sqlOne = "SELECT * FROM notes WHERE etudiant_id = '{$etudaints[$i]}' AND matiere_id = '$id_mat' AND prof_id = '$id_prof'";
            $resOne = mysqli_query($connect, $sqlOne);
            if (mysqli_num_rows($resOne) > 0) {
                $data = mysqli_fetch_object($resOne);
                $sql = "UPDATE notes SET  note_4 = '{$notes[$i]}' WHERE note_id = '{$data->note_id}'";
                if (mysqli_query($connect, $sql)) {
                    $j++;
                }
            } else {
                $error = "Veullier entre Premiers Notes";
            }
        }
    }


    // echo "<pre>";
    // print_r($etudaints);
    // echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NOTES< </title>
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
            <link rel="stylesheet" href="./../css/css/livres.css" />
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
                        <div class="list pt-5 bg-light">
                            <div class="student-list bg-white mx-2">
                                <div class="container-fluid">
                                    <?php if (isset($error)) : ?>
                                        <div class="alert alert-danger">
                                            <?= $error ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (isset($j)) : ?>
                                        <div class="alert alert-success">
                                            les Notes sont updatés avec success
                                        </div>
                                    <?php endif; ?>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <h6 class="p-2">Tableaux des étudiants</h6>
                                        </div>
                                        <div class="col-md-6  ml-auto">
                                            <h6 class="p-2">Ajouter des Notes</h6>
                                        </div>
                                    </div>
                                    <div class="container border py-3">
                                        <form class="form-inline row pt-y" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                            <div class="col-12 col-md-3">
                                                <label for="email" class="text-left d-block">Select Class:</label>
                                                <select name="filiere" class="custom-select w-100">
                                                    <?php


                                                    $sql = "SELECT * FROM filieres";
                                                    $req =  mysqli_query($connect, $sql);
                                                    while ($data = mysqli_fetch_object($req)) :
                                                    ?>
                                                        <option value="<?= $data->filiere_id ?>"><?= $data->filiere_nom . '' . $data->filiere_session; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label for="email" class="d-block text-left">Select Class:</label>
                                                <select name="note" class="custom-select w-100">
                                                    <option value="1">Note1</option>
                                                    <option value="2">Note2</option>
                                                    <option value="3">Note3</option>
                                                    <option value="4">Note4</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label for="email" class="d-block text-left">Annee Scolaire:</label>
                                                <select name="annee_scolaire" class="custom-select w-100">
                                                    <?php for ($i = 2021; $i <= Date('Y'); $i += 1) :
                                                        $i2 = $i + 1;
                                                    ?>
                                                        <option value="<?= $i . '/' . $i2 ?>"><?= $i . '/' . $i2 ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <button type="submit" name="aficher_liste" class="btn mt-4 btn-primary ml-1 mb-auto">chercher</button>
                                        </form>
                                    </div>
                                </div>

                                <?php if (isset($_POST['aficher_liste'])) { ?>
                                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                        <table class="table list-table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>étudiant</th>
                                                    <th>Matiére</th>
                                                    <th>Note</th>
                                                    <th>Class</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $filiere = $_POST['filiere'];
                                                $note = $_POST['note'];
                                                $annerr_scolaire = $_POST['annee_scolaire'];

                                                $sql = "SELECT * FROM etudiants e INNER JOIN filieres f ON e.filiere_id = f.filiere_id WHERE f.filiere_id = '$filiere'";
                                                $req = mysqli_query($connect, $sql);
                                                echo mysqli_error($connect);  ?>
                                                <input type="hidden" name="filiere" value="<?= $filiere ?>">
                                                <input type="hidden" name="note_number" value="<?= $note ?>">
                                                <input type="hidden" name="anner_scolaire" value="<?= $annerr_scolaire ?>">
                                                <?php while ($r = mysqli_fetch_object($req)) :
                                                ?>
                                                    <tr>
                                                        <input type="hidden" name="etudiant_id[]" value="<?= $r->id_etudinant ?>">
                                                        <td style="width:20%;"><?= $r->nom . ' ' . $r->prenom ?></td>
                                                        <?php
                                                        $sqlMatiere = "SELECT nom_matiere FROM employee e INNER JOIN matiere m ON e.matiere_id = m.id_matiere WHERE id_employee = '{$_SESSION['prof_id']}'";
                                                        $reqMatiere = mysqli_query($connect, $sqlMatiere);
                                                        $dtMatiere = mysqli_fetch_object($reqMatiere);
                                                        ?>
                                                        <td><?= $dtMatiere->nom_matiere ?></td>
                                                        <td>
                                                            <div class="form-group mb-none">
                                                                <input type="number" name="Notes[]" autocomplete="off" class="form-control" placeholder="Note 1.." id="email">
                                                            </div>
                                                        </td>

                                                        <td><?= $r->filiere_nom . '' . $r->filiere_session; ?></td>
                                                    </tr>
                                                <?php endwhile; ?>

                                            </tbody>
                                        </table>
                                        <input type="submit" value="ajouter" name="ajouter_note" class="btn btn-success w-25">
                                    </form>
                                <?php   }
                                ?>
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
    <script src="./../js/main.js"></script>js"></script>
    <script src="./../js/main.js"></script>
</body>

</html>