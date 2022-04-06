<?php
include("v-db.php");
include_once 'pages/vendor-pages/vendor_header.php.php';




?>

        <h2>Vendor dashboard </h2>
       
    <div id="OpeningParallexImage">
     <div class="adds" class="col-1">     
    <a type="button" action="submit" class="btn btn-small btn-outline-success"  href="add-item.php" value="add-item">ADD-ITEM</a>
    
            <table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope= "col">S/N   
            </th>
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
      
    <div class="adds">
    <td>
        <a type="button" action="submit" class="btn btn-small btn-outline-primary" href="edit.php?id=<?= $item['id']; ?>">EDIT</a>
        <a type="button" action="submit" class="btn btn-small btn-outline-danger" href="delete.php?id=<?= $item['id']; ?>">DELETE</a>
        <a type="button" action="submit" class="btn btn-small btn-outline-success" href="index.php?id=<?= $item['id']; ?>" value="preview">PREVIEW</a>
    </td>
  <?php endforeach; ?>
</tr>
  </div>
  </tbody>
</table>
    </div>
    <?php include_once 'pages/vendor-pages/footer.php.php'; ?>
  