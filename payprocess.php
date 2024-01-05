<?php
	include 'includes/session.php';

 

	$db = mysqli_connect('localhost', 'root', '', 'ecomm');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM sales WHERE id=$id");

	if ($record != null ) {
			
			$n = mysqli_fetch_array($record);
			$pay = $n['pay'];
				
		
		}
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$pay = $_POST['pay'];
	


	
	
	
	
		mysqli_query($db, "UPDATE sales SET  pay='$pay'  WHERE id=$id");
		$_SESSION['message3'] = "Successfully paid!"; 
		header('location: payment.php?edit='.$id.'&table='.number_format($total, 2).'');
		exit();
	}
	

?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
    .centerDiv {
        width: 250px;
        height: 250px;
        margin: 0 auto;
    }
</style>
<br />
<br />
<br />
<br />
<br />
<div align="center" class="centerDiv">

    <i class="fa fa-circle-o-notch fa-spin" style="font-size:250px"></i>
    <h4 align="center">Please wait...</h4> <br />
   
</div>



<script>
            setTimeout(function () {
                document.getElementById('btn').click();
            }, 1000);
</script>
<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
	<form method="post" action="payprocess.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control" />
		<input type="hidden" name="pay" value="2" class="form-control" />
		<button name="update" id="btn" hidden></button>
		</form>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>


 </body>

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
            win.print();
        }
    }
    </script>


