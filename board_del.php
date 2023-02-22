<?php
    session_start();
    $no = $_GET['no'];
    $user = $_SESSION['loginID'];

    mysql_connect("localhost", "root", "kyokyo!@");

    mysql_select_db("webhacktest");


    $sql = "select* from board where no=$no";
    $result = mysql_fetch_array(mysql_query($sql));

    if($result['user'] == $user || $user == 'admin'){

        $sql = "delete from board where no=$no";
        

        $result = mysql_query($sql);

        if($result){
            echo "성공";
        }else{
            echo "실패";
            echo "<br>";
            echo mysql_error();
        }
        mysql_close();
    }else{
        echo "no delete";
    }
?>