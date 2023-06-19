<?php

include "page/data.php";

foreach ($users as $user) {
    $name = $user['name'];
    $age = $user['age'];
    $color = $user['clr'];


?>




<div class="card" style="width: 18rem;background-color:<?= $color; ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo $name; ?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $age; ?></h6>
    <p class="card-text">Blablablabla</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

<?php
}
?>

