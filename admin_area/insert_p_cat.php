<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

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
                            <i class="fa fa-tags"></i> Insérer Catégorie Produit 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Titre Catégorie Produit </label>
                                <div class="col-md-6">
                                    <input type="text" name="p_cat_title" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Catégorie Produit Description </label>
                                <div class="col-md-6">
                                    <textarea name="p_cat_desc" id="textarea" cols="19" rows="6" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3">  </label>
                                <div class="col-md-6">
                                    <input type="submit" value="Ajouter Catégorie Produit" name="submit" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </form>

                        <?php
                            if(isset($_POST['submit'])){
                                $p_cat_title = $_POST['p_cat_title'];
                                $p_cat_desc = $_POST['p_cat_desc'];

                                $insert_p_cat =  "insert into categories_produits (titre_cat_p , desc_cat_p) value ('$p_cat_title' , '$p_cat_desc')";
                                $run_p_cat = mysqli_query($db , $insert_p_cat);

                                if($run_p_cat){
                                    echo "<script>alert('Une Catégorie de produit a bien été ajoutée')</script>";

                                    echo"<script>window.open('index.php?view_p_cats' , '_self')</script>";
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>