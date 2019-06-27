

<?php
    $active = 'Boutique';
    include 'includes/header.php';
?>
    
<div id="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                </li>
                <li>
                    <i class="fa fa-building"></i> Boutique
                </li>
            </ul>
        </div>
        <div class="col-md-3" style="margin-left:-95px;">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="col-md-9">
            <?php
                if(!isset($_GET['p_cat'])){
                    if(!isset($_GET['cat'])){
                        echo "
                            <div class='box'>
                                <h4>Faites vos achats en toute liberté</h4>
                                <p>Faites vos choix de produits et ajoutez les au panier ; créer un compte pour régler vos factures. <br> Bonne achat à vous <i class='fa fa-smile-o'></i>  <i class='fa fa-smile-o'></i>  <i class='fa fa-smile-o'></i></p>
                            </div>
                        ";
                    }
                }
            ?>
            <div class="row">
                 <?php
                    if(!isset($_GET['p_cat'])){
                        if(!isset($_GET['cat'])){
                            $per_page = 6;

                        if(isset($_GET['page'])){
                            $page = $_GET['page'];

                        }else{
                            $page = 1;
                        }
                        $start_from = ($page - 1) * $per_page;
                        
                        $get_products = "select * from produits order by 1 ASC LIMIT $start_from , $per_page";
                        $run_products = mysqli_query($db , $get_products);

                        while($row_products = mysqli_fetch_array($run_products)){
                            $pro_id = $row_products['id_produit'];
                            $pro_title = $row_products['titre_produit'];
                            $pro_price = $row_products['prix_produit'];
                            $pro_img1 = $row_products['img1_produit']; 

                        echo "

                            <div class='col-md-4 col-sm-6 center-responsive'>
                                <div class='product'>
                                    <a href='details.php?id_pro=$pro_id'>
                                        <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Produits'>
                                    </a>
                                <div class='text'>
                                    <h3>
                                        <a href='details.php?id_pro=$pro_id'>
                                            $pro_title
                                        </a>
                                    </h3>
                                    <p class='price'><i class='fa fa-money'></i> $pro_price XOF</p>
                                    <p class='button'>
                                        <a href='details.php?id_pro=$pro_id' class='btn btn-default'> Détails</a>
                                        <a href='details.php?id_pro=$pro_id' class='btn btn-primary'>
                                            <i class='fa fa-shopping-cart'>
                                                Ajouter au panier 
                                            </i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>";

                            }
                        }   
                    } 
                ?>
            </div>
            <center>
                <ul class="pagination">
                    <?php
                        if(!isset($_GET['p_cat'])){
                            if(!isset($_GET['cat'])){
                                $query = "select * from produits";

                                $result = mysqli_query($db , $query);

                                $total_records = mysqli_num_rows($result);

                                $total_pages = ceil($total_records / $per_page );

                                echo 
                                "
                                    <li> 
                                        <a class='page-link' href='shop.php?page=1'> ".'Première Page'."</a>
                                    </li>
                                ";

                                for($i = 1 ; $i <= $total_pages ; $i++){
                                    
                                    echo "
                                        <li> 
                                            <a class='page-link' href='shop.php?page=".$i."'> ".$i."</a>
                                        </li>
                                    ";
                                };

                                echo 
                                "
                                    <li> 
                                        <a class='page-link' href='shop.php?page=$total_pages'> ".'Dernière Page'."</a>
                                    </li>
                                ";
                            }
                        }
                    ?>
                </ul>
            </center>
            <?php 
                getcatpro();
                getcat(); 
            ?> 
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