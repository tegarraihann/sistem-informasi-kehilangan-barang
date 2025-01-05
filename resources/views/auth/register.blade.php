<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded shadow-lg p-8">
        <h1 class="text-2xl font-bold text-center mb-6">Register</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h2 class="text-lg font-bold mb-4">Register</h2>

            <div class="mb-4">
                <label for="name" class="block font-medium">Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">Register</button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-blue-500">Already have an account? Login here.</a>
        </div>
    </div>
</body>
</html>
