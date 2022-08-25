<?php
    include_once 'db/db_list.php';

    if(isset($_GET['zone']))
    {
        $zone_num = $_GET['zone'];
    }
    else
    {
        $zone_num = $_GET['zone_num'];
    }
    
    $page = 1;
    if(isset($_GET["page"])) {       
        $page = intval($_GET["page"]);
    }
    
    $row_count = 5;
    $param = [
        "row_count" => $row_count,
        "start_idx" => ($page - 1) * $row_count,
        "zone_num" => $zone_num
    ];
    
    $paging_count = sel_paging_count($param);
    $zone_cafe_list = sel_zone_cafe_list($param);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list2.css">
    <title>Document</title>
</head>
<body>
    <div><?php include_once 'select_header.php'?></div>
    <div class="cafe_search">
        <div>카페 찾기</div>
            <form action="search_result.php" method="GET">
                <input type="hidden" name="zone_num" value="<?=$zone_num?>">
                <input class="search_input" type="text" name="search" placeholder="카페 이름 검색,,,">
                <input class="submit_input" type="submit" value="검색">
            </form>
        </div>
    <div>
        <ul class="list2_cafe_ul">
            <?php while($row = mysqli_fetch_assoc($zone_cafe_list))
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
                <li>영업 시간 : <?=substr($open_time,0,5)?> ~ <?=substr($close_time,0,5)?></li>
                <li>휴일 : <?=$holiday?></li>
                </div>
                </div>
            <?php }
            ?>
        </ul>
    </div>
    <div class="paging">
        <?php for($i=1; $i<=$paging_count; $i++) { ?>
            <span class="<?=$i===$page ? "pageSelected" : ""?>">
                <a href="list2.php?zone_num=<?=$zone_num?>&page=<?=$i?>">&nbsp;<?=$i?>&nbsp;</a>
            </span>
        <?php } ?>
    </div>
</body>
</html>