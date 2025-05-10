<?php

// Подключаем вспомогательные функции
require_once __DIR__ . '/helper.php';

// Загружаем переменные окружения
loadEnv(__DIR__ . '/.env');

// Получаем токен бота и ID администратора из переменных окружения
$botToken = getenv('BOT_TOKEN');
$adminId = getenv('ADMIN_USER_ID');

if (!$botToken || !$adminId) {
    die("Ошибка: BOT_TOKEN или ADMIN_USER_ID не найдены в файле .env");
}

// Получаем входящие данные
$update = json_decode(file_get_contents('php://input'), true);

// Проверяем, есть ли сообщение в обновлении
if (isset($update['message'])) {
    $message = $update['message'];
    $chatId = $message['chat']['id'];
    
    // Формируем информацию о сообщении
    $forwardInfo = "Новое сообщение:\n";
    $forwardInfo .= "От: " . ($message['from']['username'] ?? 'Неизвестный пользователь') . "\n";
    $forwardInfo .= "ID отправителя: " . $message['from']['id'] . "\n";
    $forwardInfo .= "Текст: " . ($message['text'] ?? 'Нет текста');
    
    // URL для API Telegram
    $apiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";
    
    // Параметры запроса
    $params = [
        'chat_id' => $adminId,
        'text' => $forwardInfo,
        'parse_mode' => 'HTML'
    ];
    
    // Отправляем сообщение администратору
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_exec($ch);
    curl_close($ch);
}