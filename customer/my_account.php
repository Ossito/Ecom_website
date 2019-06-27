

<?php
    $active = 'Mon Compte';
    session_start();
    if(!isset($_SESSION['email_cli'])){
        echo "<script>window.open('../checkout.php' , '_self')</script>";
    }else{

            include 'includes/db.php';
            include 'functions/functions.php'; 
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
                        <a href="../cart.php" class="btn navbar-btn btn-primary right">
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
                            <?php 
                                if(isset($_GET['my_orders'])){
                                    include("my_orders.php");
                                } 
                            ?>
                            <?php 
                                if(isset($_GET['pay_offline'])){
                                    include("pay_offline.php");
                                } 
                            ?>
                            <?php 
                                if(isset($_GET['edit_account'])){
                                    include("edit_account.php");
                                } 
                            ?>
                            <?php 
                                if(isset($_GET['change_pass'])){
                                    include("change_pass.php");
                                } 
                            ?>
                            <?php 
                                if(isset($_GET['delete_account'])){
                                    include("delete_account.php");
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