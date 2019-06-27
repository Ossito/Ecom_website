

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
                        <i class="fa fa-money"></i> Option de Paiement
                    </li>
                </ul>
            </div>
            <div class="col-md-3" style="margin-left:-95px;">
                <?php include 'includes/sidebar.php'; ?>
            </div>
            <div class="col-md-9">
                <?php
                    if(!isset($_SESSION['email_cli'])){
                        include ('customer/customer_login.php');
                    }else{
                        include 'payment_options.php';
                    }

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