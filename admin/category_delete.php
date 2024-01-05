<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$filename = '../images/'.$_POST['delete_file'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM category WHERE id=:id");
			$stmt->execute(['id'=>$id]);
			if (file_exists($filename)) {
				unlink(realpath($filename));
				$_SESSION['success'] = 'Category deleted successfully And file '.$filename;
			
			}
		
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select category to delete first';
	}

	header('location: category.php');
	
?>