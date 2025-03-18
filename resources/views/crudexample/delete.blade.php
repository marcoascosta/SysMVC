@extends('layout')

@section('title', 'Crud example Delete')

@section('content')
<div class="container mt-5">
    <h1 class="text-danger">Blade - Crud example Delete</h1>
    <form action="/clients/delete/{{ $client['id'] }}" method="POST">
        <input type="hidden" name="_method" value="POST"> <!-- Ensure that POST is used -->
        <p class="text-warning">
            Are you sure you want to delete client {{ $client['name'] }}?
        </p>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="/clients" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection







