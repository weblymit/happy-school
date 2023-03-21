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
