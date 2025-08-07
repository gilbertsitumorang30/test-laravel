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
            <h1 class="text-center">
                Daftar Blog {{ auth()->user()->name }}
            </h1>

            <div class="table-responsive mt-5">
                <a href="{{ url('/blog/add') }}" class="btn btn-primary mb-3">Add New</a>

                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="title" value="{{ $title }}" class="form-control"
                            placeholder="Search title" aria-label="Recipient’s username"
                            aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>author</th>
                            <th>image</th>
                            <th>rating</th>
                            <th>aksi</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">

                        @if ($data->count() == 0)

                            <td colspan="3">Data tidak ditemukan</td>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ ($data->currentPage() - 1) * $data->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->user->name ?? '-' }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ asset('storage/images/' . $item->image) }}" alt=""
                                                width="50">
                                            {{-- /storage/{{ $item->image }} --}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->ratings->count() == 0)
                                            not rated yet
                                        @else
                                            {{ round(collect($item->ratings->pluck('rating_value'))->avg(), 1) }}
                                        @endif

                                    </td>
                                    <td> <a href="{{ url('/blog/' . $item->id . '/detail') }}"><button type="button"
                                                class="btn btn-primary">detail</button></a> <a
                                            href="{{ url('/blog/' . $item->id . '/edit') }}"><button type="button"
                                                class="btn btn-warning">update</button></a>

                                        <form class="d-inline" action="{{ url('/blog/' . $item->id . '/delete') }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                    </tbody>
                </table>

                {{ $data->links() }}
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

{{-- <p>{{ $data[0] }}</p> --}}



</html>
