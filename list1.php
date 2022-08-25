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

    $param = [
        'zone_num' => $zone_num
    ];

    $zone_img = sel_zone_img($param);   // 지역 카페 홍보 이미지
    $zone_cafe_img = $zone_img['img']; // 지역 카페 이미지
    $zone_cafe_num = $zone_img['cafe_num']; // 지역 카페 detail로 가기 위한 카페넘버
    $view_order_list = sel_view_list($param); // 지역별 인기 카페(조회수)
    $new_order_list = sel_new_list($param); // 지역별 신규 카페
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list1.css">
    <title>Document</title>
</head>
<body>
    <div><?php include_once 'select_header.php'?></div>
    <div class="list1_zone_cafe_img"><a href="detail.php?zone_num=<?=$zone_num?>&cafe_num=<?=$zone_cafe_num?>"><img src="<?=$zone_cafe_img?>" alt="지역" width="100%" height="400px"></a></div>
    <a href="list2.php?zone_num=<?=$zone_num?>"><h4>카페 전체 보기</h4></a>
    <div class="cafe_view">이 달의 인기 카페</div>
    <div>
        <ul class="list1_view_ul">
            <?php while($row = mysqli_fetch_assoc($view_order_list))
                {
                    $img_nm = $row['img'];
                    $cafe_num = $row['cafe_num'];
                    print "<li><a href='detail.php?zone_num=$zone_num&cafe_num=$cafe_num'><img src='$img_nm' alt='카페 이미지' width=300px; height=300px></a></li>";
                }
            ?>
        </ul>
    </div>
    <div class="cafe_new"></div>
    <div>
        <ul class="list1_new_cafe">
            <?php while($row2 = mysqli_fetch_assoc($new_order_list))
                {
                    $img_nm2 = $row2['img'];
                    $cafe_num2 = $row2['cafe_num'];
                    print "<li><a href='detail.php?zone_num=$zone_num&cafe_num=$cafe_num2'><img src='$img_nm2' alt='카페 이미지' width=300px; height=300px></a></li>";
                }
            ?>
        </ul>
    </div>
</body>
</html>
<script>
    var now = new Date();
    var mon = (now.getMonth()+1);
    console.log(mon);
    document.querySelectorAll('.cafe_new')[0].innerText=mon + "월의 새로운 카페";
</script>