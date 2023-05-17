<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $to = 'ipz191_dmo@student.ztu.edu.ua'; //пошта кому буде відправлене повідомлення
    $subject = 'Новое сообщение с формы';

    // Получение данных из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $about_company = $_POST['about_company'];
    $target_audience = $_POST['target_audience'];
    $main_targets = $_POST['main_targets'];
    $structures_ideas = $_POST['structures_ideas'];
    $main_ideas = $_POST['main_ideas'];
    $keywords = $_POST['keywords'];
    $preferred_colors = $_POST['preferred_colors'];
    $project_duration = $_POST['project_duration'];
    $website_budget = $_POST['website_budget'];
    $promotion_budget = $_POST['promotion_budget'];

    // Создание объекта PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'ipz191_dmo@student.ztu.edu.ua'; // Замените на вашу почту Gmail
    $mail->Password = '118863'; // Замените на пароль от вашей почты Gmail

    // Настройка параметров письма
    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = '=?utf-8?B?' . base64_encode($subject) . '?=';

    $mail->Body = "Ім'я: $name\n\nEmail: $email\n\nНомер телефону: $phone\n\nНазва компанії: $company\n\nПро компанію: $about_company\n\nЦільова аудиторія: $target_audience\n\nОсновні цілі та завдання щодо сайту: $main_targets\n\nІдеї, рекомендації, побажання щодо структури: $structures_ideas\n\nОсновні функції, які ви бажаєте, щоб ваш сайт виконував: $main_ideas\n\nКлючові слова: $keywords\n\nПріоритетні кольори: $preferred_colors\n\nТермін виконання проекту (у місяцях): $project_duration\n\nБюджет на розробку сайту (грн): $website_budget\n\nБюджет на просування сайту (грн): $promotion_budget\n\n";
    // Отправка письма
    if ($mail->send()) {
        echo "Повідовленння-відправлено!";
    }else
        echo "Error";
}
?>