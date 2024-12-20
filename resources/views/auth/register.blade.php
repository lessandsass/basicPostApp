@extends('layouts.app')

@section('content')
    <div class="text-gray-300 flex justify-center">
        <div class="w-6/12 bg-gray-800 p-6 rounded-lg">

            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Your name"
                        class="bg-gray-800 border-2 w-full p-4 focus- rounded-lg @error('name') border-red-500 @else border-slate-600 @enderror"
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Name</label>
                    <input type="text" name="email" id="email" placeholder="Email address"
                        class="bg-gray-800 border-2 w-full p-4 focus- rounded-lg @error('email') border-red-500 @else border-slate-600 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Choose a username"
                        class="bg-gray-800 border-2 w-full p-4 focus- rounded-lg @error('username') border-red-500 @else border-slate-600 @enderror"
                        value="{{ old('username') }}"
                    >
                    @error('username')
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
                    <label for="password_confirmation" class="sr-only">Name</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password again"
                        class="bg-gray-800 border-2 w-full p-4 focus- rounded-lg @error('password') border-red-500 @else border-slate-600 @enderror"
                        value="{{ old('password') }}">
                    
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Register
                    </button>
                </div>

                <div>
                    <p>Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
                </div>

        </div>
    </div>
@endsection



