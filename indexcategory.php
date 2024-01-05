<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; 
$pageno = 0;

if (isset($_GET['mode'])) {
	$_SESSION['ordertype'] = $_GET['mode'];
  }

  else{
	header('location: index.php');
	  
  }
?>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbarcategory.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">
		<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column2 a{
  float: left;
  width: 50%;
  padding: 0px;
  border: 1px solid;
  border-color: #FFF3F3;
  height:180px;
  background-color: #FFFFFF;
 
}
.text{
        
        color: black;
    }
img {
	
	padding:20px;
	margin-bottom:-25px;
}

.column2 a:hover{
  background-color: #FF6767 ;
}

/* Clear floats after the columns */
.row2:after {
  content: "";
  display: table;
  clear: both;
  width: 100%;
  
 
}

@media only screen and (min-width: 600px) {
  .img3 {
    width:50%;
  }

  .center {
								margin: auto;
								width: 60%;
								
								padding: 10px;
								text-align: center;

							}
  
}

</style>
	      <!-- Main content -->
		  <br><br > 
		  
		  <div class="row" style="padding-top: 2%;">
		
		

	      


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
						
						
		            <!-- <h2 style="text-align: center;">Select a category <?php echo $_SESSION['ordertype']; ?></h2> -->
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();
						
		       			try{
		       			 	$inc = 3;	
								$stmt = $conn->prepare("SELECT * FROM category");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photocat'])) ? 'images/'.$row['photocat'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
							echo "	<div class='row2'>";
								echo "
								
									<div >
								  ";
								  
								
								 
								   

									echo'
								
									<div class="column2 " >
									<a href="category.php?category='.$row['cat_slug'].'"  >
								  
								  
								   
									 <div class="center"> <img class="img3" src="'.$image.'" width="100%"  max-width: "200px"  height="150px" alt="First slide"></div>
								  		<h4 class="text" style="text-align:center; font-weight: 900; ">'.$row['name'].'</h4>

										  </a>
								  
									</div>
									
								  </div>
								';
							
						 }
					
					 }
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
				
	        	</div>
	        
			
					<br><br>
	        		
	        	
	        	
	        </div>
	   
	     
	    </div>
	  </div>
						<br><br><br>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>