<?php
    session_start();
    if($_SESSION['loginID'] == ""){
        echo "<script>alert('u not login'); location.href='/'</script>";        //location.href= 이명령어로 스크립트가 끝난후 지정한 곳으로 이동시켜준다.     스크립트 명령어 마지막은 ; 생략가능
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            webhard
        </title>
    </head>
    <body>
        <pre>
            <form action="search_file.php" method="post">
                검색어 : <input type="text" name="keyword">

                <input type="submit" value="검색"><input type="reset" value="취소">
            </form>

            <form action="up_file.php" method="post" enctype="multipart/form-data">
                <input type="file" name="upfile">
                <input type="submit" value="업로드"> <input type="reset" value="취소">
            </form>
        </pre>
    </body>
</html>