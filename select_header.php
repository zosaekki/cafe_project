<?php
    include_once 'db/db_list.php';
    include_once 'db/db_user.php';
    $zone_list = [1, 2, 3, 4, 5, 6, 7, 8];
    if(isset($_GET['zone']))
    {
        $zone_num = $_GET['zone'];
    }
    else
    {
        $zone_num = $_GET['zone_num'];
    }

    session_start();
    if(isset($_SESSION['login_user']))
    {
        $login_user = $_SESSION['login_user'];
        $name = $login_user['name'];
        $ment = "${name}님 환영합니다.";
        $log = "<a href='logout.php'>Logout</a>";
        $myPage = "<a href='menu.php'>myPage</a>";
    }
    else
    {
        $join = "<a href='join.php'>Join</a>";
        $log = "<a href='login.php'>Login</a>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel = "stylesheet" type = "text/css" href = "css/header.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="main.js" defer></script>
</head>
<body>
    <nav class = "navbar">
        <form action="" method="GET">
            <select name="zone" onchange="this.form.submit()" id="select" >
                <?php for($i=0; $i<count($zone_list); $i++)
                {
                    echo sel_zone($zone_num, $zone_list[$i]);
                }
                ?>
            </select>
        </form>
        <div class="navbar_logo">
            <i class="fas fa-coffee"></i>
            <a href = "main.php">Café</a>
        </div>
        <ul class="navbar_links">
            <li><?=$ment?></li>
            <li><?=$myPage?></li>
            <li><?=$log?></li>
            <li><?=$join?></li>
        </ul>
        <a href="#" class="navbar_toogleBtn">
            <i class="fa-solid fa-bars"></i>
        </a>
    </nav>
</body>
</html>