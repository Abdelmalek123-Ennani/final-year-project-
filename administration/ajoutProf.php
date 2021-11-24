<?php

session_start();
require_once('./../db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nom = test_input($_POST['nom']);
    $prenom = test_input($_POST['prenom']);
    $class = test_input($_POST['class']);
    $sex = test_input($_POST['sex']);
    $dt_inscription = test_input($_POST['dt_inscription']);
    $cne = test_input($_POST['cne']);
    $matiere = test_input($_POST['matiere']);
    $email = test_input($_POST['email']);
    $tel = test_input($_POST['tel']);
    $address = test_input($_POST['adress']);
    $pic = $_FILES['pic_personnel'];

    $img_folder = './../profile_images/' . basename($pic['name']);
    $avatar = basename($pic['name']);

    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    $password = randomPassword();

    if (!empty($pic['name']) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($tel) && !empty($address) && !empty($cne) && !empty($dt_inscription)) {
        if (move_uploaded_file($pic['tmp_name'], $img_folder)) {
            // $avatar  = basename($pic['name']);
            $sql = "INSERT INTO employee VALUES ('' , '$nom' , '$prenom' , '$email' , '$tel' , '$dt_inscription' , '$class' , '$matiere' , '$password' , '$cne' , '$avatar' , 'prof')";

            if (mysqli_query($connect, $sql)) {
                $message = "ajouté avec succés";
            } else {
                $error = "échoué test";
                echo mysqli_error($connect);
            }
        } else {
            $error = "échoué";
        }
    } else {
        $error = "aucun champ ne doit pas être vide";
    }


    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // echo mysqli_error($connect);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un etudiant< </title>
            <link rel="stylesheet" href="./../css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="./../css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="./../css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="./../css/lobipanel/lobipanel.min.css" media="screen">
            <link rel="stylesheet" href="./../css/prism/prism.css" media="screen">
            <link rel="stylesheet" href="./../css/select2/select2.min.css">
            <link rel="stylesheet" href="./../css/main.css" media="screen">
            <link rel="stylesheet" href="./../bs4/css/bootstrap.min.css" />
            <link rel="stylesheet" href="./../css/css/absence_style.css" />
            <link rel="stylesheet" href="./../css/css/all.css" />
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

                        <!-- forom to add the professeur -->
                        <div class="pb-5 mt-5 vh-100 bg-light">
                            <div class="mb-3 p-2 bg-white border-bottom">
                                <h6>Ajouter Un Professeur</h6>
                            </div>
                            <div class="add-professeur pb-3 mx-3 bg-white">
                                <div class="pt-3 border-bottom">
                                    <h6 class="p-2">Ajouter professeur</h6>
                                </div>
                                <?php if (isset($message)) : ?>
                                    <div class="alert mt-2 alert-success">
                                        <?= $message; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($error)) : ?>
                                    <div class="alert mt-2 alert-danger">
                                        <?= $error; ?>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="nom">Nom:</label>
                                                <input required type="text" name="nom" placeholder="Nom..." class="form-control" id="nom">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="prenom">Prenom:</label>
                                                <input type="text" name="prenom" placeholder="prenom.." class="form-control" id="prenom">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="sel1">Select Class:</label>
                                                <select class="form-control" name="class" id="sel1">
                                                    <?php
                                                    $sql = "SELECT * FROM filieres";
                                                    $req = mysqli_query($connect, $sql);
                                                    while ($r = mysqli_fetch_object($req)) :
                                                    ?>
                                                        <option value="<?= $r->filiere_id ?>"><?= $r->filiere_nom . '' . $r->filiere_session; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="sel1">Select sex:</label>
                                                <select class="form-control" name="sex" id="sel1">
                                                    <option>male</option>
                                                    <option>female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="prenom">Date de naissance:</label>
                                                <input required type="date" name="dt_inscription" placeholder="01/01/2000" class="form-control" id="prenom">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cne">CNE:</label>
                                                <input type="text" name="cne" placeholder="cne..." class="form-control" id="cne">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="sel1">Select Matiére:</label>
                                                <select class="form-control" name="matiere" class="matiere" id="sel1">
                                                    <?php
                                                    $sql = "SELECT * FROM matiere";
                                                    $req = mysqli_query($connect, $sql);
                                                    while ($r = mysqli_fetch_object($req)) :
                                                    ?>
                                                        <option value="<?= $r->id_matiere ?>"><?= $r->nom_matiere; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            <!-- <div class="form-group col-md-3">
                                                <label for="cne">religion:</label>
                                                <input type="text" name="religion" class="form-control" id="cne">
                                            </div> -->
                                            <div class="form-group col-md-3">
                                                <label for="cne">E-mail:</label>
                                                <input required type="email" placeholder="email...." name="email" class="form-control" id="cne">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cne">Tel:</label>
                                                <input type="tel" name="tel" placeholder="tel..." class="form-control" id="cne">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cne">Address:</label>
                                                <input required type="text" placeholder="address" name="adress" class="form-control" id="cne">
                                            </div>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" accept=".jpg,.jpeg,.png,.svg" name="pic_personnel" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Image 150px X 150</label>
                                        </div>

                                        <div class="my-3">
                                            <button class="btn bg-primary text-white" type="submit">Valider</button>
                                            <button class="btn bg-secondary text-white" type="reset">Anuller</button>
                                        </div>
                                    </div>
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
    <script src="./../bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./../bs4/js/popper.js"></script>
    <script src="./../bs4/js/bootstrap.min.js"></script>
    <script src="./../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="./../js/bootstrap/bootstrap.min.js"></script>
    <script src="./../js/pace/pace.min.js"></script>
    <script src="./../js/lobipanel/lobipanel.min.js"></script>
    <script src="./../js/iscroll/iscroll.js"></script>
    <script src="./../js/prism/prism.js"></script>
    <script src="./../js/select2/select2.min.js"></script>
    <script src="./../js/main.js"></script>
</body>

</html>