


<?php
    $active = 'Mon Compte';
    session_start();
    if(!isset($_SESSION['email_cli'])){
        echo "<script>window.open('../checkout.php' , '_self')</script>";
    }else{

            include 'includes/db.php';
            include 'functions/functions.php'; 

            if(isset($_GET['order_id'])){
                $order_id = $_GET['order_id'];
            }
        ?>




        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>ELEGANCE HOMME - Accueil</title>
            <link rel="stylesheet" href="styles/bootstrap-337.min.css">
            <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
            <link rel="stylesheet" href="styles/style.css">
            <link rel="icon" href="images/image53.png">  
        </head>
        <body>
            <div id="top">
                <div class="container-fluid">
                    <div class="col-md-6 offer">
                        <a href="#" class="btn btn-success btn-sm">
                            <?php
                                if(!isset($_SESSION['email_cli'])){
                                    echo "Bienvenue: Invité";
                                }else{
                                    echo "Bienvenue: " . $_SESSION['email_cli'] . "";
                                }
                            ?>
                        </a>&nbsp;
                        <a href="checkout.php" style="margin-left:-5px;"><i class="fa fa-hand-o-right"></i> <?php items(); ?> article(s) dans le panier | Prix Total <?php total_price(); ?> </a>
                    </div>
                    <div class="col-md-6">
                        <ul class="menu">
                            <li>
                                <a href="../customer_register.php"><i class="fa fa-user-plus"></i> S'inscrire</a>
                            </li>
                            <li>
                                <a href="my_account.php"><i class="fa fa-user"></i> Mon Compte</a>
                            </li>
                            <li>
                                <a href="../cart.php"><i class="fa fa-shopping-cart"></i> Panier</a>
                            </li> 
                            <li>
                                <a href="../checkout.php">
                                    <?php
                                        if(!isset($_SESSION['email_cli'])){
                                            echo "<a href='../checkout.php'><i class='fa fa-sign-in'></i> Se Connecter</a>";
                                        }else{
                                            echo "<a href='logout.php'><i class='fa fa-sign-out'></i> Se Déconnecter</a>";
                                        }
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="navbar" class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="../index.php" class="navbar-brand home">
                            <img src="images/image53.png" alt="Logo" height="60" width="120">
                        </a>
                        <button class="navbar-toggle" data-toggle="collapse" data="#navigation">
                            <span class="sr-only">Toggle Navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                        <button class="navbar-toggle" data-toggle="collapse" data="#search"> 
                            <span class="sr-only">Toggle Navigation</span>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="navigation">
                        <div class="padding-nav">
                            <ul class="nav navbar-nav left">
                                <li class="<?php if($active == 'Accueil'){echo "active";} ?>">
                                    <a href="../index.php"><i class="fa fa-home"></i> Accueil</a>
                                </li>
                                <li class="<?php if($active == 'Boutique'){echo "active";} ?>">
                                    <a href="../shop.php"><i class="fa fa-building"></i> Boutique</a>
                                </li>
                                <li class="<?php if($active == 'Mon Compte'){echo "active";} ?>">
                                    <a href="my_account.php"><i class="fa fa-user"></i> Mon Compte</a>
                                </li>
                                <li class="<?php if($active == 'Panier'){echo "active";} ?>">
                                    <a href="../cart.php"><i class="fa fa-shopping-cart"></i> Panier</a>
                                </li>
                                <li class="<?php if($active == 'Contactez-Nous'){echo "active";} ?>">
                                    <a href="../contact.php"><i class="fa fa-envelope"></i> Contactez-Nous</a>
                                </li>
                            </ul>
                        </div>
                        <a href="cart.php" class="btn navbar-btn btn-primary right">
                            <i class="fa fa-shopping-cart"></i>
                            <span><?php items(); ?> produit(s) dans le panier</span>
                        </a>
                        <div class="navbar-collapse collapse right">
                            <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                                <span class="sr-only">Toggle Search</span>
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <div class="collapse clearfix" id="search">
                            <form method="GET" action="results.php" class="navbar-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Rechercher ..." name="user_query" required>
                                    <button type="submit" name="search" value="Search" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li>
                                <a href="../index.php"><i class="fa fa-home"></i> Accueil</a>
                            </li>
                            <li>
                                <i class="fa fa-user"></i> Mon Compte
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3" style="margin-left:-95px;">
                        <?php include 'includes/sidebar.php'; ?>
                    </div>
                    <div class="col-md-9">
                        <div class="box" style="width:110%;">
                        <div class="box-header">
                            <h3 class="text-center"><i class="fa fa-money"></i> Confirmation de paiement</h3>
                                <p class="text-muted text-center">
                                    Veuillez remplir le formualire ci-dessous pour valider votre commande
                                </p>
                        </div>
                        
                        <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Facture N° <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="invoice_no" required>
                                </div>
                                <div class="form-group">
                                    <label>Montant <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="amount_sent" required>
                                </div>
                                <div class="form-group">
                                    <label>Sélectionner votre mode de paiement <span class="text-danger">*</span></label>
                                    <select name="payment_mode" class="form-control">
                                    <option disabled selected>Sélectionner le mode de paiement</option>
                                    <option>Western Union</option>
                                    <option>Transaction Bancaire</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>ID Transaction <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ref_no" required>
                                </div>
                                <div class="form-group">
                                    <label>Banque / Western Union Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="code" required>
                                </div>
                                <div class="form-group">
                                    <label>Date Paiement <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="date" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="confirm_payment">
                                    <i class="fa fa-check"></i> Valider 
                                    </button>
                                </div>
                            </form>
                            
                            <?php
                                if(isset($_POST['confirm_payment'])){
                                    $update_id = $_GET['update_id'];

                                    $select_pro = "select * from cde_attente where id_cde = '$order_id'";
                                    $run_pro = mysqli_query($db , $select_pro);
                                    $row_pro = mysqli_fetch_array($run_pro);
                                    $pro_id = $row_pro['id_produit'];
                                    $customer_id = $row_pro['id_cli'];

                                    $invoice_no = $_POST['invoice_no'];
                                    $amount = $_POST['amount_sent'];
                                    $payment_mode = $_POST['payment_mode'];
                                    $ref_no = $_POST['ref_no'];
                                    $code = $_POST['code'];
                                    $payment_date = $_POST['date'];
                                    $complete = 'Complète';

                                    $insert_payment = "insert into paiements (no_facture , montant , mode_paiement , ref_no , code , date_paiement) 
                                    values ('$invoice_no' , '$amount' , '$payment_mode' , '$ref_no', '$code', '$payment_date')";

                                    $run_payment = mysqli_query($db , $insert_payment);
                                    $update_customer_order = "update commandes_clients set etat_cde = '$complete' where id_cde = '$update_id'";
                                    $run_customer_order = mysqli_query($db , $update_customer_order);

                                    $update_pending_order = "update cde_attente set etat_cde = '$complete' where id_cde = '$update_id'";
                                    $run_pending_order = mysqli_query($db , $update_pending_order);

                                    if($run_pending_order){
                                        echo "<script>alert('Bravo à vous pour avoir validé votre commande , elle sera traitée et vous paviendra le plus tôt possible')</script>";
                                        echo "<script>window.open('my_account.php?my_orders' , '_self')</script>";
                                    }

                                }

                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <?php include 'includes/footer.php'; ?>


            <script src="js/jquery-331.min.js"></script>
            <script src="js/bootstrap-337.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function(){

            $(window).scroll(function(){
                if($(this).scrollTop() > 50){
                $('#topBtn').fadeIn();
                }else{
                $('#topBtn').fadeOut();
                }
            });

            $("#topBtn").click(function(){
                $('html , body').animate({scrollTop : 0} , 600);
            });
            });
        </script>
        </body>
        </html>
    <?php } ?>