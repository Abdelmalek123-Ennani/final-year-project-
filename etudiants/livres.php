<?php

session_start();

if (!isset($_SESSION['id_etudiant'])) {
    header('Location: ./../index.html');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absence< </title>
            <!-- <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
            <link rel="stylesheet" href="css/prism/prism.css" media="screen">
            <link rel="stylesheet" href="css/select2/select2.min.css">
            <link rel="stylesheet" href="css/main.css" media="screen">
            <link rel="stylesheet" href="./bs4/css/bootstrap.min.css" />
            <link rel="stylesheet" href="css/css/absence_style.css" />
            <link rel="stylesheet" href="css/css/all.css" />
            <link rel="stylesheet" href="css/css/livres.css" />
            <script src="js/modernizr/modernizr.min.js"></script> -->
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

                    <div class="container-fluid mt-4 bg-light">
                        <div class="p-2 row border-bottom bg-white">
                            <h6 class="col-12 col-md-6">Les Livres</h6>
                            <form class="form-inline col-12 form_submit col-md-6" action="/action_page.php">
                                <label for="email">Book Name:</label>
                                <input type="text" class="form-control livre_nom mx-3" placeholder="Enter livre" id="email">
                                <button type="submit" class="btn btn-primary align-self-start">Chercher</button>
                            </form>
                        </div>
                        <div class="container mt-4 livres">
                            <div class="row">
                                <!-- <div class="col-lg-6">
                                    <div class="card" style="">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="./images/c3.jpg" class="card-img" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><%= title %></h5>
                                                    <p class="card-text">Author: <%= author %></p>
                                                    <p class="card-text"><small class="text-muted">Publisher: <%= publisher %></small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
                                    <img src="./images/c3.jpg" alt="img" class="w-100 h-100" />
                                    <div class="overlay"></div>
                                    <h6>this is the book</h6>
                                </div> -->
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
    <!-- <script src="./bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./bs4/js/popper.js"></script>
    <script src="./bs4/js/bootstrap.min.js"></script>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>
    <script src="js/prism/prism.js"></script>
    <script src="js/select2/select2.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/google_books_api.js"></script> -->
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
    <script src="./../js/google_books_api.js"></script>
</body>

</html>