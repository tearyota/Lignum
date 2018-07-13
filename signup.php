<?php
$dbc=mysqli_connect('localhost','root','','lignum');
if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($dbc, trim($_POST['username']));
     $password1=mysqli_real_escape_string($dbc, trim($_POST['password1']));
     $password2=mysqli_real_escape_string($dbc, trim($_POST['password2']));
    if(!empty($username) && !empty($password1) && !empty(password2) &&($password1==$password2)) {
        $query="SELECT*FROM`signup` where username='$username'";
        $data=mysqli_query($dbc,$query);
        if(mysqli_num_rows($data)==0){
            $query="INSERT INTO`signup`(username,password) VALUES('$username','$password2')";
            mysqli_query($dbc,$query);
            echo 'Всё готово, можете авторизоваться';
            mysqli_close($dbc);
            exit();
        }
        else{
            echo 'Логин уже существует';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<content>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"></form>
    <label for="username">Введите ваш логин:</label>
    <input type="text" name="username">
      <label for="password">Введите ваш пароль:</label>
    <input type="password" name="password1">
      <label for="password">Подтвердите пароль:</label>
    <input type="password" name="password2">
    <button name="submit">Вход</button>
</content>
</body>
</html>