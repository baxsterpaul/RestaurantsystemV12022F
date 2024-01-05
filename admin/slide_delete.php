<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$slideno = $_POST['no'];
		$filename = '../images/'.$_POST['delete_file'];
	
	
		$conn = $pdo->open();

		$stmt2 = $conn->prepare("SELECT *, COUNT(*) as numrows FROM slide where no!=:no");
		$stmt2->execute(['no'=>1]);
		$row2 = $stmt2->fetch();

		if($slideno == 1 && $row2['numrows'] > 0){
			
			$_SESSION['error'] = 'Please delete other slide sequence first';
			header('location: slide.php');

		}
		else {

		
		try{
			$stmt = $conn->prepare("DELETE FROM slide WHERE id=:id");
			$stmt->execute(['id'=>$id]);
			if (file_exists($filename)) {
				unlink(realpath($filename));
				$_SESSION['success'] = 'Slide deleted successfully And file '.$filename;
			}
		
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
	}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select slide to delete first';
	}

	header('location: slide.php');
	
?>