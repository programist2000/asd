<?
//Данные для передачи
$name = stripslashes(htmlspecialchars($_POST['name']));;
$phone = stripslashes(htmlspecialchars($_POST['phone']));;
$email = stripslashes(htmlspecialchars($_POST['email']));;





$email_title = 'Новый клиент на сайте!'; 
$myemail = "pavel.akatev@gmail.com"; 
$message = "Имя: {$name}\nТелефон: {$phone}\nEmail: {$email}";
$verify = mail($myemail,$email_title,$message,"Content-type:text/plain;charset=utf-8\r\n");
if ($verify == 'true'){

	// Имя скачиваемого файла
	$file = "Купон.tif";

	// Контент-тип означающий скачивание
	header("Content-Type: application/octet-stream");

	// Размер в байтах
	header("Accept-Ranges: bytes");

	// Размер файла
	header("Content-Length: ".filesize($file));

	// Расположение скачиваемого файла
	header("Content-Disposition: attachment; filename=".$file);  


	// Прочитать файл
	readfile($file);

   	include 'index.html';
}

?>