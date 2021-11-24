<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

require_once('./../db_connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absence ></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="../css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="../css/select2/select2.min.css">
    <link rel="stylesheet" href="../css/main.css" media="screen">
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
        <?php include('../includes/topbar.php'); ?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('../includes/leftbar.php'); ?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Les Notes</h2>
                            </div>
                        </div>
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Etudiant</li>
                                    <li class="active">gestion des Notes</li>
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

                                            <table class="table table-bordered m-auto bg-light" style="margin-top: 10px !important;">
                                                <thead>
                                                    <tr>
                                                        <td>Matiére</td>
                                                        <td>1er contrôle</td>
                                                        <td>2éme contrôle</td>
                                                        <td>3éme contrôle</td>
                                                        <td>Activités intégrées</td>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    // if (isset($_POST['chercher'])) {
                                                    // $annee = $_POST['annee'];
                                                    // $session = $_POST['session'];

                                                    // if ($session == 1) {
                                                    // $sql = "SELECT note_1 , note_2 FROM matiere m INNER JOIN notes n ON m.id_matiere = n.matiere_id WHERE etudiant_id = 5";

                                                    if (isset($_GET['sess'])) {
                                                        $annee = "2021/2022";
                                                        $session = $_GET['sess'];
                                                        $sqlF = "SELECT filiere_id FROM etudiants WHERE id_etudinant = '{$_GET['et']}'";
                                                        $reqF = mysqli_query($connect, $sqlF);
                                                        $dtF = mysqli_fetch_object($reqF);

                                                        $sql = "SELECT id_matiere, nom_matiere , matiere_coffecient FROM matiere m INNER JOIN filieres f ON m.filiere_id = f.filiere_id WHERE m.filiere_id = '{$dtF->filiere_id}'";
                                                        $req = mysqli_query($connect, $sql);
                                                        // $data = 

                                                        if ($session == 1) {

                                                            while ($r = mysqli_fetch_object($req)) {

                                                                $sql2 = "SELECT note_1 , note_2 FROM notes WHERE matiere_id = '{$r->id_matiere}' AND etudiant_id = '{$_GET['et']}' AND annee_scolaire = '$annee'";
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

                                                                $sql2 = "SELECT note_3 , note_4 FROM notes WHERE matiere_id = '{$r->id_matiere}' AND etudiant_id = '{$_GET['et']}' AND annee_scolaire = '$annee'";
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
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td class="bg-secondary text-white">La Note Générale : </td>
                                                        <td colspan="4"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr />

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

</body>

</html>
<?php
// }
