<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
      </head>
<body>

<div class="w-4/5 m-auto text-left">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            Edit: {{ $post->title }}
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

    @if ($errors->any())
    <div class="mx-auto w-4/5 py-2">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Warning
        </div>
        <div class="border border-t-1 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            {{ session()->get('message') }}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="w-4/5 m-auto pt-5">
    <form
        action="{{ route('blog.update', $post->id) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="flex items-center pl-4 mb-5">
            <input type="checkbox" name="is_published" class="w-6 h-6 text-green-500 bg-gray-100 border-gray-300 rounded focus:ring-green-300 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="is_published" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Is Published</label>
        </div>

        <input
            type="text"
            name="title"
            value="{{ $post->title }}"
            class="bg-transparent block w-full h-20 text-2xl outline-none focus:ring-green-300 dark:focus:ring-green-600 mb-5 border-green-700 rounded-lg">

        <input
            type="text"
            name="excerpt"
            value="{{ $post->excerpt }}"
            class="bg-transparent block w-full h-20 text-2xl outline-none focus:ring-green-300 dark:focus:ring-green-600 mb-5 border-green-700 rounded-lg">

        <input
            type="number"
            name="min_to_read"
            value="{{ $post->min_to_read }}"
            class="bg-transparent block w-full h-20 text-2xl outline-none focus:ring-green-300 dark:focus:ring-green-600 mb-5 border-green-700 rounded-lg">

        <textarea
            name="body"
            placeholder="Body..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none focus:ring-green-300 dark:focus:ring-green-600 mb-5 border-green-700 rounded-lg">
            {{ $post->body }}
        </textarea>
            
        <div class="bg-grey-lighter py-10">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                <input
                    type="file"
                    name="image_path"
                    class="hidden">
            </label>
        </div>

        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>
    </form>
</div>
</body>
</html>