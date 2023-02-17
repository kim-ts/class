<?php
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];
    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['iaddress'];

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

    $sql = "insert into member set
            id = '$id',
            pass = '$pass',
            name = '$name',
            nickname = '$nickname',
            mobile = '$mobile',
            email = '$email',
            address = '$address',
            reg_date = now()";

    

    $return = mysql_query($sql);
    if($return){
        echo "회원가입 성공";
    }else{
        echo "회원가입 실패";
        echo "<br>";
        echo mysql_error();
    }
    mysql_close();
?>