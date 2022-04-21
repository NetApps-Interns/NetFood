
<br><br>

<!-----=================table content start=================-->
	
	<div class="row">
		<div class="col">
			<h4>Customer Profile</h4>
		</div>
		
	</div>
	<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>S.N</th>
				<th>Full Name</th>
				
				<th>email</th>
                <th>Contact</th>
				<th>Status</th>
				<th>View</th>
				<th>Delete</th>
				
			</tr>
			<?php
  $sql1="SELECT * FROM customer ORDER BY idcustomer DESC";
  $res1= $conn->query($sql1);
  if($res1->num_rows>0)
  {$i=1;
   while($data=$res1->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $i; ?></td>
   		<td><?php echo $data['customer_name']; ?></td>
   		
   		<td><?php echo $data['customer_email']; ?></td>
        <td><?php echo $data['customer_phone_number']; ?></td>
   
   		<td>
   			
   			<?php
   			if($data['status']==0){
   			?>
   			<a href="javascript:void(0)" name="admin_profile" class=" text-secondary adminRole"  rel="<?php echo $data['idadmin']; ?>">
   			<i class='fas fa-user-alt-slash iconRole' ></i>
   		<?php } else{ ?>
   			<a href="javascript:void(0)" name="admin_profile" class=" text-success adminRole"  rel="<?php echo $data['idadmin']; ?>">
              <i class='fas fa-user-alt iconRole'></i>
   		<?php } ?>
   	
   		</a></td>
   		<td><a  href="dashboard.php?cat=website-admin&subcat=admin-profile&view=<?php echo $data['idcustomer']; ?>" class="text-secondary content-link"><i class='far fa-eye'></i></a></td>
        <td><a href="javascript:void(0)" class="text-danger delete"  name="admin_profile" id="<?php echo $data['idcustomer']; ?>"><i class='far fa-trash-alt'></i></a></td>

   	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="6">No Admin Profile Data</td>
</tr>
<?php } ?>
			
		</table>
	</div>
</div>
</div>
	<!-----==================table content end===================-->


</div>