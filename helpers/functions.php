<?php
// title H1
function titleH1($title)
{
  echo "<h1 class='text-3xl font-black text-center'>{$title}</h1>";
}

// debug array
function debug_array($array)
{
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

// Affiche message erreur à la soumission du formulaire
function errorMsg($name)
{
  global $error;
  if (isset($error[$name])) {
    echo $error[$name];
  }
}

// Sauvegarde la valeur de l'input après submit
function showInputValue($name)
{
  if (isset($_POST[$name])) {
    echo $_POST[$name];
  }
}

// nettoyage des input
function cleanInput($string)
{
  return trim(htmlspecialchars($string));
}
