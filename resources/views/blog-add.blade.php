<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

    <style>
        #body {
            resize: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mt-5">
            <h2 class="mb-5">Add New blog data</h2>
            @if ($errors->any())
                <div class="alert alert-danger col-md-6" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('/blog/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="title" class="form-label">Title : </label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title') }}">
                </div>
                <div class="col-md-6">
                    <label for="title" class="form-label">Description : </label>
                    <textarea type="text" name="body" rows="4" class="form-control" id="body"> {{ old('body') }}</textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="col-md-6 mt-3">
                    <button class="btn btn-success form-control">Save</button>
                </div>

            </form>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</html>
