<div class="box">

    <?php
        $session_email = $_SESSION['email_cli'];
        $select_customer = "select * from clients where email_cli='$session_email'";
        $run_customer = mysqli_query($db , $select_customer);
        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['id_cli'];

    ?>
    <h4 class="text-center">Faites le choix de l'option de payement qui vous est favorable </h4>
    <br>
    <br>
    <p class="lead text-center">
        <a href="order.php?c_id=<?php echo $customer_id ?>"><i class="fa fa-hand-o-right"></i> Paiement hors ligne</a>
    </p>
    <center>
        <p class="lead">
            <a href="#"><i class="fa fa-hand-o-right"></i> Paiment par PayPal</a>
            <img src="images/paypal-logo.png" alt="" class="img-responsive">
        </p>
    </center>
</div>