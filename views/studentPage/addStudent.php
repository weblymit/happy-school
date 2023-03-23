<?php
include_once('helpers/functions.php');
require_once('models/model.php');
// validation du formulaire
// 1-creation de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = false;

// 2-Je vérifie si le formualire est soumis
if (!empty($_POST['submitted'])) {
  require_once('helpers/validate-input/validateInput.php');
  create($fName, $lName, $email, $age, $formation, $date_of_birth, $status);
}

?>

<div class="">
  <form method="POST">
    <!-- fname -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="fName">
        <span class="label-text">Prénom</span>
      </label>
      <input name="fName" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="<?php showInputValue('fName') ?>" />
      <p><?php errorMsg('fName') ?></p>
    </div>
    <!-- lname -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="lName">
        <span class="label-text">Nom</span>
      </label>
      <input name="lName" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="<?php showInputValue('lName') ?>" />
      <p><?php errorMsg('lName') ?></p>
    </div>
    <!-- email -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="email">
        <span class="label-text">Email</span>
      </label>
      <input name="email" type="email" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="<?php showInputValue('email') ?>" />
      <p><?php errorMsg('email') ?></p>
    </div>
    <!-- age -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="age">
        <span class="label-text">Age</span>
      </label>
      <input name="age" type="number" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="<?php showInputValue('age') ?>" />
      <p><?php errorMsg('age') ?></p>
    </div>
    <!-- Date de naissance -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="date_of_birth">
        <span class="label-text">Date de naissance</span>
      </label>
      <input name="date_of_birth" type="date" class="input input-bordered w-full max-w-xs" value="<?php showInputValue('date_of_birth') ?>" />
      <p><?php errorMsg('date_of_birth') ?></p>
    </div>
    <!-- status -->
    <div class="flex space-x-8">
      <div class="form-control">
        <label class="label cursor-pointer" for="status">
          <span class="label-text">Inscrit</span>
        </label>
        <input type="radio" name="status" value="1" class="radio checked:bg-red-500" <?php showRadioValue("status", 1) ?> />
      </div>
      <div class="form-control">
        <label class="label cursor-pointer" for="status">
          <span class="label-text">Liste d'attente</span>
        </label>
        <input type="radio" name="status" value="0" class="radio checked:bg-red-500" <?php showRadioValue("status", 0) ?> />
      </div>
      <p><?php errorMsg('status') ?></p>
    </div>
    <!-- formation -->
    <?php
    $formationOptions = [
      ["name" => "Dev React"],
      ["name" => "Dev Front"],
      ["name" => "Dev Laravel"],
      ["name" => "Dev Symfony"],
      ["name" => "Commerce international"],
    ]
    ?>
    <div class="form-control w-full max-w-xs">
      <label class="label">
        <span class="label-text">Nos formations</span>
      </label>
      <select class="select select-bordered" name="formation">
        <option disabled selected>Choisis une formation</option>
        <?php foreach ($formationOptions as $item) : ?>
          <option value="<?= $item['name'] ?>" <?php showSelectValue("formation", $item['name']) ?>>
            <?= $item['name'] ?>
          </option>
        <?php endforeach ?>
      </select>
      <p><?php errorMsg('formation') ?></p>
    </div>

    <!-- submit -->
    <input type="submit" value="envoyer" class="btn btn-primary btn-active mt-5" name="submitted">
  </form>
</div>