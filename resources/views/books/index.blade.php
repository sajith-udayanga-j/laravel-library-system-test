@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Books
            <a href="{{ route('books.create') }}" class="btn btn-success btn-sm float-end">Add New</a>
        </div>

        @if (Session::has('success'))
        <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
        @endif

        @if (Session::has('fail'))
        <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
        @endif

        <div class="card-body">

        <form action="{{ route('books.index') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="author_id" class="form-select" aria-label="Filter by Author">
                            <option value="">Select Author</option>
                            @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
            
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Registration Date</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->created_at->format('d-m-Y') }}</td>
                        <td>{{ $book->updated_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No Books Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this book?");
    }
</script>
