<?php

/**
 * Connexion Pdo to DBB
 *
 * @return PDO
 */
function pdo()
{
  // 1- Créations des variables
  $serveur = "localhost";
  $dbname = "escci_app_student";
  $login = "root";
  $password = "root";

  try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      // recuper datas sous forme tableau associatif
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      // voir les erreur
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));

    return $pdo;
    // echo "Toto a réussi à sen connecter!!!";
  } catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
  }
}
