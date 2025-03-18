@extends('layout')

@section('title', 'Crud Example Show')

@section('content')
<div class="container mt-5">
    <h1 class="text-info">Blade - Crud Example Show</h1>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $crudexample['id'] }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $crudexample['name'] }}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>{{ $crudexample['company'] }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $crudexample['address'] }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $crudexample['phone'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $crudexample['email'] }}</td>
        </tr>
        <tr>
            <th>Notes</th>
            <td>{{ $crudexample['notes'] }}</td>
        </tr>
    </table>
    <a href="/crudexample/edit/{{ $crudexample['id'] }}" class="btn btn-warning me-2">Edit</a>
    
    <!-- Delete form -->
    <form action="/crudexample/delete/{{ $crudexample['id'] }}" method="POST" style="display:inline;">
        <input type="hidden" name="_method" value="POST">
        <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    
    <a href="/crudexample" class="btn btn-secondary">Back to List</a>
</div>
@endsection
