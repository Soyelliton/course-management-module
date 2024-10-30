@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Instructor</h1>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <form action="{{ route('instructors.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input class="form-control" type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div><br>

            <button type="submit" class="btn btn-primary">Create Instructor</button>
        </form>
    </div>
@endsection
