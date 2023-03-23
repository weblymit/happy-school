<?php
session_start();
include_once('views/partials/_alert.php');
// titre de la page
$title = "Liste de nos étudiants";

//1- demande model de lui donner tous les etudiants
require_once('models/model.php');
// query for get all students
$students = getAll('students', 'fName');

//2- je fais capture de tous le html
ob_start();
include('views/studentPage/home-student.php');
// 3- stop la capture et stock tous ce que j'ai capturé dans $content
$content = ob_get_clean();
require('views/layout.php');
