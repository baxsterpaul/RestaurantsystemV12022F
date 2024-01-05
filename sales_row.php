<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM details 
		LEFT JOIN products 
		ON products.id=details.product_id 
		LEFT JOIN sales 
		ON sales.id=details.sales_id 
		
		LEFT JOIN users 
		ON users.id=sales.user_id 
		WHERE sales_id=:id
	
		"
		 );
		 $stmt->execute(['id'=>$id ]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>