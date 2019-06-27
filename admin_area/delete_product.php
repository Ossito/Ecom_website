<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    <?php

        if(isset($_GET['delete_product'])){
            $delete_id = $_GET['delete_product'];

            $delete_pro = "delete from produits where id_produit ='$delete_id'";
            $run_delete = mysqli_query($db , $delete_pro);

            if($run_delete){
                echo "<script>alert('Un de vos produits a bien été supprimé')</script>";
                echo "<script>window.open('index.php?view_products' , '_self')</script>";
            }

        }
    ?>
    <?php } ?>