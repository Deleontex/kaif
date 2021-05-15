<?php
// Начало работы с продуктами, прееданными в корзину после нажатия кнопки закзазать
if(!empty($_GET["action"])) 
{
$productId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';

switch($_GET["action"])
 {
	//  проработка продуктов, находящихся в корзине и последующий перенос их в закзаз
	case "add":
		if(!empty($quantity)) {
								$stmt = $db->prepare("SELECT * FROM dishes where d_id= ?");
								$stmt->bind_param('i',$productId);
								$stmt->execute();
								$productDetails = $stmt->get_result()->fetch_object();
                                $itemArray = array($productDetails->d_id=>array('title'=>$productDetails->title, 'd_id'=>$productDetails->d_id, 'quantity'=>$quantity, 'price'=>$productDetails->price));
					if(!empty($_SESSION["cart_item"])) 
					{
						if(in_array($productDetails->d_id,array_keys($_SESSION["cart_item"]))) 
						{
							foreach($_SESSION["cart_item"] as $k => $v) 
							{
								if($productDetails->d_id == $k) 
								{
									if(empty($_SESSION["cart_item"][$k]["quantity"])) 
									{
									$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $quantity;
								}
							}
						}
						else 
						{
								$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
						}
					} 
					else 
					{
						$_SESSION["cart_item"] = $itemArray;
					}
			}
			break;
			// Проработка конпки удалить из корзины
	case "remove":
		if(!empty($_SESSION["cart_item"]))
			{
				foreach($_SESSION["cart_item"] as $k => $v) 
				{
					if($productId == $v['d_id'])
						unset($_SESSION["cart_item"][$k]);
				}
			}
			break;
			// Если корзина пустая, сессия, свзяанная с корзиной, удаляется
	case "empty":
			unset($_SESSION["cart_item"]);
			break;
			// Если все успешно, переносятся в оформление заказа
	case "check":
			header("location:checkout.php");
			break;
	}
}