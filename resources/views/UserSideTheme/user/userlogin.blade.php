<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        <!-- Session Status -->
        <div class="mb-4 text-green-500 text-sm">
            <!-- Add session status message here if needed -->
        </div>

        <form method="POST" action="{{  route('user.userlogin')}}">
            @csrf
            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

            <!-- Remember Me -->
            <div class="mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between">
                <a href="/password/reset" class="text-sm text-indigo-600 hover:underline">Forgot your password?</a>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-500 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>
