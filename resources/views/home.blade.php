@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold text-gray-800">Latest Posts</h1>
        @if(session('user'))
            <a href="{{ route('posts.create') }}"
               class="h-8 px-3 text-sm text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition-colors duration-150 flex items-center">
                New Post
            </a>
        @endif
    </div>

    @forelse($posts as $post)
        <div class="bg-white border border-gray-200 rounded-lg p-5 mb-4">
            <div class="flex items-center gap-2 mb-3">
                <div class="w-7 h-7 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-medium text-indigo-600">
                    {{ strtoupper(substr($post->user->name, 0, 2)) }}
                </div>
                <span class="text-sm font-medium text-gray-700">{{ $post->user->name }}</span>
                <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-base font-semibold text-gray-800">{{ $post->title }}</h2>
            <p class="text-sm text-gray-500 mt-1">{{ $post->content }}</p>

            <div class="flex items-center justify-between mt-3">
                <span class="text-xs text-gray-400">{{ $post->likes->count() }} likes</span>
                @if(session('user'))
                    <form method="POST" action="{{ route('posts.like', $post->id) }}">
                        @csrf
                        @php
                            $liked = $post->likes->contains('user_id', session('user')['id']);
                        @endphp
                        <button type="submit"
                                class="text-sm px-3 h-7 rounded-md border transition-colors duration-150
                                {{ $liked ? 'bg-indigo-600 text-white border-indigo-600' : 'text-gray-500 border-gray-200 hover:bg-indigo-50 hover:text-indigo-600' }}">
                            {{ $liked ? '♥ Liked' : '♡ Like' }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <p class="text-sm text-gray-400">No posts yet.</p>
    @endforelse
</div>
@endsection