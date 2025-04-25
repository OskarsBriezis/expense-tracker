@extends('layouts.app')

@section('title', 'Create Category')

@section('header', 'Create New Category')

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="hex_color">Category Color (Hex)</label>
            <input type="text" name="hex_color" id="hex_color" value="#000000" required>
        </div>

        <button type="submit">Create Category</button>
    </form>
@endsection
