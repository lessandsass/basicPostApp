@extends('layouts.app')

@section('content')
    <div class="text-gray-300 flex justify-center">
        <div class="w-6/12 bg-gray-800 p-6 rounded-lg">

            <div class="mt-3">

                @if ($posts->count())

                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <div>
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

                    {{-- {{ $posts->links() }} --}}

                @else
                    <div class="mb-4">
                        No posts yet
                    </div>
                @endif

            </div>

        </div>
    </div>
@endsection





