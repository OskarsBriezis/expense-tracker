@extends('layouts.app')

@section('title', 'Edit Expense')

@section('header', 'Edit Expense')

@section('content')
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date', $expense->date) }}" required>
        </div>

        <div>
            <label for="amount">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount', $expense->amount) }}" required>
        </div>

        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $expense->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes">{{ old('notes', $expense->notes) }}</textarea>
        </div>

        <button type="submit">Update Expense</button>
    </
