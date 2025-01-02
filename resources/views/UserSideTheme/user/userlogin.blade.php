<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg-image {
            background: url('/Userassets/images/bg_1.png') no-repeat center center;
            background-size: cover;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            display: flex;
            max-width: 900px;
            width: 90%;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .login-form {
            background-color: white;
            padding: 50px 40px;
            flex: 1;
        }

        .welcome-section {
            flex: 1;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #555;
        }

        .forgot-password {
            margin-top: 10px;
            display: block;
            text-align: right;
            color: #555;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .icon-container {
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-container i {
            font-size: 48px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="bg-image">
    <div class="login-container">
        <!-- Login Form Section -->
        <div class="login-form">
            <div class="flex justify-center mb-8">
                <div class="icon-container">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            
            <h2 class="text-3xl font-bold text-center mb-8"> User Login</h2>

            <form method="POST" action="{{ route('user.userlogin') }}">
                @csrf
                <input type="text" name="email" class="input-field" placeholder="Username" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />



                <button type="submit" class="login-btn">Sign In</button>
            </form>

            <div class="text-center mt-6">
                <a href="/userregister" class="login-btn">Create account</a>
            </div>
        </div>

        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1 class="text-4xl font-bold mb-4">Welcome</h1>
            <p class="text-center max-w-xs">
                In a land of culinary wonders, beyond the hills of flavor and the valleys of taste, lies a realm where recipes come to life. Journey with us through the enchanted kitchens of Dishlicious, where every dish tells a story and every ingredient has a secret to share.
            </p>
        </div>
    </div>
</div>

</body>
</html>