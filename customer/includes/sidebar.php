<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">

        <?php
            $customer_session = $_SESSION['email_cli'];
            $get_customer = "select * from clients where email_cli = '$customer_session'";
            $run_customer = mysqli_query($db , $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_image = $row_customer['image_client'];
            $customer_name = $row_customer['nom_cli'];

            if(!isset($_SESSION['email_cli'])){
                
            }else{
                echo "

                    <center>
                        <img class='img-responsive' src='customer_images/$customer_image' alt='Profil_User' style='height:200px;width:200px;border-radius:100%;'>
                    </center>
                    <br>
                    <h3 align='center' class='panel-title'>
                        <i class='fa fa-user'></i> Name: <strong>$customer_name</strong>
                    </h3>   
                
                ";
            }
        ?>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <li class="<?php if(isset($_GET['my_orders'])){echo "active";} ?>">
                <a href="my_account.php?my_orders">
                    <i class="fa fa-list"></i> Mes Commandes
                </a>
            </li>
            <li class="<?php if(isset($_GET['pay_offline'])){echo "active";} ?>">
                <a href="my_account.php?pay_offline">
                    <i class="fa fa-bolt"></i> Payer hors Ligne
                </a>
            </li>
            <li class="<?php if(isset($_GET['edit_account'])){echo "active";} ?>">
                <a href="my_account.php?edit_account">
                    <i class="fa fa-pencil"></i> Editer mon Compte
                </a>
            </li>
            <li class="<?php if(isset($_GET['change_pass'])){echo "active";} ?>">
                <a href="my_account.php?change_pass">
                    <i class="fa fa-lock"></i> Changer mon mot de passe
                </a>
            </li>
            <li class="<?php if(isset($_GET['delete_account'])){echo "active";} ?>">
                <a href="my_account.php?delete_account">
                    <i class="fa fa-trash-o"></i> Supprimer mon compte
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out"></i> Se Déconnecter
                </a>
            </li>
            
        </ul>
    </div>
</div>


