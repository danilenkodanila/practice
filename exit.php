<?php
session_start();
if (empty($_SESSION['email']) or empty($_SESSION['password'])) 
{
//если не существует сессии с логином и паролем, значит на этот файл попал невошедший пользователь. ≈му тут не место. ¬ыдаем сообщение об ошибке, останавливаем скрипт
exit ("ƒоступ на эту страницу разрешен только зарегистрированным пользовател€м. ≈сли вы зарегистрированы, то войдите на сайт под своим логином и паролем<br><a href='employers-list.php'>√лавна€ страница</a>");
}

unset($_SESSION['password']);
unset($_SESSION['email']); 
unset($_SESSION['id']);
unset($_SESSION['category']);// уничтожаем переменные в сесси€х

exit("<html><head><meta http-equiv='Refresh' content='0; URL=employers-list.php'></head></html>");

// отправл€ем пользовател€ на главную страницу.
?>