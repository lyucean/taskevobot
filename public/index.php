<?php
// Получаем имя бота из переменных окружения
require_once __DIR__ . '/helper.php';
loadEnv(__DIR__ . '/.env');
$botName = getenv('BOT_NAME') ?: 'TaskEvoBot';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($botName); ?> - AI-помощник в управлении задачами</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .description {
            color: #666;
            margin-bottom: 30px;
        }
        .telegram-button {
            display: inline-block;
            background-color: #0088cc;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .telegram-button:hover {
            background-color: #006699;
        }
        .features {
            text-align: left;
            margin: 30px 0;
        }
        .features li {
            margin-bottom: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔥 <?php echo htmlspecialchars($botName); ?></h1>
        <div class="description">
            <p>Ваш AI-помощник в мире управления задачами</p>
        </div>
        
        <div class="features">
            <h2>Что умеет наш бот:</h2>
            <ul>
                <li>Сам выбирает методологию (SMART, CLEAR, FAST) под вашу задачу</li>
                <li>Превращает словесный хаос в чёткие инструкции</li>
                <li>Формулирует задачи понятно даже для новичков</li>
                <li>Экономит ваше время на составлении ТЗ</li>
            </ul>
        </div>

        <a href="https://t.me/<?php echo htmlspecialchars($botName); ?>" class="telegram-button">
            Открыть бота в Telegram
        </a>
    </div>
</body>
</html>