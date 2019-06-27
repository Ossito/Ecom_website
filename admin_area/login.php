
<?php
    session_start();
    include ('includes/db.php');


?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="../images/image53.png">  
</head>
<body>
    <div class="container">
        <form action="" class="form form-login" method="POST">
            <h2 class="form-login-heading">
                <i class="fa fa-sign-in"></i> Connexion
            </h2>

            <input type="email" class="form-control" placeholder="Email" name="email_admin" required>

            <input type="password" class="form-control" placeholder="Mot de passe" name="admin_pass" required>

            <button type="submit" name="admin_login" class="btn btn-lg btn-primary btn-block">
                <i class="fa fa-sign-in"></i> Se Connecter
            </button>
        </form>
    </div>
</body>
</html>


<?php

    if(isset($_POST['admin_login'])){
        $admin_email = mysqli_real_escape_string($db , $_POST['email_admin']);

        $admin_pass = mysqli_real_escape_string($db , sha1($_POST['admin_pass']));

        $get_admin = "select * from admin where email_admin='$admin_email' AND pass_admin='$admin_pass'";
        $run_admin = mysqli_query($db , $get_admin);
        $count = mysqli_num_rows($run_admin);

        if($count == 1){
            $_SESSION['email_admin'] = $admin_email ;
            
            echo "<script>alert('Bienvenue à vous !!')</script>";
            echo "<script>window.open('index.php?dashboard' , '_self')</script>";
        }else{
            echo "<script>alert('Email ou mot de passe incorrect')</script>";
        }
    }


?>