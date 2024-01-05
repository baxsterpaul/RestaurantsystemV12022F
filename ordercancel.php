<?php
	
	 include 'includes/session.php';

	if(isset($_GET['cancel'])){
		$id = $_GET['cancel'];

		
		try{
			$stmt = $conn->prepare("UPDATE sales SET pay=:name  WHERE id=:id");
			$stmt->execute(['name'=>4, 'id'=>$id,]);
			$_SESSION['success'] = 'Cancel transaction successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
	}
	

		
		$pdo->close();
	
	
	header('location: order.php');

?>