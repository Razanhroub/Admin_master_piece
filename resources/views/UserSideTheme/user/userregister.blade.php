<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            font-size: 14px;
            color: #4A90E2;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #4A90E2;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #357ABD;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Register</h1>
        <form action ="{{ route('user.userregister') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}"
                    required>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                    required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    placeholder="Confirm password" required>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="flex-container">
                <a href="/userlogin">Already registered?</a>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>

</html>
