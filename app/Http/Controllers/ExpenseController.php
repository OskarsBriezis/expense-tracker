<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;

class ExpenseController
{
    // Display a listing of the expenses
    public function index()
    {
        $expenses = Expense::with('category')->get(); // Eager load the category for each expense
        return view('expenses.index', compact('expenses'));
    }

    // Show the form for creating a new expense
    public function create()
    {
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('expenses.create', compact('categories'));
    }

    // Store a newly created expense in the database
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'notes' => 'nullable|string',
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index');
    }

    // Display the specified expense
    public function show($id)
    {
        $expense = Expense::with('category')->findOrFail($id); // Eager load the category for this expense
        return view('expenses.show', compact('expense'));
    }

    // Show the form for editing the specified expense
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('expenses.edit', compact('expense', 'categories'));
    }

    // Update the specified expense in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'notes' => 'nullable|string',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('expenses.index');
    }

    // Remove the specified expense from the database
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index');
    }
}
