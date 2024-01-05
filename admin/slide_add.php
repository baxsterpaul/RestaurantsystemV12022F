
<?php
include 'includes/session.php';
include 'includes/slugify.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$no = $_POST['no'];
	$filename = $_FILES['photo']['name'];
	$conn = $pdo->open();
	$cat_slug = slugify($name);
	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM slide WHERE name=:name");
	$stmt->execute(['name' => $name]);
	$row = $stmt->fetch();




	$stmt3 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM slide WHERE no=:no");
		$stmt3->execute(['no' =>$no]);
		$row3 = $stmt3->fetch();
	//image style



	if ($row['numrows'] > 0) {
		$_SESSION['error'] = 'Slide already exist, please insert different name';
		header('location: slide.php');
	}
   else if($no == $row3['no']){
		$_SESSION['error'] = 'Slide Sequence already exist, please insert different sequence no.';
		header('location: slide.php');
	} 
	else if($row['numrows'] < 1 && $no != $row3['no']){

		if (!empty($filename)) {
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $name . '_' . time() . '.' . $ext;
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
		} else {
			$new_filename = '';
		}
		try {
			$stmt = $conn->prepare("INSERT INTO slide (name, photoslide, slide_slug, no) VALUES (:name ,:photoslide, :slide_slug, :no)");
			$stmt->execute(['name' => $name, 'photoslide' => $new_filename, 'slide_slug' => $cat_slug,'no' => $no]);
			$_SESSION['success'] = 'Slide added successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Fill up slide form first';
}

header('location: slide.php');

?>