<?php

include_once 'C://xampp/htdocs/webprojettest/allfolders/model/users.php';
include_once 'C://xampp/htdocs/webprojettest/allfolders/controller/userC.php';


$error = "";
// create user
$user = null;

// create an instance of the controller
$userC = new UtilisateurC();
if (
    !empty($_POST["nameUsers"]) &&
    !empty($_POST["lastnameUsers"]) &&
    !empty($_POST["address"]) &&
    !empty($_POST["Login"]) &&
    !empty($_POST["Cin"]) &&
    !empty($_POST["Password"])
) {
    if (
        !empty($_POST["nameUsers"]) &&
        !empty($_POST["lastnameUsers"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["Login"]) &&
        !empty($_POST["Cin"]) &&
        !empty($_POST["Password"])
    ) {
        $user = new Utilisateur(
            $_POST['nameUsers'],
            $_POST['lastnameUsers'],
            $_POST['address'],
            $_POST['Login'],
            $_POST['Cin'],
            $_POST['Password']
        );
        $userC->ajouterUtilisateur($user);
        //  header('Location:afficherUtilisateurs.php');
    } else
        $error = "Missing information";
}

?>







<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="loginsignupcss/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="loginsignupcss/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
                    <div class="col-lg-5 d-none d-lg-block " style="background-image: url('https://www.pinnaclecare.com/wp-content/uploads/2017/12/bigstock-African-young-doctor-portrait-28825394.jpg.webp');background-size: cover;  background-position: center;
               "> </div>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nameUsers" placeholder="Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lastnameUsers" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <input type="text" class="form-control form-control-user" name="Login" placeholder="Login Address">
                                    </div>

                                    <div class="col-sm-6">

                                        <input type="text" class="form-control form-control-user" name="Cin" placeholder="cin">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="address" placeholder="Address">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="Password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="pwd_repeat" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" name="signup_submit" class="btn btn-primary btn-user btn-block"> Register Account </button>

                                <hr>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="loginsignupcss/vendor/jquery/jquery.min.js"></script>
    <script src="loginsignupcss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="loginsignupcss/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="loginsignupcss/js/sb-admin-2.min.js"></script>

</body>

</html>