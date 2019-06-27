<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Tableau de bord / Voir Produits
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-tags"></i>  Produits
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="text-align:center;">
                                    <th> ID Produit </th>
                                    <th> Titre Produit </th>
                                    <th> Image Produit </th>
                                    <th> Prix Produit </th>
                                    <th> Produit Vendu (Nbre) </th>
                                    <th> Mots-clés Produit </th>
                                    <th> Date du Produit </th>
                                    <th> Modifier Produit </th>
                                    <th> Supprimer Produit</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i = 0;
                                    $get_pro = "select * from produits";
                                    $run_pro = mysqli_query($db , $get_pro);
                                    

                                    while($row_pro = mysqli_fetch_array($run_pro)){
                                        $pro_id = $row_pro['id_produit'];

                                        $pro_title = $row_pro['titre_produit'];

                                        $pro_price = $row_pro['prix_produit'];

                                        $pro_img1 = $row_pro['img1_produit'];

                                        $pro_keywords = $row_pro['product_keywords'];

                                        $pro_date = $row_pro['date'];

                                        $i ++ ;
                                        
                                ?>

                                <tr>
                                    <td class="text-center text-primary"> <?php echo $i; ?> </td>
                                    <td class="text-center" style="font-weight:bold;font-size:14px;"> <?php echo $pro_title; ?> </td>
                                    <td> <img src="product_images/<?php echo $pro_img1; ?>" height="110" width="100" alt="Produits"></td>
                                    <td width="90" style="font-weight:bold;"> <?php echo $pro_price. ' XOF'; ?> </td>
                                    <td class="text-center"> 
                                        <?php 
                                            $get_sold = "select * from cde_attente where id_produit ='$pro_id'";
                                            $run_sold = mysqli_query($db , $get_sold);

                                            $count = mysqli_num_rows($run_sold);

                                            echo $count;
                                        ?> 
                                    </td>
                                    <td class="text-center"> <?php echo $pro_keywords; ?> </td>
                                    <td class="text-center"> <?php echo $pro_date; ?> </td>
                                    <td>
                                        <a href="index.php?edit_product=<?php echo $pro_id; ?>" class="btn btn-warning">
                                            <i class="fa fa-edit"></i> Modifier
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?delete_product=<?php echo $pro_id; ?>" class="btn btn-danger">
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