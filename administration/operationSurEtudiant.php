<?php

session_start();
include('./../db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

if (isset($_GET["delete"])) {
    @mysqli_query($connect, "DELETE FROM etudiants WHERE id_etudinant = {$_GET["delete"]}");
    header("Location: liste.php?s=0");
} elseif (isset($_GET["voire"])) {
    $id = $_GET["voire"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>La liste ></title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
        <link rel="stylesheet" href="../css/prism/prism.css" media="screen">
        <link rel="stylesheet" href="../css/select2/select2.min.css">
        <link rel="stylesheet" href="../css/main.css" media="screen">
        <link rel="stylesheet" href="../bs4/css/bootstrap.min.css">
        <script src="../js/modernizr/modernizr.min.js"></script>
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .succWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            * {
                box-sizing: border-box;
            }

            #myInput {
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 16px;
                border: 1px solid #ddd;
                border-radius: 25px;
                margin-bottom: 12px;
                outline: none;
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
                    <?php include('./../includes/leftbar.php'); ?>
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Tout les info d'etudiant</h2>
                                </div>
                            </div>
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                                        <li><a href="liste.php?f=<?= $_GET['f'] ?>">Liste</a></li>
                                        <li class="active">étudiant Information</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title col-md-4">
                                                    <h5>VOIRE LES INFO D'ETUDIANT</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">
                                                <div class="col-md-10 mt-3 informations bg-white py-2">
                                                    <div class="container">
                                                        <?php
                                                        //fetch the data of the student
                                                        $id = $_GET['voire'];
                                                        $sql = "SELECT * FROM etudiants e INNER JOIN filieres f  ON e.filiere_id = f.filiere_id  WHERE id_etudinant = '$id'";
                                                        $req = mysqli_query($connect, $sql);
                                                        $data = mysqli_fetch_object($req);
                                                        ?>
                                                        <div class="row" style="margin: auto; margin-top:26px">
                                                            <div class="student-picture col-3">
                                                                <img src="./../profile_images/<?= $data->avatar ? $data->avatar : "avatar.png" ?>?" alt="avatar" class="w-100">
                                                            </div>
                                                            <div class="student-infos col-9">
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
                                                    <!-- /.col-md-12 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.col-md-6 -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                        </section>
                        <!-- /.section -->
                    </div>
                    <!-- /.main-page -->
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="../js/jquery/jquery-2.2.4.min.js"></script>
        <script src="../js/bootstrap/bootstrap.min.js"></script>
        <script src="../js/pace/pace.min.js"></script>
        <script src="../js/lobipanel/lobipanel.min.js"></script>
        <script src="../js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="../js/prism/prism.js"></script>
        <script src="../js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="../js/main.js"></script>
        <script src="js/main.js"></script>

    </body>

    </html>
<?php
} elseif (isset($_GET["add"])) {
} else
    header("Location: liste.php");
