<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
</head>
<body>
    <style>
        body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: #f0f0f0;
        font-family: 'Arial', sans-serif;
    }
    .container {
        text-align: center;
    }
    .error {
        margin-bottom: 50px;
    }
    .error h1 {
        font-size: 10em;
        margin: 0;
        color: #ff6b6b;
        animation: pulse 1s infinite;
    }
    .error h2 {
        font-size: 2em;
        margin: 10px 0;
        color: #333;
    }
    .error p {
        color: #666;
    }
    .home-button {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        background-color: #ff6b6b;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .home-button:hover {
        background-color: #ff4c4c;
    }
    .animation {
        position: relative;
    }
    .ghost {
        width: 100px;
        height: 100px;
        background: white;
        border-radius: 50% 50% 0 0;
        position: relative;
        animation: float 1.5s infinite;
    }
    .ghost .face {
        width: 60px;
        height: 20px;
        background: #333;
        border-radius: 50%;
        position: absolute;
        top: 30px;
        left: 20px;
    }
    .ghost::before, .ghost::after {
        content: '';
        width: 100px;
        height: 20px;
        background: white;
        position: absolute;
        bottom: -20px;
        left: 0;
        border-radius: 50%;
    }
    .ghost::after {
        width: 80px;
        height: 20px;
        left: 10px;
        bottom: -40px;
    }
    .shadow {
        width: 100px;
        height: 10px;
        background: rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        animation: shadow 1.5s infinite;
    }
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    @keyframes shadow {
        0%, 100% {
            transform: scaleX(1);
        }
        50% {
            transform: scaleX(1.2);
        }
    }
    </style>
    <div class="container">
        <div class="error">
            <h1>404</h1>
            <h2>Страница не найдена</h2>
            <p>Извините, но страница, которую вы ищете, не существует.</p>
            <a href="{{ route('home') }}" class="home-button">На главную</a>
        </div>
        <div class="animation">
            <div class="ghost">
                <div class="face"></div>
            </div>
            <div class="shadow"></div>
        </div>
    </div>
</body>
</html>
