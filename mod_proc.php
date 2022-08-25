<?php

    include_once "db/db_cafe.php";

    session_start();

    $login_user = $_SESSION["login_user"];

    $user = $login_user["u_num"];
    $menu_num = $_POST['menu_num'];
    $menu = $_POST['menu'];
    $won = $_POST['won'];
    $cafe_num = $_POST['cafe_num'];
    $zone_num = $_POST['zone_num'];

    $param = [
        "u_num" => $user,
        "menu_num" => $menu_num,
        "menu" => $menu,
        "won" => $won,
        "cafe_num" => $cafe_num,
        "zone_num" => $zone_num
    ];

    $result = upd_menu($param);

    if($result) {
        Header("Location: detail.php?zone_num=$zone_num&cafe_num=$cafe_num");
    }

?>