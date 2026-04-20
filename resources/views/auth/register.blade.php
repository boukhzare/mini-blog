<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center px-4">

    <div class="bg-white w-full max-w-md rounded-xl border border-gray-200 p-8 shadow-sm">

        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-1">Create an account</h2>
        <p class="text-sm text-gray-500 text-center mb-6">Fill in your details to get started</p>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg px-4 py-3 mb-5">
                @foreach ($errors->all() as $error)
                    <p class="text-sm text-red-600">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Full name</label>
                <input type="text" name="name" required value="{{ old('name') }}"
                   
                    class="w-full h-10 px-3 border border-gray-300 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Email address</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                    
                    class="w-full h-10 px-3 border border-gray-300 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                <input type="password" required name="password"
    
                    class="w-full h-10 px-3 border border-gray-300 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <button type="submit"
                class="w-full h-10 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors duration-150">
                Create account
            </button>

            <div class="flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-400">or</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <p class="text-center text-sm text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 font-medium hover:underline">Sign in</a>
            </p>

        </form>
    </div>

</body>
</html>