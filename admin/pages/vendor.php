<?php if (!empty($_GET['view'])) {?>
	
	<?php 

    $id= $_GET['view'];
   $query="SELECT * FROM vendor WHERE id=$id";
   $res= $conn->query($query);
   $viewData=$res->fetch_assoc();
   $backId=$viewData['id']-1;
   $fullName=$viewData['vendor_name'];
   $email=$viewData['email'];
   $mobile=$viewData['contact'];
   $address=$viewData['vendor_address'];

   ?>
    <br> <br> <br>
<div class="row">
	<div class="col">
	</div>
	<div class="col text-right">
		<a href="dashboard.php?cat=pages&subcat=vendor" class="btn btn-secondary content-link">Back</a>
	</div>
</div>
<br>
<div class="table-responsive">
	<table class="table">
		<tr>
			<th>Full Name -</th><td><?php echo $fullName; ?></td>
		</tr>
		<tr>
			<th>Email -</th><td><?php echo $email; ?></td>
		</tr>
		<tr>
			<th>Mobile Number -</th><td><?php echo $mobile; ?></td>
		</tr>
		<tr>
			<th>Address -</th><td><?php echo $address; ?></td>
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
			<h4>Vendor Profile</h4>
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
				
				
			</tr>
			<?php
  $sql1="SELECT * FROM vendor ORDER BY id DESC";
  $res1= $conn->query($sql1);
  if($res1->num_rows>0)
  {$i=1;
   while($data=$res1->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $i; ?></td>
   		<td><?php echo $data['vendor_name']; ?></td>
   		
   		<td><?php echo $data['email']; ?></td>
        <td><?php echo $data['contact']; ?></td>
   
   		<td>
   			
   			<?php
   			switch($data['status']){
				   case 0:
   				?>
   				<a href="javascript:void(0)" name="vendor" class=" text-secondary vendorRole"  rel="<?php echo $data['id']; ?>">
   				<i class='fas fa-user-alt-slash iconRole' ></i>
   				<?php break;
		   		case 1:
		   ?>
   			<a href="javascript:void(0)" name="vendor" class=" text-success vendorRole"  rel="<?php echo $data['id']; ?>">
              <i class='fas fa-user-alt iconRole'></i>
   		<?php break; } ?>
   	
   		</a></td>
   		<td><a  href="dashboard.php?cat=pages&subcat=vendor&view=<?php echo $data['id']; ?>" class="text-secondary content-link"><i class='far fa-eye'></i></a></td>

   	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="6">No Vendor Profile Data</td>
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