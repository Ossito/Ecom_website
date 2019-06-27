
<?php 
    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

    <?php

        if(isset($_GET['user_profile'])){
            $edit_user = $_GET['user_profile'];
            $get_user = "select * from admin where id_admin = '$edit_user'";
            $run_user = mysqli_query($db , $get_user);
            $row_user = mysqli_fetch_array($run_user);

            $admin_id = $row_user['id_admin'];
            $admin_name = $row_user['nom_admin'];
            $admin_email = $row_user['email_admin'];
            $admin_pass = sha1($row_user['pass_admin']);
            $admin_country = $row_user['pays_admin'];
            $admin_about = $row_user['about_admin'];
            $admin_job = $row_user['job_admin'];
            $admin_contact = $row_user['contact_admin'];
            $admin_image = $row_user['image_admin'];


        } 

    ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Tableau de bord - Admin</title>
            <link rel="stylesheet" href="css/bootstrap-337.min.css">
            <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/style.css">
            <link rel="icon" href="../images/image53.png">  
        </head>
            <body>
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Tableau de bord / Edition de profil
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-money fa-fw"></i> Editer Profil
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">  Nom Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input name="admin_name" type="text" class="form-control" value="<?php echo $admin_name; ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Email Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="email" name="admin_email" class="form-control" value="<?php echo $admin_email; ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Mot de passe <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="admin_pass" class="form-control" value="<?php echo $admin_pass; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Image Admin <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <input type="file" name="admin_image" class="form-control" value="<?php echo $admin_image; ?>">
                                            <br>
                                            <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_name; ?>" class="img-responsive">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Pays Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="admin_country" class="form-control" value="<?php echo $admin_country; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Job Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="admin_job" class="form-control" value="<?php echo $admin_job; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> About Admin <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <textarea name="admin_about" id="textarea" cols="19" rows="6" class="form-control"><?php echo $admin_about; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Contact Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="admin_contact" class="form-control" value="<?php echo $admin_contact; ?>">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label"> </label> 
                                        <div class="col-md-6">
                                            <input type="submit" name="update" value="Mettre à jour profile" class="btn btn-primary form-control">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="js/jquery-331.min.js"></script>
                <script src="js/bootstrap-337.min.js"></script>
                <script src="js/tinymce/tinymce.min.js"></script>
                <script>
                    tinymce.init({ 
                        selector:'#textarea',
                        theme: 'modern',
                        plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools'
                        ],
                        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                        toolbar2: 'print preview media | forecolor backcolor emoticons',
                        image_advtab: true 
                    });
                    </script>
                    <script src="librairies/parsley/parsley.min.js"></script>
                    <script src="librairies/parsley/i18n/fr.js"></script>
                    <script type="text/javascript">
                    $(window).on('load' , function(){
                        $('.preloader').addClass('complete')
                    });
                </script>
            </body>
        </html>
            


        <?php 
        if(isset($_POST['update'])){
            $user_name = $_POST['admin_name'];
            $user_email = $_POST['admin_email'];
            $user_password = sha1($_POST['admin_pass']);
            $user_country = $_POST['admin_country'];
            $user_contact = $_POST['admin_contact'];
            $user_job = $_POST['admin_job'];
            $user_about = $_POST['admin_about'];

            

            $user_image = $_FILES['admin_image']['name'];
            $temp_admin_name = $_FILES['admin_image']['tmp_name'];
            
            move_uploaded_file($temp_admin_name , "admin_images/$user_image");
            
            $update_user = "update admin set nom_admin = '$user_name' , email_admin = '$user_email' , pass_admin = '$user_password' , image_admin = '$user_image' , pays_admin = '$user_country' , about_admin = '$user_about' , contact_admin = '$user_contact' , job_admin = '$user_job' where id_admin='$admin_id'";
            $run_update_user = mysqli_query($db , $update_user); 

            if($run_update_user){
            echo "<script>alert('Le Profil a été bien mis à jour effectué avec succès !!!')</script>";
            echo "<script>window.open('index.php?view_users' , '_self')</script>";
            }
        }


        ?>
    <?php } ?>
