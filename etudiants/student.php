<?php

session_start();
require_once('./../db_connect.php');

// if (!isset($_SESSION['id_etudiant'])) {
//     header('Location: ./../index.html');
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creative portfolio</title>
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
    <script src="..js/modernizr/modernizr.min.js"></script>
    <link rel="stylesheet" href="../bs4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css/all.css">
    <link rel="stylesheet" href="../css/css/style_2.css">
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

                    <section class="content bg-light pt-4">
                        <div class="statistics container">
                            <div class="row">
                                <div class="green col-md-3 bg-success mx-1 p-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="text-center text-light border-right pr-3">
                                            <i class="fas fa-bookmark"></i>
                                            <p>exaamens à venir</p>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <h4 class="text-light text-center">5</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="red col-md-3 bg-primary mx-1 p-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="text-center text-light border-right pr-3">
                                            <i class="fas fa-bookmark"></i>
                                            <?php
                                            $sqlM = "SELECT COUNT(id_matiere) nbrm FROM matiere NATURAL JOIN filieres NATURAL JOIN etudiants WHERE id_etudinant = '{$_SESSION['id_etudiant']}'";
                                            $reqM = mysqli_query($connect, $sqlM);
                                            $data = mysqli_fetch_object($reqM);
                                            ?>
                                            <p>N. Matiére</p>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <h4 class="text-light text-center"><?= $data->nbrm ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="blue col-md-3 bg-danger mx-1 p-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="text-center text-light border-right pr-3">
                                            <i class="fas fa-bookmark"></i>
                                            <?php
                                            $sqlA = "SELECT COUNT(absence_id) nbra FROM absences WHERE etudiant_id = '{$_SESSION['id_etudiant']}' AND annee_scolaire = '2021/2022'";
                                            $reqA = mysqli_query($connect, $sqlA);
                                            $dataA = mysqli_fetch_object($reqA);
                                            ?>
                                            <p>N.Absence</p>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <h4 class="text-light text-center"><?= $dataA->nbra ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- informations et annonces et Derniers Note -->
                        <?php
                        //fetch the data of the student
                        $id = $_SESSION['id_etudiant'];
                        $sql = "SELECT * FROM etudiants e INNER JOIN filieres f  ON e.filiere_id = f.filiere_id  WHERE id_etudinant = '$id'";
                        $req = mysqli_query($connect, $sql);
                        $data = mysqli_fetch_object($req);
                        ?>
                        <div class="container mt-3">
                            <div class="row">
                                <!-- Student Informations -->
                                <div class="col-md-6 informations bg-white py-2">
                                    <h6 class="border-bottom pb-1">Mes Informations</h6>
                                    <div class="infos container">
                                        <div class="row">
                                            <d class="student-picture pt-3 col-4">
                                                <img src="./../profile_images/<?= $data->avatar ? $data->avatar : "avatar.png" ?>?" alt="avatar" class="w-100">
                                            </d>
                                            <d class="student-infos col-8">
                                                <table class="table-borderless table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Nom:</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $data->nom ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Sex:</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black">female</p>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $parentSql = "SELECT * FROM parantes WHERE parent_id = '{$data->parent_id}'";
                                                        $pqrentReq = mysqli_query($connect, $parentSql);
                                                        $dt = mysqli_fetch_object($pqrentReq);
                                                        ?>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Nom de pére:</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $dt->prere_nom ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Nom de mére:</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $dt->mere_nom ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Date Naissance:</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $data->date_naissance ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Tel de pére:</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $dt->pere_tel ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Email</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $data->email ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Date d'inscription</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $data->date_inscription ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Class</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $data->filiere_nom . '' . $data->filiere_session ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Number</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $data->tel ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Address</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black"><?= $data->adress ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0">
                                                                <p class="text-secondary">Tel</p>
                                                            </td>
                                                            <td class="p-0">
                                                                <p class="text-black">+212 68542797</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </d>
                                        </div>
                                    </div>
                                </div>
                                <!-- Annonces et notes -->
                                <?php
                                // $sql = "SELECT * FROM annonces LIMIT 7";
                                // $req1 = mysqli_query($connect, $sql);

                                // if (mysqli_num_rows($req1) == 0) {  
                                ?>
                                <!-- <p>Il n'y aucine annonce</p> -->
                                <? // } else {

                                ?>
                                <div class="col-md-6 annonce-notes d-flex flex-column">
                                    <div class="annonces bg-white flex-fill mb-1">
                                        <h6 class="p-2 border-bottom">Tableaux d'annonces</h6>
                                        <div>
                                            <?php // while ($r = mysqli_fetch_object($req1)) : 
                                            $sqlN = "SELECT * FROM annonces";
                                            $reqN = mysqli_query($connect, $sqlN);
                                            if (mysqli_num_rows($reqN) > 0) {
                                                while ($d = mysqli_fetch_object($reqN)) { ?>
                                                    <div class="annonce">
                                                        <a href="annonce.php?id_annonce=<?= $d->annonce_id ?>">
                                                            <p class="text-secondary"><?= $d->date_annonce ?></p>
                                                            <p class="text-warning">ADMINISTRATION</p>
                                                            <p><?= $d->annonce_fond ?></p>
                                                        </a>
                                                    </div>
                                            <?php  }
                                            }

                                            ?>
                                            <?php // endwhile; 
                                            ?>
                                        </div>
                                    </div>
                                    <?php //  } 
                                    ?>
                                    <div class="notes bg-white flex-fill mt-1">
                                        <h6 class="p-2">Dérniéres Notes</h6>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <td>Matiéres</td>
                                                    <td>Notes</td>
                                                    <td class="text-right pr-5">Date</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql2 = "SELECT note_1 , note_2 , nom_matiere FROM notes n INNER JOIN matiere m ON n.matiere_id = m.id_matiere WHERE etudiant_id = '{$_SESSION['id_etudiant']}' AND annee_scolaire = '2021/2022' LIMIT 5";
                                                $req2 = mysqli_query($connect, $sql2);

                                                if (mysqli_num_rows($req2) > 0) {
                                                    $data = mysqli_fetch_object($req2);

                                                    // echo "<pre>";
                                                    // print_r($data);
                                                    // echo "<pre>";

                                                ?>
                                                    <tr>
                                                        <td><?= $data->nom_matiere  ?></td>
                                                        <td><?= $data->note_1 ?></td>
                                                        <td class="text-right">20/06/2020</td>
                                                    </tr>
                                                <?php  }
                                                ?>

                                                <!-- <tr>
                                                    <td>Matiére 1</td>
                                                    <td>10.00</td>
                                                    <td class="text-right">20/06/2020</td>
                                                </tr>
                                                <tr>
                                                    <td>Matiére 1</td>
                                                    <td>10.00</td>
                                                    <td class="text-right">20/06/2020</td>
                                                </tr>
                                                <tr>
                                                    <td>Matiére 1</td>
                                                    <td>10.00</td>
                                                    <td class="text-right">20/06/2020</td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- </section> -->
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

