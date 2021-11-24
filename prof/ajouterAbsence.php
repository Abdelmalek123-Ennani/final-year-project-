<?php
session_start();
require_once('./../db_connect.php');

$_SESSION['prof_id'] = 11;

if (!isset($_SESSION['prof_id'])) {
    header('Location: ./../index.html');
}

$sql = "SELECT matiere_id FROM employee e INNER JOIN matiere m ON e.filiere_id = m.id_matiere WHERE id_employee = '{$_SESSION['prof_id']}'";
$req = mysqli_query($connect, $sql);
$dbt = mysqli_fetch_object($req);



if (isset($_POST['ajouteAb'])) {
    $nbrAbs = $_POST['nbr_abs'];
    $date = $_POST['date_abs'];
    $id_student = $_POST['id_student'];
    $justifié = $_POST['justifié'];

    if (!empty($nbrAbs) && !empty($date) && !empty($id_student) && !empty($justifié)) {
        $sql = "INSERT INTO absences VALUES ('' , '$date' , '$nbrAbs' , '$justifié' , '$id_student' , '{$_SESSION['prof_id']}' , '{$dbt->matiere_id}' , '' , '2021/2022')";

        if (mysqli_query($connect, $sql)) {
            $message = "L'absence était ajouté";
        }
        echo mysqli_error($connect);
    } else {
        $error = "Error";
        echo mysqli_error($connect);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absence< </title>
            <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
            <link rel="stylesheet" href="../css/prism/prism.css" media="screen">
            <link rel="stylesheet" href="../css/select2/select2.min.css">
            <link rel="stylesheet" href="../css/main.css" media="screen">
            <link rel="stylesheet" href="../bs4/css/bootstrap.min.css" />
            <link rel="stylesheet" href="../css/css/absence_style.css" />
            <link rel="stylesheet" href="../css/css/all.css" />
            <script src="../js/modernizr/modernizr.min.js"></script>
            <style>
                .anuller_btn {
                    position: absolute;
                    top: 72px;
                }
            </style>
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
                        <div class="bg-white mt-4 bg-white border-bottom py-2 pl-1">
                            <h5 class="mx-1">Marquer Absence</h5>
                        </div>
                        <div class="list pt-5 bg-light">
                            <div class="student-list bg-white mx-2">
                                <div class="container-fluid">
                                    <?php if (isset($message)) : ?>
                                        <div class="alert alert-success">
                                            <?= $message ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row pt-1">
                                        <div class="col-md-8">
                                            <h6 class="p-2">Tableaux des étudiants</h6>
                                        </div>
                                        <div class="col-md-4  ml-auto">
                                            <form class="form-inline pt-y" action="" method="post">
                                                <label for="email" class="mr-sm-2">Class:</label>
                                                <select name="filiere" class="form-control w-50 mr-2" id="sel1">
                                                    <?php
                                                    $sql = "SELECT * FROM filieres";
                                                    $req = mysqli_query($connect, $sql);
                                                    while ($r = mysqli_fetch_object($req)) :
                                                    ?>
                                                        <option value="<?= $r->filiere_id ?>"><?= $r->filiere_nom . '' . $r->filiere_session ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <button type="submit" name="get_student" class="btn btn-primary">Valider</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                if (isset($_POST['get_student'])) { ?>
                                    <table class="table list-table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Class</th>
                                                <th>Photo</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Marquer</th>
                                            </tr>
                                        <tbody>

                                            <?php $filier = $_POST['filiere'];

                                            $sql = "SELECT * FROM etudiants NATURAL JOIN filieres WHERE filiere_id = '$filier'";
                                            $req = mysqli_query($connect, $sql);
                                            while ($data = mysqli_fetch_object($req)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data->id_etudinant ?></td>
                                                    <td><?= $data->filiere_nom . '' . $data->filiere_session ?></td>
                                                    <td>
                                                        <!-- <img src="./iamges/avatar.png" alt="avatar" class="w-100"> -->
                                                        img
                                                    </td>
                                                    <td><?= $data->nom ?></td>
                                                    <td><?= $data->prenom ?></td>
                                                    <td>
                                                        <button class="btn ajouter_abs btn-success"><i class="fas fa-plus text-light"></i></button>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                        </tbody>
                                        </thead>
                                    </table>
                                    <!-- <input type="button" class="btn btn-success position-fixed mrq" value="Marquer" /> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <div class="container-fluid bg-light form_absence d-none justify-content-center flex-column align-items-center w-100 vh-100">
        <h3 class="text-center">Ajouter Un Absence</h3>
        <form method="POST" action="" class="border-top mt-4 w-25">
            <input type="hidden" name="id_student" class="id_etudiant_hidden">

            <div class="form-group">
                <label for="email">Date:</label>
                <input type="datetime-local" name="date_abs" class="form-control" required id="email">
            </div>
            <div class="form-group">
                <label for="email">Nombre Heure:</label>
                <input type="number" placeholder="nombre des heures" name="nbr_abs" class="form-control" required id="email">
            </div>
            <div class="form-group">
                <label for="sel1">Justifié ?:</label>
                <select name="justifié" class="form-control select-justification" id="sel1">
                    <option value="N">Non</option>
                    <option value="O">Oui</option>
                </select>
            </div>
            <div class="form-group justification d-none">
                <label for="comment">Justification:</label>
                <textarea class="form-control" name="justification" placeholder="justification" rows="5" id="comment"></textarea>
            </div>
            <input type='submit' name='ajouteAb' value='Ajouter'>
        </form>
        <button type="button" class="btn anuller_btn"><i class="fas fa-close text-danger"></i></button>
    </div>
    <!-- /.main-wrapper -->
    <script src="../bs4/js/jquery-3.5.1.min.js"></script>
    <script src="../bs4/js/popper.js"></script>
    <script src="../bs4/js/bootstrap.min.js"></script>
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/pace/pace.min.js"></script>
    <script src="../js/lobipanel/lobipanel.min.js"></script>
    <script src="../js/iscroll/iscroll.js"></script>
    <script src="../js/prism/prism.js"></script>
    <script src="../js/select2/select2.min.js"></script>
    <script src="../js/main.js"></script>

    <script>
        $(function() {
            let container = document.querySelector('.form_absence');
            let cancel = document.querySelector('.anuller_btn');
            let ajouter = Array.from($('.ajouter_abs'));

            // 

            ajouter.forEach((el) => {
                el.addEventListener('click', () => {
                    let id_etudiant = el.parentElement.parentElement.firstElementChild.textContent;
                    document.querySelector('.id_etudiant_hidden').value = id_etudiant;
                    container.classList.remove('d-none');
                    container.classList.add('d-flex');
                })
            })


            document.querySelector('.select-justification').addEventListener('change', (e) => {
                if (e.target.value == "O") {
                    document.querySelector('.justification').classList.remove('d-none');
                }

            })



            cancel.addEventListener('click', () => {
                container.classList.remove('d-flex');
                container.classList.add('d-none');
            })
        });
    </script>
</body>

</html>