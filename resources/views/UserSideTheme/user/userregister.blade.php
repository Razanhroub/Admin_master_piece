<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body,
        html {
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

        .register-container {
            display: flex;
            max-width: 800px;
            width: 90%;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .register-form {
            background-color: white;
            padding: 20px;
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
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-btn {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-btn:hover {
            background-color: #555;
        }

        .icon-container {
            width: 60px;
            height: 60px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-container i {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="bg-image">
        <div class="register-container">
            <!-- Register Form Section -->
            <div class="register-form">
                <div class="flex justify-center mb-4">
                    <div class="icon-container">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>

                <h2 class="text-xl font-bold text-center mb-4">Register</h2>

                <form action="{{ route('user.userregister') }}" method="POST">
                    @csrf
                    <!-- Name -->
                    <input id="name" type="text" name="name" class="input-field" placeholder="Name"
                        value="{{ old('name') }}" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <!-- Last Name -->
                    <input id="last_name" type="text" name="last_name" class="input-field" placeholder="Last Name"
                        value="{{ old('last_name') }}" required>
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

                    <!-- Email Address -->
                    <input id="email" type="email" name="email" class="input-field" placeholder="Email"
                        value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <!-- Address -->
                    <input id="address" type="text" name="address" class="input-field" placeholder="Country"
                        value="{{ old('address') }}" required>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />

                    <!-- Birth Date -->
                    <input id="birth_of_date" type="date" name="birth_of_date" class="input-field"
                        placeholder="Birth Date" value="{{ old('birth_of_date') }}" required>
                    <x-input-error :messages="$errors->get('birth_of_date')" class="mt-2" />

                    <!-- Password -->
                    <input id="password" type="password" name="password" class="input-field" placeholder="Password"
                        required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Confirm Password -->
                    <input id="password_confirmation" type="password" name="password_confirmation" class="input-field"
                        placeholder="Confirm password" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <button type="submit" class="register-btn">Register</button>
                </form>

                <div class="text-center mt-4">
                    <a href="/userlogin" class="register-btn">Already registered?</a>
                </div>
            </div>

            <!-- Welcome Section -->
            <div class="welcome-section">
                <h1 class="text-2xl font-bold mb-4">Welcome</h1>
                <p class="text-center max-w-xs">
                    In a land of culinary wonders, beyond the hills of flavor and the valleys of taste, lies a realm
                    where recipes come to life. Journey with us through the enchanted kitchens of Dishlicious, where
                    every dish tells a story and every ingredient has a secret to share.
                </p>
            </div>
        </div>
    </div>

</body>

</html>