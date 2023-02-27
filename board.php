<?php
    session_start();
    $token = md5(time());
    $_SESSION['boardtoken'] = $token;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>게시판</title>
    </head>
    <body>
        <pre>
            <form action="board_insert.php" method="post">
                제목 : <input type="text" name="subject">
                내용 : <textarea name="content" cols="100" rows="5"></textarea>
                <input type="submit" value="등록"> <input type="reset" value="취소">
                <input type="hidden" name="boardtoken" value="<?php echo $token;?>"> 
            </form>

            <form action="board_search.php" method="get">
                검색어 : <input type="text" name="keyword">
                
                <input type="submit" value="검색"> <input type="reset" value="취소">
            </form>

            <?php

                $connect = mysql_connect("localhost","root","kyokyo!@");
                if(!$connect){
                    echo "dbms connect fail";
                    exit;
                }
                mysql_select_db("webhacktest");
                $return =mysql_query("select * from board");
                while($result = mysql_fetch_array($return)){
            ?>
            <a href="board_view.php?no=<?php echo $result['no'];?>">글번호 : <?php echo $result['no'];?> 제목 : <?php echo $result['subject'];?> 작성자 : <?php echo $result['user'];?> 등록일 : <?php echo $result['reg_date'];?> </a> <a href="board_del.php?no=<?php echo $result['no'];?>">삭제</a> <!-- a 링크에서 ? 뒤에 오는 no 는 get방식으로 no라는 파라미터로 값을 전달하면 번호에 해당하는 글 내용이 출력되도록하는것 -->
            <?php
                }
            ?>
            
        </pre>
    </body>
</html>

