<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
    <?php
        if(isset($_GET['edit_slide'])){
            $edit_slide_id = $_GET['edit_slide'];

            $get_slides = "select * from slider where id_slide = '$edit_slide_id'";
            $run_edit_slide = mysqli_query($db , $get_slides);
            $row_edit_slide = mysqli_fetch_array($run_edit_slide);

            $slide_id = $row_edit_slide['id_slide'];
            $slide_name = $row_edit_slide['nom_slide'];
            $slide_image = $row_edit_slide['image_slide'];
        }
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
                            <i class="fa fa-tags"></i> Editer Slide
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Nom Slide </label>
                                <div class="col-md-6">
                                    <input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name ;?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3"> Slide Image </label>
                                <div class="col-md-6">
                                    <input type="file" name="slide_image" class="form-control form-height-custom">
                                    <br>
                                    <img  class="img-responsive" src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_image; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-3">  </label>
                                <div class="col-md-6">
                                    <input type="submit" value="Mettre à jour" name="update" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST['update'])){
                $slide_name = $_POST['slide_name'];
                $slide_image = $_FILES['slide_image']['name'];
                $temp_name = $_FILES['slide_image']['tmp_name'];

                move_uploaded_file($temp_name , "slides_images/$slide_image");

                $update_slider = "update slider set nom_slide = '$slide_name' , image_slide = '$slide_image' where id_slide = '$slide_id'";
                $run_update_slider = mysqli_query($db , $update_slider);

                if($run_update_slider){
                    echo "<script>alert('Le slide a bien été mis à jour')</script>";
                    echo "<script>window.open('index.php?view_slides' , '_self')</script>";
                }


                

                




            }

        ?>

    <?php } ?>