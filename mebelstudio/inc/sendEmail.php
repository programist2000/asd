<?php


$siteOwnersEmail = 'ya.tut@bk.ru';


if($_POST) {

    $name = trim(stripslashes($_POST['contactName']));
    $email = trim(stripslashes($_POST['contactEmail']));
    $tel = trim(stripslashes($_POST['contactTel']));
    $contact_message = trim(stripslashes($_POST['contactMessage']));
    $subject = "Новое сообщение с сайта ТК Студия Мебели";

    // Check Name
    if (strlen($name) < 2) {
        $error['name'] = "Введите имя.";
    }
   
    // Check Message
    if (strlen($contact_message) < 15) {
        $error['message'] = "Введите сообщение. Минимум - 15 символов.";
    }



    // Set Message
    $message .= "От: " . $name . "<br />";
    $message .= "Email: " . $email . "<br />";
    $message .= "Телефон: " . $tel . "<br />";
    $message .= "Сообщение: <br />";
    $message .= $contact_message;
    $message .= "<br /> ----- <br /> Сообщение отправлено с сайта ТК Студия Мебели. <br />";

    // Set From: header
    $from =  $name . " <" . $email . ">";

    // Email Headers
    $headers = "От: " . $from . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";


    if (!$error) {

        ini_set("sendmail_from", $siteOwnersEmail); // for windows server
        $mail = mail($siteOwnersEmail, $subject, $message, $headers);

        if ($mail) { echo "OK"; }
        else { echo "Что-то не так, попробуйте еще раз."; }
        
    } # end if - no validation error

    else {

        $response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
        $response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
        $response .= (isset($error['tel'])) ? $error['tel'] . "<br /> \n" : null;
        $response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
        
        echo $response;

    } # end if - there was a validation error

}

?>