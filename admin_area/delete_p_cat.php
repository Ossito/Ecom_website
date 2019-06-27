<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    
    <?php
        if(isset($_GET['delete_p_cat'])){
            $delete_p_cat_id = $_GET['delete_p_cat'];

            $delete_p_cat = "delete from categories_produits where id_cat_p = '$delete_p_cat_id'";
            $run_delete= mysqli_query($db , $delete_p_cat);
            
            if($run_delete){
                echo "<script>alert('Une catégorie a bien été supprimée')</script>";
                echo "<script>window.open('index.php?view_p_cats' , '_self')</script>";
            }

        }
    ?>

    <?php } ?>