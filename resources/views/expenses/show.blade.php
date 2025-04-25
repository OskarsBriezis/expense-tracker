<!-- resources/views/expenses/show.blade.php -->

@extends('layouts.app')

@section('title', 'Expense Details')

@section('content')
    <h1>Expense Details</h1>
    <p><strong>Name:</strong> {{ $expense->name }}</p>
    <p><strong>Amount:</strong> €{{ number_format($expense->amount, 2) }}</p>
    <p><strong>Category:</strong> {{ $expense->category->name }}</p>
    <p><strong>Date:</strong> {{ $expense->date }}</p>
    <p><strong>Notes:</strong> {{ $expense->notes }}</p>

    <a href="{{ route('expenses.index') }}">Back to Expenses List</a>
@endsection
