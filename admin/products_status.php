<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$isActive = $_POST['isActive'];
		
	
			$conn = $pdo->open();
	
			$stmt = $conn->prepare("SELECT * FROM products WHERE products.id=:id");
			$stmt->execute(['id'=>$id]);
			$row = $stmt->fetch();
			
	

		$name = $row['name'];
		$slug = $row['slug'];
		$category = $row['category_id'];
		$price = $row['price'];
		$description = $row['description'];
		$date_view = $row['date_view'];
		$counter = $row['counter'];


		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE products SET isActive=:isActive, name=:name, slug=:slug, category_id=:category, price=:price, description=:description, date_view=:date_view, counter=:counter WHERE id=:id");
			$stmt->execute(['isActive'=>$isActive, 'name'=>$name, 'slug'=>$slug, 'category'=>$category, 'price'=>$price, 'description'=>$description,'date_view'=>$date_view,'counter'=>$counter, 'id'=>$id]);
			$_SESSION['success'] = 'Product updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: productsetting.php');

?>