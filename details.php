


<?php
    $active = 'Boutique';
    include ('includes/header.php');
?>
    
    <div id="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                    </li>
                    <li>
                        <a href="shop.php"><i class="fa fa-building"></i> Boutique </a>
                    </li>
                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id ; ?>"><?php echo $p_cat_title ; ?></a>
                    </li>
                    <li><?php echo $pro_title ; ?></li>
                </ul>
            </div>
            <div class="col-md-3" style="margin-left:-95px;">
                <?php include 'includes/sidebar.php'; ?>
            </div>
            <div class="col-md-9">
                <div id="productMain" class="row">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" style="height:400px !important;" alt="Details1"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" style="height:400px !important;" alt="Details2"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" style="height:400px !important;" alt="Details3"></center>
                                    </div>
                                </div>
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h3 class="text-center"><?php echo $pro_title; ?></h3>
                            <?php add_cart(); ?>
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Quantité Produit</label>
                                    <div class="col-md-7">
                                        <select name="product_qte" id="" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Taille</label>
                                    <div class="col-md-7">
                                        <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Choisir au moins une taille du produit')">
                                            <option disabled selected>Sélectionner une taille</option>
                                            <option>Petit</option>
                                            <option>Moyen</option>
                                            <option>Grande</option>
                                            <option>Extra Large</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="price"><i class="fa fa-money"></i> <?php echo $pro_price; ?> XOF</p>
                                <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Ajouter au panier</button></p>
                            </form>
                        </div>

                        <div class="row" id="thumbs">
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" style="height:150px !important;" alt="Produit 1" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" style="height:150px !important;" alt="Produit 2" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" style="height:150px !important;" alt="Produit 3" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box" id="details">
                    <h4>Description du produit</h4>
                    <p>
                        <?php echo $pro_desc; ?>
                    </p>
                    <h4>Taille</h4>
                    <ul>
                        <li>Petit</li>
                        <li>Moyen</li>
                        <li>Grande</li>
                        <li>Extra Large</li>
                    </ul>
                    <hr>
                </div>

                <div id="row same-heigh-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center"><i class="fa fa-hand-o-right"></i> Quelques produits que vous pouviez aimé</h3>
                        </div>
                    </div>
                    <?php
                        $get_products = "select * from produits order by rand() LIMIT 0,3";
                        $run_products = mysqli_query($db , $get_products);

                        while($row_products = mysqli_fetch_array($run_products)){
                            $product_id = $row_products['id_produit'];
                            $pro_title = $row_products['titre_produit'];
                            $pro_price = $row_products['prix_produit'];
                            $pro_img1 = $row_products['img1_produit'];
                            
                            echo "
                                <div class='col-md-3 col-sm-6 center-responsive'>
                                    <div class='product same-height'>
                                        <a href='details.php?id_pro=$product_id'>
                                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'  alt='Produits_aléatoire'>
                                        </a>
                                        <div class='text'>
                                            <h3><a href='details.php?id_pro=$product_id'>$pro_title</a></h3>
                                            <p class='price'><i class='fa fa-money'></i> $pro_price XOF</p>
                                        </div>
                                    </div>
                                </div>";
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <?php include 'includes/footer.php'; ?>


    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      $(window).scroll(function(){
        if($(this).scrollTop() > 50){
          $('#topBtn').fadeIn();
        }else{
          $('#topBtn').fadeOut();
        }
      });

      $("#topBtn").click(function(){
        $('html , body').animate({scrollTop : 0} , 600);
      });
    });
  </script>
</body>
</html>