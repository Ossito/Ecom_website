<?php
    $customer_session = $_SESSION['email_cli'];
    $get_customer = "select * from clients where email_cli = '$customer_session'";
    $run_customer = mysqli_query($db , $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['id_cli'];
    $customer_name = $row_customer['nom_cli'];
    $customer_email = $row_customer['email_cli'];
    $customer_country = $row_customer['pays_cli'];
    $customer_city = $row_customer['ville_cli'];
    $customer_contact = $row_customer['contact_cli'];
    $customer_address = $row_customer['adr_cli'];
    $customer_image = $row_customer['image_client'];


?>




<div class="border-box">
    <h3 class="text-center"><i class="fa fa-pencil"></i> Edition de compte</h3>
    <p class="text-muted text-center">
        Vous pouvez modifier les informations par rapport à vous    
    </p>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label><i class="fa fa-user-o"></i> Nom <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="c_name" value="<?php echo $customer_name; ?>">
        </div>
        <div class="form-group">
            <label class="form-group-label"><i class="fa fa-envelope"></i> Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="c_email" value="<?php echo $customer_email; ?>">
        </div>
        <div class="form-group">
            <label class="form-group-label"><i class="fa fa-flag"></i> Pays <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="c_country" value="<?php echo $customer_country; ?>">
        </div>
        <div class="form-group">
            <label class="form-group-label"><i class="fa fa-building"></i> Ville <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="c_city" value="<?php echo $customer_city; ?>">
        </div>
        <div class="form-group">
            <label class="form-group-label"><i class="fa fa-phone"></i> Téléphone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="c_contact" value="<?php echo $customer_contact; ?>">
        </div>
        <div class="form-group">
            <label class="form-group-label"><i class="fa fa-location-arrow"></i> Adresse <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="c_address" value="<?php echo $customer_address; ?>">
        </div>
        <div class="form-group">
            <label><i class="fa fa-user-circle"></i> Photo de profil</label>
            <input type="file" class="form-control form-height-custom" name="c_image"><br>
            <img class="img-fluid" src="customer_images/<?php echo $customer_image; ?>" alt="Produits" height="150" width="150" style="border-radius: 100%;">  
        </div>
        <br>
        <div class="text-center">
            <button type="submit" name="update" class="btn btn-primary btn-lg">
                <i class="fa fa-thumbs-up"></i> Mettre à jour
            </button>
        </div>
    </form>

    <?php
        if(isset($_POST['update'])){
            $update_id = $customer_id;

            $c_name = $_POST['c_name'];

            $c_email = $_POST['c_email'];

            $c_country = $_POST['c_country'];

            $c_city = $_POST['c_city'];

            $c_contact = $_POST['c_contact'];
            
            $c_address = $_POST['c_address'];

            $c_image = $_FILES['c_image']['name'];

            $c_image_tmp = $_FILES['c_image']['tmp_name'];

            move_uploaded_file($c_image_tmp , "customer_images/$c_image");

            $update_customer = "update clients set nom_cli = '$c_name' , email_cli = '$c_email' , pays_cli = '$c_country' , ville_cli = '$c_city' , contact_cli = '$c_contact' , adr_cli = '$c_address' , image_client = '$c_image' where id_cli = '$update_id' ";
            $run_customer = mysqli_query($db , $update_customer);

            if($run_customer){
                echo "<script>alert('Votre compte a bel et été mis à jour , veuillez vous reconnecter pour prendre en compte cette mise à jour !!!')</script>";
                echo "<script>window.open('logout.php' , '_self')</script>";   
            }
        }


    ?>
</div>