<?php 
  include 'includes/session.php';
  include 'includes/format.php'; 
?>
<?php 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }

  $conn = $pdo->open();
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
      
        <!-- ./col -->
<?php

$year  = "";
//get date range value
if (isset($_GET['selected_year'])) {

   $year   = $_GET['year'];



}


            ?>





      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h1 >Yearly Sales Report <?php if($year == null) {echo date("Y");} else{echo $year;} ?></h1>  
              <div class="box-tools pull-right">
                <form method="get" class="form-inline" action="home1.php">
                  <div class="form-group">
                     <h2>   <label>Select Year: </label>
					 <style>
    select {
        width: 150px;
        margin: 10px;
    }
    select:focus {
        min-width: 150px;
        width: auto;
    }
</style>
					 <style>optgroup { font-size:15px; }</style>
                    <select name="year" class="form-control input-sm" >
                      <?php
                        for($i=2020; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
						    <optgroup>
                        <option value='".$i."' ".$selected.">".$i."</option> 
						  </optgroup>
                          ";
                        }
                      ?>
                    </select>
					</h2>
                  </div>
				    <button type="submit" name="go" class="btn btn-primary">Go</button>
					  <a class="btn btn-info" href="home1.php" role="button">Current year</a>
                </form>
              </div>
            </div>
            <div class="box-body">
            <table id="example1" class="table table-bordered" >
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
        
             
                  <th>Amount</th>
               
                </thead>
                <tbody>
                  <?php
				  if($year != null)
				  {
					     $conn = $pdo->open();

                    try{	$sum = 0;
                      $stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id Where  YEAR(sales_date)=  $year ORDER BY sales_date DESC");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE details.sales_id=:id");
                        $stmt->execute(['id'=>$row['salesid']]);
							$sum = $sum + $row['pay_id'];
                        $total = 0;
					
                        foreach($stmt as $details){
                          $subtotal = $details['price']*$details['quantity'];
                          $total += $subtotal;
						 
                        }
					
                        echo "
                          <tr>
                            <td class='hidden' ></td>
                            <td >".date('Y', strtotime($row['sales_date']))."</td>
                 
                            <td>Rm ".number_format($total, 2)."</td>
                         
                          </tr>
                        ";
						
								
                      }
					  
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
					  
					  
				  }
				  
			else {
                    $conn = $pdo->open();

                    try{	$sum = 0;
                      $stmt = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id Where  YEAR(sales_date)=  YEAR(CURDATE()) ORDER BY sales_date DESC");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE details.sales_id=:id");
                        $stmt->execute(['id'=>$row['salesid']]);
                        $total = 0;
					$sum = $sum + $row['pay_id'];
                        foreach($stmt as $details){
                          $subtotal = $details['price']*$details['quantity'];
                          $total += $subtotal;
						  
                        }
                          
                        echo "
                          <tr>
                            <td class='hidden'></td>
                            <td >".date('Y', strtotime($row['sales_date']))."</td>
                 
                            <td>Rm ".number_format($total, 2)."</td>
                         
                          </tr>
                        ";
					
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
					
			}
                  ?>
                </tbody>
				
	<h2>	Total:	<b>Rm <?php

		echo	number_format($sum, 2) ?>
		
		
		</b></h2>
		<br><br>
              </table>
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
</div>
<!-- ./wrapper -->

<!-- Chart Data -->

</body>
</html>
