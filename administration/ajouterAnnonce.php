<?php

session_start();
require_once('./../db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

if (isset($_POST['ajouter_annonce'])) {
    $title = $_POST['title'];
    $fond = $_POST['fond'];


    if (!empty($_FILES['pic_personnel']['name'])) {
        $pic = $_FILES['pic_personnel'];
        $img_folder = './../profile_images/' . basename($pic['name']);
        $avatar = basename($pic['name']);

        if (move_uploaded_file($pic['tmp_name'], $img_folder)) {
            $sql = "INSERT INTO annonces(annonce_id , titre , annonce_fond , admin_id , date_annonce , imageAnnone) VALUES ('' , '$title'  , '$fond' , '11' , now() , '$avatar')";
            if (mysqli_query($connect, $sql)) {
                $message  = "Ajoutée avec succés";
            } else {
                $error = "Echoué";
                echo mysqli_error($connect);
            }
        }
    } else {
        $sql = "INSERT INTO annonces(annonce_id , titre , annonce_fond , admin_id , date_annonce) VALUES ('' , '$title'  , '$fond' , '11' , now())";

        if (mysqli_query($connect, $sql)) {
            $message  = "Ajoutée avec succés";
        } else {
            $error = "Echoué";
            echo mysqli_error($connect);
        }
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
            <link rel="styleshhet" href="../bs4/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
            <link rel="stylesheet" href="../css/prism/prism.css" media="screen">
            <link rel="stylesheet" href="../css/select2/select2.min.css">
            <link rel="stylesheet" href="../css/main.css" media="screen">
            <link rel="stylesheet" href="../bs4/js/bootstrap.min.js" media="screen">

            <script src="../js/modernizr/modernizr.min.js"></script>
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
                            <h3>Ajouter Annonce</h3>
                            <div class="border w-75 p-2">
                                <form action="" method="post" class="bg-white" enctype="multipart/form-data" style="width:50%; padding : 15px; border: 2px solid #DDD">
                                    <?php if (isset($message)) : ?>
                                        <div class="alert alert-success">
                                            <?= $message ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (isset($error)) : ?>
                                        <div class="alert alert-danger">
                                            <?= $error ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label for="email">Titre: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Titre de l'annonce" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Annonce Fond: <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="fond" rows="7" autocomplete="off" placeholder="annonce..." id="comment"></textarea>
                                    </div>
                                    <div class="custom-file" style="margin-bottom: 15px;">
                                        <label for="image">Image : </label>
                                        <input type="file" accept=".jpg,.jpeg,.png,.svg" name="pic_personnel" class="custom-file-input" id="customFile">
                                    </div>
                                    <button type="submit" name="ajouter_annonce" class="btn btn-block btn-primary">Ajouter</button>
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
    <script src="./../bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./../bs4/js/popper.js"></script>
    <script src="./../bs4/js/bootstrap.min.js"></script>
    <script src="./../js/main.js"></script>
</body>

</html>