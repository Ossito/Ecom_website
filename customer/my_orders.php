<div class="border-box">
    <h3 class="text-center"><i class="fa fa-shopping-cart"></i> Mes Commandes</h3>
    <p class="text-muted text-center">
        Vos commandes sont listés ici ...   
    </p>
</div>
<br>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Somme à payer</th>
                <th scope="col">N° Facture</th>
                <th scope="col">Quantité</th>
                <th scope="col">Taille</th>
                <th scope="col">Date Commande</th>
                <th scope="col">Payé / Impayé</th>
                <th scope="col">Etat</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $customer_session = $_SESSION['email_cli'];
                $get_customer = "select * from clients where email_cli = '$customer_session'";
                $run_customer = mysqli_query($db , $get_customer);  
                $row_customer = mysqli_fetch_array($run_customer);

                $customer_id = $row_customer['id_cli'];

                $get_orders = "select * from commandes_clients where id_cli='$customer_id'";
                $run_orders = mysqli_query($db , $get_orders);

                $i = 0;

                while($row_orders = mysqli_fetch_array($run_orders)){
                    $order_id = $row_orders['id_cde'];
                    $due_amount = $row_orders['somme_payable'];
                    $invoice_no = $row_orders['no_facture'];
                    $qty = $row_orders['qte'];
                    $size = $row_orders['taille'];
                    $order_date = substr($row_orders['date_cde'] , 0 , 11);
                    $order_status = $row_orders['etat_cde'];

                    $i ++ ; 

                    if($order_status == 'En attente'){
                        $order_status = 'Impayé';
                    }else{
                        $order_status = 'Payé';
                    }

            ?>

                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td>
                        <?php 
                            if($order_status == 'Payé'){
                                echo "<p style='color:green;text-decoration:line-through;'> $due_amount XOF </p>";
                            }else{
                                echo "<p style='color:red;font-weight:bold'> $due_amount XOF </p>";
                            }
                        ?>
                    </td>
                    <td><?php echo $invoice_no; ?></td>
                    <td><?php echo $qty; ?></td>
                    <td><?php echo $size; ?></td>
                    <td><?php echo $order_date; ?></td>
                    <td><?php echo $order_status; ?></td>
                    <td>
                        <?php 
                            if($order_status == 'Payé'){
                                echo "<a class='btn btn-success' style='color:#fff;'><i class='fa fa-check'></i> Validé</a>";
                            }else{
                                echo "<a href='confirm.php?order_id=$order_id' class='btn btn-primary' style='color:#fff;'><i class='fa fa-money'></i> Confirmez Paiement</a>";
                            }
                        ?>
                    </td>
                </tr>
                
            <?php }?>
        </tbody>
    </table>
</div>