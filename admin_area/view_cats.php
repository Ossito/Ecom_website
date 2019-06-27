<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> Tableau de bord / Catégories 
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-tags"></i> Catégories 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> ID Catgéorie </th>
                                        <th> Titre Catégorie </th>
                                        <th> Description Catégorie </th>
                                        <th> Editer Catégorie </th>
                                        <th> Supprimer Catégorie </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 0;
                                        $get_cats = "select * from categories";
                                        $run_cats = mysqli_query($db , $get_cats);

                                        while($row_cats = mysqli_fetch_array($run_cats)){
                                            $cat_id = $row_cats['id_cat'];
                                            $cat_title = $row_cats['titre_cat'];
                                            $cat_desc = $row_cats['desc_cat'];
                                            $i ++;
                                    ?>
                                        <tr>
                                            <td class="text-center text-primary"> <?php echo $i; ?> </td>
                                            <td class="text-center" style="font-weight:bold"> <?php echo $cat_title; ?></td>
                                            <td width="300"> <?php echo $cat_desc; ?> </td>
                                            <td> 
                                                <a href="index.php?edit_cat=<?php echo $cat_id; ?>" class="btn btn-warning">
                                                    <i class="fa fa-edit"></i> Modifier
                                                </a>
                                            </td>
                                            <td> 
                                                <a href="index.php?delete_cat=<?php echo $cat_id; ?>" class="btn btn-danger">
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