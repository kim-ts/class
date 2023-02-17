<?php
    session_start();

    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $nickname = $_POST['nickname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    mysql_connect("localhost", "root", "kyokyo!@");

    mysql_select_db("webhacktest");

    if($pass == ""){
        $sql = "update member set name = '$name', nickname = '$nickname', mobile = '$mobile',
                email = '$email',
                address = '$address' where id = '$_SESSION[loginID]'";
    }else{
        $sql = "update member set name = '$name', nickname = '$nickname', mobile = '$mobile',
                email = '$email',
                pass = '$pass',
                address = '$address' where id = '$_SESSION[loginID]'";
    }

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
