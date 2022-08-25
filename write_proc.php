<?php

    include_once "db/db_cafe.php";

    session_start();
    
    $login_user = $_SESSION['login_user'];
    $user = $login_user["u_num"];

    $cafe = $_POST['cafe'];
    $zone_num = $_POST['zone_num'];
    // $zone_nm = $_POST['zone_nm'];
    $addr = $_POST['addr'];
    $tel = $_POST['tel'];
    $insta = $_POST['insta'];
    $open_time = $_POST['open_time'];
    $close_time = $_POST['close_time'];
    $holiday = $_POST['holiday'];

    // var_dump($_FILES);
    // echo "<hr>";

    $tmpFile =  $_FILES['img']['tmp_name'];

    //확장자 체크
    $fileTypeExt = explode("/", $_FILES['img']['type']);
    $fileType = $fileTypeExt[0];
    $fileExt = $fileTypeExt[1];
    $extStatus = false;

    switch($fileExt){
        case 'jpeg':
        case 'jpg':
        case 'gif':
        case 'bmp':
        case 'png':
            $extStatus = true;
            break;
        
        default:
            echo "이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다."; 
            exit;
            break;
    }

    if($fileType == 'image'){
        
        if($extStatus){
            
            $resFile = "img/cafe_img/{$_FILES['img']['name']}";
            
            $imageUpload = move_uploaded_file($tmpFile, $resFile);
            
            
            if($imageUpload == true){
                echo "파일이 정상적으로 업로드 되었습니다. <br>";
                echo "<img src='{$resFile}' width='100' />";
            }else{
                echo "파일 업로드에 실패하였습니다.";
            }
        }	
            
        else {
            echo "파일 확장자는 jpg, bmp, gif, png 이어야 합니다.";
            exit;
        }	
    }	
        
    else {
        echo "이미지 파일이 아닙니다.";
        exit;
    }

    $param = [
        "u_num" => $user,
        "cafe" => $cafe,
        "zone_num" => $zone_num,
        // "zone_nm" => $zone_nm,
        "addr" => $addr,
        "tel" => $tel,
        "insta" => $insta,
        "open_time" => $open_time,
        "close_time" => $close_time,
        "holiday" => $holiday,
        "img" => $resFile
    ];

    $result = ins_cafe($param);

    if($result) {
        header("Location: menu.php");
    }