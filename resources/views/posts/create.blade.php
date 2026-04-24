@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <h1 class="text-xl font-semibold text-gray-800 mb-6">New Post</h1>

    <form method="POST" action="{{ route('posts.store') }}"
          class="bg-white border border-gray-200 rounded-lg p-6 space-y-4">
        @csrf

        <div>
            <label class="text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title"
                   class="mt-1 w-full h-9 px-3 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-300"
                   value="{{ old('title') }}">
            @error('title')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
          <label class="text-sm font-medium text-gray-700">Content</label>
<textarea name="content" rows="4"
          class="mt-1 w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-300">{{ old('content') }}</textarea>
@error('content')
    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
@enderror
        </div>

        <button type="submit"
                class="h-9 px-4 text-sm text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition-colors duration-150">
            Publish
        </button>
    </form>

</div>
@endsection