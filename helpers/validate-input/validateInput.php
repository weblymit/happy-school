<?php
// 3- protege contre faille xss
///////////////////////////////
$id = trim(htmlspecialchars($_POST['id']));
$fName = trim(htmlspecialchars($_POST['fName']));
$lName = trim(htmlspecialchars($_POST['lName']));
$email = trim(htmlspecialchars($_POST['email']));
$age = trim(htmlspecialchars($_POST['age']));
$date_of_birth = trim(htmlspecialchars($_POST['date_of_birth']));
$status = trim(htmlspecialchars($_POST['status'])); //verifie qu'un boutton a été checked
$formation = isset($_POST['formation']) ? trim(htmlspecialchars($_POST['formation'])) : "";


// Validate des champs
/////////////////////////
// fName
if (empty($fName)) {
  $error['fName'] = $errMsgRequire;
} elseif (strlen($fName) < 4 || strlen($fName) > 40) {
  $error['fName'] = "<span class='text-red-500'>Le prénom doit contenir  4 à 40 caractères!/span>";
}
// lName
if (empty($lName)) {
  $error['lName'] = $errMsgRequire;
} elseif (strlen($lName) < 4 || strlen($lName) > 40) {
  $error['lName'] = "<span class='text-red-500'>Le prénom doit contenir  4 à 40 caractères!/span>";
}
// email
if (!empty($email)) {
  // verifie le bon format de l'email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email'] = "<span class='text-red-500'>Votre email est invalide</span>";
  }
} else {
  $error['email'] = $errMsgRequire;
}
// age
// verifie que user a bien rempli le champs
if (!empty($age)) {
  // verifie que l'age est un nombre entier
  if (!is_numeric($age)) {
    $error['age'] = "<span class='text-red-500'>Merci de rentrer un age correct</span>";
    // verifie que l'age ne soit pas negatif
  } elseif ($age < 0) {
    $error['age'] = "<span class='text-red-500'>Rentre un age superieur à 0</span>";
    // verifie qu'il est majeur
  } elseif ($age < 18) {
    $error['age'] = "<span class='text-red-500'>Tu es mineur</span>";
  }
} else {
  $error['age'] = $errMsgRequire;
}
// formation
if (empty($formation)) {
  $error['formation'] = $errMsgRequire;
} elseif (strlen($formation) < 4 || strlen($formation) > 40) {
  $error['formation'] = "<span class='text-red-500'>La formation doit contenir  4 à 40 caractères!/span>";
}

// status
if (!empty($status)) {
  // verifie que status est un nombre entier et compris entre 0 et 1
  if (!is_numeric($status) || $status < 0 || $status > 1) {
    $error['status'] = "<span class='text-red-500'>Status invalid</span>";
  }
}

// date-of-birth
// if (!empty($date_of_birth)) {
//   // verifie le bon format de l'email
//   if (strtotime($date_of_birth)) {
//     $error['email'] = "<span class='text-red-500'>Date invalide</span>";
//   }
// } else {
//   $error['email'] = $errMsgRequire;
// }
