
<?php 
    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

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
                                <i class="fa fa-dashboard"></i> Tableau de bord / Insérer Administrateurs
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-money fa-fw"></i> Insérer Administrateur
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">  Nom Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input name="admin_name" type="text" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Email Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="email" name="admin_email" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Mot de passe <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="admin_pass" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Image Admin <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <input type="file" name="admin_image" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Pays Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="admin_country" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Job Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="admin_job" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> About Admin <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <textarea name="admin_about" id="textarea" cols="19" rows="6" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Contact Admin <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="admin_contact" class="form-control" required>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label"> </label> 
                                        <div class="col-md-6">
                                            <input type="submit" name="submit" value="Insérer Administrateur" class="btn btn-primary form-control">
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
        if(isset($_POST['submit'])){
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
            
            $insert_user = "insert into admin (nom_admin , email_admin , pass_admin , image_admin , pays_admin , about_admin , contact_admin , job_admin) 
                                       values ('$user_name' , '$user_email' , '$user_password' , '$user_image' , '$user_country' , '$user_about' , '$user_contact' , '$user_job')";
            $run_user = mysqli_query($db , $insert_user); 

            if($run_user){
            echo "<script>alert('Enregistrement administrateur effectué avec succès !!!')</script>";
            echo "<script>window.open('index.php?view_users' , '_self')</script>";
            }
        }


        ?>
    <?php } ?>
