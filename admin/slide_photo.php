<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM slide WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		$name = $row['name'];

		if(!empty($filename)){
			$filename2 = '../images/'.$_POST['delete_file'];
			if (file_exists($filename2)) {
				unlink(realpath($filename2));
				
			}
			echo $name;
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $name.'_'.time().'.'.$ext;
				//resize
				$fn = $_FILES['photo']['tmp_name'];
				$size = getimagesize($fn);
				$ratio = $size[0]/$size[1]; // width/height
				if( $ratio > 1) {
					$width = 800;
					// $height = 533/$ratio;
					$height = 533;
				}
				else {
					// $width = 800*$ratio;
					$width = 800;
					$height = 533;
				}
				$src = imagecreatefromstring(file_get_contents($fn));
				$dst = imagecreatetruecolor($width,$height);
				$test1 = imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
				imagedestroy($src);
				imagepng($dst,'../images/'.$new_filename); // adjust format as needed
				imagedestroy($dst);
	
	
				// move_uploaded_file($dst, '../images/' . $new_filename);
		}
		
		try{
			$stmt = $conn->prepare("UPDATE slide SET photoslide=:photocat WHERE id=:id");
			$stmt->execute(['photocat'=>$new_filename, 'id'=>$id]);
			$_SESSION['success'] = 'Slide photo updated successfully '.$new_filename;
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Select a slide to update photo first';
	}

	header('location: slide.php');
?>