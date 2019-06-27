<?php

    if(!isset($_SESSION['email_admin'])){
        echo "<script>window.open('login.php' , '_self')</script>";
    }else{

    ?>


        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle Navigation</span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php?dashboard" class="navbar-brand" style="font-weight:bold;">
                    <i class="fa fa-user fa-fw"></i> Espace Admin
                </a>
            </div>

            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-weight:bold;">
                        <i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                                <i class="fa fa-fw fa-user"></i> Profil
                            </a>
                        </li>
                        <li>
                            <a href="index.php?view_products">
                                <i class="fa fa-fw fa-envelope"></i> Produits
                                <span class="badge"><?php echo $count_products; ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?view_customers">
                                <i class="fa fa-fw fa-user"></i> Clients
                                <span class="badge"><?php echo $count_customers; ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?view_p_cats">
                                <i class="fa fa-fw fa-gear"></i> Catégories Produits
                                <span class="badge"><?php echo $count_p_categories; ?></span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php">
                                <i class="fa fa-fw fa-sign-out"></i> Se Déconnecter
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php?dashboard">
                            <i class="fa fa-fw fa-dashboard"></i> Tableau de bord
                        </a>
                    </li>


                    <li>
                        <a href="#" data-toggle="collapse" data-target="#products">
                            <i class="fa fa-fw fa-cart-arrow-down"></i> Produits
                            <i class="fa fa-fw fa-caret-down"></i> 
                        </a>

                        <ul id="products" class="collapse">
                            <li>
                                <a href="index.php?insert_product"> Insérer Produits </a>
                            </li>
                            <li>
                                <a href="index.php?view_products"> Voir Consulter Produits </a>
                            </li>
                            
                        </ul>
                    </li>


                    <li>
                        <a href="#" data-toggle="collapse" data-target="#p_cat">
                            <i class="fa fa-fw fa-edit"></i> Catégories Produits
                            <i class="fa fa-fw fa-caret-down"></i> 
                        </a>

                        <ul id="p_cat" class="collapse">
                            <li>
                                <a href="index.php?insert_p_cat"> Insérer Catégories Produits </a>
                            </li>
                            <li>
                                <a href="index.php?view_p_cats"> Consulter Catégories Produits </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" data-toggle="collapse" data-target="#cat">
                            <i class="fa fa-fw fa-book"></i> Catégories
                            <i class="fa fa-fw fa-caret-down"></i> 
                        </a>

                        <ul id="cat" class="collapse">
                            <li>
                                <a href="index.php?insert_cat"> Insérer Catégories </a>
                            </li>
                            <li>
                                <a href="index.php?view_cats"> Voir Catégories </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" data-toggle="collapse" data-target="#slides">
                            <i class="fa fa-fw fa-gear"></i> Slides
                            <i class="fa fa-fw fa-caret-down"></i> 
                        </a>

                        <ul id="slides" class="collapse">
                            <li>
                                <a href="index.php?insert_slide"> Insérer Slides </a>
                            </li>
                            <li>
                                <a href="index.php?view_slides"> Voir Slides </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="index.php?view_customers">
                            <i class="fa fa-fw fa-users"></i> Consulter Clients
                        </a>
                    </li>

                    <li>
                        <a href="index.php?view_orders">
                            <i class="fa fa-fw fa-briefcase"></i> Consulter Commandes
                        </a>
                    </li>

                    <li>
                        <a href="index.php?view_payments">
                            <i class="fa fa-fw fa-money"></i> Consulter Paiements
                        </a>
                    </li>

                    <li>
                        <a href="#" data-toggle="collapse" data-target="#users">
                            <i class="fa fa-fw fa-user"></i> Administrateurs
                            <i class="fa fa-fw fa-caret-down"></i> 
                        </a>

                        <ul id="users" class="collapse">
                            <li>
                                <a href="index.php?insert_user"> Insérer Administrateur </a>
                            </li>
                            <li>
                                <a href="index.php?view_users"> Voir Administrateurs </a>
                            </li>
                            <li>
                                <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Editer profil Administrateur </a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="logout.php">
                            <i class="fa fa-fw fa-sign-out"></i> Se Déconnecter
                        </a>
                    </li>
                </ul>
            </div>


        </nav>
    <?php }?>