<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Image</title>
</head>

<body>

    <form action="/upload-image" method="post" enctype="multipart/form-data">
        @csrf
        <input name="image" type="file">
        <button type="submit">Upload</button>
    </form>
</body>

</html>
