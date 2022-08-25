<?php
    // include_once "db/db_cafe";
    
    session_start();

    $user = "";
    if(isset($_SESSION['login_user'])) {
        $login_user = $_SESSION['login_user'];
        $user = $login_user['name'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" type = "text/css" href = "css/write.css" />

    <title>write2</title>
</head>
<body>
    <?php include_once "header.php" ?>

    <aside>
        <h2>My Page</h2>
            <div><a href= "write.php">매장 등록하기</a></div>
            <div><a href = "menu.php">매장 관리하기</a></div>
    </aside>
    <div class = "container">
        <h2>매장 등록하기</h2>
            <div class = "login_user">
                <?=isset($_SESSION['login_user']) ? "<div>". $user . "님 환영합니다.</div>" : "" ?>
            </div>
        <form action = "write_proc.php" method="post" enctype="multipart/form-data">
            <table class = "table">
                <tr>
                    <th>매장 이미지</th>
                    <td class="filebox">
                        <input class="upload-name" value="첨부파일" placeholder="첨부파일">
                        <label for="file">파일찾기</label> 
                        <input type="file" id="file" name="img">
                    </td>
                <tr>
                    <th>매장 이름</th>
                    <td><input type = "text" name = "cafe" placeholder="매장 이름을 작성해 주세요"></td>
                </tr>
                <tr>
                     <th>매장 위치</th>
                     <td>
                            <select name = "zone_num" id = "" >
                                <option disabled selected>지역을 선택해 주세요</option>
                                <option value = "1">동구</option>
                                <option value = "2">서구</option>
                                <option value = "3">남구</option>
                                <option value = "4">북구</option>
                                <option value = "5">중구</option>
                                <option value = "6">수성구</option>
                                <option value = "7">달서구</option>
                                <option value = "8">달성군</option>
                            </select>
                            <input type = "text" name = "addr" placeholder="상세 주소">
                        </td>
                        <!-- <td>
                        </td> -->
                 </tr>
                 <tr>
                     <th>매장 전화번호</th>
                     <td>
                         <input type = "tel" name = "tel" placeholder="ex) 010-1234-5678" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{4}"
                                title = "ex) 010-1234-5678" >
                    </td>
                </tr>
                <tr>
                     <th>매장 인스타</th>
                     <td><input type = "text" name = "insta" placeholder="url"></td>
                </tr>
                <tr>
                     <th>매장 운영시간</th>
                     <td>
                        <input type = "time" name = "open_time" min="05:00" max="21:00" step= "1800" required>
                        ~ 
                        <input type = "time" name = "close_time" min="12:00" max="24:00" step= "1800" required>
                     </td>
                </tr>
                <tr>
                     <th>매장 휴일</th>
                     <td>
                        <input type = "text" name = "holiday" placeholder="ex) 월요일">
                    </td>
                </tr>
            </table>
            <div class = "">
                <input type = "submit" value="매장 등록하기" class = "custom-btn submit">
            </div>
        </form>
    </div>

    <script>
        let file = document.querySelector('#file');
        let uploadName = document.querySelector('.upload-name');

        file.onchange = function(){
            let fileName = file.value;
            uploadName.value = fileName;
        }
    </script>
    
</body>
</html>