<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; 

$pageno = 0;



?>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
 
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">
		<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column2 {
  float: left;
  width: 50%;
  padding: 0px;
 
}

/* Clear floats after the columns */
.row2:after {
  content: "";
  display: table;
  clear: both;
  width: 100%;
 
}

.top-left {
  position: absolute;
  top: 8%;
  left: 16px;
}

.container2 {
  position: relative;
  text-align: center;
  color: white;
}


.row3:after {
  content: "";
  display: table;
  clear: both;


}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  margin-bottom:5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.img2 {
  border-radius: 10%;
}


/* Create two equal columns that floats next to each other */
.column3 {
  float: left;
  width: 25%;
  padding: 0px;
  height: 120px; /* Should be removed. Only for demonstration */
}

@media only screen and (min-width: 600px) {
  .img3 {
    width:50%;
  }
}
</style>
<link rel="stylesheet" href="./src/confirmo.css" />
<script src="./src/confirmo.js"></script>
	      <!-- Main content -->
		  <br><br > 
		  
		  <div class="row">
		  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: 10px;">
		  <ol class="carousel-indicators">
						<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
								$stmt = $conn->prepare("SELECT * FROM slide");
						    $stmt->execute();
							$stmt2 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM slide ");
							$stmt2->execute([]);
							$row2 = $stmt2->fetch();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photoslide'])) ? 'images/'.$row['photoslide'] : 'images/noimage.jpg';
								$count = $row['no'] - 1;
								$count2= "$count";
							
								if ($row2['numrows'] == 1) {

									echo '
									
									<li data-target="#carousel-example-generic"  data-slide-to="0" class="active"></li>
									
									';

								}
								else {
						

								if($count == 0){
								echo '
								
								<li data-target="#carousel-example-generic"  data-slide-to=0 class="active"></li>
								
							
								';
								}
								if($count > 0){
									
									echo '
									<li data-target="#carousel-example-generic"  data-slide-to='.$count.' class=""></li>
									
									';
								}

						
							}
							
						 }
					
					 }
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
					   </ol>
		                  <!-- <li data-target="#carousel-example-generic"  data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li> -->
		              
		                <div class="carousel-inner" >
		                  <!-- <div class="item active" >
		                    <img src="images/teh-ais_1650157054.jpg"  width='100%'  alt="First slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/nasi-kukus_1650157036.jpg" width='100%'  alt="Second slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/nasi-ayam-test-longggg-gggggg-ggggggggggg-ggg_1650157029.jpg" width='100%' alt="Third slide">
		                  </div>
		                </div> -->
						<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
								$stmt = $conn->prepare("SELECT * FROM slide");
							
						    $stmt->execute();
							$stmt2 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM slide ");
							$stmt2->execute([]);
							$row2 = $stmt2->fetch();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photoslide'])) ? 'images/'.$row['photoslide'] : 'images/noimage.jpg';
								$count = $row['no'] ;

								
								if ($row2['numrows'] == 1) {

									echo '
									<div class="item active" >
								<img src="'.$image.'"  width="100%"  alt="First slide">
							  </div>
							 
									';

								}
								else {
								if($count == 1){
								echo '
								<div class="item active" >
		                    <img src="'.$image.'"  width="100%"  alt="First slide">
		                  </div>
		                 
								';
								}
								if($count > 1){
									
									echo '
									<div class="item " >
		                    <img src="'.$image.'"  width="100%"  alt="Second slide">
		                  </div>
							 
									';
								}
							
							
						 }
						}
					
					 }
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$stmt2 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM slide ");
						$stmt2->execute([]);
						$row2 = $stmt2->fetch();
						if ($row2['numrows'] > 1) {

		       		?> 
					 </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
						<?php
						}
					
						$pdo->close();
						
						?>
		            </div>
			<div class="row2">

		
  <div class="column2" style="background-color:white;">
 <a <?php 

 
 if(isset($_SESSION['ordertype']) ){
	

 if($_SESSION['ordertype'] == 'takeaway')
 {
	echo 'class="first" href="#"';
	
 }
 else {
	echo 'href="indexcategory.php?mode=dinein"';
 }
}
 else {
	echo 'href="indexcategory.php?mode=dinein"';
 }
 ?>> 
	<img src="images/index/dinein.jpg" width='100%' alt="First slide">

</a>
  </div>

  <div class="column2" style="background-color:white;">
  <a 
  <?php 
 
 
 if(isset($_SESSION['ordertype']) ){
	

 if($_SESSION['ordertype'] == 'dinein')
 {
	echo 'class="second" href="#"';
	
 }
 else {
	echo 'href="indexcategory.php?mode=dinein"';
 }
}
 else {
	echo ' href="indexcategory.php?mode=takeaway"';
 }
 ?> 
 > 
    <img src="images/index/takeaway.jpg"  width='100%' alt="First slide">
	</a>
  </div>

</div>

	      <section class="content">


	        	<div class="">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
					
					
	        
					
					<div class="">
						

		            <h2 style="text-align: center;">
					
					Monthly Top Selling Menu
				 </h2>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
								if($inc == 1) echo "<div class='row'>";
								echo "
								
									<div >
								  ";
								  
								  echo'
									<a href="product.php?product='.$row['slug'].'"   >';
								 
								   

									echo"
										<div class='card' style='height:120px; width:100%; color: #000;
										text-decoration:none; background-color:white ; border-radius: 25px;'>
											<div class=''  >
											<div class='row3' >
<div class='column3' style='margin-right: 25px; width:45%;  ' >
<img class='img3 img2' src='".$image."' width='100%' height='100%' class='thumbnail'>
</div>
<div class='column3' style=' width:40%; overflow:auto; '>
<h5><b>".$row['name']."</b></h5>
<span>Rm ".number_format($row['price'], 2)."</span>
</div>
<div class='column3' style=' width:5%; overflow:visible; '>

<span class='glyphicon glyphicon-chevron-right' style='padding-top:50px; text-align:right'></span> 
</div>
</div>
												
										
											</div>
										
										</div>
										</a>
										
									</div>
								";
								if($inc == 3) echo "</div>";
						 }
						 if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
						 if($inc == 2) echo "<div class='col-sm-4'></div></div>";
					 }
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
				
	        	</div>
	        
			
					<br><br>
	        		
	        	
	        	
	        </div>
	      </section>
	     
	    </div>
	  </div>
						<br><br><br>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
<script type="text/javascript">
$(document).on('click', '.first', function (e) {
    e.preventDefault();

	Swal.fire({
  title: 'Do you want to change mode to dine in?',
  reverseButtons: true,
  showCancelButton: true,
  confirmButtonText: 'Yes',
  denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    
  }
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "indexcategory.php?mode=dinein";
  } else if (result.isDenied) {
   
  }
})
})


$(document).on('click', '.second', function (e) {
    e.preventDefault();

	Swal.fire({
  title: 'Do you want to change mode to take away?',
  reverseButtons: true,
  showCancelButton: true,
  confirmButtonText: 'Yes',
  denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    
  }
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "indexcategory.php?mode=takeaway";
  } else if (result.isDenied) {
   
  }
})
})
</script>