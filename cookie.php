<?php
    setcookie('popup', '0', time()+3600*24*7, '/', 'kyokyo.com',);// true);
    header('Location: /index.php');
?>