<?php
    include_once 'db/db_list.php';

    $main_zone_list = sel_main_zone_list();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
    <div><?php include_once 'header.php'?></div>
    <div class="main_img"><img src="img/main.jpg" alt="메인이미지" width="100%" height="400px"></div>
    <div class="main_text"><h1>우리 동네 카페 둘러보기</h1></div>
    <ul class="main_zone_ul">
        <?php   
            while($row = mysqli_fetch_assoc($main_zone_list))
            {
                $zone_num = $row['zone_num'];
                $img = $row['img'];
                $zone_nm = $row['zone_nm'];
                echo "<li class='main_zone_li'><a href='list1.php?zone_num=$zone_num'><img src='$img' class='main_zone_img'><span class='main_zone_nm'>$zone_nm</span></a></li>";
            }
        ?>
    </ul>
</body>
</html>