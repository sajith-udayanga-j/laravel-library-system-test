@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Reports
            <form action="{{ route('reports.pdf') }}" method="GET" target="_blank">
                @csrf
                <div class="form-group">
                    <label for="from_date" class="mt-3">From Date:</label>
                    <input type="date" name="from_date" id="from_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="to_date" class="mt-3">To Date:</label>
                    <input type="date" name="to_date" id="to_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Generate Report</button>
            </form>

        </div>

        
@endsection
