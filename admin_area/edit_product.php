
<?php 
    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

?>
    <?php
        if(isset($_GET['edit_product'])){
            $edit_id = $_GET['edit_product'];

            $get_p = "select * from produits where id_produit = '$edit_id'";
            $run_edit = mysqli_query($db , $get_p);
            $row_edit = mysqli_fetch_array($run_edit);

            $p_id = $row_edit['id_produit'];
            $p_cat = $row_edit['id_cat_p'];
            $cat = $row_edit['id_cat'];
            $p_image1 = $row_edit['img1_produit'];
            $p_image2 = $row_edit['img2_produit'];
            $p_image3 = $row_edit['img3_produit'];
            $p_title = $row_edit['titre_produit'];
            $p_price = $row_edit['prix_produit'];
            $p_desc = $row_edit['desc_produit'];
            $p_keywords = $row_edit['product_keywords'];
        }

        $get_p_cat = "select * from categories_produits where id_cat_p='$p_cat'";
        $run_p_cat = mysqli_query($db , $get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = $row_p_cat['titre_cat_p'];

        $get_cat = "select * from categories where id_cat='$cat'";
        $run_cat = mysqli_query($db , $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_title = $row_cat['titre_cat'];
    ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Edition de Produits</title>
            <link rel="stylesheet" href="css/bootstrap-337.min.css">
            <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/style.css">
            <link rel="icon" href="../images/image53.png">  
        </head>
            <body>
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Tableau de bord / Edition des produits
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-tags fa-fw"></i> Editer Produits
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Titre Produit <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Catégorie Produit <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <select name="product_cat" id="" class="form-control">
                                                <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>
                                                <?php
                                                    $get_p_cats = "select * from categories_produits";
                                                    $run_p_cats = mysqli_query($db,$get_p_cats);

                                                    while($rows_p_cats = mysqli_fetch_array($run_p_cats)){
                                                    $id_cat_p = $rows_p_cats ['id_cat_p'];
                                                    $titre_cat_p = $rows_p_cats ['titre_cat_p'];

                                                    echo "
                                                        <option value='$id_cat_p'> $titre_cat_p </option>
                                                    ";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Catégorie <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <select name="product_cat" id="" class="form-control">
                                                <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?>  </option>
                                                <?php
                                                    $get_cat = "select * from categories";
                                                    $run_cat = mysqli_query($db,$get_cat);

                                                    while($rows_cat = mysqli_fetch_array($run_cat)){
                                                    $id_cat = $rows_cat ['id_cat'];
                                                    $titre_cat = $rows_cat ['titre_cat'];

                                                    echo "
                                                        <option value='$id_cat'> $titre_cat </option>
                                                    ";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Image1 Produit <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <input type="file" name="img1_produit" class="form-control form-height-custom">
                                            <br>
                                            <img width="70" height="70" class="img-responsive" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Image2 Produit <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <input type="file" name="img2_produit" class="form-control">
                                            <br>
                                            <img width="70" height="70" class="img-responsive" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Image3 Produit <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <input type="file" name="img3_produit" class="form-control">
                                            <br>
                                            <img width="70" height="70" class="img-responsive" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Prix Produit <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <input type="text" name="prix_produit" class="form-control" required value="<?php echo $p_price; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Mots-Clés Produit <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Description du produit <span class="text-danger">*</span></label> 
                                        <div class="col-md-6">
                                            <textarea name="desc_produit" id="textarea" cols="19" rows="6" class="form-control">
                                                    <?php echo $p_desc; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label"> </label> 
                                        <div class="col-md-6">
                                            <input type="submit" name="update" value="Mettre à jour" class="btn btn-primary form-control">
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
            $product_title = $_POST['product_title'];
            $product_cat = $_POST['product_cat'];
            $cat = $_POST['cat'];
            $product_price = $_POST['prix_produit'];
            $product_keywords = $_POST['product_keywords'];
            $product_desc = $_POST['desc_produit'];

            $product_img1 = $_FILES['img1_produit']['name'];
            $product_img2 = $_FILES['img2_produit']['name'];
            $product_img3 = $_FILES['img3_produit']['name'];


            $temp_name1 = $_FILES['img1_produit']['tmp_name'];
            $temp_name2 = $_FILES['img2_produit']['tmp_name'];
            $temp_name3 = $_FILES['img3_produit']['tmp_name'];

            move_uploaded_file($temp_name1 , "product_images/$product_img1");
            move_uploaded_file($temp_name2 , "product_images/$product_img2");
            move_uploaded_file($temp_name3 , "product_images/$product_img3");

            $update_product = "update produits set id_cat_p='product_cat' , id_cat ='$cat' , date = NOW() , titre_produit='$product_title' , img1_produit='$product_img1' , img2_produit='$product_img2' , img3_produit='$product_img3' , prix_produit='$product_price' , product_keywords='$product_keywords' , desc_produit='$product_desc' where id_produit='$p_id'";
            $run_product = mysqli_query($db , $update_product);

            if($run_product){
                echo "<script>alert('Le produit a bien été mis à jour')</script>";

                echo "<script>window.open('index.php?view_products' , '_self')</script>";
            }


        }


        ?>
    <?php } ?>
