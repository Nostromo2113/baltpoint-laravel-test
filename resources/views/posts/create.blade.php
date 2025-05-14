<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <title>Create Post</title>
</head>
<body>
<div class="container">
    <h1>Create Post</h1>

    <form class="form form--create" method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="input-wrapper">
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>

        <div class="input-wrapper">
            <label>Content:</label>
            <textarea name="content" required></textarea>
        </div>

        <div class="input-wrapper">
            <label>Category:</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-wrapper">
            <label>Tags:</label>
            <select name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to list</a>
</div>
</body>
</html>
