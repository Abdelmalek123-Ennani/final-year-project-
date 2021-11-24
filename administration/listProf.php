<?php
session_start();
require_once('./../db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

if (isset($_GET["s"])) {
    if ($_GET["s"] == 0) { ?>
        <script>
            alert("L'opperation est effectuée avec succés press OK to continue");
        </script>
    <?php }
    if ($_GET["s"] == 1) { ?>
        <script>
            alert("UNE ERREUR LORS DE L'OPPERATION press OK to continue");
        </script>
<?php }
}

if (!isset($_GET['f'])) {
    header('Location: ./../index.html');
}

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

if (!isset($_GET['f'])) {
    header('Location: ./dashboard.php');
}
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
                                <h2 class="title">LISTE DES PROFESSEUR</h2>
                            </div>
                        </div>
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Professeur</li>
                                    <li class="active">Liste des Professeurs</li>
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
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher le nom ..." title="Type in a name">
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">
                                            <table id="myTable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Email</th>
                                                        <th>Matiére</th>
                                                        <th>Filière</th>
                                                        <th>Cne</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($_GET["f"])) {



                                                        $anee = explode('_', $_GET['f'])[1];
                                                        $filere = explode('_', $_GET['f'])[0];
                                                        $sql = "SELECT *
                                                                        from employee
                                                                        NATURAL JOIN filieres
                                                                        WHERE filiere_nom = '$filere'
                                                                        AND filiere_session='$anee'
                                                                        AND role = 'prof'";
                                                        $rep = mysqli_query($connect, $sql);
                                                        if (mysqli_num_rows($rep) > 0) {
                                                            while ($t = mysqli_fetch_assoc($rep)) {
                                                                $sqM = "SELECT nom_matiere FROM matiere m INNER JOIN employee e ON m.id_matiere = e.matiere_id WHERE id_employee = '{$t["id_employee"]}'";
                                                                $reqM = mysqli_query($connect, $sqM);
                                                                $dt = mysqli_fetch_object($reqM);
                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $t["id_employee"]; ?></td>
                                                                    <td><?php echo $t["nom"]; ?></td>
                                                                    <td><?php echo $t["prenom"]; ?></td>
                                                                    <td><?php echo $t["email"]; ?></td>
                                                                    <td><?php echo $dt->nom_matiere; ?></td>
                                                                    <td><?php echo $t["cne"]; ?></td>
                                                                    <td><?php echo $t["filiere_nom"] . $anee ?></td>
                                                                    <td>
                                                                        <a href="#?stid=<?php echo $t["id_employee"]; ?>">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a href="#?delete=<?php echo $t["id_employee"]; ?>">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                        <?php
                                                            }
                                                        }
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
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
<?php
// }
