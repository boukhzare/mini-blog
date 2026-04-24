@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold text-gray-800">My Posts</h1>
        <a href="{{ route('posts.create') }}"
           class="h-8 px-3 text-sm text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition-colors duration-150 flex items-center">
            New Post
        </a>
    </div>

    @forelse($posts as $post)
        <div class="bg-white border border-gray-200 rounded-lg p-5 mb-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-medium text-indigo-600">
                        {{ strtoupper(substr($post->user->name, 0, 2)) }}
                    </div>
                    <span class="text-sm font-medium text-gray-700">{{ $post->user->name }}</span>
                    <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <a href="{{ route('posts.edit', $post->id) }}"
                   class="text-xs text-gray-400 hover:text-indigo-600 transition-colors duration-150">
                    Edit
                </a>
            </div>
            <h2 class="text-base font-semibold text-gray-800">{{ $post->title }}</h2>
            <p class="text-sm text-gray-500 mt-1">{{ $post->content }}</p>
        </div>
    @empty
        <p class="text-sm text-gray-400">No posts yet.</p>
    @endforelse

</div>
@endsection