<?php
//connection
include('confCORE/config/config.php');

$statement = $pdo->prepare('SELECT * FROM vendor');
$statement->execute();
$vendor=$statement->fetchAll(PDO::FETCH_ASSOC);

include 'components/header.php';
?>

    <div id="OpeningParallexImage">
    <?php foreach ($item as $item): ?>
        <div>
            <p><h1>CONGRAULATIONS <p> <h2><?php echo $item['vendor_name'] ?>
            </h2>  </h1></p>
                <h2> You are now a registerd vendor in NETFOOD </h2></h2>
                <h1>proceed to add your first item; and meet your first customer</h1> <br>
            <button href="add-item.php<?= $item['id']; ?>" >ADD ITEM</button>
            <h3>or add item later; preceed to your dashboard</h3>
            <button href="v-admin.php<?= $item['id']; ?>" >GO TO DASHBOARD</button>
        </div>
        <?php endforeach; ?>
    </div>
    <?php include 'components/footer.php';?>