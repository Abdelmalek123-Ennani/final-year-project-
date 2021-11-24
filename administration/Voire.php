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
                                <h2 class="title">Information</h2>
                            </div>
                        </div>
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Etudiant</li>
                                    <li class="active">info d'absence</li>
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
                                                <h5>VOIRE LES DETAILS D'ABSENCE</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">

                                            <?php
                                            if (isset($_GET["voire"])) {
                                                $voire = $_GET["voire"];
                                                $sql = "SELECT *
                                                                    from absences
                                                                    INNER JOIN  etudiants ON id_etudinant=etudiant_id
                                                                    WHERE etudiant_id=$voire";
                                                $rep = mysqli_query($connect, $sql);
                                                if (mysqli_num_rows($rep) > 0) { ?>
                                                    <table id="myTable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nom</th>
                                                                <th>Prénom</th>
                                                                <th>Date d'absence</th>
                                                                <th>Nomber d'heurs</th>
                                                                <th>Justification</th>
                                                                <th>Suprimer</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($t = mysqli_fetch_assoc($rep)) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $t["nom"]; ?></td>
                                                                    <td><?php echo $t["prenom"]; ?></td>
                                                                    <td><?php echo $t["date_absence"]; ?></td>
                                                                    <td><?php echo $t["nombre_heures"]; ?></td>
                                                                    <td>
                                                                        <?php if ($t["justifiee"] == 0)
                                                                            echo "Non justifier";
                                                                        elseif ($t["justifiee"] == 1)
                                                                            echo "justifieé"; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a href="#"><i class="fa fa-trash text-danger"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        } else { ?>
                                                            <p style="margin-top: 46px;">Aucune Absence</p>
                                                    <?php }
                                                    }

                                                    ?>
                                                        </tbody>
                                                    </table>

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
