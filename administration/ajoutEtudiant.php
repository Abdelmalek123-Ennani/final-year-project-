<?php
session_start();
require_once('../db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $add = $_POST['add'];
    $tel = $_POST['tel'];
    $nomPere = $_POST['nomPere'];
    $telP = $_POST['telP'];
    $nomMere = $_POST['nomMere'];
    $fl = $_POST['fl'];
    $etat = 1;
    $dateN = $_POST['dateN'];
    $anee = $_POST['anee'];
    $pic = $_FILES['pic_personnel'];

    $img_folder = './profile_images/' . basename($pic['name']);
    $avatar = basename($pic['name']);

    move_uploaded_file($pic['tmp_name'], $img_folder);

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



    if (mysqli_query($connect, "INSERT INTO parantes(prere_nom, mere_nom, pere_tel) VALUES('$nomPere','$nomMere','$telP')")) {
        $lastId = mysqli_insert_id($connect);
        $sql = "INSERT INTO etudiants(nom,prenom,email,Password,sex,adress,tel,filiere_id,parent_id,date_naissance,date_inscription,continuant,avatar)
            VALUES('$nom','$prenom','$email', '$password', '$sex','$add','$tel','$fl','$lastId','$dateN','$anee','$etat' , '$avatar')";
        if (mysqli_query($connect, $sql))
            header("location: liste.php?s=0");
        else
            header("location: liste.php?s=1");
    } else
        header("location: liste.php?s=1");
}
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter Etudiant ></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="../css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="../css/select2/select2.min.css">
    <link rel="stylesheet" href="../css/main.css" media="screen">
    <link rel="stylesheet" href="./../bs4/css/bootstrap.min.css">
    <script src="../js/modernizr/modernizr.min.js"></script>
    <style>
        /* body {
            overflow-y: hidden !important;
        } */
    </style>
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
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Ajouter un etudiant</h2>
                            </div>
                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="active">L'ajout d'etudiant</li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Remplire les info d'etudiant</h5>
                                        </div>
                                    </div>
                                    <form class="w-100" method="POST">
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="col-sm-2 control-label">Nom</label>
                                            <input type="text" name="nom" placeholder="Nom..." class="form-control" id="nom" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="col-sm-2 control-label">Prénom</label>
                                            <input type="text" name="prenom" placeholder="prenom" class="form-control" id="prenom" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4  ">
                                            <label for="default" class="col-sm-2 control-label">Email</label>
                                            <div>
                                                <input type="email" name="email" placeholder="email..." class="form-control" id="email" required="required" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="sel1">Select list:</label>
                                            <select class="form-control" id="sel1">
                                                <option value="feminin">Féminin</option>
                                                <option value="masculin">Masculin</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="col-sm-2 control-label">Adress</label>
                                            <input type="text" name="add" placeholder="adress..." class="form-control" id="add" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="control-label">Telephone etudiant</label>
                                            <input type="text" name="tel" class="form-control" placeholder="Telephone etudiant.." name="adress" id="tel" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="control-label">Nom Prant</label>
                                            <input type="text" name="nomPere" class="form-control" placeholder="Nom Parent.." id="nomPere" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="control-label">Nom Mère</label>
                                            <input type="text" name="nomMere" class="form-control" placeholder="Nom Mere.." id="nomMere" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="control-label">Telephone Parant</label>
                                            <input type="text" name="telP" class="form-control" placeholder="telephone Parent.." id="telP" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="control-label">Filière</label>
                                            <select name="fl" class="form-control" id="default" required="required">
                                                <option value="">Selectioner la Filière</option>
                                                <?php
                                                $sql = "SELECT * FROM filieres";
                                                $req = mysqli_query($connect, $sql);
                                                while ($t = mysqli_fetch_object($req)) :
                                                ?>
                                                    <option value="<?= $t->filiere_id ?>"><?= $t->filiere_nom . '' . $t->filiere_session ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="control-label">Anée Scolaire</label>
                                            <select name="annee" class="form-control" id="default" required="required">
                                                <option value="">Selectioner la Filière</option>
                                                <?php for ($i = 2021; $i <= date('Y'); $i += 1) :
                                                    $i2 = $i + 1;
                                                ?>
                                                    <option value="<?= $i . '/' . $i2 ?>"><?= $i . '/' . $i2 ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <label for="default" class="control-label">Date Naissance</label>
                                            <input type="date" name="dateN" class="form-control" id="dateN">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="custom-file">
                                                <input type="file" name="pic_personnel" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group" style="padding: 0px 10px;">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- /.col-md-12 -->
                    </div>
                </div>
            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /.main-wrapper -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/pace/pace.min.js"></script>
    <script src="../js/lobipanel/lobipanel.min.js"></script>
    <script src="../js/iscroll/iscroll.js"></script>
    <script src="../js/prism/prism.js"></script>
    <script src="../js/select2/select2.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        $(function($) {
            $(".js-states").select2();
            $(".js-states-limit").select2({
                maximumSelectionLength: 2
            });
            $(".js-states-hide").select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>
</body>

</html>