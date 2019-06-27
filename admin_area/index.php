<?php
    session_start();
    include ('includes/db.php');

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{
        $admin_session = $_SESSION['email_admin'];
        $get_admin = "select * from admin where email_admin='$admin_session'";
        $run_admin = mysqli_query($db , $get_admin);
        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['id_admin'];

        $admin_name = $row_admin['nom_admin'];
        $admin_email = $row_admin['email_admin'];
        $admin_image = $row_admin['image_admin'];
        $admin_country = $row_admin['pays_admin'];
        $admin_about = $row_admin['about_admin'];
        $admin_contact = $row_admin['contact_admin'];
        $admin_job = $row_admin['job_admin'];

        $get_products = "select * from produits";
        $run_products = mysqli_query($db , $get_products);
        $count_products = mysqli_num_rows($run_products);

        $get_customers = "select * from clients";
        $run_customers = mysqli_query($db , $get_customers);
        $count_customers = mysqli_num_rows($run_customers);

        $get_p_categories = "select * from categories_produits";
        $run_p_categories = mysqli_query($db , $get_p_categories);
        $count_p_categories = mysqli_num_rows($run_p_categories);

        $get_categories = "select * from categories";
        $run_categories = mysqli_query($db , $get_categories);
        $count_categories = mysqli_num_rows($run_categories);

        $get_pending_orders = "select * from cde_attente";
        $run_pending_orders = mysqli_query($db , $get_pending_orders);
        $count_pending_orders = mysqli_num_rows($run_pending_orders);

        $get_customers_orders = "select * from commandes_clients";
        $run_customers_orders = mysqli_query($db , $get_customers_orders);
        $count_customers_orders = mysqli_num_rows($run_customers_orders);

    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tableau de bord - Admin</title>
        <link rel="stylesheet" href="css/bootstrap-337.min.css">
        <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="../images/image53.png">  
    </head>
    <body>

        <div id="wrapper">
            <?php include ('includes/sidebar.php'); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <?php
                        if(isset($_GET['dashboard'])){
                            include("dashboard.php");
                        }

                        if(isset($_GET['insert_product'])){
                            include ('insert_product.php');
                        }

                        if(isset($_GET['view_products'])){
                            include ('view_products.php');
                        }

                        if(isset($_GET['delete_product'])){
                            include ('delete_product.php');
                        }

                        if(isset($_GET['edit_product'])){
                            include ('edit_product.php');
                        }

                        if(isset($_GET['insert_p_cat'])){
                            include ('insert_p_cat.php');
                        }

                        if(isset($_GET['view_p_cats'])){
                            include ('view_p_cats.php');
                        }

                        if(isset($_GET['delete_p_cat'])){
                            include ('delete_p_cat.php');
                        }

                        if(isset($_GET['edit_p_cat'])){
                            include ('edit_p_cat.php');
                        }

                        if(isset($_GET['insert_cat'])){
                            include ('insert_cat.php');
                        }

                        if(isset($_GET['view_cats'])){
                            include ('view_cats.php');
                        }

                        if(isset($_GET['edit_cat'])){
                            include ('edit_cat.php');
                        }

                        if(isset($_GET['delete_cat'])){
                            include ('delete_cat.php');
                        }

                        if(isset($_GET['insert_slide'])){
                            include ('insert_slide.php');
                        }

                        if(isset($_GET['view_slides'])){
                            include ('view_slides.php');
                        }

                        if(isset($_GET['edit_slide'])){
                            include ('edit_slide.php');
                        }

                        if(isset($_GET['delete_slide'])){
                            include ('delete_slide.php');
                        }

                        if(isset($_GET['view_customers'])){
                            include ('view_customers.php');
                        }

                        if(isset($_GET['delete_customer'])){
                            include ('delete_customer.php');
                        }

                        if(isset($_GET['view_orders'])){
                            include ('view_orders.php');
                        }

                        if(isset($_GET['delete_order'])){
                            include ('delete_order.php');
                        }

                        if(isset($_GET['view_payments'])){
                            include ('view_payments.php');
                        }

                        if(isset($_GET['delete_payment'])){
                            include ('delete_payment.php');
                        }

                        if(isset($_GET['view_users'])){
                            include ('view_users.php');
                        }

                        if(isset($_GET['insert_user'])){
                            include ('insert_user.php');
                        }

                        if(isset($_GET['delete_user'])){
                            include ('delete_user.php');
                        }

                        if(isset($_GET['user_profile'])){
                            include ('user_profile.php');
                        }

                        

                    ?>
                </div>
            </div>
        </div>


        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
    </body>
    </html>

<?php } ?>