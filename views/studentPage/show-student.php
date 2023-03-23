<?php
$styleLabel = "font-bold uppercase pb-3";
$style = "pb-3 text-xl";
?>
<div class="flex flex-col items-center">
  <div class="avatar pt-12 pb-6">
    <div class="w-52 rounded-full ">
      <img src="<?= $student['url_img'] ?>" alt="<?= $student['fName'] . '-' . $student['lName'] ?>" class="">
    </div>
  </div>
  <div class="text-centers">
    <p class="text-4xl font-bold text-indigo-600 pb-10"><?= "{$student['fName']} {$student['lName']}" ?></p>
    <p class="<?= $style ?>"><span class="<?= $styleLabel ?>">Email:</span> <?= $student['email'] ?></p>
    <p class="<?= $style ?>"><span class="<?= $styleLabel ?>">Age:</span> <?= $student['age'] ?></p>
    <p class="<?= $style ?>"><span class="<?= $styleLabel ?>">Date de naissance:</span>
      <?=
      $date = date("d/m/Y", strtotime($student['date_of_birth']));
      ?>
    </p>
    <p class="<?= $style ?>"><span class="<?= $styleLabel ?>">Formation:</span> <?= $student['formation'] ?></p>
  </div>

  <div class="">
    <a href="update.php?id=<?= $student['id'] ?>" class="btn btn-info">Modifier</a>
    <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-error">Supprimer</a>
  </div>
</div>