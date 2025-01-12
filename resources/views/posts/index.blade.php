@extends('layouts.app')

@section('content')
    <div class="text-gray-300 flex justify-center">
        <div class="w-6/12 bg-gray-800 p-6 rounded-lg">

    @guest
                <div class="mb-4">
                    Please login to create posts
                </div>
            @endguest

            @auth

                <form
                    action="{{ route('posts') }}"
                    method="post"
                    class="mb-6"
                >
                @csrf

                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea
                            name="body"
                            id="body"
                            cols="30"
                            rows="4"
                            class="bg-gray-900 rounded-lg p-4 resize-none w-full border-2 focus:outline-none text-gray-400 @error('body') border-red-500 @else border-slate-600 @enderror"
                            placeholder="Post something..."
                        ></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <button type="submit" class="bg-indigo-500 px-4 py-2 rounded-lg text-white">Post</button>
                    </div>

                </form>

            @endauth

            <div class="mt-3">

                @if ($posts->count())

                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <div>

                                {{ $post->id }}

                                <a href="#" class="text-green-500">
                                    {{ $post->user->name }}
                                </a>

                                <span class="text-gray-400 text-sm">
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <p class="mb-2">
                                {{ $post->body }}
                            </p>

                            {{-- @if ($post->ownedBy(auth()->user()))
                                <a
                                    href="{{ route('posts.destroy', $post->id) }}"
                                    class="text-red-500"
                                >
                                    Delete
                                </a>
                            @endif --}}

                            @can('delete', $post)
                                <form
                                    action="{{ route('posts.destroy', $post->id) }}"
                                    method="post"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="text-red-500"
                                    >
                                        Delete
                                    </button>
                                </form>
                            @endcan

                        </div>
                    @endforeach

                    {{ $posts->links() }}

                @else
                    <div class="mb-4">
                        No posts yet
                    </div>
                @endif

            </div>

        </div>
    </div>
@endsection





