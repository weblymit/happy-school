<?php
include_once('helpers/functions.php');
require_once('models/model.php');
// validation du formulaire
// creation de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = false;

// 1- Recuperer le student avec le bon ID
$student = get('students');
// debug_array($student);

// 2-Je vérifie si le formualire est soumis
if (!empty($_POST['submitted'])) {

  require_once('helpers/validate-input/validateInput.php');
  update($fName, $lName, $email, $age, $formation, $date_of_birth, $status, $id);
  debug_array($_POST);
}

?>

<div class="">
  <form method="POST">
    <!-- fname -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="fName">
        <span class="label-text">Prénom</span>
      </label>
      <input name="fName" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="<?= $student['fName'] ?>" />
      <p><?php errorMsg('fName') ?></p>
    </div>
    <!-- lname -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="lName">
        <span class="label-text">Nom</span>
      </label>
      <input name="lName" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="<?= $student['lName'] ?>" />
      <p><?php errorMsg('lName') ?></p>
    </div>
    <!-- email -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="email">
        <span class="label-text">Email</span>
      </label>
      <input name="email" type="email" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="<?= $student['email'] ?>" />
      <p><?php errorMsg('email') ?></p>
    </div>
    <!-- age -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="age">
        <span class="label-text">Age</span>
      </label>
      <input name="age" type="number" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="<?= $student['age'] ?>" />
      <p><?php errorMsg('age') ?></p>
    </div>
    <!-- Date de naissance -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="date_of_birth">
        <span class="label-text">Date de naissance</span>
      </label>
      <input name="date_of_birth" type="date" class="input input-bordered w-full max-w-xs" value="<?= $student['date_of_birth'] ?>" />
      <p><?php errorMsg('date_of_birth') ?></p>
    </div>
    <!-- status -->
    <div class="flex space-x-8">
      <div class="form-control">
        <label class="label cursor-pointer" for="status">
          <span class="label-text">Inscrit</span>
        </label>
        <input type="radio" name="status" class="radio checked:bg-red-500" value="1" <?php showUpdateRadioValue($student['status'], 1) ?> />
      </div>
      <div class="form-control">
        <label class="label cursor-pointer" for="status">
          <span class="label-text">Liste d'attente</span>
        </label>
        <input type="radio" name="status" class="radio checked:bg-red-500" value="0" <?php showUpdateRadioValue($student['status'], 0) ?> />
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
          <option value="<?= $student['formation'] ?>" <?php showUpdateSelectValue($student['formation'], $item['name']) ?>>
            <?= $item['name'] ?>
          </option>
        <?php endforeach ?>
      </select>
      <p><?php errorMsg('formation') ?></p>
    </div>

    <input type="hidden" name="id" value="<?= $student['id'] ?>">
    <!-- submit -->
    <input type="submit" value="envoyer" class="btn btn-primary btn-active mt-5" name="submitted">
  </form>
</div>