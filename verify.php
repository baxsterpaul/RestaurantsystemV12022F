<?php
	include 'includes/session.php';
	$conn = $pdo->open();
	$email = $_POST['email'];
		$password = $_POST['password'];
		

	
		
	

		try{
			

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();

			
			if($row['numrows'] > 0){
				if($row['status']){
					if(password_verify($password, $row['password'])){
						if($row['type'] === '1'){
							$_SESSION['admin'] = $row['id'];
						}
						else{
							$token = random_int(100000, 999999);
							$_SESSION['user'] = $row['id'];
							$_SESSION['type'] = $row['type'];
							$_SESSION['tokengg'] = $token;
							$_SESSION['ordertype'] = "";
							$stmt = $conn->prepare("UPDATE users SET token=:token WHERE id=:id");
				        	$stmt->execute(['token'=>$token, 'id'=>$row['id']]);
						
						
							
							
						}
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
				}
				else{
					$_SESSION['error'] = 'Account not activated.';
				}
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	


	$pdo->close();
		if($_SESSION['type'] === '3'){
			header('location: orderkitchen.php');
		}
		else{
			header('location: login.php');
		}
	

?>