<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Tableau de bord / Voir Clients
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-users"></i> Clients
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="text-align:center;">
                                    <th> ID Client </th>
                                    <th> Nom Client </th>
                                    <th> Photo </th>
                                    <th> Email </th>
                                    <th> Pays </th>
                                    <th> Ville </th>
                                    <th> Contact </th>
                                    <th> Adresse </th>
                                    <th> Supprimer Client</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i = 0;
                                    $get_customers = "select * from clients";
                                    $run_customers = mysqli_query($db , $get_customers);
                                    

                                    while($row_customers = mysqli_fetch_array($run_customers)){
                                        $customer_id = $row_customers['id_cli'];
                                        $customer_name = $row_customers['nom_cli'];
                                        $customer_email = $row_customers['email_cli'];
                                        $customer_country = $row_customers['pays_cli'];
                                        $customer_city = $row_customers['ville_cli'];
                                        $customer_image = $row_customers['image_client'];
                                        $customer_contact = $row_customers['contact_cli'];
                                        $customer_address = $row_customers['adr_cli'];

                                        $i ++ ;
                                        
                                ?>

                                <tr>
                                    <td class="text-center text-primary"> <?php echo $i; ?> </td>
                                    <td class="text-center" style="font-weight:bold;"> <?php echo $customer_name; ?> </td>
                                    <td> <img src="../customer/customer_images/<?php echo $customer_image; ?>" style="height:60px;width:60px;border-radius:60px;margin-left:20px;" alt="<?php echo $customer_image; ?>"></td>
                                    <td class="text-center" style="font-weight:bold;"> <?php echo $customer_email; ?> </td>
                                    <td class="text-center"> 
                                        <?php echo $customer_country; ?> 
                                    </td>
                                    <td class="text-center"> <?php echo $customer_city; ?> </td>
                                    <td class="text-center"> <?php echo $customer_contact; ?> </td>
                                    <td class="text-center">
                                        <?php echo $customer_address; ?>
                                    </td>
                                    <td>
                                        <a href="index.php?delete_customer=<?php echo $customer_id; ?>" class="btn btn-danger">
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