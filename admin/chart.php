<head>
   <script src="../assets/vendor/js/node_modules/chart.js/dist/chart.js"></script>
</head>
<?php
$email=$_SESSION['email_address'];
$sql1="SELECT admin_full_name FROM tbladmin WHERE email_address='$email'";
  $res1= $conn->query($sql1); 
  if($res1->num_rows > 0)
  
   ($data=$res1->fetch_assoc())
   	?>
<body>
<div class='content-box'>
    <h1 class="welcome-text">
        <?php 
    switch ($time = date("G")) {
        case $time < 12:
            $timeOfDay = "Morning";
            break;
        case $time < 19:
            $timeOfDay = "Afternoon";
            break;
        case $time < 24:
            $timeOfDay = "Evening";
            break;
        
        default:
        $timeOfDay = "Day";
            break;
    }
    
    echo "Good ".$timeOfDay.", " ?> <span class="login-name"> <?php echo explode(" " , $data['admin_full_name'])[0] ?> </span></h1>
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-start">
        <div>
            <h4 class="card-title card-title-dash">Recent Orders</h4>
        </div>
         </div>
        <div class="table-responsive  mt-1">
        <table class="table select-table">
            <thead>
            <tr>
               
                <th>Customer</th>
                <th>Ordered at</th>
                <th>Customer Contact</th>
                <th>Status</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
            <?php
  $sql1="SELECT order_details.id, customer.customer_name, order_details.created_at, customer.customer_phone_number, order_details.status 
FROM order_details
INNER JOIN customer ON order_details.customer_id=customer.id LIMIT 5";
  $res1= $conn->query($sql1);
  if($res1->num_rows>0)
  {$i=1;
   while($data=$res1->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $data['customer_name']; ?></td>
   		
   		<td><?php echo $data['created_at']; ?></td>
        <td><?php echo $data['customer_phone_number']; ?></td>
   
   		<td>
   			
   			<?php
   			    switch($data['status']){
				   case 'new':
					?>
						<div class="badge badge-opacity-primary">New</div>
					<?php 
					break; 
					case 'processing'
					?>	
						<div class="badge badge-opacity-warning">In Progress</div>
					<?php 
					break;
					case 'pending'
					?>
						<div class="badge badge-opacity-dark">Pending</div>
					<?php 
					break;
					case 'completed'
					?>
						<div class="badge badge-opacity-success">Completed</div>
					<?php 
					break;
					case 'cancelled'
					?>
						<div class="badge badge-opacity-danger">Cancelled</div>
					<?php 
					break;
				   }?>
						


   		
   		
   	
   		</td>
   		<td><a href="dashboard.php?cat=pages&subcat=orders&view=<?php echo $data['id']; ?>" class="text-secondary content-link"><i class='far fa-eye'></i></a></td>
       
   	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="6">No Recent Orders</td>
</tr>
<?php } ?>
			
            </tbody>
        </table>
        </div>
    </div>
    <div class="row text-center">
        <div class='col-12'>

        <!-- start foreach loop to display numbers of vendors/ customer/ orders from db  -->
        <?php
//  echo values in here //
 $dataPoints = array(
     array("y" => 50, "label" => "Sunday"),
     array("y" => 15, "label" => "Monday"),
     array("y" => 25, "label" => "Tuesday"),
     array("y" => 5, "label" => "Wednesday"),
     array("y" => 10, "label" => "Thursday"),
     array("y" => 0, "label" => "Friday"),
     array("y" => 20, "label" => "Saturday")
 );
//   end foreach loop
 ?>
 <script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
     title: {
         text: "Users per Week"
     },
     axisY: {
         title: "Number of log-ins"
     },
     data: [{
         type: "line",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
 </script>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://write.corbpie.com/wp-content/litespeed/localres/aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS8=ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</body>