<?php
    include_once "db/db.php";
    include_once "db/db_user.php";

    $email = $_POST["email"];
    $pw = $_POST["pw"];
    $re_pw = $_POST["re_pw"];
    $name = $_POST["name"];

    $param = [
        "email" => $email,
        "pw" => $pw,
        "name" => $name
    ];

    if ( !is_null( $email ) ) {
        $jb_result = sel_user2($param);
        while ( $jb_row = mysqli_fetch_array( $jb_result ) ) {
            $email_e = $jb_row[ 'email' ];
    }
        if ( $email == $email_e ) {
        $wu = 1;
    } elseif ( $pw != $re_pw ) {
        $wp = 1;
    } else {
        $encrypted_password = password_hash( $pw, PASSWORD_DEFAULT);
        $jb_sql_add_user = ins_user($param);
        // header( 'Location: login.php' );
    ?>
        <script>
            alert("회원가입이 완료되었습니다");
            location.href = "login.php";
        </script>
    <?php }
    }

    if ( $wu == 1 ) {
        echo "<p>이미 등록된 이메일입니다.</p>";
    } 
    if ( $wp == 1 ) {
        echo "<p>비밀번호가 일치하지 않습니다.</p>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/join.css">
    <title>Join</title>
</head>
<body>
    <?php include_once "header.php" ?>
    
    <fieldset>
    <legend><h2>SIGN UP</h2></legend>
    <div class="join">
    <form action = "join.php" method = "post">
        <div><input class="form" type = "text" name = "email" placeholder="이메일을 입력해 주세요." required></div>
        <div><input class="form" type = "password" name = "pw" placeholder="비밀번호를 입력해 주세요." required></div>
        <div><input class="form" type = "password" name = "re_pw" placeholder="비밀번호를 다시 입력해 주세요." required></div>
        <div><input class="form" type = "text" name = "name" placeholder="닉네임을 입력해 주세요" required></div>
        <div class="submit_btn"><input class="btn submit" type = "submit" value = "회원가입"><br></div>
    </form>
    </div>
    </fieldset>
</body>
</html>