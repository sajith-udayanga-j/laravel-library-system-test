@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Authors
            <a href="{{ route('authors.create') }}" class="btn btn-success btn-sm float-end">Add New</a>
        </div>

        @if (Session::has('fail'))
        <div class="alert alert-danger p-2">{{ Session::get('fail') }}</div>
        @endif

        @if (Session::has('success'))
        <div class="alert alert-success p-2">{{ Session::get('success') }}</div>
        @endif
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Registration Date</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($authors as $author)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->created_at->format('d-m-Y') }}</td>
                        <td>{{ $author->updated_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Authors Found</td>
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
        return confirm("Are you sure you want to remove this author?");
    }
</script>