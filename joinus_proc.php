<?php
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];
    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    if($id == ""){
        echo "noooooo id";
        exit;
    }
    else if($pass == ""){
        echo "nooooooo pass";
        exit;
    }
    else if($pass_re == ""){
        echo "no! pass_re";
        exit;
    }
    else if($name == ""){
        echo "no name";
        exit;
    }
    else if($email == ""){
        echo " no e! mail";
        exit;
    }
    else if($pass != $pass_re){
        echo "passwd not!!!!!!!!!!!!!!!! corrrrrrrrrrrre!!!!!!!!!ct";
        exit;
    }
    else if(strlen($id) > 10){
        echo "id length less then 10!!!";
        exit;
    }


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