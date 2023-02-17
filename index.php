<?php
    //클라이언트 요청 메시지에 'popup' 쿠키값이 없다면 if 명령 실행
    if($_COOKIE['popup'] == ""){
        // 서버에서 쿠키를 생성하는 명령
        // popup=1, 현재시간부터 일주일동안 사용가능한 쿠키를 발급하는 함수
        setcookie('popup', '1', time()+3600*24*7, '/', 'kyokyo.com');//, true, false);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>WebHackTest</title>
        <style>
            body{
                background-color: lightblue;
            }
            h1 {
                color: wheat;
                text-align: center;
            }
            p {
                font-family: Verdana;
                font-size: 20px;
            }
        </style>
    </head>

    <body>
        <?php
        //$_COOKIE['popup'] popup 이라는 이름의 cookie 값을 읽을 수 있는 변수
        // popup 쿠키의 값이 0 이랑 같지 않으면 아래 echo 명령들을 실해
        // echo 명령은 출력, 팝업을 실행하기 위한 코드를 출력
        //echo "alert(\"Warning!\")" 여기서 "안에 " 있으면 서로 
        //인식이 이상하게되므로 \를해주거나 또는 안에있는"를 '로써도 된다.
        if($_COOKIE['popup'] != '0'){
            echo "<script>";
            echo "alert(\"Warning!\")";
            echo "</script>";
        }

        session_start();
        if($_SESSION['loginID'] !=""){
            echo "<h1>".$_SESSION['loginID']."님환영합니다.</h1>";//.은 연결시켜주는 기호 파이썬의 + 같은기능인듯
        }
        ?>
        <a href="cookie.php">팝업창 1주일 동안 보지 않기</a><br>
        <a href="login.html">로그인! </a><br>
        <a href="joinus.html">회원가입</a><br>
        <a href="member_only.php">회원정보수정</a><br>
        <a href="board.php">게시판</a><br>
        <a href="webhard.php">웹하드</a><br>
        <a href="nick.php">닉네임변경</a><br>
        <a href="logout.php">로그아웃 </a><br>
        <a href="index.html">메인페이지 돌아가기</a><br>
        <a href="date.php">날짜 </a><br>
    </body>
</html>