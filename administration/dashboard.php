<?php

session_start();
require_once('./../db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dshboard </title>
    <link rel="stylesheet" href="./../css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="./../css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="./../css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="./../css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="./../css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="./../css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="./../css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="./../css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="./../css/main.css" media="screen">
    <link rel="stylesheet" href="./../bs4/css/bootstrap.min.css" media="screen">
    <script src="./../js/modernizr/modernizr.min.js"></script>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">
        <?php include('./../includes/topbar.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">

                <?php include('./../includes/leftbar.php'); ?>

                <div class="main-page bg-light">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-sm-6">
                                <h2 class="title">Administration</h2>
                            </div>
                            <!-- /.col-sm-6 -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat bg-primary" href="manage-students.php">

                                        <!-- SELECT HERE (COUNT etudiant) -->
                                        <?php
                                        $sql = "SELECT COUNT(id_etudinant) nbrm FROM etudiants";
                                        $req = mysqli_query($connect, $sql);
                                        $data = mysqli_fetch_object($req);
                                        ?>
                                        <span class="number counter"><?= $data->nbrm; ?></span>
                                        <span class="name">Etudiants</span>
                                        <span class="bg-icon"><i class="fa fa-users"></i></span>
                                    </a>
                                    <!-- /.dashboard-stat -->
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat bg-danger" href="manage-subjects.php">

                                        <!-- SELECT COUNT MATIERE -->
                                        <?php
                                        $sql = "SELECT COUNT(DISTINCT nom_matiere) nbrm FROM matiere";
                                        $req = mysqli_query($connect, $sql);
                                        $data = mysqli_fetch_object($req);
                                        ?>
                                        <span class="number counter"><?= $data->nbrm ?></span>
                                        <span class="name">Matières</span>
                                        <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                    </a>
                                    <!-- /.dashboard-stat -->
                                </div>
                                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat bg-warning" href="manage-classes.php">
                                        <!-- SELECT COUNT FILIRRE -->
                                        <?php
                                        $sql = "SELECT COUNT(filiere_id) nbrm FROM filieres WHERE filiere_session != 1";
                                        $req = mysqli_query($connect, $sql);
                                        $data = mysqli_fetch_object($req);
                                        ?>
                                        <span class="number counter"><?= $data->nbrm ?> </span>
                                        <span class="name">Filières</span>
                                        <span class="bg-icon"><i class="fa fa-bank"></i></span>
                                    </a>
                                    <!-- /.dashboard-stat -->
                                </div>
                                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat bg-success" href="manage-results.php">


                                        <!-- SELECT COUNT EMPLOYER -->
                                        <?php
                                        $sql = "SELECT COUNT(id_employee) nbrm FROM employee";
                                        $req = mysqli_query($connect, $sql);
                                        $data = mysqli_fetch_object($req);
                                        ?>
                                        <span class="number counter"><?= $data->nbrm ?></span>
                                        <span class="name">Employees</span>
                                        <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                    </a>
                                    <!-- /.dashboard-stat -->
                                </div>
                                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->
                    <section class="section content">
                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-12 col-md-6 d-flex flex-column">
                                    <div>
                                        <canvas id="myChart" height="200px"></canvas>
                                    </div>
                                    <!--Calender-->
                                    <div>
                                        <h6 class="border-bottom pb-1">Calender</h6>
                                        <iframe src="https://calendar.google.com/calendar/embed?height=200&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLondon&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZW4ubWEjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%2333B679&amp;color=%230B8043&amp;hl=fr&amp;showTitle=0" style="border:solid 1px #777;" class="w-100" height="400" frameborder="0" scrolling="yes"></iframe>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 second col-ms-6">
                                    <div class="annonces bg-white flex-fill border mb-1">
                                        <h6 class="p-2">Nombre des étudiants par class</h6>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Class</th>
                                                    <th>Nombres des étudiants</th>
                                                </tr>
                                            </thead>

                                            <tbody class="number_per_class">
                                                <?php
                                                $sql = "SELECT filiere_id ,filiere_nom , filiere_session FROM filieres";
                                                $req = mysqli_query($connect, $sql);

                                                while ($r = mysqli_fetch_object($req)) :
                                                    $sql = "SELECT COUNT(id_etudinant) nbrE FROM etudiants WHERE filiere_id = '{$r->filiere_id}'";
                                                    $req2 = mysqli_query($connect, $sql);
                                                    $r2 = mysqli_fetch_object($req2);
                                                ?>
                                                    <tr class="text-center">
                                                        <td><?= $r->filiere_nom . '' . $r->filiere_session ?></td>
                                                        <td><?= $r2->nbrE ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                                <!-- <tr class="text-center">
                                                    <td>MCW1</td>
                                                    <td>30</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>MCW1</td>
                                                    <td>30</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>MCW1</td>
                                                    <td>30</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>MCW1</td>
                                                    <td>30</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>MCW1</td>
                                                    <td>30</td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="annonces bg-white flex-fill border p-2 mb-1">
                                        <div class="d-flex py-2 border-bottom justify-content-between align-items-center">
                                            <h6>Tableaux d'annonces</h6>
                                            <a href="./ajouterAnnonce.php" class="btn btn-success">Ajouter Annonce</a>
                                        </div>
                                        <div>
                                            <?php
                                            $sql = "SELECT * FROM annonces LIMIT 5";
                                            $reqA = mysqli_query($connect, $sql);
                                            while ($rt = mysqli_fetch_object($reqA)) :
                                            ?>
                                                <div class="annonce">
                                                    <a href="annonce.php?id_annonce=<?= $rt->annonce_id ?>">
                                                        <p class="text-secondary"><?= $rt->date_annonce ?></p>
                                                        <p class="text-warning m-0">ADMINISTRATION</p>
                                                        <p class="m-0"><?= substr($rt->annonce_fond, 0, 90) . '...' ?></p>
                                                    </a>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <!-- /.main-page -->


            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="./../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="./../js/jquery-ui/jquery-ui.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.min.js"></script>
    <script src="./../js/pace/pace.min.js"></script>
    <script src="./../js/lobipanel/lobipanel.min.js"></script>
    <script src="./../js/iscroll/iscroll.js"></script>
    <!-- <script src="./bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./bs4/js/popper.js"></script>
    <script src="./bs4/js/bootst"></script> -->

    <!-- ========== PAGE JS FILES ========== -->
    <script src="./../js/prism/prism.js"></script>
    <script src="./../js/waypoint/waypoints.min.js"></script>
    <script src="./../js/counterUp/jquery.counterup.min.js"></script>
    <script src="./../js/amcharts/amcharts.js"></script>
    <script src="./../js/amcharts/serial.js"></script>
    <script src="./../js/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="./../js/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="./../js/amcharts/themes/light.js"></script>
    <script src="./../js/toastr/toastr.min.js"></script>
    <script src="./../js/icheck/icheck.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="./../js/main.js"></script>
    <script src="./../js/production-chart.js"></script>
    <script src="./../js/traffic-chart.js"></script>
    <script src="./../js/task-list.js"></script>
    <script src="./../package/dist/chart.min.js"></script>

    <?php
    $sqlT = "SELECT COUNT(id_etudinant) idEtud FROM etudiants";
    $reqT = mysqli_query($connect, $sql);
    $dtT = mysqli_fetch_object($reqT);
    ?>
    <script>
        $(function() {

            // Counter pour les statiques
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });

            fetch('api_chart.php?test=2')
                .then((result) => {
                    console.log(result.json());
                }).catch((err) => {
                    console.log('error');
                });

            // Welcome notification
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("Bienvenue, sur la gestion de BTS");

        });

        var ctx = document.getElementById('myChart');
        // var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total', 'Masculin', 'Feminin'],
                datasets: [{
                    label: 'Nombres des étudiants par sex',
                    data: [40, 25, 15],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        min: 5,
                        max: 70
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Nomre des étudients par sex'
                    }
                }
            }
        });
    </script>
</body>

</html>