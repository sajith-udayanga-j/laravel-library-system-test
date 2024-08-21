<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Author Details
            </div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('authors.update', $author->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->
                    <input type="hidden" name="author_id" value="{{ $author->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Author Name</label>
                        <input type="text" name="name" value="{{ $author->name }}" class="form-control" id="name" placeholder="Enter Author Name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- <div class="mb-3">
                        <label for="bio" class="form-label">Biography</label>
                        <textarea name="bio" class="form-control" id="bio" placeholder="Enter Author Biography">{{ $author->bio }}</textarea>
                        @error('bio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input type="date" name="birthdate" value="{{ $author->birthdate }}" class="form-control" id="birthdate">
                        @error('birthdate')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> -->

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
