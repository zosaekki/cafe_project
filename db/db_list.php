<?php
    include_once 'db.php';

    // header select option
    function sel_zone($zone_num, $val)
    {
        switch ($val)
        {
            case 1:
                $zone_nm = '동구';
                break;
            case 2:
                $zone_nm = '서구';
                break;
            case 3:
                $zone_nm = '남구';
                break;
            case 4:
                $zone_nm = '북구';
                break;          
            case 5:
                $zone_nm = '중구';
                break;          
            case 6:
                $zone_nm = '수성구';
                break;          
            case 7:
                $zone_nm = '달서구';
                break;          
            case 8:
                $zone_nm = '달성군';
                break;          
        }
        if($zone_num == $val)
        {
            print "<option value='$val' selected>$zone_nm</option>";
        }
        else
        {
            print "<option value='$val'>$zone_nm</option>";
        }

    }

    // main page
    function sel_main_zone_list()
    {
         $sql =
        "   SELECT A.img, B.zone_num, B.zone_nm
            FROM cafe A
            INNER JOIN zone B
            ON A.zone_num = B.zone_num
            GROUP BY B.zone_num
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    // 지역별 대표 이미지 (list1)
    function sel_zone_img(&$param)
    {
        $zone_num = $param['zone_num'];
        $sql =
        "   SELECT img, cafe_num
            FROM cafe
            WHERE zone_num = $zone_num
            ORDER BY rand()
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return mysqli_fetch_assoc($result);
    }

    // 지역별 인기 카페 (조회수) (list1)
    function sel_view_list(&$param)
    {
        $zone_num = $param['zone_num'];

        $sql =
        "   SELECT img, cafe_num
            FROM cafe
            WHERE zone_num = $zone_num
            ORDER BY view DESC
            LIMIT 5
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }


    // 지역별 해당 월 카페? (list1)
    function sel_new_list(&$param)
    {
        $zone_num = $param['zone_num'];

        $sql =
        "   SELECT img, cafe_num
            FROM cafe
            WHERE zone_num = $zone_num
            AND MONTH(created_at) = MONTH(CURRENT_DATE())
            ORDER BY created_at DESC
            LIMIT 5
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    // paging (list2)
    function sel_paging_count(&$param) {
        $row_count = $param["row_count"];
        $zone_num = $param['zone_num'];
        $sql =
        "   SELECT CEIL(COUNT(cafe_num) / $row_count) as cnt
            FROM cafe
            WHERE zone_num = $zone_num
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn); 
        $row = mysqli_fetch_assoc($result);
        return $row["cnt"];
    }


    // 전체 카페 리스트 (list2)
    function sel_zone_cafe_list(&$param)
    {
        $start_idx = $param['start_idx'];
        $row_count = $param['row_count'];
        $zone_num = $param['zone_num'];

        $sql =
        "   SELECT cafe, img, addr, open_time, close_time, holiday, cafe_num
            FROM cafe
            WHERE zone_num = $zone_num
            LIMIT $start_idx, $row_count
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    // cafe detail (detail)
    function sel_cafe_detail(&$param)
    {
        $zone_num = $param['zone_num'];
        $cafe_num = $param['cafe_num'];

        $sql =
        "   SELECT *
            FROM cafe
            WHERE zone_num = $zone_num
            AND cafe_num = $cafe_num
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }


    //menu detail (detail)
    function sel_cafe_menu_detail(&$param)
    {
        $cafe_num = $param['cafe_num'];

        $sql =
        "   SELECT menu, won, menu_num
            FROM menu
            WHERE cafe_num = $cafe_num
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    // 조회수
    function view(&$param) {
        
        $cafe_num = $param['cafe_num'];

        $sql =
        "   UPDATE cafe
            SET view = view + 1
            WHERE cafe_num = $cafe_num
        ";

        $conn = get_conn();
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    // 검색 (list2)
    function sel_cafe_search(&$param)
    {
        $search = $param['search'];
        $zone_num = $param['zone_num'];

        $sql =
        "   SELECT cafe, img, addr, open_time, close_time, holiday, cafe_num
            FROM cafe
            WHERE cafe LIKE '%{$search}%'
            AND zone_num = $zone_num
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }