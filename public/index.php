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
    <meta name="description" content="TaskEvoBot - AI-помощник нового поколения для управления задачами. Революционный подход к методологиям SMART, CLEAR и FAST.">
    <meta name="keywords" content="TaskEvoBot, AI помощник, SMART задачи, CLEAR методология, FAST методология, будущее управления задачами">
    <meta name="author" content="Lyucean">
    <title><?php echo htmlspecialchars($botName); ?> - Будущее управления задачами</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon-blue: #00f7ff;
            --neon-purple: #bc13fe;
            --dark-bg: #0a0a0a;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            margin: 0;
            padding: 0;
            background: var(--dark-bg);
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow-x: hidden;
            perspective: 1000px;
        }

        .cyber-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(90deg, rgba(var(--neon-blue), 0.1) 1px, transparent 1px) 0 0 / 50px 50px,
                linear-gradient(rgba(var(--neon-blue), 0.1) 1px, transparent 1px) 0 0 / 50px 50px;
            transform: rotateX(60deg);
            transform-style: preserve-3d;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: rotateX(60deg) translateY(0); }
            100% { transform: rotateX(60deg) translateY(50px); }
        }

        .container {
            max-width: 800px;
            margin: 20px;
            background: rgba(10, 10, 10, 0.8);
            padding: 40px;
            border-radius: 20px;
            position: relative;
            z-index: 2;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 0 30px rgba(0, 247, 255, 0.1),
                inset 0 0 30px rgba(188, 19, 254, 0.1);
            animation: containerPulse 4s ease-in-out infinite;
        }

        @keyframes containerPulse {
            0%, 100% { box-shadow: 0 0 30px rgba(0, 247, 255, 0.1), inset 0 0 30px rgba(188, 19, 254, 0.1); }
            50% { box-shadow: 0 0 50px rgba(0, 247, 255, 0.2), inset 0 0 50px rgba(188, 19, 254, 0.2); }
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 2px;
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: glitch 5s infinite;
        }

        @keyframes glitch {
            0%, 100% { transform: none; opacity: 1; }
            7% { transform: skew(-0.5deg, -0.9deg); opacity: 0.75; }
            10% { transform: none; opacity: 1; }
            27% { transform: none; opacity: 1; }
            30% { transform: skew(0.8deg, -0.1deg); opacity: 0.75; }
            35% { transform: none; opacity: 1; }
        }

        .features {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
            border: 1px solid rgba(0, 247, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .features::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent,
                rgba(0, 247, 255, 0.1),
                transparent
            );
            transform: rotate(45deg);
            animation: lightSweep 3s linear infinite;
        }

        @keyframes lightSweep {
            0% { transform: rotate(45deg) translateY(-100%); }
            100% { transform: rotate(45deg) translateY(100%); }
        }

        .features li {
            margin-bottom: 20px;
            padding-left: 30px;
            position: relative;
            transition: transform 0.3s ease;
        }

        .features li:hover {
            transform: translateX(10px);
        }

        .features li::before {
            content: '⚡';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: var(--neon-blue);
            text-shadow: 0 0 5px var(--neon-blue);
        }

        .telegram-button {
            display: inline-block;
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple));
            color: white;
            padding: 20px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            margin: 40px auto;
            display: block;
            width: fit-content;
            animation: buttonPulse 2s infinite;
        }

        @keyframes buttonPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .telegram-button:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 10px 20px rgba(0, 247, 255, 0.3),
                0 6px 6px rgba(188, 19, 254, 0.2);
        }

        .telegram-button::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transform: rotate(45deg);
            animation: buttonSweep 3s linear infinite;
        }

        @keyframes buttonSweep {
            0% { transform: rotate(45deg) translateY(-100%); }
            100% { transform: rotate(45deg) translateY(100%); }
        }

        .author {
            margin-top: 40px;
            text-align: center;
            padding: 20px;
            border-top: 1px solid rgba(0, 247, 255, 0.1);
            font-size: 0.9em;
            color: rgba(255, 255, 255, 0.7);
        }

        .author a {
            color: var(--neon-blue);
            text-decoration: none;
            position: relative;
            transition: all 0.3s ease;
        }

        .author a:hover {
            color: var(--neon-purple);
            text-shadow: 0 0 10px var(--neon-purple);
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
                padding: 20px;
            }

            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="cyber-grid"></div>
    <div class="container">
        <div class="logo-circle">
            <div class="logo-circle-inner">
                <img src="TaskEvoBot.png" alt="TaskEvoBot Logo">
            </div>
        </div>
        <h1><?php echo htmlspecialchars($botName); ?></h1>
        <div class="description">
            <p>Революционный AI-помощник в мире управления задачами</p>
        </div>
        
        <div class="features">
            <h2>Возможности нашего бота:</h2>
            <ul>
                <li>Интеллектуальный выбор методологии (SMART, CLEAR, FAST) для каждой задачи</li>
                <li>Трансформация хаотичных идей в чёткие инструкции</li>
                <li>Кристально ясные формулировки для любого уровня подготовки</li>
                <li>Максимальная оптимизация времени на составление ТЗ</li>
            </ul>
        </div>

        <a href="https://t.me/<?php echo htmlspecialchars($botName); ?>" class="telegram-button">
            Запустить будущее
        </a>

        <div class="author">
            <p>Создано с 💜 by <a href="https://lyucean.com/goals/" target="_blank">Lyucean</a><br>
            <small>Вдохновлено "Чёрной магией постановки задач"</small></p>
        </div>
    </div>
</body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(101726582, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/101726582" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</html>