
						<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
 
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  text-align: center;

  margin: auto;
 
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

                        <table class="table table-bordered" id="tblDataTable">
                            <thead>
                                <th class="hidden"></th>
                                
                                <th>Date</th>
                                <th>Status</th>
                                <th>Table</th>
                                <th>Order Type</th>
                                <th>Total</th>
                                <th>Full Details</th>
                                <th>Action</th>
                        
                            </thead>
                            <tbody >
                            <?php
                                $conn = $pdo->open();
                                date_default_timezone_set("Asia/Kuala_Lumpur");
                                $date1 = date('Y-m-d 00:00:00');
                                $date2 = date('Y-m-d 23:59:59');
                                try{
                                    $stmt = $conn->prepare("SELECT * FROM sales WHERE sales_date>=:today1 And sales_date<=:today2  ORDER BY id DESC");
                                    $stmt->execute(['today1'=>$date1,'today2'=>$date2]);
                                    // WHERE user_id=:user_id
                                    
                                    foreach($stmt as $row){
                                        $stmt2 = $conn->prepare("SELECT * FROM details 
                                        LEFT JOIN products 
                                        ON products.id=details.product_id 
                                        LEFT JOIN sales 
                                        ON sales.id=details.sales_id 
                                        
                                        LEFT JOIN users 
                                        ON users.id=sales.user_id 
                                        WHERE sales_id=:id
                                        
                                    
                                        "
                                        
                                    );
                                        $stmt2->execute(['id'=>$row['id']]);
                                        $checkpay = $row['pay'];
                                        $total = 0;
                                        foreach($stmt2 as $row2){
                                            $subtotal = $row2['price']*$row2['quantity'];
                                            $total += $subtotal;

                                            $ordertype = $row2['ordertype'] == 'dinein' ? 'Dine In' : 'Take Away';
                                            $test;
                                            if($checkpay == 1){
        
                                                $test = "<span class='label label-success label-as-badge'>Complete</span>
                                               ";
                                            }
                                            else if($checkpay == 0){
                                                $test = "<span class='label label-warning label-as-badge'>Pending</span>
                                                ";
                                            }
                                            else if($checkpay == 2){
                                                $test = "<span class='label label-info label-as-badge'>Paid</span>
                                               ";
                                            }
                                            else {
                                                $test = "<span class='label label-danger label-as-badge'>Cancelled</span>
                                                ";
                                            }
                                        }
?>
                                        <tr>
                                    <?php	echo "
                                        
                                                <td class='hidden'></td>
                                                
                                                <td>".date('d-m-Y h:i a', strtotime($row['sales_date']))."</td>
                                                <td>".$test."</td>
                                                <td>".$row2['lastname']."</td>
                                                <td>".$ordertype."</td>
                                                <td>Rm ".number_format((float)$total,2,'.','')."</td>
                                                <td><a href='payment.php?edit=".$row['id']."' class='btn btn-primary' >Invoice</a></td>
                                               "; if($checkpay == 1 ||  $checkpay == 0) 
                                               { echo "<td><a href='edittable.php?edit=".$row['id']."&table=".number_format((float)$total,2,'.','')."&tableno=".$row2['lastname']."' class='btn btn-warning' >Payment</a>
                                                <a  class='btn btn-danger first edit'  data-id='".$row['id']."'>Cancel</a>
                                                </td>
                                              "; } else if($checkpay == 2){

                                                echo "<td><a class='btn btn-success' >Paid</a></td>";
                                              }
                                          
                                        

                                    
                                    }

                                }
                                catch(PDOException $e){
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }

                                $pdo->close();
                            ?>
                                </tr>
                            </tbody>
                        </table>
                    
                        
           <script>

$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
   
    var id = $(this).data('id');
    getRow(id);
  });





});

$(document).ready(function () {
            $.fn.dataTable.ext.errMode = 'throw';

            $.fn.dataTable.moment('DD-MM-YYYY HH:mm a');
           
    $('#tblDataTable').DataTable({
        responsive: true,
        "paging":   false,
        columnDefs: [{
            target: 0, //index of column
            type: 'datetime-moment'
        }]
    });

});


           </script>
           <script type="text/javascript">


$(document).on('click', '.first', function (e) {
    e.preventDefault();
    var id2 = $(this).data('id');
	Swal.fire({
  title: 'Confirm to cancel?',
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
   ids = '';
    function getRow(id){
        ids= id
  }

    window.location.href = "ordercancel.php?cancel="+id2;

  } else if (result.isDenied) {
   
  }
})
})



</script>
 