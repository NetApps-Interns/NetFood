<?php include_once '../CORE/config/init.php';
include '../components/admin_header.php';?>


<section class="image-background">
       <h1>Vendors</h1>
      
       <br><br>
       <table class="tbl-full">
          <tr>
              <th>S/N</th>
              <th>Name</th>
              <th>Contact</th>
              <th>Email</th>
          </tr> 
          <?php 
                $sql = "SELECT * FROM vendor";
                $res = mysqli_query($db, $sql);
                if($res==TRUE){
                    $count = mysqli_num_rows($res);
                    
                    $sn=1;
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['idvendor'];
                            $name=$rows['vendor_name'];
                            $contact=$rows['contact'];
                                $email=$rows['email'];
            ?>
        
          <tr>
          <td><?php echo $sn++; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $contact; ?></td>
                <td> <?php echo $email; ?></td>
                <td colspan="2">
                    <button type="button" data-id="<?= $id ?>" class="btn-delete">Delete Vendor</button>
                </td>
              </td>
          </tr>
      <?php }}} ?>
          
       
       </table>
</section>
       <script>
		
        $('.btn-delete').on('click', async function(e){
              e.stopPropagation();
              e.preventDefault();

              id= $(this).data('id');
              row = $(this).parents('tr');
              data= { 
                      id : id
                  }
                  console.log(data);
              res = await $.post(
                  '/api/delete-vendor.php', 
                  data
              )

              if (res.flag){
                  row.remove();

                  Swal.fire(
                      res.msg[0],
                      res.msg[1],
                      'success'
                  );

                   

              }else{
                  Swal.fire(
                  res.msg[0],
                  res.msg[1],
                  'error'
                  );
  
                  
              }
  
          });
  
      </script>
   
   <?php include '../components/footer.php';?>