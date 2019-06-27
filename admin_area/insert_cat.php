<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

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
                            <i class="fa fa-tags"></i> Insérer Catégorie 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Titre Catégorie </label>
                                <div class="col-md-6">
                                    <input type="text" name="cat_title" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Catégorie Description </label>
                                <div class="col-md-6">
                                    <textarea name="cat_desc" id="textarea" cols="19" rows="6" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3">  </label>
                                <div class="col-md-6">
                                    <input type="submit" value="Ajouter Catégorie" name="submit" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </form>

                        <?php
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];
                                $cat_desc = $_POST['cat_desc'];

                                $insert_cat =  "insert into categories (titre_cat, desc_cat) values ('$cat_title' , '$cat_desc')";
                                $run_cat = mysqli_query($db , $insert_cat);

                                if($run_cat){
                                    echo "<script>alert('Une Catégorie a bien été ajoutée')</script>";

                                    echo"<script>window.open('index.php?view_cats' , '_self')</script>";
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>