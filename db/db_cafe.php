<?php

    include_once "db.php";

    function ins_cafe(&$param) {
        
        $conn = get_conn();

        $u_num = $param['u_num'];
        $cafe = $param['cafe'];
        $zone_num = $param['zone_num'];
        $addr = $param['addr'];
        $tel = $param['tel'];
        $insta = $param['insta'];
        $open_time = $param['open_time'];
        $close_time = $param['close_time'];
        $holiday = $param['holiday'];
        $resFile = $param['img'];

        $sql = "INSERT INTO `cafe`
                (u_num, cafe, zone_num, addr, tel, insta, open_time, close_time, holiday, img)
                VALUES
                ('$u_num', '$cafe', '$zone_num', '$addr', '$tel', '$insta', '{$open_time}00', '{$close_time}00', '$holiday', '$resFile')
                ";
        
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
    }

    
    function sel_cafe($param) {

        $user = $param['u_num'];
        
        $conn = get_conn();

        $sql = "SELECT a.cafe_num, a.cafe, a.u_num, a.zone_num,
                b.name
                FROM cafe a
                INNER JOIN cafe_host b
                ON a.u_num = b.u_num
                WHERE a.u_num = '$user'
                ";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
    }

    function ins_menu(&$param) {

        $cafe_num = $param['cafe_num'];
        $menu = $param['menu'];
        $won = $param['won'];


        $sql = "INSERT INTO menu (
                cafe_num, menu, won)
                VALUES (
                '$cafe_num', '$menu', '$won')
            ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
    }

    function sel_menu(&$param) {

        $conn = get_conn();

        $menu_num = $param['menu_num'];

        $sql = "SELECT * FROM `menu`
                WHERE menu_num = $menu_num
                ";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
    }

    function upd_menu($param) {
        
        $conn = get_conn();

        $menu_num = $param['menu_num'];
        $menu = $param['menu'];
        $won = $param['won'];
        $cafe_num = $param['cafe_num'];

        $sql = "UPDATE menu
                SET menu = '$menu',
                    won = '$won'
                WHERE menu_num = $menu_num 
                AND cafe_num = $cafe_num 
                ";
        
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
    }

?>