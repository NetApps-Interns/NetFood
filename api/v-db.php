<?php
    //connection
include ('../CORE/config/config.php');

    $statement = $pdo->prepare('SELECT * FROM item ORDER BY create_date DESC');
    $statement->execute();
    $item=$statement->fetchAll(PDO::FETCH_ASSOC);


?>





