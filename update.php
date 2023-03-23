<?php
session_start();
$title = "Modifier un étudiant";
//2- je fais capture de tous le html
ob_start();
include('views/studentPage/updateStudent.php');
// 3- stop la capture et stock tous ce que j'ai capturé dans $content
$content = ob_get_clean();
require('views/layout.php');
