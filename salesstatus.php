<?php
	include 'includes/session.php';

	if(isset($_POST['activate'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE sales SET pay=:pay WHERE id=:id");
			$stmt->execute(['pay'=>1, 'id'=>$id]);
			$_SESSION['success'] = 'Status changed successfully!';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Select a row to change';
	}

	header('location: orderkitchen.php');
?>