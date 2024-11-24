<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Basic Post App</title>
</head>

<body class="bg-gray-900">

    <nav class="bg-gray-800 p-6 text-gray-300 flex justify-between">

        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
        </ul>

        <ul class="flex items-center">

            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <a href="">Logout</a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endauth

        </ul>

    </nav>

    <div class="container mx-auto mt-6 px-6">
        @yield('content')
    </div>

</body>
</html>
