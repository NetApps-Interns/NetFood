<?php
include("/v-db.php");
include '/components/vendor_header.php';




?>
<!-- <link rel="stylesheet" href="../assets/res/style.css">
         -->
<style>
    .col-4{
    width: 15%;
    margin: 1%;
    background-color:#2a2a2a;
    padding: 2%;
    float: left;
  }
  .text-center{
    text-align: center;
  }
  .dash-fix{
    float: none;
    clear: both;
  }
  .tbl-full{
    width: 100%;
  }
  table tr th{
    border-bottom:1px solid #c1c1c1;
    padding: 1%;
    text-align: left;
  }
  table tr td{
    padding: 1%; 
  }
  .btn-admin{
    background-color: #e4a804;	
    padding: 1%;
    font-weight: bold;
  }
  .btn-admin:hover{
    background-color: orange;
  }
  .btn-delete{
    background-color: #e82d00;
    padding: 2%;
    font-weight: bold;
    width: 25%;
  }
  .btn-delete:hover{
    background-color: #75040483;
  }
  .btn-edit{
    background-color: blue;
    padding: 2%;
    font-weight: bold;
    width: 25%;
  }
  .btn-edit:hover{
    background-color: #75040483;
  }
  .btn-preview{
    background-color: rgb(10, 173, 10);
    padding: 2%;
    font-weight: bold;
    width: 25%;
  }
  .btn-preview:hover{
    background-color: #75040483;
  }

</style>
  <section class="image-background"> 
     <h1>Vendor dashboard </h1>
           
        <a type="button" action="submit" class="btn-admin"  href="../pages/add-item.php" value="add-item">ADD-ITEM</a>
        
                <table class="tbl-full">
        <thead>
            <tr>
                <th scope= "col">S/N</th>   
                
                <td scope= "col">food title</td>
                <td scope= "col">food image</td>
                <td scope= "col">ingredients</td>
                <td scope= "col">food description</td>
                <td scope= "col">price</td>
                <td scope= "col">date created</td>
                <td scope= "col">operations</td>
            </tr>      
        </thead>

        <tbody> 
        <?php
        $sn=1;
        foreach  ($item as $item): ?>

        <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $item['item_name'] ?></td>
          <td><img src="<?php echo $item['image'] ?>" width="150px" alt="meal"></td>
          <td><?php echo $item['ingredients'] ?></td>
          <td><?php echo $item['description'] ?></td>
          <td><?php echo $item['price'] ?></td>
          <td><?= date("Y F d",strtotime($item['create_date'])) ?></td>
          
       
        <td colspan="2">
            <a type="button" action="submit" class="btn-edit" href="../pages/edit.php<?= $item['id']; ?>">EDIT</a>
            <a type="button" action="submit" class="btn-delete" href="/delete.php<?=$item['id']; ?>">DELETE</a>
            <a type="button" action="submit" class="btn-preview" href="menu.php<?= $item['id']; ?>" value="preview">PREVIEW</a>
        </td>
      <?php endforeach; ?>
    </tr>
      
      </tbody>
    </table>
        
</section>

<?php include '/components/vendor_footer.php'; ?>
  