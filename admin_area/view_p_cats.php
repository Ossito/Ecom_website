<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> Tableau de bord / Catégories Produits
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-tags"></i> Catégories Produits 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> ID Catgéorie Produit </th>
                                        <th> Titre Catégorie Produit </th>
                                        <th> Description Catégorie Produit </th>
                                        <th> Editer Catégorie Produit </th>
                                        <th> Supprimer Catégorie Produit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 0;
                                        $get_p_cats = "select * from categories_produits";
                                        $run_p_cats = mysqli_query($db , $get_p_cats);

                                        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                                            $p_cat_id = $row_p_cats['id_cat_p'];
                                            $p_cat_title = $row_p_cats['titre_cat_p'];
                                            $p_cat_desc = $row_p_cats['desc_cat_p'];
                                            $i ++;
                                    ?>
                                        <tr>
                                            <td class="text-center text-primary"> <?php echo $i; ?> </td>
                                            <td class="text-center" style="font-weight:bold;"> <?php echo $p_cat_title; ?></td>
                                            <td width="300"> <?php echo $p_cat_desc; ?> </td>
                                            <td> 
                                                <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>" class="btn btn-warning" style="margin-left:35px;">
                                                    <i class="fa fa-edit"></i> Modifier
                                                </a>
                                            </td>
                                            <td> 
                                                <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>" class="btn btn-danger" style="margin-left:35px;">
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