<?php
define("host","localhost");
    define("user","admin");
    define("pass","admin");
    define("db","eterbesx");
    $connect = mysqli_connect(host,user,pass);
    mysqli_select_db($connect, db) or die("Не удалось подключиться к базе данных");
  
?>