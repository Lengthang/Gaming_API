<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#101014] text-white flex items-center justify-center min-h-screen">
    <form method="POST" action="{{ route('register.user') }}" class="bg-[#1A1D24] p-8 rounded-xl shadow-lg w-96 space-y-4">
        @csrf
        <h2 class="text-2xl font-bold mb-4">Register</h2>

        @if ($errors->any())
            <div class="text-red-400 text-sm">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <input type="text" name="name" placeholder="Name" required class="w-full px-4 py-2 rounded bg-[#2C2F36] text-white" />
        <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 rounded bg-[#2C2F36] text-white" />
        <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 rounded bg-[#2C2F36] text-white" />
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full px-4 py-2 rounded bg-[#2C2F36] text-white" />

        <button type="submit" class="w-full py-2 bg-blue-600 hover:bg-blue-700 rounded">Register</button>
        <p class="text-sm mt-4">Already have an account? <a href="{{ route('login.page') }}" class="text-blue-400 hover:underline">Login here</a></p>
    </form>
</body>
</html>
