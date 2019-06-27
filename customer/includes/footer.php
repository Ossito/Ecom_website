<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <h4><i class="fa fa-arrow-right"></i> Pages</h4>
                <ul>
                    <li><a href="../shop.php"><i class="fa fa-building"></i> Magasin</a></li>
                    <li><a href="my_account.php"><i class="fa fa-user"></i> Mon Compte</a></li>
                    <li><a href="../cart.php"><i class="fa fa-shopping-cart"></i> Panier</a></li>
                    <li><a href="../contact.php"><i class="fa fa-envelope"></i> Contactez-Nous</a></li>
                </ul>
                <hr>

                <h4><i class="fa fa-arrow-right"></i> Utilisateurs</h4>
                <ul>
                    <?php
                        if(!isset($_SESSION['email_cli'])){
                            echo "<a href='checkout.php'><i class='fa fa-sign-in'></i> Se Connecter</a>";
                        }else{
                            echo "<a href='my_account.php?my_orders'><i class='fa fa-user'></i> Mon Compte</a>";
                        }
                    ?>
                    <li>
                        <?php
                            if(!isset($_SESSION['email_cli'])){
                                echo "<a href='checkout.php'><i class='fa fa-sign-in'></i> Se Connecter</a>";
                            }else{
                                echo "<a href='my_account.php?edit_account'><i class='fa fa-pencil'></i> Editer mon Compte</a>";
                            }
                        ?>
                    </li>
                </ul>
                <hr class="hidden-md hidden-lg hidden sm">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4><i class="fa fa-arrow-right"></i> Catégories Produits</h4>
                <ul>
                    <?php
                        $get_p_cats = "select * from categories_produits";
                        $run_p_cats = mysqli_query($db , $get_p_cats);
                        
                        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                        $p_cat_id = $row_p_cats['id_cat_p'];
                        $p_cat_title = $row_p_cats['titre_cat_p'];

                        echo "
                            <li>
                            <a href='../shop.php?cat_p=$p_cat_id'>$p_cat_title</a>
                            </li>
                        
                            
                        ";
                        }
                    ?>
                </ul>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4><i class="fa fa-hand-o-right"></i> Retrouvez-Nous</h4>
                <p>
                    <strong>ELEGANCE - HOMME inc.</strong>
                    <br><i class="fa fa-send"></i> Cotonou , BENIN
                    <br><i class="fa fa-map"></i> CEG ZOGBO non loin de la station Oryx
                    <br><i class="fa fa-phone"></i> +229 97 97 97 98
                    <br><i class="fa fa-envelope"></i> elegancehomme@gmail.com
                    <br><strong>ELEGANCE - HOMME</strong>
                </p>
                <a href="../contact.php"><i class="fa fa-hand-o-right"></i> Pour nous contactez</a>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Newsletter</h4>
                <p class="text-muted">
                    Ne rater pas les derniers arrivages et les périodes de promotions
                </p>
                <form action="get" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email">
                        <span class="input-group-btn">
                            <input type="submit" value="Souscrire" class="btn btn-default">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Garder le contact</h4>
                <p class="social">
                    <a href="../#" class="fa fa-facebook"></a>
                    <a href="../#" class="fa fa-twitter"></a>
                    <a href="../#" class="fa fa-instagram"></a>
                    <a href="../#" class="fa fa-google-plus"></a>
                    <a href="../#" class="fa fa-envelope"></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="copyright">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <p class="pull-left">&copy; 2019 ELEGANCE - HOMME | Tous droits réservés</p>
        </div>
        <div class="col-md-6">
          <p class="pull-right"><strong> Votre Satisfaction , notre Passion</strong></p>
        </div>
      </div>
    </div>
  </div>

  <button id="topBtn"><i class="fa fa-angle-up"></i></button>


  