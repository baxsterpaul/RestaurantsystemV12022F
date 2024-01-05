<?php
	include 'includes/session.php';
	include 'includes/slugify.php';
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$no = $_POST['no'];
		$cat_slug = slugify($name);

		$stmt2 = $conn->prepare("SELECT name, COUNT(*) AS numrows FROM slide WHERE name=:name");
		$stmt2->execute(['name' => $name]);
		$row2 = $stmt2->fetch();

		$stmt3 = $conn->prepare("SELECT no, COUNT(*) AS numrows FROM slide WHERE no=:no");
		$stmt3->execute(['no' =>$no]);
		$row3 = $stmt3->fetch();
		//image style
	
	
	
		if ($row2['numrows'] > 0) {
			$_SESSION['error'] = 'Slide already exist, please insert different name';
			header('location: slide.php');
		}
	   else if($no == $row3['no']){
			$_SESSION['error'] = 'Slide Sequence already exist, please insert different sequence no.';
			header('location: slide.php');
		} 
		else if($row['numrows'] < 1 && $no != $row3['no']){
		
		try{
			$stmt = $conn->prepare("UPDATE slide SET name=:name , slide_slug=:cat_slug ,no=:no WHERE id=:id");
			$stmt->execute(['name'=>$name, 'id'=>$id,'cat_slug'=>$cat_slug,'no' => $no]);
			$_SESSION['success'] = 'Slide updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
	}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit slide form first';
	}

	header('location: slide.php');

?>