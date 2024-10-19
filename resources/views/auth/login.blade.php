@extends('layouts.app')

@section('content')
    <div class="text-gray-300 flex justify-center">
        <div class="w-6/12 bg-gray-800 p-6 rounded-lg">

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email" class="sr-only">Name</label>
                    <input type="text" name="email" id="email" placeholder="Email address"
                        class="bg-gray-800 border-2 border-gray-400 w-full p-4 focus- rounded-lg @error('email') border-red-500 @else border-slate-600 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Name</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="bg-gray-800 border-2 w-full p-4 focus- rounded-lg @error('password') border-red-500 @else border-slate-600 @enderror"
                        value="{{ old('password') }}">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2 w-4 h-4 text-blue-600  border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 bg-gray-700 dark:border-gray-600">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Login
                    </button>
                </div>

                <div>

                    <p>Don't have an account? <a href="{{ route('register') }}" class="text-blue-500"> Register</a></p>
                </div>

        </div>
    </div>
@endsection



