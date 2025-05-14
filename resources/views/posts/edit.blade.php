<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <title>Edit Post</title>
</head>
<body>
<div class="container">
    <h1>Edit Post</h1>

    <form class="form form--create" method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <div class="input-wrapper">
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="input-wrapper">
            <label>Content:</label>
            <textarea name="content" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="input-wrapper">
            <label>Category:</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="input-wrapper">
            <label>Tags:</label>
            <select name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update Post</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to list</a>
</div>
</body>
</html>
