<?php
	include 'includes/session.php';
	include 'includes/slugify.php';
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$cat_slug = slugify($name);
		try{
			$stmt = $conn->prepare("UPDATE category SET name=:name , cat_slug=:cat_slug WHERE id=:id");
			$stmt->execute(['name'=>$name, 'id'=>$id,'cat_slug'=>$cat_slug]);
			$_SESSION['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit category form first';
	}

	header('location: category.php');

?>