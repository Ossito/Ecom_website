<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Tableau de bord / Voir Administrateurs
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-users"></i> Administrateurs
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="text-align:center;">
                                    <th> ID </th>
                                    <th> Nom </th>
                                    <th> Photo </th>
                                    <th> Email </th>
                                    <th> Pays </th>
                                    <th> Job </th>
                                    <th> A Propos </th>
                                    <th> Contact </th>
                                    <th> Editer </th>
                                    <th> Supprimer </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i = 0;
                                    $get_Users = "select * from admin";
                                    $run_Users = mysqli_query($db , $get_Users);
                                    

                                    while($row_Users = mysqli_fetch_array($run_Users)){
                                        $admin_id = $row_Users['id_admin'];
                                        $admin_name = $row_Users['nom_admin'];
                                        $admin_email = $row_Users['email_admin'];
                                        $admin_image = $row_Users['image_admin'];
                                        $admin_country = $row_Users['pays_admin'];
                                        $admin_about = $row_Users['about_admin'];
                                        $admin_contact = $row_Users['contact_admin'];
                                        $admin_job = $row_Users['job_admin'];

                                        $i ++ ;
                                        
                                ?>

                                <tr>
                                    <td class="text-center text-primary"> <?php echo $i; ?> </td>
                                    <td class="text-center" style="font-weight:bold;"> <?php echo $admin_name; ?> </td>
                                    <td> <img src="admin_images/<?php echo $admin_image; ?>" style="height:60px;width:60px;border-radius:60px;" alt="<?php echo $admin_image; ?>"></td>
                                    <td class="text-center"style="font-weight:bold;"> <?php echo $admin_email; ?> </td>
                                    <td class="text-center"> 
                                        <?php echo $admin_country; ?> 
                                    </td>
                                    <td class="text-center"> <?php echo $admin_job; ?> </td>
                                    <td class="text-center">
                                        <?php echo $admin_about; ?>
                                    </td>
                                    <td class="text-center" width="140"> <?php echo $admin_contact; ?> </td>
                                    <td>
                                        <a href="index.php?user_profile=<?php echo $admin_id; ?>" class="btn btn-warning">
                                            <i class="fa fa-edit"></i> Editer
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?delete_user=<?php echo $admin_id; ?>" class="btn btn-danger">
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