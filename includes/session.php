<?php
	include 'includes/conn.php';
	session_start();


	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}

	if(isset($_SESSION['user'], $_SESSION['tokengg'])){
		$conn = $pdo->open();
		try{
			$ids = $_SESSION['user'];
			
			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE id = :id");
			$stmt->execute(['id'=>$ids]);
			$row = $stmt->fetch();

			if($row['numrows'] > 0){

				if($row['token'] == $_SESSION['tokengg'])

				{
		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();

		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
			
		}
	}

	else {

		header('location: logout.php');
	}
			}


		}

		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}




		$pdo->close();
	}
?>
