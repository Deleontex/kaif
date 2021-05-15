<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
// Если полльзватель не авторизован:
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
// Если авторизирован:
else{
    // Создание закзаза
												foreach ($_SESSION["cart_item"] as $item)
												{
												$item_total += ($item["price"]*$item["quantity"]);
													if($_POST['submit'])
													{
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
														mysqli_query($db,$SQL);
														$success = "Спасибо! Ваш заказ успешно оформлен!";
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
    <div class="site-wrapper">
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
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Зарегестрироваться</a> </li>';
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
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                      
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Выберите ресторан</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Выберите блюдо</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Закажите и оплатите</a></li>
                    </ul>
                </div>
            </div>
                <div class="container">
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
                </div>
            <div class="container m-t-30">
            <!-- Перенос товаров из корзины и оформление закзаза -->
			<form action="" method="post">
                <div class="widget clearfix">
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Суммарный чек</h4> </div>
                                        <div class="cart-totals-fields">
                                            <table class="table">
											<tbody>
                                                    <tr>
                                                        <td>Цена</td>
                                                        <td> <?php echo "руб.".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Доставка</td>
                                                        <td>Бесплатная доставка</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Итого</strong></td>
                                                        <td class="text-color"><strong> <?php echo "руб.".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Оплата при получении заказа</span>
                                                    <br> <span>Укажите ваше имя, адрес, Email</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Оплата онлайн <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Сделать заказ"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                    </div>
                </div>
				 </form>
            </div>
            <footer class="footer">
            <div class="container">
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                        <a href="#"> <img src="images/edun_back2-01.png" alt="Footer logo"> </a> <span>Закажите сами&amp; Заберите заказ </span> </div>
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
                            <li><a href="https://vk.com/deleontex">Личный аккаунт</a> </li>
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

<?php
}
?>