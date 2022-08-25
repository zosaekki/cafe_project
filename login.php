<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "css/login.css"/>
    <title>로그인</title>
</head>
<body>
    <?php include_once "header.php" ?>
    
    <fieldset>
    <legend><h2>LOGIN</h2></legend>
    <div class="login">
    <form action="login_proc.php" method="post">
        <div><input class="email" type="email" name="email" placeholder="이메일"></div>
        <div><input class="pw" type="password" name="pw" placeholder="비밀번호"></div>
        <div class="login_btn"><input class="btn submit" type="submit" value="로그인"></div>
    </form>
    </div>
    </fieldset>
</body>
</html>