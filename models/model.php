<?php
// recupere la connexion a la BDD
require_once('database.php');
include_once('helpers/functions.php');
// je stocks la connexion dans $pdo
$pdo = pdo();

/**
 * Get return all items in DB
 *
 */
function getAll($table, $order = "")
{
  global $pdo;
  // 1- je stock ma requette dans une variable
  $sql = "SELECT * FROM $table";

  if ($order) {
    $sql .= " ORDER BY " . $order;
  }

  // 2 Prépare ma requette
  $query = $pdo->prepare($sql);
  // 3- execute la requette
  $query->execute();
  // 4- je stock tous le resultat dans une variable
  $items = $query->fetchAll();
  // 4- je retourne le resultat de la query
  return $items;
}

/**
 * Get the id of item
 *
 * @return int
 */
function getId()
{
  if (!empty($_GET['id']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
    // on nettoie l'id
    $id = cleanInput($_GET['id']);
  } else {
    $_SESSION["error"] = "ID invalide!";
    // redirection quand l'id est invalide
    header('Location: index.php');
  }
  return $id;
}

/**
 * get a single item
 *
 * @return array
 */
function get($table)
{
  global $pdo;
  $id = getId();
  // faire la requette
  $sql = "SELECT * FROM $table where id= :id";
  // prepare la requette
  $query = $pdo->prepare($sql);
  // Associe ou lie la valeur à un parametre
  $query->bindValue(':id', $id, PDO::PARAM_INT);
  // execute ma requette
  $query->execute();
  // on stocke student dans une variable
  $item = $query->fetch();

  // pas de student redirect
  if (!$item) {
    $_SESSION["error"] = "Cet étudiant n'existe pas!";
    header('Location: index.php');
  }

  return $item;
}

/**
 * delete one student
 *
 */
function delete($table)
{
  global $pdo;
  $id = getId();
  // faire la requette
  $sql = "DELETE FROM $table where id= :id";
  // prepare la requette
  $query = $pdo->prepare($sql);
  // Associe ou lie la valeur à un parametre
  $query->bindValue(':id', $id, PDO::PARAM_INT);
  // execute ma requette
  $query->execute();

  $_SESSION["success"] = "L'élément a bien été supprimé avec succès!!";
  // redirect
  header('Location: index.php');
}

/**
 * insert to DB
 */

function create($fName, $lName, $email, $age, $formation, $date_of_birth, $status)
{

  global $pdo;
  global $error;
  global $success;
  if (count($error) == 0) {
    $success = true;
    //1- la requette
    $sql = "INSERT INTO students(fName, lName, email, age, formation, created_at, date_of_birth, status ) VALUES(:fName, :lName, :email, :age, :formation, NOW(), :date_of_birth, :status) ";
    // 2- Prepare la requette
    $query = $pdo->prepare($sql);
    // 3- associer chaque parametre a sa value
    $query->bindValue(':fName', $fName, PDO::PARAM_STR);
    $query->bindValue(':lName', $lName, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':age', $age, PDO::PARAM_INT);
    $query->bindValue(':formation', $formation, PDO::PARAM_STR);
    $query->bindValue(':date_of_birth', $date_of_birth, PDO::PARAM_STR);
    $query->bindValue(':status', $status, PDO::PARAM_STR);
    // 4- execute la query
    $query->execute();

    // // 5- redirect
    $_SESSION["success"] = "Etudiant ajouté";
    // redirect
    header('Location: index.php');
  }
}

/**
 * update item in DB
 */

function update($fName, $lName, $email, $age, $formation, $date_of_birth, $status, $id)
{

  global $pdo;
  global $error;
  global $success;
  if (count($error) == 0) {
    $success = true;
    //1- la requette
    $sql = "UPDATE `students` SET `fName`=:fName, `lName`=:lName,`email`=:email, `age`=:age, `formation`=:formation, `date_of_birth`=:date_of_birth, `status`=:status, `updated_at`= NOW() WHERE id=:id ";
    // 2- Prepare la requette
    $query = $pdo->prepare($sql);
    // 3- associer chaque parametre a sa value
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':fName', $fName, PDO::PARAM_STR);
    $query->bindValue(':lName', $lName, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':age', $age, PDO::PARAM_INT);
    $query->bindValue(':formation', $formation, PDO::PARAM_STR);
    $query->bindValue(':date_of_birth', $date_of_birth, PDO::PARAM_STR);
    $query->bindValue(':status', $status, PDO::PARAM_STR);
    // 4- execute la query
    $query->execute();

    // // 5- redirect
    $_SESSION["success"] = "Etudiant modifié";
    // redirect
    header('Location: index.php');
  }
}
