<br><br>

<!-----=================table content start=================-->
	
	<div class="row">
		<div class="col">
			<h4>Orders</h4>
		</div>
		
	</div>
	<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Order ID</th>
				<th>Customer Name</th>
				
				<th> Created at</th>
                <th>Contact</th>
				<th>Status</th>
				<th>View</th>
			
				
			</tr>
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
						<div class="badge badge-opacity-new">New</div>
					<?php 
					break; 
					case 'processing'
					?>	
						<div class="badge badge-opacity-warning">In Progress</div>
					<?php 
					break;
					case 'pending'
					?>
						<div class="badge badge-opacity-new">Pending</div>
					<?php 
					break;
					case 'completed'
					?>
						<div class="badge badge-opacity-new">New</div>
					<?php 
					break;
					case 'cancelled'
					?>
						<div class="badge badge-opacity-new">New</div>
					<?php 
					break;
				   }?>1
						


   		
   		
   	
   		</td>
   		<td><a  href="dashboard.php?cat=website-admin&subcat=admin-profile&view=<?php echo $data['id']; ?>" class="text-secondary content-link"><i class='far fa-eye'></i></a></td>
       
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