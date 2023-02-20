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
            </form>

            <form action="board_search.php" method="get">
                검색어 : <input type="text" name="keyword">
                
                <input type="submit" value="검색"> <input type="reset" value="취소">
            </form>
        </pre>        
    </body>
</html>

