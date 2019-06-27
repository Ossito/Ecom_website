<div class="box">
    <div class="box-header">
        <center>
            <h2><strong><i class="fa fa-sign-in"></i> Se Connecter</strong></h2>
            <p class="lead">
                Avez-vous déjà un compte ?
            </p>
            <p class="text-muted">
                Si oui saisissez vos coordonées pour vous connecter
            </p>
        </center>
    </div>
    <form method="POST" action="checkout.php">
        <div class="form-group">
            <label><i class="fa fa-envelope"></i> Email</label>
            <input name="c_email" type="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label><i class="fa fa-lock"></i> Mot de passe</label>
            <input name="c_pass" type="password" class="form-control" required>
        </div>

        <div class="text-center">
            <button name="login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i> Se Connecter
            </button>
        </div>
    </form>

    <center>
        <h3>Pas encore de compte ? Inscrivez-vous <a href="customer_register.php"><i class="fa fa-hand-o-right"></i> ici </a></h3>
    </center>
</div>

<?php
    if(isset($_POST['login'])){
        $customer_email = $_POST['c_email'];
        $customer_pass = sha1($_POST['c_pass']);

        $select_customer = "select * from clients where email_cli = '$customer_email' AND pass_cli = '$customer_pass'";
        $run_customer = mysqli_query($db , $select_customer);
        $get_ip = getRealIpUser();

        $check_customer = mysqli_num_rows($run_customer);

        $select_cart = "select * from panier where ip_add='$get_ip'";
        $run_cart = mysqli_query($db , $select_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if($check_customer == 0){
            echo "<script>alert('Email ou mot de passe incorrect')</script>";
            exit();
        }

        if($check_customer == 1 AND  $check_cart == 0 ){
            $_SESSION['email_cli'] = $customer_email ;
            echo "<script>alert('Vous vous êtes bien connecté')</script>";
            echo "<script>window.open('customer/my_account.php?my_orders' , '_self')</script>";
        }else{
            $_SESSION['email_cli'] = $customer_email ;
            echo "<script>alert('Vous vous êtes bien connecté')</script>";
            echo "<script>window.open('checkout.php' , '_self')</script>";
        }
    }


?>