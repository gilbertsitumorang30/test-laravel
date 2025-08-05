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
                <div class="d-flex flex-column align-items-end">
                    <div> {{ $blog->created_at }}</div>
                    <div> by Admin</div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
