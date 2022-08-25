<?php
    include_once 'db/db_list.php';

    $search = $_GET['search'];
    if(isset($_GET['zone']))
    {
        $zone_num = $_GET['zone'];
    }
    else
    {
        $zone_num = $_GET['zone_num'];
    }

    $param = [
        'search' => $search,
        'zone_num' => $zone_num
    ];

    $cafe_search = sel_cafe_search($param);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search_result.css">
    <title>Document</title>
</head>
<body>
<div>
    <div class="search_result"><?=$search?> 검색결과</div>
        <ul class="search_cafe_ul">
            <?php while($row = mysqli_fetch_assoc($cafe_search))
            {
                $cafe = $row['cafe'];
                $img = $row['img'];
                $addr = $row['addr'];
                $open_time = $row['open_time'];
                $close_time = $row['close_time'];
                $holiday = $row['holiday'];
                $cafe_num = $row['cafe_num'];
            ?>
            <div class="box">
                <div class="img">
                <li><a href='detail.php?zone_num=<?=$zone_num?>&cafe_num=<?=$cafe_num?>'><img src='<?=$img?>' alt='카페 이미지' width=300px; height=300px></a></li>
                </div>
                <div class="li">
                <li><?=$cafe?></li>
                <li>카페 주소 : <?=$addr?></li>
                <li>영업 시간 : <?=$open_time . " ~ " . $close_time?></li>
                <li>휴일 : <?=$holiday?></li>
                </div>
            </div>
            <?php } ?>
        </ul>
</div>
</body>
</html>