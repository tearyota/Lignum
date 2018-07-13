<?php
session_start();
require_once "database.php";
$link = mysqli_connect("localhost", "admin", "admin", "eterbesx");
if(isset($_POST['auth'])){
    if(!$_POST['login']=="" && !$_POST['pass'] == ""){
        
        $login=$_POST['login'];
         $login=htmlspecialchars($login);
         $login=trim($login);
         $login=stripslashes($login);
        
        $password=$_POST['pass'];
        $password = htmlspecialchars($password);
    $password=trim($password);
     $password=stripslashes($password);
          $password=md5($password);
        
        $query=mysqli_query($link, "SELECT login FROM users WHERE login='$login' && pass='$password'");
        if(mysqli_num_rows($query) > 0) {
            $_SESSION['user'] = $login;
            echo 'Вы вошли в систему';
        }
        else{
            echo 'Вы ввели неправильный логин или пароль';
        }
    }
    else{
        echo 'Заполните все поля';
    }
    }




?>