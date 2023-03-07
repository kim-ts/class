<?php
    $name = $_FILES['upfile']['name'];  //webhard.php 에서 <input type="file" name="upfile">를 보면 upfile 이라는 이름으로 전달되어오기 때문에 앞의 괄호에는 그 파일을 읽겟다는 의미, 그중 name을 읽겟단뜻
    $tmp_name = $_FILES['upfile']['tmp_name']; //그중 tmp_name 을 읽겠단뜻
    $size = $_FILES['upfile']['size'];  // 그중 size를 읽겟단뜻

    mysql_connect("localhost", "root", "kyokyo!@");
    mysql_select_db("webhacktest");

    session_start();
    $sql = "insert into file set name='$name',
                                 user= '$_SESSION[loginID]',
                                 size='$size',
                                 reg_date=now()";

    $result = mysql_query($sql);

    if($result){
        // insert 성공
        $move_result = move_uploaded_file($tmp_name, "./upload/$name");
        if($move_result){
            echo "upload success";
        }else{
            echo "upload fail";
        }
    }else{
        echo "insert fail";
    }

    mysql_close();
?>