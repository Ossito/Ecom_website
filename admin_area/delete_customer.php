<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    
    <?php
        if(isset($_GET['delete_customer'])){
            $delete_customer_id = $_GET['delete_customer'];

            $delete_customer = "delete from clients where id_cli = '$delete_customer_id'";
            $run_delete_customer = mysqli_query($db , $delete_customer);
            
            if($run_delete_customer){
                echo "<script>alert('Un client a bien été supprimé')</script>";
                echo "<script>window.open('index.php?view_customers' , '_self')</script>";
            }

        }
    ?>

    <?php } ?>