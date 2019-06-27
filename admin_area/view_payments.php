<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Tableau de bord / Voir Paiements
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money"></i> Paiements
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="text-align:center;">
                                    <th> N° </th>
                                    <th> Photo Client </th>
                                    <th> Nom Client</th>
                                    <th> N°Facture </th>
                                    <th> Numéro Référence</th>
                                    <th> Code Paiement</th>
                                    <th> Mode de Paiement</th>
                                    <th> Montant Payé</th>
                                    <th> Date Paiement</th>
                                    <th> Supprimer Paiement</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i = 0;

                                    $get_payments = "select * from paiements";
                                    $run_payments = mysqli_query($db , $get_payments);

                                    $get_orders = "select * from cde_attente , paiements where cde_attente.no_facture = paiements.no_facture";
                                    $run_orders = mysqli_query($db , $get_orders);
                                    

                                    while($row_payments = mysqli_fetch_array($run_payments)){    
                                        $payment_id = $row_payments['id_paiement'];
                                        $invoice_no = $row_payments['no_facture'];
                                        $amount_send = $row_payments['montant'];
                                        $payment_mode = $row_payments['mode_paiement'];
                                        $ref_no = $row_payments['ref_no'];
                                        $code_payment = $row_payments['code'];
                                        $payment_date = $row_payments['date_paiement'];
                                                                                                                                                     
                                        $row_orders = mysqli_fetch_array($run_orders);
                                        $c_id = $row_orders['id_cli'];
                                        $invoice_no = $row_orders['no_facture'];
                                        $pro_id = $row_orders['id_produit'];
                                        $qty = $row_orders['qte'];
                                        $size = $row_orders['taille'];
                                        $order_status = $row_orders['etat_cde'];
                                                                        
                                        $get_customers = "select * from clients where id_cli='$c_id'";
                                        $run_customers = mysqli_query($db , $get_customers);
                                        $row_customers = mysqli_fetch_array($run_customers);
                                        $c_name = $row_customers['nom_cli'];
                                        $c_image = $row_customers['image_client'];
 
                                        $get_product = "select * from produits where id_produit ='$pro_id'";
                                        $run_product = mysqli_query($db , $get_product);
                                        $row_product = mysqli_fetch_array($run_product);
                                        $pro_title = $row_product['titre_produit'];
                                        $pro_image = $row_product['img1_produit']; 

                                        
                                        $i ++ ;
                                        
                                ?>
                                
                                <tr>
                                    <td class="text-center text-primary"> <?php echo $i; ?> </td>
                                    <td> 
                                        <img src="../customer/customer_images/<?php echo $c_image; ?>" alt="<?php echo $c_name; ?>" style="height:60px;width:60px;border-radius:60px;margin-left:6px;" class="img-responsive">
                                    </td>
                                    <td class="text-center" style="font-weight:bold;"> <?php echo $c_name; ?> </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>> <?php echo $invoice_no; ?> </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>> 
                                        <?php echo $ref_no; ?> 
                                    </td>
                                    
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>> <?php echo $code_payment; ?> </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>> <?php echo $payment_mode; ?> </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>>
                                        <?php echo $amount_send; ?> XOF
                                    </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>>
                                        <?php echo $payment_date; ?> 
                                    </td>
                                    <td>
                                        <a href="index.php?delete_payment=<?php echo $payment_id; ?>" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i> Supprimer
                                        </a>
                                    </td>
                                    
                                </tr>

                                <?php } ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>







<?php } ?>