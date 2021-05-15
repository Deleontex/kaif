<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Логин</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">

	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: #ff3300;
	  }
	  </style>
  
</head>

<body>
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
// Если нажимается конпока подтвердить, начинается работа кода
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))
     {
		//  Проверка пользователя на существовнаие, верно введеные данные
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; 
	$result=mysqli_query($db, $loginquery); 
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["user_id"] = $row['u_id'];
										 header("refresh:1;url=index.php"); 
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!";
                                }
	 }
	
	
}
?>
<div class="pen-title">
  <h1>Войти в аккаунт</h1>
</div>
<div class="module form-module">
  <div class="toggle">
  </div>
  <div class="form">
    <h2>Войдите в ваш аккаунт</h2>
	<!-- Сообщение об успешной или неуспешной авторищации пользователя -->
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Логин"  name="username"/>
      <input type="password" placeholder="Пароль" name="password"/>
      <input type="submit" id="buttn" name="submit" value="Логин" />
    </form>
  </div>
  <div class="cta">Еще не зарегестрированы?<a href="registration.php" style="color:#f30;"> Создайте аккаунт</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>
