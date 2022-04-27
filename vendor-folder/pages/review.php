<?php
//connection
include('../api/v-reg.php');

// $statement = $pdo->prepare('SELECT * FROM vendor');
// $statement->execute();
// $vendor=$statement->fetchAll(PDO::FETCH_ASSOC);

include '../components/vendor_header.php';
?>

<section class="image-background">
    <?php  ?>
        <div class="congrats">
            <p><h1>RESGISTRATION UNDER REVIEW <p></h1></p>
                <h2> Your vendor wil soon be registerd under NETfood </h2></h2>
                <h1>Please wait for your aproval email shortly</h1> <br>
            <!-- <a class="button" href="../pages/add-item.php " >ADD ITEM</a>
            <h3>or add item later; preceed to your dashboard</h3>
            <a class="button" href="../pages/v-admin.php" >GO TO DASHBOARD</a> -->
        </div>
        <?php  ?>
    </div>
</section>
<a href="vendor_login.php">../</a>
    <?php include '../components/vendor_footer.php';?>