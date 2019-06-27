
<?php

    $db = mysqli_connect("localhost", "root" , "" , "ecom_store");
    $db->set_charset('utf8');
     
    
    //Fonction pour les produits
    function getPro(){
        global $db;

        $get_products = "select * from produits order by 1 ASC LIMIT 0,8";
        $run_products = mysqli_query($db , $get_products);

        while($row_products = mysqli_fetch_array($run_products)){
        $pro_id = $row_products['id_produit'];
        $pro_title = $row_products['titre_produit'];
        $pro_price = $row_products['prix_produit'];
        $pro_img1 = $row_products['img1_produit'];
        
        
        echo "
            <div class='col-md-4 col-sm-6 single' style='margin-left:12px;'>
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




     // Fonction pour les catégories Produits 
    function getPCats(){
        global $db;

        $get_p_cats = "select * from categories_produits";
        $run_p_cats = mysqli_query($db , $get_p_cats);
        
        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
        $p_cat_id = $row_p_cats['id_cat_p'];
        $p_cat_title = $row_p_cats['titre_cat_p'];

        echo "
            <li>
                <a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a>
            </li>
        
            
        ";
        }

    }




    //Fonction pour les catégories
    function getCats(){
        global $db;

        $get_cats = "select * from categories";
        $run_cats = mysqli_query($db , $get_cats);
        
        while($row_cats = mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['id_cat'];
        $cat_title = $row_cats['titre_cat'];

        echo "
            <li>
                <a href='shop.php?cat=$cat_id'>$cat_title</a>
            </li>
        
            
        ";
        }

    }




    //Fonction les catégories de produits dans la sidebar
    function getcatpro(){
        global $db;

        if(isset($_GET['p_cat'])){
        $p_cat_id = $_GET['p_cat'];

        $get_p_cat = "select * from categories_produits where id_cat_p = '$p_cat_id'";
        $run_p_cat = mysqli_query($db , $get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['titre_cat_p'];
        $p_cat_desc = $row_p_cat['desc_cat_p'];

        $get_products = "select * from produits where id_cat_p = '$p_cat_id'";
        $run_products = mysqli_query($db , $get_products);

        $count = mysqli_num_rows($run_products);

        if($count == 0){
            echo "
            <div class='box'>
                <h4>Aucun produits pour le moment dans cette catégorie produits...</h4>
            </div>
            ";
        }else{
            echo "
            <div class='box' style='margin-top:-45px;'>
                <h4> $p_cat_title </h4>
                <p class='text-muted'>$p_cat_desc</p>
            </div>
            ";
        }

        while($row_products = mysqli_fetch_array($run_products)){
            $pro_id = $row_products['id_produit'];
            $pro_title = $row_products['titre_produit'];
            $pro_price = $row_products['prix_produit'];
            $pro_img1 = $row_products['img1_produit'];

            echo "
                <div class='col-md-4 col-sm-6 single'>
                    <div class='product'>
                        <a href='details.php?id_pro=$pro_id'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Produits'>
                        </a>
                    <div class='text'>
                    <h3>
                        <a href=details.php?id_pro=$pro_id'>
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

    //Fonction pour les catégories dans la sidebar
    function getcat(){
        global $db;

        if(isset($_GET['cat'])){
            $cat_id = $_GET['cat'];

            $get_cat = "select * from categories where id_cat = '$cat_id'";
            $run_cat = mysqli_query($db , $get_cat);
            $row_cat = mysqli_fetch_array($run_cat);

            $cat_title = $row_cat['titre_cat'];
            $cat_desc = $row_cat['desc_cat'];

            $get_products = "select * from produits where id_cat = '$cat_id'";
            $run_products = mysqli_query($db , $get_products);

            $count = mysqli_num_rows($run_products);

            if($count == 0){
                echo "
                <div class='box' style='margin-top:-45px;'>
                    <h4>Aucun produits pour le moment dans cette catégorie ...</h4>
                </div>
                ";
            }else{
                echo "
                <div class='box' style='margin-top:-45px;'>
                    <h4> $cat_title </h4>
                    <p class='text-muted'>$cat_desc</p>
                </div>
                ";
            }

            while($row_products = mysqli_fetch_array($run_products)){
                $pro_id = $row_products['id_produit'];  
                $pro_title = $row_products['titre_produit'];
                $pro_price = $row_products['prix_produit'];
                $pro_desc = $row_products['desc_produit'];
                $pro_img1 = $row_products['img1_produit'];

                echo "
                    <div class='col-md-4 col-sm-6 single'>
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


    //Fonction pour l'adresse ip de l'utlisateur
    function getRealIpUser(){
        switch(true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP']; 
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP']; 
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
        }
    }

    //Fonction pour ajouter des produits au panier
    function add_cart(){
        global $db;

        if(isset($_GET['add_cart'])){
            $ip_add = getRealIpUser();
            $p_id = $_GET['add_cart'];

            $product_qty = $_POST['product_qte'];
            $product_size = $_POST['product_size'];

            $check_product = "select * from panier where ip_add='$ip_addr' AND id_p='$p_id'";

            $run_check = mysqli_query($db , $check_product);

            if(mysqli_num_rows($run_check) > 0){
                echo "<script>alert('Ce produit est déjà dans le panier')</script>";
                echo "<script>window.open('details.php?id_pro=$p_id' , '_self')</script>";
            }else{
                $query = "insert into panier (id_p , ip_add , qte , taille) values ('$p_id','$ip_add','$product_qty','$product_size')";

                $run_query = mysqli_query($db , $query);

                echo "<script>window.open('details.php?id_pro=$p_id' , '_self')</script>";
            }
        }
    }

    
    //FOnction pur afficher le nombre de produits dans le panier (top menu)

    function items(){
    
        global $db;
        
        $ip_add = getRealIpUser();
        
        $get_items = "select * from panier where ip_add='$ip_add'";
        
        $run_items = mysqli_query($db,$get_items);
        
        $count_items = mysqli_num_rows($run_items);
        
        echo $count_items;
        
    }

    //FOnction pour calculer le prix total (Top Menu)
    function total_price(){
    
        global $db;
        
        $ip_add = getRealIpUser();
        
        $total = 0;
        
        $select_cart = "select * from panier where ip_add='$ip_add'";
        
        $run_cart = mysqli_query($db,$select_cart);
        
        while($record=mysqli_fetch_array($run_cart)){
            
            $pro_id = $record['id_p'];
            
            $pro_qty = $record['qte'];
            
            $get_price = "select * from produits where id_produit='$pro_id'";
            
            $run_price = mysqli_query($db,$get_price);
            
            while($row_price=mysqli_fetch_array($run_price)){
                
                $sub_total = $row_price['prix_produit']*$pro_qty;
                
                $total += $sub_total;
                
            }
            
        }
        
        echo $total . " XOF" ;
    
    }



?>