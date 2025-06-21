<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#101014] text-white flex items-center justify-center min-h-screen">
    <form method="POST" action="{{ route('login.user') }}" class="bg-[#1A1D24] p-8 rounded-xl shadow-lg w-96 space-y-4">
        @csrf
        <h2 class="text-2xl font-bold mb-4">Login</h2>

        @if(session('error'))
            <div class="text-red-400 text-sm">{{ session('error') }}</div>
        @endif

        <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 rounded bg-[#2C2F36] text-white" />
        <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 rounded bg-[#2C2F36] text-white" />

        <button type="submit" class="w-full py-2 bg-blue-600 hover:bg-blue-700 rounded">Login</button>
        <p class="text-sm mt-4">No account? <a href="{{ route('register.page') }}" class="text-blue-400 hover:underline">Register here</a></p>
    </form>
</body>
</html>
