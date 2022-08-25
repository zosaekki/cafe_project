<?php

    include_once "db/db_user.php";

    session_start();

    $email = $_POST['email'];
    $pw = $_POST['pw'];

    $param = [
        'email' => $email
    ];

    $result = sel_user($param);

    if(empty($result)) {
        //echo "해당하는 아이디 없음";
        // die;

?>
    <script>
        alert("등록되지 않은 이메일 입니다.");
        location.href = "login.php";
    </script>
<?php } 

    // print_r ($result);

    if($pw === $result["pw"]) { //로그인 성공!!       
       $_SESSION["login_user"] = $result;
       header("Location: main.php");
    }
    // else { header("Location: login.php");
    // }

    if($pw != $result["pw"]) {
?>
    <script>
        alert("비밀번호가 맞지 않습니다.");
        location.href = "login.php";
    </script>
<?php
    }

?>
