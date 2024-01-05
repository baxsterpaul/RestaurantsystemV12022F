<?php
	include 'includes/session.php';
	$salesidpayment = '';
	if(isset($_GET['pay'])){
		$payid = $_GET['pay'];
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date = date('Y-m-d H:i:s'); //Returns IST
		$mode = $_SESSION['ordertype'];
		$conn = $pdo->open();

		try{
			
			$stmt = $conn->prepare("INSERT INTO sales (user_id, pay_id, sales_date, ordertype) VALUES (:user_id, :pay_id, :sales_date, :ordertype)");
			$stmt->execute(['user_id'=>$user['id'], 'pay_id'=>$payid, 'sales_date'=>$date, 'ordertype'=>$mode]);
			$salesid = $conn->lastInsertId();
			
			try{
				$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);
				
				

				foreach($stmt as $row){
					$stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
					$stmt->execute(['sales_id'=>$salesid, 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);
					$salesidpayment = $salesid;
				}

				$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				$_SESSION['success'] = 'Order successful, We are making your order Thank you!';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	
	header('location: paymentcustomer.php?CustomerOrderinvoice='.$salesidpayment);
	
?>