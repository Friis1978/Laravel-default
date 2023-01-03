<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
      </head>
<body>
    @forelse ($posts as $post)
        <p>{{ $post->created_at }}</p>
    @empty
        <p>No posts have been set</p>
    @endforelse
</body>
</html>