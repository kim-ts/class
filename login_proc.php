<?php
    $id = $_POST['id'];
    
    $pass = $_POST['pass'];
    
    mysql_connect("localhost", "root", "kyokyo!@");  //접속할 정보
    mysql_select_db("webhacktest");  // 사용할 데이터베이스 use ~~~ 에해당

    //$sql = "select * from member where id='$id'"; 
    //$result = mysql_fetch_array(mysql_query($sql));//데이터베이스에 있는 정보와 일치하는지 (일치,불일치)를 이 result이라는 변수에 저장한다는뜻

    //if($result){
        $sql = "select * from member where id='$id' and pass='$pass'"; 
        $result = mysql_fetch_array(mysql_query($sql));//데이터베이스에 있는 정보와 일치하는지 (일치,불일치)를 이 result이라는 변수에 저장한다는뜻

        if($result){
            echo "로그인 성공";
            session_start();
            $_SESSION['loginID'] = $id;
        }
        else {
            echo "fail";
        }
    //}
    //else{
    //    echo "not id";
    //}
    //아이디가 존재하지 않으면 비밀번호 체크 안함


    
    //session_start();
    ////session_start를 실행한 시점부터 $_SESSION['이름'] 세션 변수에 값을 지정
    //// 세션 변수는 session id를 통해 구분됨
    //// 사용자 별로 독립된 공간에 저장 변수
    //$_SESSION['loginID'] = $_POST['id'];
?><br>
<body>
<button onclick="history.go(-1);">Back </button>
</body>