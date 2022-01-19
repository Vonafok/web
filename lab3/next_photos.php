<?php require 'db.php' ?>

<?php

$off = htmlspecialchars($_GET["offset"]);

$query = "SELECT * FROM `photo` ORDER BY `date` LIMIT 2 OFFSET " . $off;
$photos = $connection->query($query);



?>


<?php foreach ($photos as $row) : ?>
    <a href="detailed_page.php?id=<?= $row['photo_id'] ?>">
      <img src="images/<?= $row['path'] ?>" class="main__photo">
    </a>
<?php
endforeach;
?>