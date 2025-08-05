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
            <h2 class="mb-5">Edit blog : {{ $blog->title }} </h2>
            @if ($errors->any())
                <div class="alert alert-danger col-md-6" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('/blog/' . $blog->id . '/update') }}" method="POST">
                @csrf
                @method('patch')
                <div class="col-md-6">
                    <label for="title" class="form-label">Title : </label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $blog->title }}">
                </div>
                <div class="col-md-6">
                    <label for="title" class="form-label">Description : </label>
                    <textarea type="text" name="body" rows="4" class="form-control" id="body"> {{ $blog->body }}</textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <button class="btn btn-success form-control">Save</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>
