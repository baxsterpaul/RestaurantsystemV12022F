<!DOCTYPE html>
<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php 

	$db = mysqli_connect('localhost', 'root', '', 'ecomm');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$total = $_GET['table'];
		$tableno = $_GET['tableno'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM sales WHERE id=$id");

	if ($record != null ) {
			
			$n = mysqli_fetch_array($record);
			$name = $n['nomeja'];
				$name1 = $n['user_id'];
					$name2 = $n['pay_id'];
						$name3 = date('M d, Y', strtotime($n['sales_date']));
						$name4 = $n['amount'];
						$name5 = $n['pay'];
						$paymentype = $n['paymentype'];
					
		}
	}
	
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$total = $_POST['total'];
	$paymentype = $_POST['paymentype'];
	$tableno = $_POST['tableno'];
				$name1 = $_POST['user_id'];
					$name2 = $_POST['pay_id'];
						$name3 = $_POST['sales_date'];
						$name4 = $_POST['amount'];
						$name5 = $_POST['pay'];
	
	$nomeja = $_POST['nomeja'];

if( $name4 < $total)
{

	$_SESSION['message2'] = "Cash is not enough!"; 
header('location: edittable.php?edit='.$id.'&table='.number_format($total, 2).'&tableno='.$tableno.'');

	exit();
}

else
{




	mysqli_query($db, "UPDATE sales SET  nomeja='$nomeja' , user_id='$name1' , pay_id='$name2' , amount='$name4', pay='$name5', paymentype='$paymentype' WHERE id=$id");
	$_SESSION['message1'] = "Order updated!"; 
	header('location: edittable.php?edit='.$id.'&table='.number_format($total, 2).'&tableno='.$tableno.'');
	exit();
}
}
?>
					<style>.msg2 {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #CC0D0D; 
    background: #FF6F6F; 
    border: 1px solid #8E0C0C;
    width: 50%;
    text-align: center;
}
</style>
<style>.msg1 {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
					</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">

    <h1>Payment Info </h1>    
	
	 
  </div>
  
  <style>
table, th, td {
  border:1px solid black;
}
</style>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form method="post" action="edittable.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control" />
		<input type="hidden" name="user_id" value="<?php echo $name1; ?>" class="form-control" />
		<input type="hidden" name="pay" value="2" class="form-control" />
		<input type="hidden" name="pay_id" value="<?php echo $name2; ?>" class="form-control" />
		<table style="width:100%">
  <tr>
    <th>Total</th>
    <th>Table No.</th>
   
  </tr>
  <tr>
    <td>Rm <?php echo $total; ?></td>
    <td><?php echo $tableno; ?></td>
  </tr>
 
</table>
	 <br/>
		<input type="hidden" name="total" value="<?php echo $total; ?>" class="form-control" />
		<input type="hidden" name="tableno" value="<?php echo $tableno; ?>" class="form-control" />
        <div class="form-group" hidden>
          Table No : <input type="text" name="nomeja" value="<?php echo $tableno; ?>" class="form-control" />
        </div>
		<?php 
		if($name5 == 2)
{
	echo '<div class="msg1"> Transaction is completed </div>';
}
		else{

		echo'
		<div class="form-group">
        <label for="sel1">Select Payment Type :</label>
  <select class="form-control"  name="paymentype" required>
    <option value="1">Cash</option>
    <option value="2">Debit/Credit Card</option>
    <option value="3">TNG E-wallet</option>
    <option value="4">Transfer</option>
  </select> 
  <label for="sel1">Amount : </label> 
  <input type="text" name="amount" value="'.$name4.'" class="form-control" required/><br>
  ';
}
  
  ?>
		 <?php if (isset($_SESSION['message2'])): ?>
	<div class="msg2">
		<?php 
			echo $_SESSION['message2']; 
			unset($_SESSION['message2']);
		?>
	</div>
<?php endif ?>
<?php if (isset($_SESSION['message1'])): ?>
	<div class="msg1">
		<?php 
			echo $_SESSION['message1']; 
			unset($_SESSION['message1']);
		?>
	</div>
<?php endif ?>
        </div>
          </div>
        </div>
		
        <div class="form-group">
          <div class="container">
            <div class="row">
         
			   <div class="col"><a href="order.php" class="col-6 btn btn-secondary btn-sm float-center">back</a></div>
              <div class="col"><button name="update" class="col-6 btn btn-primary btn-sm float-right">Update</button></div>
			  <?php if( $name4 >= $total){ ?>
			  <div class="col">	  <a href="payprocess.php?edit=<?php echo $id; ?>" class='btn btn-primary col-6 btn btn-success btn-sm float-right' >Invoice</a>
		
			  <?php }?>
            </div>
          </div>
        </div>
		<?php include 'includes/scripts.php'; ?>
      </form>
    </div>
  </div>
</div>