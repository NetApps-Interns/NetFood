<?php
include("../api/v-db.php");
include '../components/vendor_header.php';




?>
<!-- <link rel="stylesheet" href="../assets/res/style.css">
         -->
  <section class="image-background"> 
     <h1>Vendor dashboard </h1>
           
        <a type="button" action="submit" class="btn-admin"  href="add-item.php" value="add-item">ADD-ITEM</a>
        
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
            <a type="button" action="submit" class="btn-edit" href="edit.php?id=<?= $item['id']; ?>">EDIT</a>
            <a type="button" action="submit" class="btn-delete" href="delete.php?id=<?= $item['id']; ?>">DELETE</a>
            <a type="button" action="submit" class="btn-preview" href="index.php?id=<?= $item['id']; ?>" value="preview">PREVIEW</a>
        </td>
      <?php endforeach; ?>
    </tr>
      
      </tbody>
    </table>
        
</section>

<?php include '../components/vendor_footer.php'; ?>
  