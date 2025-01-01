<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Service Unavailable</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fdd6cb;
        }

        .error-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            max-width: 1300px;
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            padding: 50px 0;
        }

        .left-section {
            flex: 1;
            padding: 80px;
            color: #FB5734;
        }

        .left-section h1 {
            font-size: 4rem;
            margin-bottom: 10px;
        }

        .left-section p {
            font-size: 1.1rem;
            margin-bottom: 40px;
        }

        .go-back {
            padding: 15px 35px;
            border: none;
            border-radius: 30px;
            background-color: #FB5734;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .go-back:hover {
            background-color: #d44729;
        }

        .right-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fcb19b;
            border-radius: 10px;
        }

        .right-section h1 {
            font-size: 10rem;
            font-weight: bold;
            color: #FB5734;
        }

        .error-icon {
            font-size: 8rem;
            margin: 0 20px;
        }
    </style>
</head>
<body>

    <div class="error-container">
        <div class="left-section">
            <h1>Service Unavailable</h1>
            <p>We're currently undergoing maintenance. Please check back later.</p>
            <button class="go-back" onclick="window.history.back()">GO BACK ➜</button>
        </div>

        <div class="right-section">
            <h1>
                5<span class="error-icon">🔧</span>3
            </h1>
        </div>
    </div>

</body>
</html>
