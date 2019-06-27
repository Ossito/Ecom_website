
<?php
    $active = 'Accueil';
    include 'includes/header.php';
?>


<div class="carousel slide" id="slider" data-ride="carousel">
    <ol class="carousel-indicators">
        <li class="active" data-slide-to="0" data-target="#slider"></li>
        <li data-slide-to="1"></li>
        <li data-slide-to="2"></li>
        <li data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <?php
            $get_slides = "select * from slider LIMIT 0,1";
            $run_slider = mysqli_query($db,$get_slides);
            
            while($row_slides = mysqli_fetch_array($run_slider)){
            $nom_slide = $row_slides['nom_slide'];
            $image_slide = $row_slides['image_slide'];
            echo " 
            <div class='item active'>
                    <img src='admin_area/slides_images/$image_slide' alt='Slider 1' class='img-responsive'>
                    <div class='carousel-caption'>
                        <h3>ELEGANCE HOMME</h3>
                        <p>La qualité fait la différence</p>
                    </div>
                </div>";
            }

            $get_slides = "select * from slider LIMIT 1,3";
            $run_slides = mysqli_query($db,$get_slides);
            
            while($row_slides = mysqli_fetch_array($run_slides)){
            $nom_slide = $row_slides['nom_slide'];
            $image_slide = $row_slides['image_slide'];

            echo " 
            <div class='item'>
                    <img src='admin_area/slides_images/$image_slide' alt='Slider 2' class='img-responsive'>
                    <div class='carousel-caption'>
                        <h3>ELEGANCE HOMME</h3>
                        <p>La qualité fait la différence</p>
                    </div>
                </div>";
            }
        ?>
    </div>
    <a class="left carousel-control gauche" href="#slider" data-slide="prev" role="button">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control droite" href="#slider" data-slide="next" role="button">
        <span class="icon-next"></span>
    </a>
</div>
<br>
<br>


<div id="advantages">
    <div class="container-fluid">
        <div class="same-height-row">
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">Meilleures Offres</a></h3>
                    <p>Nous savons offrir le meilleur service possible afin de mieux vous satisfaire</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-tag"></i>
                    </div>
                    <h3><a href="#">Meilleurs Prix</a></h3>
                    <p>Nous pouvez nous comparez avec un autre magasin en ligne</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    <h3><a href="#">100% Produits Originaux</a></h3>
                    <p>Nous vous offrons les meilleurs produits et les plus originaux</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div id="hot">
    <div class="box">
        <div class="container-fluid">
            <div class="col-md-12">
                <h2>Nos derniers articles</h2>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div id="content" class="container-fluid">
    <div class="row">
        <?php
            getPro();
        ?>
    </div>
</div>
<br>
<br>

    <?php include 'includes/footer.php'; ?>


    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        $(window).scroll(function(){
            if($(this).scrollTop() > 50){
            $('#topBtn').fadeIn();
            }else{
            $('#topBtn').fadeOut();
            }
        });

        $("#topBtn").click(function(){
            $('html , body').animate({scrollTop : 0} , 600);
        });
        });
  </script>
</body>
</html>