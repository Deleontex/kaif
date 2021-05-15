<?php
// Выход пользователя, удаление всех куки фалов, созданных пользователем
session_start(); 
session_destroy(); 
$url = 'index.php';
header('Location: ' . $url); 

?>