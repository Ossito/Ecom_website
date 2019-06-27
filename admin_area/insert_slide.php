<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> Tableau de bord / Sliders
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-tags"></i> Insérer Slide
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Nom Slide </label>
                                <div class="col-md-6">
                                    <input type="text" name="slide_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Slide Image </label>
                                <div class="col-md-6">
                                    <input type="file" name="slide_image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3">  </label>
                                <div class="col-md-6">
                                    <input type="submit" value="Ajouter Slide" name="submit" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST['submit'])){
                $slide_name = $_POST['slide_name'];
                $slide_image = $_FILES['slide_image']['name'];
                $temp_name = $_FILES['slide_image']['tmp_name'];

                $view_slides = "select * from slider";
                $view_run_slides = mysqli_query($db , $view_slides);
                $count = mysqli_num_rows($view_run_slides);

                if($count < 4){
                    move_uploaded_file($temp_name , "slides_images/$slide_image");
                    $insert_slides = "insert into slider (nom_slide , image_slide) values ('$slide_name' , '$slide_image')";
                    $run_slides = mysqli_query($db , $insert_slides);

                    echo "<script>alert('Vous aviez insérer un nouveau slide')</script>";
                    echo "<script>window.open('index.php?view_slides' , '_self')</script>";
                }else{
                    echo "<script>alert('Vous aviez déjà insérer 4 slides')</script>";
                }




            }

        ?>

    <?php } ?>