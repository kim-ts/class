<?php
    $keyword = $_POST['keyword'];

    mysql_connect("localhost","root","kyokyo!@");
    mysql_select_db("webhacktest");
    $sql = "select * from file where name like '%$keyword%'";
    $return = mysql_query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            검색결과
        </title>
    </head>
    <body>
        <pre>
            검색어     : <?php echo $keyword."\n"; ?>

        <?php
            while($result = mysql_fetch_array($return))
            {
        ?>
    번  호     : <?php echo $result['no']."\n"; ?>
            이  름     : <a href="down_file.php?name=<?php echo $result['name'];?>"><?php echo $result['name']."\n";?></a>
            크  기     : <?php echo $result['size']."\n"; ?>
            등록시     : <?php echo $result['user']."\n"; ?>
            등록일시   : <?php echo $result['reg_date']."\n"; ?>
            <br>
        <?php
            }
        ?>
        </pre>
    </body>
</html>