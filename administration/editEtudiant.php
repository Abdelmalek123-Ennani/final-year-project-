<?php
session_start();
include('./../db_connect.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./../index.html');
}

if (!isset($_GET['stid'])) {
    header('Location: dashboard.php');
}


$stid = intval($_GET['stid']);

if (isset($_POST['submit'])) {
    $stid = $_POST["id"];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $add = $_POST['add'];
    $tel = $_POST['tel'];
    $filiere = $_POST['filiere'];
    $dateNaiss = $_POST['dNaiss'];
    $etat = $_POST['etat'];
    $sql = "update etudiants set nom='$nom',prenom='$prenom',email='$email',sex='$gender',adress='$add',tel='$tel',filiere_id='$filiere',date_naissance='$dateNaiss',continuant='$etat' where id_etudinant = $stid";
    @mysqli_query($connect, $sql);
    $msg = "LES CHANGEMENTS BIEN EFFECTUER";
    header("location: liste.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>changement des info > </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="../css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="../css/select2/select2.min.css">
    <link rel="stylesheet" href="../css/main.css" media="screen">
    <script src="../js/modernizr/modernizr.min.js"></script>
    <style>
        .rd {
            margin-left: 15px !important;
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
                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('./../includes/leftbar.php'); ?>
                <!-- /.left-sidebar -->
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Info d'etudiant</h2>
                            </div>
                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="active">gestion d'info</li>
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
                                            <h5>information à changer</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if (isset($msg)) { ?>
                                            <div class="alert alert-primary left-icon-alert" role="alert">
                                                <strong>Braveau !</strong><?php echo htmlentities($msg); ?>
                                            </div>
                                        <?php } else if (isset($error)) {
                                        ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>Erreur!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                        <form class="form-horizontal" method="post">

                                            <!-- ===================  sql  ====================================== -->
                                            <?php
                                            $sql = "SELECT * FROM etudiants e
                                                            INNER JOIN filieres f
                                                            ON e.filiere_id = f.filiere_id
                                                            WHERE id_etudinant='$stid'";
                                            $rep = mysqli_query($connect, $sql);
                                            $cnt = 1;
                                            if (mysqli_num_rows($rep) > 0) {
                                                $t = mysqli_fetch_assoc($rep);
                                            ?>


                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Nom</label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" name="id" value="<?php echo $stid; ?>">
                                                        <input type="text" name="nom" class="form-control" id="fullanme" value="<?php echo $t["nom"] ?>" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Prénom</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo $t["prenom"] ?>" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $t["email"] ?>" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Sex</label>
                                                    <div class="col-sm-10">
                                                        <select name="sex" class="form-control" id="sel1">
                                                            <option value="masculin" <?= $t['sex'] == "masculin" ? "selected"  : "" ?>>Féminin</option>
                                                            <option value="masculin" <?= $t['sex'] == "feminin" ? "selected"  : "" ?>>Masculin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Adress</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="add" class="form-control" id="add" value="<?php echo $t["adress"] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Telephone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="tel" class="form-control" id="tel" value="<?php echo $t["tel"] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Filière</label>
                                                    <div class="col-sm-10">
                                                        <select name="filiere" id="filiere">
                                                            <?php
                                                            $sq = "SELECT * FROM filieres";
                                                            $re = mysqli_query($connect, $sq);
                                                            while ($tab = mysqli_fetch_assoc($re)) { ?>
                                                                <option value="<?= $tab['filiere_id'] ?>"><?= $tab['filiere_nom'] . '' . $tab['filiere_session'] ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date" class="col-sm-2 control-label">Date Naissance</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="dNaiss" class="form-control" value="<?php echo $t["date_naissance"]; ?>" id="date">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Date Inscription</label>
                                                    <div class="col-sm-10">
                                                        <?php echo $t["date_inscription"]; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Etat scolaire</label>
                                                    <div class="col-sm-10">
                                                        <?php $stats = $t["continuant"];
                                                        if ($stats == "1") {
                                                        ?>
                                                            <input type="radio" class="rd" name="etat" value="1" required="required" checked> nouveau<br />
                                                            <input type="radio" class="rd" name="etat" value="2" required="required"> répéter l'année<br />
                                                            <input type="radio" class="rd" name="etat" value="3" required="required"> disqualifié<br />
                                                        <?php
                                                        } ?>
                                                        <?php
                                                        if ($stats == "2") {
                                                        ?>
                                                            <input type="radio" class="rd" name="etat" value="1" required="required"> nouveau<br />
                                                            <input type="radio" class="rd" name="etat" value="3" required="required" checked> répéter l'année<br />
                                                            <input type="radio" class="rd" name="etat" value="3" required="required"> disqualifié<br />
                                                        <?php
                                                        } ?>
                                                        <?php
                                                        if ($stats == "3") {
                                                        ?>
                                                            <input type="radio" class="rd" name="etat" value="1" required="required">nouveau
                                                            <input type="radio" class="rd" name="etat" value="2" required="required">répéter l'année
                                                            <input type="radio" class="rd" name="etat" value="3" required="required" checked>disqualifié
                                                        <?php
                                                        } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="submit" class="btn btn-primary">Mis à joure</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
<?php  //}
?>