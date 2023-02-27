<?php
    session_start();
    $token = md5(time());
    $_SESSION['membertoken'] = $token;

    mysql_connect("localhost", "root", "kyokyo!@");

    mysql_select_db("webhacktest");

    $sql = "select* from member where id='$_SESSION[loginID]'";
    $result = mysql_fetch_array(mysql_query($sql));
    mysql_close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>회원정보수정</title>
    </head>

    <body>
        <form method="post" action="member_update.php">
            <pre>
                아이디: <?php echo $result['id']."\n"; ?>
                비밀번호: <input type="password" name="pass">
                재입력: <input type="password" name="pass_re">
                이름: <input type="text" name="name" value="<?php echo $result['name']."\n"; ?>">
                닉네임: <input type="text" name="nickname" value="<?php echo $result['nickname']."\n"; ?>">
                휴대폰: <input type="text" name="mobile" value="<?php echo $result['mobile']."\n"; ?>">
                이메일: <input type="text" name="email" value="<?php echo $result['email']."\n"; ?>">
                주소: <input type="text" name="address" value="<?php echo $result['address']."\n"; ?>">
                <input type="hidden" name="membertoken" value="<?php echo $token;?>"> 
                <input type="submit" value="수정"><input type="reset" value="취소">
            </pre>
        </form>
    </body>
</html>
