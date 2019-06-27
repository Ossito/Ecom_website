<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    
    <?php
        if(isset($_GET['delete_user'])){
            $delete_user_id = $_GET['delete_user'];

            $delete_users = "delete from admin where id_admin = '$delete_user_id'";
            $run_delete_users = mysqli_query($db , $delete_users);
            
            if($run_delete_users){
                echo "<script>alert('Un administrateur a bien été supprimé')</script>";
                echo "<script>window.open('index.php?view_users' , '_self')</script>";
            }

        }
    ?>

    <?php } ?>