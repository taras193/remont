<?php
$frm = $_POST['frm'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$mess = $_POST['mess'];
$squere = $_POST['squere'];
$price = $_POST['price'];
$step1 = $_POST['step1'];
$step2 = $_POST['step2'];
$step3 = $_POST['step3'];
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_campaign = $_POST['utm_campaign'];
$utm_term = $_POST['utm_term'];
$source_type = $_POST['source_type'];
$source = $_POST['source'];
$position_type = $_POST['position_type'];
$position = $_POST['position'];
$added = $_POST['added'];
$creative = $_POST['creative'];
$matchtype = $_POST['matchtype'];
$location = $_POST['location'];
$url = $_POST['url'];
$title = $_POST['title'];

$subject = 'Заявка Remont';	

//$headers= "From: noreply <noreply@noreply.ru>\r\n";
//$headers.= "Reply-To: noreply <noreply@noreply.ru>\r\n";
$headers.= "X-Mailer: PHP/" . phpversion()."\r\n";
$headers.= "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-type: text/plain; charset=utf-8\r\n";

$to = "grand-euro@mail.ru";

$message = "Форма: $frm\n\n";
$message .= "Имя: $name\n";
$message .= "Телефон: $phone\n\n";
$message .= "Площадь: $squere\n";
$message .= "Диапазон цены: $price\n\n";
$message .= "Шаг 1: $step1\n";
$message .= "Шаг 2: $step2\n";
$message .= "Шаг 3: $step3\n\n";
$message .= "Вопрос: $mess\n\n";
$message .= "Источник: $utm_source\n";
$message .= "Тип источника: $utm_medium\n";
$message .= "Кампания: $utm_campaign\n";
$message .= "Ключевое слово: $utm_term\n";
$message .= "Тип площадки(поиск или контекст): $source_type\n";
$message .= "Площадка: $source\n";
$message .= "Спецразмещение или гарантия: $position_type\n";
$message .= "Позиция объявления в блоке: $position\n";
$message .= "Показ по дополнительным ролевантным фразам: $added\n";
$message .= "Идентификатор объявления: $creative\n";
$message .= "Тип соответствия ключа(e-точное/p-фразовое/b-широкое): $matchtype\n\n";
$message .= "Гео-положение отправителя: $location\n\n";
$message .= "Ссылка на сайт: $url\n";
$message .= "Заголовок: $title\n";

mail ($to,$subject,$message,$headers);

$to = "triowork2@gmail.com";
mail ($to,$subject,$message,$headers);


$vowels = array("+", "-", "(", ")"," ");
$phone = str_replace($vowels, "", $phone);

require_once('amocrm_api.php');
?>