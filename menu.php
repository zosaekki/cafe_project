<?php
    include_once "db/db_cafe.php";

    session_start();

    $user = "";
    if(isset($_SESSION['login_user'])) {
        $login_user = $_SESSION['login_user'];
        $user = $login_user['name'];
    }

    $param = [
        "u_num" => $login_user['u_num']
    ];
    
    $result = sel_cafe($param);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel = "stylesheet" type = "text/css" href = "css/write.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>menu</title>

</head>
<body>
    <?php include_once "header.php" ?>
    
    <aside>
        <h3>My Page</h3>
        <div><a href= "write.php">매장 등록하기</a></div>
        <div><a href = "menu.php">매장 관리하기</a></div>
    </aside>
    <h2>매장 관리하기</h2>

    <div class = "">
        <?=isset($_SESSION['login_user']) ? "<div>". $user . "님 환영합니다.</div>" : "" ?>
    </div>
    <hr>
    <div class = ""></div>
        <form method = "post" action = "menu_proc.php">
            <ul>
                <li>매장 선택하기
                    <div><select name = "cafe_num" id = "">
                        <option value = "">매장을 선택해주세요</option>
                        <?php
                            while($row = mysqli_fetch_assoc($result)) { ?>
                        <option value = "<?= $row['cafe_num']?>"><?= $row['cafe']?></option>
                        <?php } ?>
                    </select>
                    </div>
                </li>
                <li>메뉴 등록하기
                    <div><input type = "text" name = "menu" class="" placeholder="아메리카노"></div>
                </li>
                <li>가격 등록
                    <div><input type = "text" name = "won" class = "aligin" size="15" placeholder="원"></div>
                </li>
                <div>
                    <input type = "submit" value="메뉴 등록하기">
                </div>
            </ul>
        </form>
    </div>



        <script>
            function onClickUpload() {
                let myInput = document.getElementById("img_input");
                    myInput.click();
            }      
            
        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //         document.getElementById('preview').src = e.target.result;
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //     } else {
        //         document.getElementById('preview').src = "";
        //     }
        //     }

        </script>
</body>
</html>