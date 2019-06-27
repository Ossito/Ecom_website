
<?php
    session_start();
    include 'includes/db.php';
    include 'functions/functions.php'; 
?>

<?php
    if(isset($_GET['c_id'])){
        $customer_id = $_GET['c_id'];
    }

    $ip_add = getRealIpUser();
    $status = "En attente";
    $invoice_no = mt_rand();

    $select_cart = "select * from panier where ip_add = '$ip_add'";
    $run_cart = mysqli_query($db , $select_cart);

    while($row_cart = mysqli_fetch_array($run_cart)){
        $pro_id = $row_cart['id_p'];

        $pro_qty = $row_cart['qte'];

        $pro_size = $row_cart['taille'];

        $get_products = "select * from produits where id_produit ='$pro_id'";
        $run_products = mysqli_query($db , $get_products);

        while($row_products = mysqli_fetch_array($run_products)){
            $sub_total = $row_products['prix_produit'] * $pro_qty;

            $insert_customer_order = "insert into commandes_clients (id_cli , somme_payable , no_facture , qte , taille , date_cde , etat_cde) 
            values ('$customer_id' , '$sub_total' , '$invoice_no' , '$pro_qty' , '$pro_size' , NOW() ,  '$status')";

            $run_customer_order = mysqli_query($db , $insert_customer_order);

            $insert_pending_orders = "insert into cde_attente (id_cli , no_facture , id_produit , qte , taille , etat_cde) 
            values ('$customer_id' , '$invoice_no' , '$pro_id' , '$pro_qty' , '$pro_size' , '$status')";

            $run_pending_orders = mysqli_query($db , $insert_pending_orders);

            $delete_cart = "delete from panier where ip_add ='$ip_add'";
            $run_delete_cart = mysqli_query($db , $delete_cart);

            echo "<script>alert('Vos commandes ont bien été soumis. Nous vous remercions pour la confiance !!!')</script>";
            echo "<script>window.open('customer/my_account.php?my_orders' , '_self')</script>";
        }
    }

?>