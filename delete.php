<?php
// on demarre la session
session_start();
// connexion avec PDO
require_once("helpers/pdo.php");
require_once("helpers/functions.php");

if (!empty($_GET['id']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
  // on nettoie l'id
  $id = cleanInput($_GET['id']);
  // faire la requette
  $sql = "DELETE FROM students where id= :id";
  // prepare la requette
  $query = $pdo->prepare($sql);
  // Associe ou lie la valeur à un parametre
  $query->bindValue(':id', $id, PDO::PARAM_INT);
  // execute ma requette
  $query->execute();

  $_SESSION["success"] = "Etudiant supprimé avec succès!!";
  // redirect
  header('Location: index.php');
} else {
  $_SESSION["error"] = "ID invalide!";
  // redirection quand l'id est invalide
  header('Location: index.php');
}
