<?php include_once '../CORE/config/init.php';
include '../components/admin_header.php';?>
 <head>
       <title> Admin Page</title>
   </head>
   <body>
       <h1>Admin Panel</h1>
       <br> <br>
       <a href="#" class="btn-admin">Add Admin</a>
       <br><br>
       <table class="tbl-full">
          <tr>
              <th>S/N</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
          </tr> 
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#" class="btn-admin">Update Admin</a>
                  <a href="#" class="btn-delete">Delete Admin</a>
              </td>
          </tr>
       </table>
   </body>





<?php include '../components/footer.php';?>