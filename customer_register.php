

<?php
    $active = 'Mon Compte';
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
                        <i class="fa fa-user-plus"></i> S'inscrire
                    </li>
                </ul>
            </div>
            <div class="col-md-3" style="margin-left:-95px;">
                <?php include 'includes/sidebar.php'; ?>
            </div>
            <div class="col-md-9">
              <div class="box">
                <div class="border-box">
                  <h3 class="text-center">Créer vous un nouveau compte pour valider vos achats</h3>
                  <p class="text-muted text-center">
                    Remplissez le formulaire ci-dessous pour valider votre compte ...
                  </p>
                  <form action="customer_register.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label><i class="fa fa-user-o"></i> Nom <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="c_name">
                    </div>
                    <div class="form-group">
                      <label class="form-group-label"><i class="fa fa-envelope"></i> Email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" name="c_email">
                    </div>
                    <div class="form-group">
                      <label class="form-group-label"><i class="fa fa-lock"></i> Mot de passe <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" name="c_pass">
                    </div>
                    <div class="form-group">
                      <label class="form-group-label"><i class="fa fa-flag"></i> Pays <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="c_country">
                    </div>
                    <div class="form-group">
                      <label class="form-group-label"><i class="fa fa-building"></i> Ville <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="c_city">
                    </div>
                    <div class="form-group">
                      <label class="form-group-label"><i class="fa fa-phone"></i> Téléphone <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="c_contact">
                    </div>
                    <div class="form-group">
                      <label class="form-group-label"><i class="fa fa-location-arrow"></i> Adresse <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="c_address">
                    </div>
                    <div class="form-group">
                      <label><i class="fa fa-user-circle"></i> Photo de profil</label>
                      <input type="file" class="form-control form-height-custom" name="c_image">   
                    </div>
                    <br>
                    <div class="text-center">
                      <button type="submit" name="register" class="btn btn-primary btn-lg">
                        <i class="fa fa-user-plus"></i> S'inscrire
                      </button>
                    </div>
                  </form>
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



<?php 

    if(isset($_POST['register'])){

      $c_name = $_POST['c_name'];

      $c_email = $_POST['c_email'];

      $c_pass = sha1($_POST['c_pass']);

      $c_country = $_POST['c_country'];

      $c_city = $_POST['c_city'];

      $c_contact = $_POST['c_contact'];

      $c_address = $_POST['c_address'];

      $c_image = $_FILES['c_image']['name'];

      $c_image_tmp = $_FILES['c_image']['tmp_name'];

      $c_ip = getRealIpUser();

      move_uploaded_file($c_image_tmp , "customer/customer_images/$c_image");

      $insert_customer = "insert into clients (nom_cli , email_cli , pass_cli , pays_cli , ville_cli , contact_cli , adr_cli , image_client , ip_cli) values 
      ('$c_name' , '$c_email' , '$c_pass' , '$c_country' ,  '$c_city' , '$c_contact'  , '$c_address' , '$c_image' , '$c_ip')";
      $run_customer = mysqli_query($db , $insert_customer);

      $sel_cart =  "select * from panier where ip_add='$c_ip'";
      $run_cart = mysqli_query($db , $sel_cart);

      $check_cart = mysqli_num_rows($run_cart);

      if($check_cart > 0){
        // Si l'utilisateur s'enregistre avec des produits déjà dans le panier
        $_SESSION['email_cli'] = $c_email;
        echo "<script>alert('Enregistrement effectué avec succès !!!')</script>";
        echo "<script>window.open('checkout.php' , '_self')</script>";
      }else{
        // Si l'utilisateur s'enregistre sans produits dans le panier
        $_SESSION['email_cli'] = $c_email;
        echo "<script>alert('Enregistrement effectué avec succès !!!')</script>";
        echo "<script>window.open('index.php' , '_self')</script>";
      }
    }


?>