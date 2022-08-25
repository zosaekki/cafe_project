<?php

include_once "db/db_cafe.php";

session_start();
    
$login_user = $_SESSION['login_user'];
$user = $login_user["u_num"];
// $u_num = $_POST['u_num'];

$cafe_num = $_POST['cafe_num'];
$menu = $_POST['menu'];
$won = $_POST['won'];

$param = [
    "cafe_num" => $cafe_num,
    "menu" => $menu,
    "won" => $won,
    "u_num" => $user
];

$result = ins_menu($param);

header("location:main.php")
?>
