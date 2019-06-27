<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    
    <?php
        if(isset($_GET['delete_slide'])){
            $slide_id = $_GET['delete_slide'];

            $delete_slide = "delete from slider where id_slide = '$slide_id'";
            $run_delete_slide = mysqli_query($db , $delete_slide);
            
            if($run_delete_slide){
                echo "<script>alert('Un slide a bien été supprimé')</script>";
                echo "<script>window.open('index.php?view_slides' , '_self')</script>";
            }

        }
    ?>

    <?php } ?>