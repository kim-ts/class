<?php
    session_start();
    $token = md5(time());   //시간값을 넣어서 해쉬로 만든다.
    $_SESSION['antitoken'] = $token;  //이걸 사용자에게 전달하기 위해 form에 추가해준다.
    // 이때 이 토큰으로 사용자를 확인할 것이므로 세션변수로 저장함으로  서버에 저장되게 한 것이다.
    


    mysql_connect("localhost","root","kyokyo!@");
    mysql_select_db("webhacktest");
    
    $result = mysql_fetch_array(mysql_query("select * from member where id='$_SESSION[loginID]'"));


?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            닉네임 변경
        </title>
    </head>
    
    <body>
        <pre>
            <form action="nick_proc.php" method="post">
                닉네임 : <input type="text" name="nickname" value="<?php echo $result['nickname']."\n";?>">
                <input type="hidden" name="antitoken" value="<?php echo $token;?>">     <!--토큰 추가  시간이 지남에 따라 랜덤한 토큰이 들어가게 된다. 이제 이토큰을 이용해서 제대로된 요청인지 확인할것이다. 이 설정을 위해 nick_proc에 코드를 작성.-->
                <input type="submit" value="변경"><input type="reset" value="취소">
            </form>
        </pre>        
    </body>
</html>