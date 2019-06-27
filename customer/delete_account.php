<div class="border-box">
	<h3 class="text-center"><i class="fa fa-trash-o"></i> Suppression de compte</h3>
	<p class="text-muted text-center">
		<i class="fa fa-warning"></i> <i class="fa fa-warning"></i> <i class="fa fa-warning"></i> Attention  voulez-vous vraiment supprimer votre compte ? Cette action est irréversible
	</p>
	<br>
	<form action="" method="POST">
		<input type="submit" name="Yes" value="Oui, je veux bel et bien supprimer mon compte" class="btn btn-danger" style="margin-left:30px;">
		<input type="submit" name="No" value="Non, je ne souhaite pas supprimer mon compte pour le moment" class="btn btn-success">
	</form>
</div>


<?php
	$c_email = $_SESSION['email_cli'];
	$sel_customer_delete = "select id_cli from clients where email_cli = '$c_email'";
	$run_customer_delete = mysqli_query($db , $sel_customer_delete);
	$row_customer_delete = mysqli_fetch_array($run_customer_delete);

	$c_id = $row_customer_delete['id_cli'];

	if(isset($_POST['Yes'])){
		$delete_customer = "delete from clients where email_cli = '$c_email'";
		$delete_orders = "delete from commandes_clients where id_cli = '$c_id'";
		$delete_order_pending = "delete from cde_attente where id_cli = '$c_id'";
		
		$run_delete_customer = mysqli_query($db , $delete_customer);

		if($run_delete_customer){
			$run_orders = mysqli_query($db , $delete_orders);
			$run_order_pending = mysqli_query($db , $delete_order_pending);
			
			session_destroy();
			echo "<script>alert('Votre compte a bel et bien été supprimé')</script>";
			echo "<script>window.open('../index.php' , '_self')</script>";
		}
	}

	if(isset($_POST['No'])){
		echo "<script>alert('Continuez ainsi vos achats en toute liberté')</script>";
		echo "<script>window.open('my_account.php?my_orders' , '_self')</script>";
	}

?>