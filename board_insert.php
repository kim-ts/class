<?php
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $connect = mysql_connect("localhost", "root", "kyokyo!@");
    if(!$connect){
        echo "DB connect fail";
        exit;
    }

    $database = mysql_select_db("webhacktest");
    if(!$database){
        echo "Database select fail";
        exit;
    }

    session_start();

    $sql = "insert into board set
            subject = '$subject',
            content = '$content',
            user = '$_SESSION[loginID]',
            reg_date = now()";

    

    $return = mysql_query($sql);
    if($return){
        echo "글 등록 성공";
    }else{
        echo "글 등록 실패";
        echo "<br>";
        echo mysql_error();
    }
    mysql_close();
?>