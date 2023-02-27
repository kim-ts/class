<?php
    setcookie('popup', '0', time()+3600*24*7, '/', 'kyo.com');// true);
    header('Location: /index.php');
?>