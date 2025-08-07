<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="mt-5">
            <h2 class="text-center">
                {{ $blog->title }}
            </h2>
            <div class="blog-body">
                <p>{{ $blog->body }}</p>

                @foreach ($blog->tags as $tag)
                    <span class="p-2 bg-secondary rounded me-2 text-white"> {{ $tag->name }}</span>
                @endforeach
                <div class="d-flex flex-column align-items-end">


                    <div> {{ $blog->created_at }}</div>
                    <div> {{ $blog->user->name ?? 'unknown' }}</div>
                </div>
            </div>



            <div class="mt-5">
                <h5>Comment : </h5>
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form id="form-comment" action="{{ url('/comment/' . $blog->id) }}" method="post">
                    @csrf
                    <textarea class="form-control" style="resize: none" name="comment_text" id="comment_text" cols="30" rows="5"></textarea>
                    <button type="submit" class="mt-3 btn btn-primary">
                        submit
                    </button>
                </form>
            </div>
            <div class="mt-4">
                @foreach ($blog->comments as $comment)
                    <div class="shadow-none p-3 mb-5 bg-body-tertiary rounded">
                        <p> {{ $comment->comment_text }} </p>
                        <p>Comented at : {{ $comment->created_at }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

</body>

</html>
