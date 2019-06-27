<div class="border-box">
    <h3 class="text-center"><i class="fa fa-key"></i> Changement de mot de passe</h3>
    <p class="text-muted text-center">
        
    </p>
    <br>
    <form action="" method="POST">
        <div class="form-group">
            <label><i class="fa fa-key"></i> Votre ancien mot de passe <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="old_pass">
        </div>
        <div class="form-group">
            <label class="form-group-label"><i class="fa fa-lock"></i> Votre nouveau mot de passe <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="new_pass">
        </div>
        <div class="form-group">
            <label class="form-group-label"><i class="fa fa-lock"></i> Confirmez votre nouveau mot de passe <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="new_pass_again">
        </div>
        <br>
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">
                <i class="fa fa-check"></i> Changer votre mot de passe 
            </button>
        </div>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $c_email = $_SESSION['email_cli'];
             
            $c_old_pass = sha1($_POST['old_pass']);

            $c_new_pass = sha1($_POST['new_pass']);

            $c_new_pass_again = sha1($_POST['new_pass_again']);

            $sel_old_pass = "select * from clients where pass_cli ='$c_old_pass'";
            $run_c_old_pass = mysqli_query($db , $sel_old_pass);

            $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

            if($check_c_old_pass == 0){
                echo "<script>alert('Votre mot de passe actuel est incorrect')</script>";
                exit();
            }

            if($c_new_pass != $c_new_pass_again){
                echo "<script>alert('Oups les deux mots de passe ne correspondent pas')</script>";
                exit();
            }

            $update_c_pass = "update clients set pass_cli='$c_new_pass' where email_cli='$c_email'";
            $run_c_pass = mysqli_query($db , $update_c_pass);

            if($run_c_pass){
                echo "<script>alert('Votre mot de passe a bien été mis à jour')</script>";
                echo "<script>window.open('my_account.php?my_orders' , '_self')</script>";
            }
        }

    ?>
</div>