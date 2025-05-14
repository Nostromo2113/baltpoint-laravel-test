<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <title>Posts</title>
</head>
<body>
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" style="margin-bottom: 20px">Create New Post</a>
    <div class="posts">
        @foreach($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p><strong>Category:</strong> {{ $post->category->name }}</p>
                <p>{{ $post->content }}</p>
                <div>
                    <strong>Tags:</strong>
                    @foreach($post->tags as $tag)
                        <span>{{ $tag->name }}</span>
                        @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </div>
                <div>
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-del" type="submit" onclick="return confirm('Delete post?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
