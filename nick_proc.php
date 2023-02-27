<?php
    session_start();
    if($_POST['antitoken'] != $_SESSION['antitoken']){
        echo "CSRF attack";
        exit;
    }
    $nickname = $_POST['nickname'];

    // CSRF 공격 탐지
    //if($_SERVER['HTTP_REFERER'] != "http://www.kyo.com/nick.php"){
    //    echo "error page";
    //    exit;
    //}

    mysql_connect("localhost", "root", "kyokyo!@");

    mysql_select_db("webhacktest");

    session_start();

    
    $sql = "update member set nickname = '$nickname' where id = '$_SESSION[loginID]'";
    

    $result = mysql_query($sql);
    mysql_close();

    if($result){
        echo "성공";
    }else{
        echo "실패";
        echo "<br>";
        echo mysql_error();
    }
?>