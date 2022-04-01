<?php include_once '../CORE/config/init.php';
include '../components/admin_header.php';?>

   <head>
       <title> Admin Page</title>
   </head>
   <body>
       <h1>Admin Panel</h1>
       <br> <br>
       <a href="register-admin.php" class="btn-admin">Add Admin</a>
       <br><br>
       <table class="tbl-full">
          <tr>
              <th>S/N</th>
              <th>Name</th>
              <th>Contact</th>
              <th>Emai;</th>
          </tr> 
          <?php 
            $sql = "SELECT * FROM tbladmin";
            $res = mysqli_query($db, $sql);
            if($res==TRUE){
                $count = mysqli_num_rows($res);

                $sn=1;
                if($count>0){
                    while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['idadmin'];
                        $name=$rows['admin_full_name'];
                        $contact=$rows['contact'];
                        $email=$rows['email_address'];
                        ?>
                         <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $name; ?></td>
              <td><?php echo $contact; ?></td>
              <td> <?php echo $email; ?></td>
              <td><a href="#" class="btn-admin">Update Admin</a>
                  <a href="#" class="btn-delete">Delete Admin</a>
              </td>
          </tr>
                        
                        <?php
                    }
                }
                else{

                }
            }
          ?>
         
       </table>
   </body>
<?php include '../components/footer.php';?>