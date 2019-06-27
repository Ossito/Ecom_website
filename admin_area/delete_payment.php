<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    
    <?php
        if(isset($_GET['delete_payment'])){
            $delete_payment_id = $_GET['delete_payment'];

            $delete_payment = "delete from paiements where id_paiement= '$delete_payment_id'";
            
            $run_delete_payment = mysqli_query($db , $delete_payment);
          
            
            if($run_delete_payment){
                echo "<script>alert('Un paiement a bien été supprimée')</script>";
                echo "<script>window.open('index.php?view_payments' , '_self')</script>";
            }

        }
    ?>

    <?php } ?>