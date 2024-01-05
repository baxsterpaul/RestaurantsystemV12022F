<?php
	include 'includes/session.php';

	$output = '';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, products.id AS prodid, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		if($row['isActive'] == 0){
		$output .= "
			<option value='1' class='append_items'>Active</option>
			
		";
	}
	else{
		$output .= "
		
			<option value='0' class='append_items'>InActive</option>
			
		";
	}
		$pdo->close();
		

		echo json_encode($output);
	}


		
	



?>