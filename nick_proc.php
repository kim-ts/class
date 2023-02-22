<?php
    $nickname = $_POST['nickname'];

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