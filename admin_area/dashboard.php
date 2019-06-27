<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-dashboard"></i> Tableau de bord</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Tableau de bord
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">


            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" style="font-weight:bold;"> <?php echo $count_products; ?> </div>
                                <div>Produits</div>
                            </div>
                        </div>
                    </div>

                    <a href="index.php?view_products">
                        <div class="panel-footer">
                            <span class="pull-left" style="font-weight:bold;" >Voir Détails</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" style="font-weight:bold;"> <?php echo $count_customers; ?> </div>
                                <div> Clients </div>
                            </div>
                        </div>
                    </div>

                    <a href="index.php?view_customers">
                        <div class="panel-footer">
                            <span class="pull-left" style="font-weight:bold;">Voir Détails</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="panel panel-orange">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tags fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" style="font-weight:bold;"> <?php echo $count_p_categories; ?> </div>
                                <div>Catégories Produits</div>
                            </div>
                        </div>
                    </div>

                    <a href="index.php?view_p_cats">
                        <div class="panel-footer">
                            <span class="pull-left" style="font-weight:bold;" >Voir Détails</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>

                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" style="font-weight:bold;"> <?php echo $count_pending_orders; ?> </div>
                                <div>Commandes Clients</div>
                            </div>
                        </div>
                    </div>

                    <a href="index.php?view_orders">
                        <div class="panel-footer">
                            <span class="pull-left" style="font-weight:bold;" >Voir Détails</span>
                            <span class="pull-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>

                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-weight:bold;">
                            <i class="fa fa-money fa-fw"></i> Nouvelles Commandes
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                
                                <thead>
                                    <tr>
                                        <th>N°Cde</th>
                                        <th>Email Client</th>
                                        <th>Facture N°</th>
                                        <th>ID Produit</th>
                                        <th>Qte Produit</th>
                                        <th>Taille</th>
                                        <th>Etat Cde</th>
                                    </t>
                                </thead>

                                <tbody>
                                    <?php
                                        $i = 0;
                                        $get_order = "select * from cde_attente order by 1 ASC LIMIT 0,5";
                                        $run_order = mysqli_query($db , $get_order);
                                        
                                        while($row_order = mysqli_fetch_array($run_order)){
                                        $order_id = $row_order['id_cde'];

                                        $c_id = $row_order['id_cli'];

                                        $invoice_no = $row_order['no_facture'];

                                        $product_id = $row_order['id_produit'];

                                        $qty = $row_order['qte'];

                                        $size = $row_order['taille'];

                                        $order_status = $row_order['etat_cde'];
                                        
                                        $i ++;                                       
                                    ?>

                                        <tr>
                                            <td> <?php echo $order_id; ?> </td>
                                            <td> 
                                                <?php
                                                    $get_customers = "select * from clients where id_cli ='$c_id'";
                                                    $run_customers = mysqli_query($db , $get_customers);
                                                    $row_customers = mysqli_fetch_array($run_customers);
                                                    $customer_email = $row_customers['email_cli'];

                                                    echo $customer_email;
                                                ?>
                                            </td>
                                            <td> <?php echo $invoice_no; ?> </td>
                                            <td> <?php echo $product_id; ?> </td>
                                            <td> <?php echo $qty; ?> </td>
                                            <td> <?php echo $size; ?> </td>
                                            <td> 
                                                <?php
                                                    if($order_status == 'En attente'){
                                                        echo $order_status = 'En attente';
                                                    }else{
                                                        echo $order_status = 'Complète';
                                                    }
                                                ?>
                                            </td>
                                        </tr>

                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="index.php?view_orders" style="font-weight:bold;">
                                Voir toutes les commandes <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-body">
                        <div class="mb-md thumb-info">
                            <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded img-responsive" style="height:265px;">
                            <div class="thumb-info-title">
                                <span class="thumb-info-inner"> Mr <?php echo $admin_name; ?> </span>
                                <span class="thumb-info-type"> <?php echo $admin_job; ?> </span>
                            </div>
                        </div>
                        <br>
                        <div class="mb-md">
                            <div class="widget-content-expanded">
                                <i class="fa fa-envelope"></i> <span> Email : </span> <?php echo $admin_email; ?> <br>
                                <i class="fa fa-flag"></i> <span> Pays : </span> <?php echo $admin_country; ?> <br>
                                <i class="fa fa-phone"></i> <span> Contact : </span> <?php echo $admin_contact; ?> <br>
                            </div>
                            <hr class="dotted short">
                            <h5 class="text-muted"> A propos de moi </h5>
                            <p>
                                <?php echo $admin_about; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>