<?php
//connection
include('/v-reg.php');

$statement = $pdo->prepare('SELECT * FROM vendor');
$statement->execute();
$vendor=$statement->fetchAll(PDO::FETCH_ASSOC);

include '/components/vendor_header.php';
?>

<section class="image-background">
    <?php  ?>
        <div class="congrats">
            <p><h1>CONGRAULATIONS <p></h1></p>
                <h2> You are now a registerd vendor in NETFOOD </h2></h2>
                <h1>proceed to add your first item; and meet your first customer</h1> <br>
            <a class="button" href="../pages/add-item.php " >ADD ITEM</a>
            <h3>or add item later; preceed to your dashboard</h3>
            <a class="button" href="../pages/v-admin.php" >GO TO DASHBOARD</a>
        </div>
        <?php  ?>
    </div>
</section>
    <?php include '/components/vendor_footer.php';?>