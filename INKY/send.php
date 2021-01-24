<?
//Данные для передачи
$name = stripslashes(htmlspecialchars($_POST['name']));;
$phone = stripslashes(htmlspecialchars($_POST['phone']));;
$email = stripslashes(htmlspecialchars($_POST['email']));;





$email_title = 'Новый заказ на сайте!'; 
$myemail = "alexander.ashlynn@yandex.ru"; 
$message = "Имя: {$name}\nТелефон: {$phone}\nEmail: {$email}";
$verify = mail($myemail,$email_title,$message,"Content-type:text/plain;charset=utf-8\r\n");
if ($verify == 'true'){
    include 'index.html';
}

?>