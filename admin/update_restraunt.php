<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
		if(empty($_POST['c_name'])||empty($_POST['res_name'])||$_POST['email']==''||$_POST['phone']==''||$_POST['url']==''||$_POST['o_hr']==''||$_POST['c_hr']==''||$_POST['o_days']==''||$_POST['address']=='')
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Все поля должны быть заполнены!</strong>
															</div>';					
		}
	else
		{
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
								$store = "Res_img/".basename($fnew);
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
												$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Максимальный размер картинки 1024kb!</strong>
															</div>';
										}
									else
										{
												$res_name=$_POST['res_name'];
												$sql = "update restaurant set c_id='$_POST[c_name]', title='$res_name',email='$_POST[email]',phone='$_POST[phone]',url='$_POST[url]',o_hr='$_POST[o_hr]',c_hr='$_POST[c_hr]',o_days='$_POST[o_days]',address='$_POST[address]',image='$fnew' where rs_id='$_GET[res_upd]' ";  // store the submited data ino the database :images												mysqli_query($db, $sql); 
													mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Отлично!</strong>Ресторан изменен успешно.
															</div>';
										}
					}
					elseif($extension == '')
					{
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Выберите картинку</strong>
															</div>';
					}
					else{
					
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Неправильное расширение картиники!</strong>png, jpg, Gif допустимы.
															</div>';
						}               
	   }
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Админка</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
    <div class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Главная</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Панель управления</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Панель управления</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-label">Управление</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false">  <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Пользователи</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">Все пользователи</a></li>
								<li><a href="add_users.php">Добавить пользователя</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Рестораны</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="allrestraunt.php">Все рестораны</a></li>
								<li><a href="add_category.php">Добавить категорию</a></li>
                                <li><a href="add_restraunt.php">Добавить ресторан</a></li>
                            </ul>
                        </li>
                     <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Меню</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">Все меню</a></li>
								<li><a href="add_menu.php">Добавить меню</a></li>
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Заказы</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_orders.php">Все заказы</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="page-wrapper" style="height:1200px;">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Панель управления</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Главная</a></li>
                        <li class="breadcrumb-item active">Панель управления</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
									<?php  echo $error;
									        echo $success; ?>	
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                                <h4 class="m-b-0 ">Изменить ресторан</h4>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                       <?php $ssql ="select * from restaurant where rs_id='$_GET[res_upd]'";
													$res=mysqli_query($db, $ssql); 
													$row=mysqli_fetch_array($res);?>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Название ресторана</label>
                                                    <input type="text" name="res_name" value="<?php echo $row['title'];  ?>" class="form-control" placeholder="Тануки">
                                                   </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Бизнес E-mail</label>
                                                    <input type="text" name="email" value="<?php echo $row['email'];  ?>"class="form-control form-control-danger" placeholder="example@gmail.com">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Телефон </label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];  ?>" placeholder="+79039999999">
                                                   </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Сайт</label>
                                                    <input type="text" name="url" class="form-control form-control-danger" value="<?php echo $row['url'];  ?>" placeholder="http://example.com">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Часы открытия</label>
                                                    <select name="o_hr" class="form-control custom-select"  data-placeholder="Выберите категорию" >
                                                    <option>Выберите часы открытия</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option> 
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Часы закрытия</label>
                                                    <select name="c_hr" class="form-control custom-select"    data-placeholder="Выберите категорию" >
                                                    <option>Выберите часы закрытия</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option> 
														<option value="22">22</option>
														<option value="23">23</option>
														<option value="24">24</option>
                                                        <option value="1">1</option>
                                                    </select>
                                                </div>
                                            </div>
											 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Дни работы</label>
                                                    <select name="o_days" class="form-control custom-select"  data-placeholder="Выберите категорию" tabindex="1">
                                                    <option>Выберите дни работы</option>
                                                        <option value="пон-ср">пон-ср</option>
                                                        <option value="пон-чет">пон-чет</option> 
														<option value="пон-пят">пон-пят</option>
														<option value="пон-суб">пон-суб</option>
														<option value="24/7">24/7</option>
                                                    </select>
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Картинка</label>
                                                    <input type="file" name="file"  id="lastName"  class="form-control form-control-danger" placeholder="Картинка">
                                                    </div>
                                            </div>
											 <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Выберите категорию</label>
													<select name="c_name" class="form-control custom-select" data-placeholder="Выберите категорию" tabindex="1">
                                                        <option>Выберите категорию</option>
                                                 <?php $ssql ="select * from res_category";
													$res=mysqli_query($db, $ssql); 
													while($rows=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$rows['c_id'].'">'.$rows['c_name'].'</option>';;
													}  
													?> 
													 </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="box-title m-t-40">Адрес ресторана</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <textarea name="address" type="text" style="height:100px;" class="form-control" > <?php echo $row['address']; ?> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-success" value="Сохранить"> 
                                        <a href="dashboard.php" class="btn btn-inverse">Отменить</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>