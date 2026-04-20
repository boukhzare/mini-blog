<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">

    <nav class="bg-white border-b border-gray-200 px-6 h-14 flex items-center justify-between">

        <span class="text-base font-semibold text-gray-800">MyApp</span>

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
        @endif

    </nav>

    <main class="px-6 py-8">
        @yield('content')
    </main>
</body>
</html>