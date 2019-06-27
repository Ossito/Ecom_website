<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    
    <?php
        if(isset($_GET['delete_order'])){
            $delete_order_id = $_GET['delete_order'];
            $select_order = "select * from cde_attente where id_cde ='$delete_order_id'";
            $run_select_order = mysqli_query($db , $select_order);
            $row_select_order = mysqli_fetch_array($run_select_order);
            $invoice = $row_select_order['no_facture'];

            $delete_order = "delete from commandes_clients where no_facture = '$invoice'";
            $delete_order2 = "delete from cde_attente where no_facture = '$invoice'";
            $run_delete_order = mysqli_query($db , $delete_order);
            $run_delete_order2 = mysqli_query($db , $delete_order2);
            
            if($run_delete_order && $run_delete_order2){
                echo "<script>alert('Une commande a bien été supprimée')</script>";
                echo "<script>window.open('index.php?view_orders' , '_self')</script>";
            }

        }
    ?>

    <?php } ?>