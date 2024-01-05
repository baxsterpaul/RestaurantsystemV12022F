<?php
include 'includes/session.php';




if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$idres = 4;
}
$db = mysqli_connect('localhost', 'root', '', 'ecomm');
$results2 = mysqli_query($db, "SELECT * FROM sales WHERE id=$id");
$results5 = mysqli_query($db, "SELECT * FROM sales WHERE id=$id");
$results1 = mysqli_query($db, "SELECT * FROM sales WHERE id=$id");
$results = mysqli_query($db, "SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=$id");
$datetime = mysqli_query($db, "SELECT * FROM sales WHERE id=$id");
$Logo = mysqli_query($db, "SELECT * FROM users WHERE type = $idres");


$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
$stmt->execute(['id' => $id]);

$total = 0;



?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-red layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
					<br>
					<br>
					<div class="row">

						<?php
						if (isset($_SESSION['error'])) {
							echo "
	        					<div class='callout callout-danger'>
	        						" . $_SESSION['error'] . "
	        					</div>
	        				";
							unset($_SESSION['error']);
						}

						if (isset($_SESSION['success'])) {
							echo "
	        					<div class='callout callout-success'>
	        						" . $_SESSION['success'] . "
	        					</div>
	        				";
							unset($_SESSION['success']);
						}
						?>




						</head>
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
						<style>
							.msg {
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

							.split-para {
								display: block;
								margin: 10px;
							}

							.split-para span {
								display: block;
								float: right;
								width: 50%;
								margin-left: 10px;
							}

							.name {
								max-width: 30px;
								min-width: 30px;
							}
						</style>
						</head>

						<body>
							<?php if (isset($_SESSION['message63'])) : ?>
								<div class="msg">
									<?php
									echo $_SESSION['message63'];
									unset($_SESSION['message63']);
									?>
								</div>
							<?php endif ?>
							<div>


								<div class="invoice-box">
									<div class="row2" >
										<div class="column2" style="  width:35%; ">
											<span style="float: left">
												<?php

												$conn = $pdo->open();
												$type = 4;
												try {
													$stmt = $conn->prepare("SELECT * FROM users WHERE type =:type");
													$stmt->execute(['type' => $type]);
													foreach ($stmt as $row) {
														$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : '../images/profile.jpg';
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
											<span style="float: left"> #INV<?php echo $id; ?></span>

											<br>



											<span style="float: left">
												<?php

												$conn = $pdo->open();
												try {
													$stmt = $conn->prepare("SELECT * FROM sales WHERE id=$id");
													$stmt->execute(['id' => $id]);
													foreach ($stmt as $row) {



														echo '
		<span style="float: left">' . date('d-m-Y', strtotime($row['sales_date'])) . '</span>
									
		   <span style="float: left">' . date('h:i a', strtotime($row['sales_date'])) . '</span>
		<br
		';
													}
												} catch (PDOException $e) {
													echo $e->getMessage();
												}

												$pdo->close();
												?>

										</div></div>

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
														$stmt->execute(['type' => $type]);
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
				<br><br>
									<h4><b>INVOICE</b></h4>
									Order Mode :
									<b>
										<?php

										while ($row = mysqli_fetch_array($results2)) {

											$mode = "";
											if ($row['ordertype'] == "dinein") {
												$mode =  'Dine In';
											} else {

												$mode =  'Take Away';
											}
											echo $mode;
										} ?>
									</b>
									<br><br>

										
									<tr class="heading">

										<td>Item</td>
										<td>Quantity</td>
										<td>Price</td>


									</tr>
									<?php

									while ($row = mysqli_fetch_array($results)) {
										$id = $row['id'];
										$date = date('M d, Y', strtotime($row['sales_date']));
										$subtotal = $row['price'] * $row['quantity'];
										$total += $subtotal;
										$name =	$row['name'];
										$price =		number_format($row['price'], 2);
										$quantity =		$row['quantity'];
										$subtotal2 =	number_format($subtotal, 2);
										$amount = $row['amount'];
										$balance = $amount - $total;
										$unpaid = "";
										if ($row['pay'] == 0) {
											$unpaid = "<img src='unpaid.png' alt='unpaid logo' style='width: 50%; max-width: 150px' /> ";
										}

										echo "	<tr class='item' >
					<td style=' width:10%; '>$name</td>
					<td style=' width:45%; '>$quantity</td>
					<td style=' width:45%; '>Rm $price</td>
				
				</tr>
";
									}
									?>
									<tr class="heading">
										<td colspan="2">Payment Method</td>

										<td style="text-align: left;">Amount</td>
									</tr>

									<tr class="details">
										<td colspan="2">		
										<?php

while ($row = mysqli_fetch_array($results5)) {
											$mode = "";
											if ($row['paymentype'] == 1) {
												$mode =  'Cash';
											} 
											else if($row['paymentype'] == 2){

												$mode =  'Debit/Credit Card';
											}
											else if($row['paymentype'] == 3){

												$mode =  'TNG E-wallet';
											}
											else if($row['paymentype'] == 4){

												$mode =  'Transfer';
											}
											echo $mode;
										}
										?>
									</td>

										<td style="text-align: left;">Rm <?php echo $amount = number_format((float)$amount, 2, '.', '');	?></td>
									</tr>
									<tr>

										<td></td>
										<td style="text-align: right;"><b>Total :</b></td>
										<td style="text-align: left;"> Rm <?php echo $total = number_format((float)$total, 2, '.', '');	?></td>
									</tr>
									<tr>
										<td></td>
										<td style="text-align: right;"><b>Balance :</b></td>
										<td style="text-align: left;"> <?php if ($balance >= 0) {
																			echo  "Rm " . number_format((float)$balance, 2, '.', '');
																		} else {
																			echo  "<b style='color:red;'>Rm " . number_format((float)$balance, 2, '.', '') . "<b>";
																		} ?> <?php echo $unpaid; ?></td>

									</tr>
								</table>
							</div>
							<?php

							?>
					</div>










					<br><br><br><br>



					<h3 hidden class="box-title"><b><button id="btn" onClick="window.print()">Print</button></b></h3>

			</div>
			</section>

		</div>
	</div>




	</div>

	<?php include 'includes/scripts.php'; ?>


</body>

<script>
	setTimeout(function() {
		document.getElementById('btn').click();
	}, 1000);


	var myApp = new function() {
		this.printTable = function() {
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
			win.document.write(style); //  add the style.
			win.document.write(tab.outerHTML);
			win.document.close();
			setTimeout(function() {
				window.print();
			}, 1000);
		}
	}
</script>