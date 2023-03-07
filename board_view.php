<?php
    $no = $_GET['no'];

    // SQL Injection Filter
    //$no = str_replace("'", "", $no);    //' 가있으면 없애라는 코드
    if(preg_match("/union|information_schema|select|from/i",$no)){
        echo "<script>alert('SQL attack detect.');</script>";
        exit;
    }



    mysql_connect("localhost","root","kyokyo!@");
    mysql_select_db("webhacktest");
    //$sql = "select * from board where no=$no";
    $sql = "call board_view($no)";
    $result = mysql_fetch_array(mysql_query($sql));
    mysql_close();
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $result['subject']; ?></title>
    </head>
    <body>
        <pre>
        제목 : <?php echo $result['subject']."\n";?>
        내용 : <?php echo $result['content']."\n";?> 
        작성자 : <?php echo $result['user']."\n";?>
        등록일 : <?php echo $result['reg_date']."\n";?>
        </pre>
    </body>
</html>