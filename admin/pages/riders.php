<br><br>

<!-----=================table content start=================-->
<div class="content-box">	
	<div class="row">
		<div class="col">
			<h4>Riders</h4>
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
				
				
				
			</tr>
			<?php
  $sql1="SELECT * FROM logistics ORDER BY id DESC";
  $res1= $conn->query($sql1);
  if($res1->num_rows>0)
  {$i=1;
   while($data=$res1->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $i; ?></td>
   		<td><?php echo $data['name']; ?></td>
   		
   		<td><?php echo $data['email']; ?></td>
        <td><?php echo $data['contact']; ?></td>
   
   		<td>
   			
   			<?php
   			if($data['status']==0){
   			?>
   			<a href="javascript:void(0)" name="logistics" class=" text-secondary riderRole"  rel="<?php echo $data['id']; ?>">
   			<i class='fas fa-user-alt-slash iconRole' ></i>
   		<?php } else{ ?>
   			<a href="javascript:void(0)" name="logistics" class=" text-success riderRole"  rel="<?php echo $data['id']; ?>">
              <i class='fas fa-user-alt iconRole'></i>
   		<?php } ?>
   	
   		</a></td>
   		<td><a  href="dashboard.php?cat=pages&subcat=riders&view=<?php echo $data['id']; ?>" class="text-secondary content-link"><i class='far fa-eye'></i></a></td>

	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="6">No Rider Profile Data</td>
</tr>
<?php } ?>
			
		</table>
	</div>
</div>
</div>
	<!-----==================table content end===================-->


</div>
</div>