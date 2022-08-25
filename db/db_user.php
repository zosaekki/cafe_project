<?php

    include_once "db.php";

    function ins_user(&$param) {

        $conn = get_conn();

        $email = $param["email"];
        $pw = $param["pw"];
        $name = $param["name"];

        $sql = "INSERT INTO cafe_host
                (email, pw, name)
                VALUES
                ('$email', '$pw', '$name')
                ";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return $result;
        
    }
    
    function sel_user(&$param) {

        $conn = get_conn();

        $email = $param['email'];
    
        $sql = "SELECT * FROM cafe_host 
                WHERE email = '$email'
                ";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return mysqli_fetch_assoc($result);

    }

    function sel_user2(&$param) {

        $conn = get_conn();

        $email = $param['email'];
    
        $sql = "SELECT * FROM cafe_host 
                WHERE email = '$email'
                ";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return  $result;

    }


?>