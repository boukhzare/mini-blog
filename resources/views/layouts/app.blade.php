<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini Blog App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <nav class="bg-white border-b border-gray-200 px-6 h-14 flex items-center justify-between">
        <div class="flex items-center gap-6">
            <a href="{{ route('home') }}" class="text-base font-semibold text-gray-800">Mini_Blog_App</a>
            @if(session('user'))
                <a href="{{ route('posts.index') }}"
                   class="text-sm text-gray-500 hover:text-gray-800 transition-colors duration-150">
                    My Posts
                </a>
            @endif
        </div>

        @if(session('user'))
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-medium text-indigo-600">
                    {{ strtoupper(substr(session('user')['name'], 0, 2)) }}
                </div>
                <span class="text-sm text-gray-500">
                    Welcome, <span class="font-medium text-gray-800">{{ session('user')['name'] }}</span>
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="h-8 px-3 text-sm text-gray-500 border border-gray-200 rounded-md hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition-colors duration-150">
                        Logout
                    </button>
                </form>
            </div>
        @else
            <div class="flex items-center gap-2">
                <a href="{{ route('login') }}"
                   class="h-8 px-3 text-sm text-gray-500 border border-gray-200 rounded-md hover:bg-gray-50 transition-colors duration-150 flex items-center">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="h-8 px-3 text-sm text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition-colors duration-150 flex items-center">
                    Register
                </a>
            </div>
        @endif
    </nav>
    <main class="px-6 py-8">
        @yield('content')
    </main>
</body>
</html>