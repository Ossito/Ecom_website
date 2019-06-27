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
                            <i class="fa fa-tags"></i> Slides
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            $get_slides = "select * from slider";
                            $run_slides = mysqli_query($db , $get_slides);

                            while($row_slides = mysqli_fetch_array($run_slides)){
                                $slide_id = $row_slides['id_slide'];
                                $slide_name = $row_slides['nom_slide'];
                                $slide_image = $row_slides['image_slide'];
                            
                        ?>
                            <div class="col-lg-3 col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" align="center"> <?php echo $slide_name; ?> </h3>
                                    </div>
                                    <div class="panel-body">
                                        <img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_name; ?>" class="img-responsive" style="height:200px;width:200px;">
                                    </div>
                                    <div class="panel-footer">
                                        <center>
                                            <a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="pull-right btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i> Supprimer
                                            </a>

                                            <a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="pull-left btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Editer
                                            </a>
                                            <div class="clearfix"></div>
                                        </center>
                                    </div>
                                </div>
                            </div>



                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>



    <?php } ?>