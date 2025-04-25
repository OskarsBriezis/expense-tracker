@extends('layouts.app')

@section('title', 'Create Expense')

@section('header', 'Create New Expense')

@section('content')
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div>
            <label for="amount">Amount (€)</label>
            <input type="number" step="0.01" name="amount" id="amount" required>
        </div>

        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes"></textarea>
        </div>

        <button type="submit">Create Expense</button>
    </form>
@endsection
