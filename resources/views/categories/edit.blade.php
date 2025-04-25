@extends('layouts.app')

@section('title', 'Edit Category')

@section('header', 'Edit Category')

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div>
            <label for="hex_color">Category Color (Hex)</label>
            <input type="text" name="hex_color" id="hex_color" value="{{ old('hex_color', $category->hex_color) }}" required>
        </div>

        <button type="submit">Update Category</button>
    </form>
@endsection