<!-- <body>

    <main>
        <section class="left">
            <div class="container bg-dark pt-2 pb-3">
                <div class="row">
                    <div class="col-6">
                        <img src="./iamges/logo.png" class="w-100" alt="logo">
                    </div>
                    <div class="col-6">
                        <button class="btn btn-danger">test</button>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#" class="btn">Lien1</a>
                    <span class="badge badge-primary badge-pill"><i class="fas fa-angle-double-right"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#" class="btn">Lien2</a>
                    <span class="badge badge-primary badge-pill"><i class="fas fa-angle-double-right"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#" class="btn">Lien3</a>
                    <span class="badge badge-primary badge-pill"><i class="fas fa-angle-double-right"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#" class="btn">Lien3</a>
                    <span class="badge badge-primary badge-pill"><i class="fas fa-angle-double-right"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#" class="btn">Lien3</a>
                    <span class="badge badge-primary badge-pill"><i class="fas fa-angle-double-right"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#" class="btn">Lien3</a>
                    <span class="badge badge-primary badge-pill"><i class="fas fa-angle-double-right"></i></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#" class="btn">Lien3</a>
                    <span class="badge badge-primary badge-pill"><i class="fas fa-angle-double-right"></i></span>
                </li>
            </ul>
        </section>
        <section class="right">
            <header class="container px-0">
                <div class="row w-100 py-2">
                    <div class="logo col-md-6 text-left">
                        <h4>
                            <i class="fas fa-graduation-cap text-secondary"></i>
                            BTS ERRACHIDYA
                        </h4>
                    </div>
                    <div class="log_out col-md-6 text-right">
                        <button class="btn btn-success">log out</button>
                    </div>
                </div>
            </header>


        </section>
    </main>

    <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>

</html> -->