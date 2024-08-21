<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Add New Author
            </div>

            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif

            <div class="card-body">
                <form action="{{ route('authors.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter Author's Name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a> <!-- Back button -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>
