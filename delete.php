<?php
// on demarre la session
session_start();
//1- demande model de lui donner tous les etudiants
require_once('models/model.php');
delete("students");
