<?php
    $keyword = $_GET['keyword'];
    $keyword = htmlspecialchars($keyword);

    $connect = mysql_connect("localhost","root","kyokyo!@");
    if(!$connect){
        echo "dbms connect fail";
        exit;
    }
    mysql_select_db("webhacktest");
    //$return =mysql_query("select * from board where subject like '%$keyword%'");   // keyword 가들어간 어떤것이든 출력하게만든것 like에 %는 %위치에 아무거나 라는의미니까
    $sql = "call search_board('%$keyword%')";
    $return = mysql_query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> 검색결과 </title>
    </head>
    <body>
        <pre>
            검색어 : <?php echo $keyword."\n";?>

            <?php
            while($result = mysql_fetch_array($return)){
            ?>
            <a href="board_view.php?no=<?php echo $result['no'];?>">글번호 : <?php echo $result['no'];?> 제목 : <?php echo $result['subject'];?> 작성자 : <?php echo $result['user'];?> 등록일 : <?php echo $result['reg_date'];?> </a>  <!-- a 링크에서 ? 뒤에 오는 no 는 get방식으로 no라는 파라미터로 값을 전달하면 번호에 해당하는 글 내용이 출력되도록하는것 -->
            <?php
                }
            ?>
        </pre>
    </body>
</html>