<?php
session_start();
// titre de la page
$title = "Information de l'étudiant";

//1- demande model de me donner 1 SEUL etudiant
require_once('models/model.php');
$student = get('students');
// capture
ob_start();
include('views/studentPage/show-student.php');
// 3- stop la capture et stock tous ce que j'ai capturé dans $content
$content = ob_get_clean();
require('views/layout.php');
