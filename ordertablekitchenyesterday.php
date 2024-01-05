
						<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>

<style>
    .badge-notify{
   background:green;
   position:relative;
   top: 0px;
   left: 0px;
}
</style>
<style>
@keyframes spinner {
  to {transform: rotate(360deg);}
}
 
.spinner:before {
  content: '';
  box-sizing: border-box;
  position: absolute;

  width: 20px;
  height: 20px;
  margin-top: -20px;
  margin-left: 0px;
  border-radius: 50%;
  border: 2px solid #ccc;
  border-top-color: #000;
  animation: spinner .6s linear infinite;
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
                              
                        
                            </thead>
                            <tbody >
                            <?php
                                $conn = $pdo->open();
                                date_default_timezone_set("Asia/Kuala_Lumpur");
                                    $date1 = date('Y-m-d 00:00:00',strtotime("-1 days"));
                                    $date2 = date('Y-m-d 23:59:59',strtotime("-1 days"));
                                try{
                                    $stmt = $conn->prepare("SELECT * FROM sales WHERE sales_date>=:today1 And sales_date<=:today2 ORDER BY id DESC");
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
                                        }
?>            
                                        <tr>
                                      
                                         
                                    <?php
                                     $active = ($checkpay == 0) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
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
                                    
                                    echo "
                                            
                                                <td class='hidden'></td>
                                                
                                                <td>".
                                                date('d-m-Y h:i a', strtotime($row['sales_date'])) 
                                               
                                                ."</td>
                                                <td>".$test."".$active."</td>
                                                <td>".$row2['lastname']."</td>
                                                <td>".$ordertype."</td>
                                                <td>Rm ".number_format((float)$total,2,'.','')."</td>
                                                <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
                                            
                                              
                                            
                                        
                                        ";

                                    
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
 