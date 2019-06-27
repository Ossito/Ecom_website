<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

    <?php
        if(isset($_GET['edit_p_cat'])){
            $edit_p_cat_id = $_GET['edit_p_cat'];

            $edit_p_cat_query = "select * from categories_produits where id_cat_p ='$edit_p_cat_id'";
            $run_p_cat = mysqli_query($db , $edit_p_cat_query);
            $row_p_cat = mysqli_fetch_array($run_p_cat);

            $p_cat_id = $row_p_cat['id_cat_p'];

            $p_cat_title = $row_p_cat['titre_cat_p'];

            $p_cat_desc = $row_p_cat['desc_cat_p'];
        }

    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> Tableau de bord / Catégories Produits
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-tags"></i> Editer Catégorie Produit 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Titre Catégorie Produit </label>
                                <div class="col-md-6">
                                    <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Catégorie Produit Description </label>
                                <div class="col-md-6">
                                    <textarea name="p_cat_desc" id="textarea" cols="19" rows="6" class="form-control"><?php echo $p_cat_desc; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3">  </label>
                                <div class="col-md-6">
                                    <input type="submit" value="Mettre à jour" name="update" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </form>

                        <?php
                            if(isset($_POST['update'])){
                                $p_cat_title = $_POST['p_cat_title'];
                                $p_cat_desc = $_POST['p_cat_desc'];
                                
                                $update_p_cat = "update categories_produits set titre_cat_p = '$p_cat_title' , desc_cat_p = '$p_cat_desc' where id_cat_p = '$p_cat_id'";

                                $run_update = mysqli_query($db , $update_p_cat);

                                if($run_update){
                                    echo "<script>alert('Mise à jour bien effectuée')</script>";
                                    echo "<script>window.open('index.php?view_p_cats' , '_self')</script>";
                                }
                                
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>