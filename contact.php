

<?php
    $active = 'Contactez-Nous';
    include 'includes/header.php';
?>
    
<div id="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                </li>
                <li>
                    <i class="fa fa-envelope"></i> Contactez-Nous
                </li>
            </ul>
        </div>
        <div class="col-md-3" style="margin-left:-95px;">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h3>N'hésitez pas à nous contacter</h3>
                        <p class="text-muted text-center">
                            Si vous avez des questions n'hésitez pas en remplissant ce formulaire à nous contacter notre service vous répondra très rapidement. <br> <i class="fa fa-arrow-down fa-4x"></i>
                        </p>
                    </center>
                </div>
            <form action="contact.php" method="POST">
                <div class="form-group">
                    <label><i class="fa fa-user-o"></i> Nom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label><i class="fa fa-envelope-open"></i> Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label><i class=""></i> Sujet <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="subject">
                </div>

                <div class="form-group">
                    <label><i class="fa fa-pencil"></i> Votre message</label>
                    <textarea name="message" id="message" rows="10" class="form-control form-group-textarea"></textarea>
                </div>

                <br>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fa fa-send fa-fw"></i> Envoyer 
                    </button>
                </div>
            </form>

            <?php 
                if(isset($_POST['submit'])){
                    //L'admnistrateur va recevoir les informations ci-dessous
                    $sender_name = $_POST['name'];
                    $sender_email = $_POST['email'];
                    $sender_subject = $_POST['subject'];
                    $sender_message = $_POST['message'];
                    
                    $receiver_email = "elegancehomme@gmail.com";
                    mail($receiver_email , $sender_name , $sender_subject , $sender_message ,$sender_email);

                    //Réponse automatique à l'envoyeur
                    $email = $_POST['email'];
                    $subject = "Bienvenue sur notre plateforme web";
                    $msg = "Nous vous remercions pour l'envoi de ce mail. Nous vous répondrons très rapidement";
                    $from = "elegancehomme@gmail.com";
                    mail($email , $subject ,$msg , $from);

                    echo "<h3 align='center'>Votre message à bien été envoyé</h3>";
                }
            ?>
            </div>      
        </div>
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