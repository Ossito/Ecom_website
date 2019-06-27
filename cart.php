


<?php
    $active = 'Panier';
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
                        <i class="fa fa-shopping-cart"></i> Panier
                    </li>
                </ul>
            </div>
            <div class="col-md-9" id="cart">
                <div class="box" style="margin-left:-11%">
                    <form action="cart.php" method="POST" enctype="multipart/form-data">
                        <h2><i class="fa fa-shopping-cart"></i> Panier</h2>
                        <?php
                            $ip_add = getRealIpUser();
                            $select_cart = "select * from panier where ip_add='$ip_add'";
                            $run_cart = mysqli_query($db , $select_cart);
                            $count = mysqli_num_rows($run_cart); 
                        ?>
                        <p class="text-muted">Vous aviez <?php echo $count; ?> produit(s) dans votre panier</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Produit(s)</th>
                                        <th>Quantité</th>
                                        <th>Prix Unitaire</th>
                                        <th>Taille</th>
                                        <th colspan="1">Supprimer</th>
                                        <th colspan="2">Sous-Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $total = 0;

                                        while($row_cart = mysqli_fetch_array($run_cart)){
                                            $pro_id = $row_cart['id_p'];

                                            $pro_size = $row_cart['taille'];

                                            $pro_qty = $row_cart['qte'];

                                            $get_products = "select * from produits where id_produit ='$pro_id'";
                                            $run_products = mysqli_query($db , $get_products);

                                            while($row_products = mysqli_fetch_array($run_products)){ 
                                                $product_title = $row_products['titre_produit'];
                                                $product_img1 = $row_products['img1_produit'];
                                                $only_price = $row_products['prix_produit'];
                                                $sub_total = $row_products['prix_produit'] * $pro_qty;
                                                $total += $sub_total; 
                                    ?>
                                        <tr>
                                            <td>

                                                <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Produit1_Panier">

                                            </td>
                                            <td>

                                                <a href="details.php?id_pro=<?php echo $pro_id ;?>"> <?php echo $product_title; ?> </a>

                                            </td>
                                            <td>

                                                <?php echo $pro_qty; ?>

                                            </td>
                                            <td>

                                                <?php echo $only_price; ?>

                                            </td>
                                            <td>
                                                
                                                <?php echo $pro_size; ?>

                                            </td>
                                            <td>
                                                
                                                <input type="checkbox" name="remove[]" value="<?php echo $pro_id ;?>">

                                            </td>
                                            <td>
                                                
                                                <?php echo $sub_total; ?> XOF

                                            </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>


                                <tfoot>
                                    <tr>
                                        <th colspan="6">Total</th>
                                        <th colspan="2"><?php echo $total; ?> XOF</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="shop.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continuer l'achat
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" name="update" value="Mettre à jour le panier" class="btn btn-default">
                                    <i class="fa fa-refresh"></i> Mettre à jour le panier 
                                </button>
                                <a href="checkout.php" class="btn btn-primary">
                                  <i class="fa fa-money"></i> Procédé au paiement <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <?php 
                    function update_cart(){
                        global $db;
                        if(isset($_POST['update'])){
                            foreach($_POST['remove'] as $remove_id){
                                $delete_product = "delete from panier where id_p = '$remove_id'";
                                $run_delete = mysqli_query($db , $delete_product);

                                if($run_delete){
                                    echo "<script>window.open('cart.php' , '_self')</script>";
                                }

                            }
                        }
                    }

                    echo @$up_cart = update_cart(); 
                ?>

                <div id="row same-heigh-row" style="margin-left:-12%;">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline" style="height:338px;">
                            <h3 class="text-center"><i class="fa fa-hand-o-right"></i> Quelques produits que vous pouviez aimé</h3>
                        </div>
                    </div>
                    <?php

                        $get_products = "select * from produits order by rand() LIMIT 0,3";
                        $run_products = mysqli_query($db , $get_products);

                        while($row_products = mysqli_fetch_array($run_products)){
                            $pro_id = $row_products['id_produit'];
                            $pro_title = $row_products['titre_produit'];
                            $pro_price = $row_products['prix_produit'];
                            $pro_img1 = $row_products['img1_produit'];

                            echo "
                            
                            <div class='col-md-3 col-sm-6 center-responsive'>
                                <div class='product same-height'>
                                    <a href='details.php?id_pro=$pro_id'>
                                        <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Produit1'>
                                    </a>
                                    <div class='text'>
                                        <h3><a href='details.php?id_pro=$pro_id'> $pro_title </a></h3>
                                        <p class='price'><i class='fa fa-money'></i> $pro_price XOF</p>
                                    </div>
                                </div>
                            </div>

                            ";
                        }

                    ?>
                </div>
                    </div>
            
            <div class="col-md-3">
                <div id="order-summary" class="box">
                    <div class="box-header">
                        <h5 class="text-center"><strong>Récapitulatif de la Commande</strong></h5>
                    </div>
                    
                    <p class="text-muted">
                        Les frais d'expédition et les frais supplémentaires sont 
                        calculés en fonction de la valeur que vous avez saisie.
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Total du Sous-total</td>
                                    <th><?php echo $total; ?> XOF</th>
                                </tr>
                                <tr>
                                    <td>Manutention</td>
                                    <td>0 XOF</td>
                                </tr>
                                <tr>
                                    <td>Taxe</td>
                                    <th>0 XOF</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th><?php echo $total; ?> XOF</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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