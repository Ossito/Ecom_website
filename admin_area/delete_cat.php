<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    
    <?php
        if(isset($_GET['delete_cat'])){
            $delete_cat_id = $_GET['delete_cat'];

            $delete_cat = "delete from categories where id_cat = '$delete_cat_id'";
            $run_delete_cat = mysqli_query($db , $delete_cat);
            
            if($run_delete_cat){
                echo "<script>alert('Une catégorie a bien été supprimée')</script>";
                echo "<script>window.open('index.php?view_cats' , '_self')</script>";
            }

        }
    ?>

    <?php } ?>