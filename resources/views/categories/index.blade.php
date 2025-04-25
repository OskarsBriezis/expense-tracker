@extends('layouts.app')

@section('title', 'Categories')

@section('header', 'Categories List')

@section('content')
    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Category Name</th>
                <th class="px-4 py-2 border-b">Color</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="px-4 py-2" style="background-color: {{ $category->hex_color }}">{{ $category->hex_color }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <!-- Edit Button -->
                        <form action="{{ route('categories.edit', $category->id) }}" method="GET" class="inline-block">
                            <button type="submit" 
                                    class="w-10 h-10 bg-blue-500 text-white rounded hover:bg-blue-600 flex items-center justify-center transition-colors duration-300">
                                ✏️
                            </button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-10 h-10 bg-red-500 text-white rounded-full hover:bg-red-600 flex items-center justify-center transition-colors duration-300" 
                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                🗑️
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
