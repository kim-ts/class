<?php
    $name = $_GET['name'];

    // ../필터링
    //$name = str_replace("../", "", $name);    //방법 1 ../문자를 전부 삭제시킨다.

    // if(preg_match("/..\//",$name)){             //방법 2 ../가포함되면 요청중단
    //     echo "<script>alert('no!');</script>";
    //     exit;
    // }

    //방법 3 전달된 이름을 조회해서 데이터베이스에 저장된 이름과 비교 후
    //정상적인 파일만 다운 받을 수 있도록 함
    mysql_connect("localhost","root","kyokyo!@");
    mysql_select_db("webhacktest");
    $sql = "select * from file where name='$name'";
    $result = mysql_fetch_array(mysql_query($sql));

    //http 요청에 필요한 내용
    if($result){
        Header("Content-Type: application/octet-stream");
        Header("Content-Disposition: attachment; filename=$name");
        Header("Content-Transfer-Encoding: binary");
        Header("Content-Length: ".filesize("./upload/$name"));
    
    //body에 들어갈 내용
        $fd = fopen("./upload/$name","rb");  //rb 는 파일을 읽기모드로 열겠다는 의미, r은 읽기모드란 뜻,b는 이진파일로 열겟다는 뜻
        echo fread($fd, filesize("./upload/$name")); //파일을 읽어라 fd에 저장된 파일을, 읽는 양은
    }else{
        echo "등록된 파일이 아닙니다.";
    }
?>