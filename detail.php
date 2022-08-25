<?php
    include_once 'db/db_list.php';

    session_start();
    if(isset($_SESSION['login_user'])) {
        $login_user = $_SESSION['login_user'];
    }

    $zone_num = $_GET['zone_num'];
    $cafe_num = $_GET['cafe_num'];

    $param = [
        'zone_num' => $zone_num,
        'cafe_num' => $cafe_num,
    ];
    

    $cafe_detail = sel_cafe_detail($param);
    $cafe_menu = sel_cafe_menu_detail($param);

    if($row = mysqli_fetch_assoc($cafe_detail))
    {
        $cafe = $row['cafe'];
        $addr = $row['addr'];
        $tel = $row['tel'];
        $img = $row['img'];
        $open_time = $row['open_time'];
        $close_time = $row['close_time'];
        $holiday = $row['holiday'];
        $insta = $row['insta'];
        $user = $row['u_num'];
    }

    view($param);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detail.css">
    <title>Document</title>
</head>
<body>
    <div><?php include_once 'header.php'?></div>
    <div>
        <ul>
            <li class="detail_img"><img src="<?=$img?>" alt="매장 사진" width=100%; height=300px></li>
            <div class="detail_li">
            <li><?=$cafe?></li>
            <li>매장 주소 : <?=$addr?></li>
            <li>매장 전화번호 : <?=$tel?></li>
            <li>영업시간 : <?=substr($open_time,0,5)?> ~ <?=substr($close_time,0,5)?></li>
            <li>휴일 : <?=$holiday?></li>
            <li><a href="<?=$insta?>"><img src="img/insta_logo.jpg" alt="인스타" width="40px" height="40px"></a></li>
            </div>
        </ul>
    </div>
    <div>
        <div class="cafe_menu">카페 메뉴</div>
        <div class="cafe_menu_li">
        <?php while($row = mysqli_fetch_assoc($cafe_menu))
            {
                $menu = $row['menu'];
                $won = $row['won'];
                echo "<li class='menu'>$menu ${won}원</li>";
            ?>
            <?php
                if(isset($_SESSION['login_user']) && $login_user['u_num'] === $user) {
            ?>
                    <div class="cafe_menu_button">
                    <a href = "mod.php?zone_num=<?=$zone_num?>&cafe_num=<?=$cafe_num?>&menu_num=<?=$row['menu_num']?>"><button>수정</button></a>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</body>
</html>