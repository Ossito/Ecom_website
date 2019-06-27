<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Tableau de bord / Voir Commandes
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-shopping-cart"></i> Commandes
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="text-align:center;">
                                    <th> ID Cde </th>
                                    <th> Nom Client</th>
                                    <th> Email Client </th>
                                    <th> N°Facture </th>
                                    <th> Nom Produit</th>
                                    <th> Image Produit</th>
                                    <th> Qte Produit</th>
                                    <th> Taille</th>
                                    <th> Date Commande </th>
                                    <th> Montant total</th>
                                    <th> Etat Commandes</th>
                                    <th> Supprimer Commandes</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i = 0;
                                    $get_orders = "select * from cde_attente";
                                    $run_orders = mysqli_query($db , $get_orders);
                                    

                                    while($row_orders = mysqli_fetch_array($run_orders)){
                                        $order_id = $row_orders['id_cde'];
                                        $c_id = $row_orders['id_cli'];
                                        $invoice_no = $row_orders['no_facture'];
                                        $pro_id = $row_orders['id_produit'];
                                        $qty = $row_orders['qte'];
                                        $size = $row_orders['taille'];
                                        $order_status = $row_orders['etat_cde'];

                                        $get_products = "select * from produits where id_produit='$pro_id'";
                                        $run_products = mysqli_query($db , $get_products);
                                        $row_products = mysqli_fetch_array($run_products);
                                        $product_title = $row_products['titre_produit'];
                                        $product_image = $row_products['img1_produit'];

                                        $get_customers = "select * from clients where id_cli='$c_id'";
                                        $run_customers = mysqli_query($db , $get_customers);
                                        $row_customers = mysqli_fetch_array($run_customers);
                                        $c_email = $row_customers['email_cli'];
                                        $c_name = $row_customers['nom_cli'];
                                        $c_image = $row_customers['image_client'];

                                        $get_customer_orders = "select * from commandes_clients where id_cde='$order_id'";
                                        $run_customer_orders = mysqli_query($db , $get_customer_orders);
                                        $row_customer_orders = mysqli_fetch_array($run_customer_orders);
                                        $order_date = $row_customer_orders['date_cde'];
                                        $order_amount = $row_customer_orders['somme_payable'];
                                        
                                        
                                        $i ++ ;
                                        
                                ?>

                                <tr>
                                    <td class="text-center text-primary"> <?php echo $i; ?> </td>
                                    <td class="text-center" style="font-weight:bold;"> <?php echo $c_name; ?> </td>
                                    <td class="text-center" style="font-weight:bold;"> <?php echo $c_email; ?> </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>> <?php echo $invoice_no; ?> </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>> 
                                        <?php echo $product_title; ?> 
                                    </td>
                                    <td> 
                                        <img src="product_images/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" height="50" class="img-responsive">
                                    </td>
                                    <td class="text-center"<?php if($order_status == 'En attente'){echo "style='color:orange;'";}else{ echo "style='color:green;'";}  ?>> <?php echo $qty; ?> </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='color:orange;'";}else{ echo "style='color:green;'";}  ?>> <?php echo $size; ?> </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='color:orange;'";}else{ echo "style='color:green;'";}  ?>>
                                        <?php echo $order_date; ?>
                                    </td>
                                    <td <?php if($order_status == 'En attente'){echo "style='color:orange;'";}else{ echo "style='color:green;'";}  ?>>
                                        <?php echo $order_amount; ?> XOF
                                    </td>
                                    <td class="text-center" <?php if($order_status == 'En attente'){echo "style='font-weight:bold;color:orange;'";}else{ echo "style='font-weight:bold;color:green;'";}  ?>>
                                        <?php 
                                            if($order_status == 'En attente'){
                                                echo $order_status = 'En attente';
                                            }else{
                                                echo $order_status = 'Complète';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="index.php?delete_order=<?php echo $order_id; ?>" class="btn btn-danger">
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