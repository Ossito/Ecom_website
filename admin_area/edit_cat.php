<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

    <?php
        if(isset($_GET['edit_cat'])){
            $edit_cat_id = $_GET['edit_cat'];

            $edit_cat_query = "select * from categories where id_cat ='$edit_cat_id'";
            $run_cat = mysqli_query($db , $edit_cat_query);
            $row_cat = mysqli_fetch_array($run_cat);

            $cat_id = $row_cat['id_cat'];

            $cat_title = $row_cat['titre_cat'];

            $cat_desc = $row_cat['desc_cat'];
        }

    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> Tableau de bord / Catégories 
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-tags"></i> Editer Catégorie 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Titre Catégorie </label>
                                <div class="col-md-6">
                                    <input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Catégorie Description </label>
                                <div class="col-md-6">
                                    <textarea name="cat_desc" id="textarea" cols="19" rows="6" class="form-control"><?php echo $cat_desc; ?></textarea>
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
                                $cat_title = $_POST['cat_title'];
                                $cat_desc = $_POST['cat_desc'];
                                
                                $update_cat = "update categories set titre_cat = '$cat_title' , desc_cat = '$cat_desc' where id_cat = '$cat_id'";

                                $run_update_cat = mysqli_query($db , $update_cat);

                                if($run_update_cat){
                                    echo "<script>alert('Mise à jour bien effectuée')</script>";
                                    echo "<script>window.open('index.php?view_cats' , '_self')</script>";
                                }
                                
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>