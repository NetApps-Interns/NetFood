<?php if (!empty($_GET['view'])) {?>
	
	<?php 

    $id= $_GET['view'];
   $query="SELECT order_details.id, customer.customer_name, order_details.created_at, customer.customer_phone_number, order_details.status, customer.customer_email
   FROM order_details
   INNER JOIN customer ON order_details.customer_id=customer.id WHERE order_details.id=$id ";
   $res= $conn->query($query);
   $viewData=$res->fetch_assoc();
   $backId=$viewData['id']-1;
   $fullName=$viewData['customer_name'];
   $email=$viewData['customer_email'];
   $mobile=$viewData['customer_phone_number'];
   ?>
   <br> <br> <br>
<div class="row">
	<div class="col">
	</div>
	<div class="col text-right">
		<a href="dashboard.php?cat=pages&subcat=orders" class="btn btn-secondary content-link">Back</a>
	</div>
</div>
<br>

<div class="table-responsive">
	<table class="display" id="order">
		
	   	<tr>
			<th>Order ID -</th><td><?php echo $id; ?></td>
		</tr>
		<tr>
			<th>Customer's Name -</th><td><?php echo $fullName; ?></td>
		</tr>
		<tr>
			<th>Email -</th><td><?php echo $email; ?></td>
		</tr>
		<tr>
			<th>Mobile Number -</th><td><?php echo $mobile; ?></td>
		</tr>
		
	</table>
</div>
   <?php
   
	

 }else {?>
<br><br>

<!-----=================table content start=================-->
<div class="content-box">
	<div class="row">
		<div class="col">
			<h4>Orders</h4>
		</div>
		
	</div>
	<br>
	<script>$(document).ready( function () {
    $('#order').DataTable();
} );</script>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
		<table class="display" id="order">
			<thead>
			<tr>
				<th>Order ID</th>
				<th>Customer Name</th>
				
				<th> Created at</th>
                <th>Contact</th>
				<th>Status</th>
				<th>View</th>
			
				
			</tr>
			</thead>
			<tbod
			<?php
  $sql1="SELECT order_details.id, customer.customer_name, order_details.created_at, customer.customer_phone_number, order_details.status 
FROM order_details
INNER JOIN customer ON order_details.customer_id=customer.id";
  $res1= $conn->query($sql1);
  if($res1->num_rows>0)
  {$i=1;
   while($data=$res1->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $data['id']; ?></td>
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
	<td colspan="6">idk man</td>
</tr>
<?php } ?>
			
		</table>
	</div>
</div>
</div>
	<!-----==================table content end===================-->


</div>
</div>
<?php } ?>