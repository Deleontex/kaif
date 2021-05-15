<!DOCTYPE html>
<html lang="en">
<?php

session_start();
error_reporting(0);
include("connection/connect.php"); 
// Если нажали кнопку зарагестрироваться, происхлодит следующее:
if(isset($_POST['submit'] )) 
{ 
    // Проверка, заполнены ли все поля
     if(empty($_POST['firstname']) || 
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
        // Если все поля заполнены, происходит следующее:
	else
	{
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		
        // Проверка всех полей, чтобы свопдали с нужными требованиями:
	
	if($_POST['password'] != $_POST['cpassword']){
       	$message = "Неверный пароль";
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$message = "Пароль должен быть >=6";
	}
	elseif(strlen($_POST['phone']) < 10)
	{
		$message = "неверный номер телефона";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
       	$message = "Неверный Email";
    }
	elseif(mysqli_num_rows($check_username) > 0)
     {
    	$message = 'Пользователь уже существует';
     }
	elseif(mysqli_num_rows($check_email) > 0)
     {
    	$message = 'Email уже существует';
     }
    //  Если все успешно, данные заносятся в БД
	else{

	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
		$success = "Аккаунт успешно создан! <p>Выбудете перенаправлены через <span id='counter'>5</span> секунд</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'login.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";
		 header("refresh:5;url=login.php");
    }
	}
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>KAIF</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
         <header id="header" class="header-scroll top-header headrom">
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/edun_back2-01.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Главная <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Рестораны <span class="sr-only"></span></a> </li>
							<?php
                            // В зависимости от авторизации , в шапке отображаются разные элементы
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Войти</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Зарегистрироваться</a> </li>';
							}
						else
							{
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Ваши заказы</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Выйти</a> </li>';
							}

						?>	 
                        </ul>
                  </div>
               </div>
            </nav>
         </header>
         <div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
					  <span style="color:red;"><?php echo $message; ?></span>
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					   
					</a></li>
                    
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
               <h1>Регистрация</h1>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="widget">
                           <div class="widget-body">
                              
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Имя пользователя</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="Имя пользователя"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Имя</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="Имя"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Фамилия</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Фамилия"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Номер телефона</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Номер телефона">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Пароль</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Пароль"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Подтвердите пароль</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Подтвердите пароль"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Адрес доставки</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Зарегестрироваться" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
                           
						   </div>
                        </div>
                     </div>
                     
            </section>
            <footer class="footer">
            <div class="container">
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                        <a href="#"> <img src="images/food-picky-logo.png" alt="Footer logo"> </a> <span>Закажите сами&amp; Заберите заказ </span> </div>
                    <div class="col-xs-12 col-sm-2 about color-gray">
                        <h5>О нас</h5>
                        <ul>
                            <li><a href="#">О нас</a> </li>
                            <li><a href="#">История нашего проекта</a> </li>
                            <li><a href="#">Наша команда</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                        <h5>Как все это рабоатет</h5>
                        <ul>
                            <li><a href="#">Укажите местонахождение</a> </li>
                            <li><a href="#">Выберите ресторна</a> </li>
                            <li><a href="#">Выберите блюдо</a> </li>
                            <li><a href="#">Оплатите онлайн</a> </li>
                            <li><a href="#">Дожидайтесь доставки</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 pages color-gray">
                        <h5>Страницы</h5>
                        <ul>
                            <li><a href="#">Личный аккаунт</a> </li>
                            <li><a href="#">Страница с ценами</a> </li>
                            <li><a href="#">Сделать заказ</a> </li>
                            <li><a href="#">Добавить в корзину</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Способы оплаты</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Адрес</h5>
                            <p>г. Москва ул. Новый арбат д.99</p>
                            <h5>Телефон: <a href="tel:+79778306700">7 977 830 67 00</a></h5> </div>
                    </div>
                </div>
            </div>
        </footer>
         </div>
      </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>