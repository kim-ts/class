<?php

    mysql_connect("localhost","root","kyokyo!@");
    mysql_select_db("webhacktest");
    session_start();
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
                <input type="submit" value="변경"><input type="reset" value="취소">
            </form>
        </pre>        
    </body>
</html>