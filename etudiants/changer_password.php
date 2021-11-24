<?php

session_start();
require_once('./../db_connect.php');

if (!isset($_SESSION['id_etudiant'])) {
    header('Location: ./../index.html');
}



if (isset($_POST['changer_psd'])) {
    $psd1 = $_POST['psd1'];
    $psd2 = $_POST['psd2'];
    $psd3 = $_POST['psd3'];



    $sql = "SELECT * FROM etudiants WHERE id_etudinant = '{$_SESSION['id_etudiant']}' AND password = '$psd1'";
    $req = mysqli_query($connect, $sql);
    if (mysqli_num_rows($req) > 0) {
        $dt = mysqli_fetch_object($req);

        if ($psd2 == $psd3) {
            $sql = "UPDATE etudiants SET password = '$psd2' WHERE id_etudinant = '{$_SESSION['id_etudiant']}'";
            if (mysqli_query($connect, $sql)) {
                $message = "Changée avec succées";
            }
        } else {
            $error = "ne sont pas egale";
        }
    } else {
        $error = "échoué";
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
            <link rel="styleshhet" href="./../bs4/css/bootstrap.min.css">
            <link rel="stylesheet" href="./../css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="./../css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="./../css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="./../css/lobipanel/lobipanel.min.css" media="screen">
            <link rel="stylesheet" href="./../css/prism/prism.css" media="screen">
            <link rel="stylesheet" href="./../css/select2/select2.min.css">
            <link rel="stylesheet" href="./../css/main.css" media="screen">
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
                <?php include('./../includes/leftbar.php'); ?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">

                        <div class="container">
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger">
                                    <?= $error; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($message)) : ?>
                                <div class="alert alert-success">
                                    <?= $message; ?>
                                </div>
                            <?php endif; ?>
                            <h3>Changer Mot De Pass</h3>
                            <div class="border w-75 p-2">
                                <form action="" method="post" class="bg-white" style="width:50%; padding : 15px; border: 2px solid #DDD">
                                    <div class="form-group">
                                        <label for="email">mot de pass:</label>
                                        <input type="password" name="psd1" required class="form-control" placeholder="mot de pass" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">nouveau motpass:</label>
                                        <input type="password" name="psd2" required class="form-control" placeholder="Nouveau mot pass" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">nouveau motpass:</label>
                                        <input type="password" name="psd3" required class="form-control" placeholder="Nouveau mot pass" id="pwd">
                                    </div>
                                    <button type="submit" name="changer_psd" class="btn btn-primary">mise a jour</button>
                                </form>
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
    <script src="./../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.min.js"></script>
    <script src="./../js/pace/pace.min.js"></script>
    <script src="./../js/lobipanel/lobipanel.min.js"></script>
    <script src="./../js/iscroll/iscroll.js"></script>
    <script src="./../js/prism/prism.js"></script>
    <script src="./../js/select2/select2.min.js"></script>
    <script src="./bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./bs4/js/popper.js"></script>
    <script src="./bs4/js/bootstrap.min.js"></script>
    <script src="./../js/main.js"></script>
</body>

</html>"