<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['category'];
	$prod = '';
	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>

<?php include 'includes/header.php'; ?>
<link href="/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbarcategorydetail.php'; ?>
	 
	  <div class="content-wrapper">
	  <br>
	    <div class="container">
		<style>
* {
  box-sizing: border-box;
}

@media only screen and (min-width: 600px) {
  .img2 {
    width:50%;
  }
}
/* Create two equal columns that floats next to each other */
.column2 {
  float: left;
  width: 25%;
  padding: 0px;
  height: 120px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row2:after {
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
img {
  border-radius: 10%;
}
* {
  box-sizing: border-box;
}

#title {text-align: center; color: #7c795d; font-family: 'Trocchi', serif; font-size: 45px; font-weight: normal; line-height: 48px; margin: 0; }
</style>
	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	
					
		            <!-- <h1  id="title"><?php echo $cat['name']; ?></h1> -->
					<br>
				
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid order by isActive desc");
						    $stmt->execute(['catid' => $catid]);
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
						
								$GGG=$row['slug'];
							
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
								   
	       							<div >
									 ";
									 if($row['isActive'] == 1){
									 echo'
									   <a href="product.php?product='.$row['slug'].'"   >';
									
									  
									 
									   echo"
	       								<div class='card' style='height:120px; width:100%; color: #000;
										   text-decoration:none; background-color:white ; border-radius: 25px;'>
		       								<div class=''  >
											   <div class='row2' >
  <div class='column2' style='margin-right: 25px; width:45%;  ' >
  <img class='img2 img3' src='".$image."' width='100%' height='100%' class='thumbnail'>
  </div>
  <div class='column2' style=' width:40%; overflow:auto; '>
  <h5><b>".$row['name']."</b></h5>
  <span>Rm ".number_format($row['price'], 2)."</span>

 
  </div>
  <div class='column2' style=' width:5%; overflow:visible; '>
 
  <span class='glyphicon glyphicon-chevron-right' style='padding-top:50px; text-align:right'></span> 
  </div>
</div>
		       									
		       							
		       								</div>
		       							
	       								</div>
										   </a>
										   
	       							</div>
	       						";
							}
							else{



								echo"
								<div class='card' style='height:120px; width:100%; color: #000;
								text-decoration:none; background-color:white ; border-radius: 25px; opacity: 0.5;'>
									<div class=''  >
									<div class='row2' >
<div class='column2' style='margin-right: 25px; width:45%;  ' >
<img class='img2 img3' src='".$image."' width='100%' height='100%' class='thumbnail'>
</div>
<div class='column2' style=' width:40%; overflow:auto; '>
<h5><b>".$row['name']."</b></h5>
<span>Rm ".number_format($row['price'], 2)."</span>
<br><br>
<span style='color:red'>Out of stock</span>
</div>
<div class='column2' style=' width:5%; overflow:visible; '>

<span class='glyphicon glyphicon-chevron-right' style='padding-top:50px; text-align:right'></span> 
</div>
</div>
										
								
									</div>
								
								</div>
								
								
							</div>
						";

							}
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
	        	
				<br><br>
	        
	        </div>
	      </section>
	     
	    </div>
	  </div>













<!-- <div class="container"> -->
  

  <!-- Modal data-toggle="modal" data-target="#exampleModal" -->
  
  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <div style="text-align:left;">
	  <span style="float: left;"><h5 class="modal-title" id="exampleModalLabel"><?php echo $phpvariable; ?></h5></span>
    <span style="float:right;">
	<button id="remove" type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
			
			<span aria-hidden="true"> Close</span>
		  </button>
    </span>
</div> -->
      
      
      <!-- </div>
      <div class="modal-body"> -->
		  <!-- start dialog-->
		


		   <!-- end dialog-->
      <!-- </div>
     
    </div>
  </div>
</div>
</div> -->
  <!-- end dialog-->
  <br><br><br>
<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>


</body>
</html>
<script></script>
<?php include 'includes/scripts.php'; ?>
<script>

</script>

