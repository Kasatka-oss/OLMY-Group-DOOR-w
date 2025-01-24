<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Створення екземпляру PHPMailer
$mail = new PHPMailer(true);

try {
    // Налаштування сервера
    $mail->isSMTP();                                           // Використання SMTP
    $mail->Host       = 'smtp.gmail.com';                      // SMTP-сервер Gmail
    $mail->SMTPAuth   = true;                                  // Увімкнення авторизації SMTP
    $mail->Username   = 'katerina.melnig@gmail.com';           // Ваша Gmail-пошта
    $mail->Password   = 'Katusha1098l';                        // Ваш пароль від додатку Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           // Тип шифрування
    $mail->Port       = 465;                                   // SMTP-порт для SSL

    // Кому надсилаємо лист
    $mail->setFrom('katerina.melnig@gmail.com', 'OLMY Group Door'); // Від кого
    $mail->addAddress('katerina.melnig@gmail.com');                 // Куди відправляти (ваша ж пошта)

    // Контент листа
    $mail->isHTML(true);
    $mail->Subject = 'Новий запит з сайту OLMY Group Door';
    $mail->Body    = 'Імʼя: ' . htmlspecialchars($_POST['name']) . '<br>' .
                     'Email: ' . htmlspecialchars($_POST['email']) . '<br>' .
                     'Повідомлення: ' . nl2br(htmlspecialchars($_POST['message']));

    // Відправка листа
    $mail->send();
    echo 'Повідомлення успішно надіслано!';
} catch (Exception $e) {
    echo "Повідомлення не надіслано. Помилка: {$mail->ErrorInfo}";
}
?>