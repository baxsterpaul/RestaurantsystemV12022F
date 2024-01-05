<?php
	
	include 'includes/session.php';
 

 



	$db = mysqli_connect('localhost', 'root', '', 'ecomm');
	$results = mysqli_query($db, "SELECT * FROM user WHERE type='4'");

	
	
	
	

?>

<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
			
				background-color: white;
				margin: 0;
				padding: 10px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
				table-layout: fixed;
				
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: center;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
				
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
				width: 100%;
			}

			@media only screen and (max-width: 200px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
			td {
  word-break: break-word;
}

		</style>
							<style>.msg {
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

<div class ="center">


			  
	        <div class="row">
	        	
	        		
	        		


       

	<body >

	<div >
	<style>
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #ffffff;
  padding: 10px;
  text-align: center;

}
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

.split-para      { display:block;margin:10px;}
.split-para span { display:block;float:right;width:50%;margin-left:10px;}

.name {
  max-width: 30px;
  min-width: 30px;
}



</style>

													<br>
													<div class="invoice-box">

<div class="row2">
	<div class="column2" style="  width:35%; ">
		<span style="float: left">
			<?php

			$conn = $pdo->open();
			$type = 4;
			try {
				$stmt = $conn->prepare("SELECT * FROM users WHERE type =:type");
				$stmt->execute(['type' => 4]);
				foreach ($stmt as $row) {
					$image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
					echo '<img src="' . $image . '" alt="Company logo" style="width: 30%; max-width: 200px; padding-top:15px;" />';
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			$pdo->close();
			?>
		</span>
	</div>

	<div style=" float:right; ">

		<div class="column2" style="  width:100px;  ">

			<span style="float: left">Invoice ID</span> <br>
			<span style="float: left">Date</span> <br>
			<span style="float: left">Time</span> <br>

		</div>

		<div class="column2" style="  width:15px; ">

			<span style="float: left">:</span>
			<br>

			<span style="float: left">:</span>

			<br>

			<span style="float: left">:</span>

		</div>
		<div class="column2" style="  width:100px; ">
			<span style="float: left"> #INV123</span>

			<br>



			<span style="float: left">
				<?php

			



						echo '
<span style="float: left">' . date('d-m-Y', strtotime('2000-01-01')) . '</span>

<span style="float: left">05:00 pm</span>
<br
';
				
				?>

		</div>
	</div>

</div>

</div>





<table id="tab">
<tr class="">
	<td colspan="3">
		<div class="row2">
			<div class="column2" style="  width:70px; ">




			<span style="float: left">Company</span>
							<br>

							<span style="float: left">Contact</span>
							<br>
							<span style="float: left">Address</span>




						</div>
						<div class="column2" style="  width:15px; ">

						<span style="float: left">:</span>
							<br>
							<span style="float: left">:</span>
							<br>

							<span style="float: left">:</span>

						</div>
						<div class="column2" style="background-color:white; text-align: left;   ">



							<?php

							$conn = $pdo->open();
							$type = 4;
							try {
								$stmt = $conn->prepare("SELECT * FROM users WHERE type =:type");
								$stmt->execute(['type' => 4]);
								foreach ($stmt as $row) {



									echo '
									<span style="float: left">' . $row['firstname'] .' '. $row['lastname'] .'</span><br>
										<span style="float: left">' . $row['contact_info'] . '</span><br>
																	
										   <span style="float: left">' . $row['address'] . '</span>
										
										';
					}
				} catch (PDOException $e) {
					echo $e->getMessage();
				}

				$pdo->close();
				?>


				<br>











			</div>
		</div>

		<br>
	</td>
</tr>

<!-- <tr class="information">
<td colspan="3">
<table>
	<tr>
	
		<td>
			
			<br />
			<br />
		</td>
	
<td class="title">

		</td> 
	
	</tr>
</table>
</td>
</tr> -->

<h4><b>INVOICE</b></h4>
Order Mode : example
									<b>

							</b>
			

				<tr class="heading" >
		
					<td>Item</td>
					<td>Quantity</td>
					<td>Price</td>

				
				</tr>
				<?php 
    



			echo "	<tr class='item' >
					<td style=' width:10%; '>example</td>
					<td style=' width:45%; '>1</td>
					<td style=' width:45%; '>Rm 5.00</td>
				
				</tr>
";

		?>
		<!-- <tr class="heading">
					<td>Payment Method</td>
					<td></td>
					<td>Amount</td>
				</tr>

				<tr class="details">
					<td>Cash</td>
					<td></td>
					<td>Rm <?php echo number_format((float)5.00, 2, '.', '');	?></td>
				</tr> -->
				<tr>
							<td></td>
							<td><b>Total :</b> </td>
							<td><b>Rm <?php echo $total = number_format((float)5.00, 2, '.', '');	?></b></td>
						</tr>
						<!-- <tr >
					<td></td>
					<td></td>
					<td><b>Balance : </b>
												echo  "Rm " . number_format((float)5.00, 2, '.', '');
										
				</tr> -->
			</table>
		</div>
		<?php 
							
									?>
 </div>



 

		
	


           
            
             
	        	</div>
	        	<div class="col-sm-3">
	     	<h3  class="box-title"><b><button onClick="window.print()">Print</button></b></h3>
	        	</div>
	        </div>


</div>





 <script>




        

 
       var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('tab');

            var style = "<style>";
                style = style + "body {font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;text-align: center; color: #777;}";
                style = style + "body h1 {font-weight: 300;			margin-bottom: 0px;		padding-bottom: 0px;				color: #000;			}";
                style = style + "	body h3 {		font-weight: 300;		margin-top: 10px;		margin-bottom: 20px;		font-style: italic;		color: #555;		}";
				style = style + "	body a {			color: #06f;		}";
				style = style + "	.invoice-box {			max-width: 800px;				background-color: white;				margin: auto;				padding: 30px;				border: 1px solid #eee;				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);				font-size: 16px;				line-height: 24px;				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;				color: #555;		}";
				style = style + "			.invoice-box table {				width: 100%;				line-height: inherit;				text-align: left;				border-collapse: collapse;			}";
				style = style + "	.invoice-box table td {				padding: 5px;				vertical-align: top;			}";
				style = style + "	.invoice-box table tr td:nth-child(2) {				text-align: center;			}";
				style = style + "	.invoice-box table tr.top table td {				padding-bottom: 20px;			}";
				style = style + "	.invoice-box table tr.top table td.title {				font-size: 45px;				line-height: 45px;				color: #333;			}";			
				style = style + "	.invoice-box table tr.information table td {			padding-bottom: 40px;			}";
				style = style + "	.invoice-box table tr.heading td {			background: #eee;			border-bottom: 1px solid #ddd;			font-weight: bold;		}";
			style = style + "	.invoice-box table tr.details td {			padding-bottom: 20px;		}";
				style = style + "	.invoice-box table tr.item td {			border-bottom: 1px solid #eee;		}";
				style = style + "	.invoice-box table tr.item.last td {		border-bottom: none;	}";
				style = style + ".invoice-box table tr.total td:nth-child(2) {		border-top: 2px solid #eee;				font-weight: bold;		}";
				style = style + "	@media only screen and (max-width: 600px) {				.invoice-box table tr.top table td {				width: 100%;				display: block;				text-align: center;			}			.invoice-box table tr.information table td {	width: 100%;					display: block;				text-align: center;				}			}";
	
                style = style + "</style>";

            var win = window.open('', '', 'height=700,width=700');
            win.document.write(style);          //  add the style.
            win.document.write(tab.outerHTML);
            win.document.close();
			
	} }
	</script>
 

   


