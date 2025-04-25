<!-- resources/views/expenses/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses List</title>
</head>
<body>
    <header>
        <h1>Expenses List</h1>
    </header>

    <div class="content">
        <ul>
            @foreach($expenses as $expense)
                <li>
                    <strong>{{ $expense->amount }} €</strong> 
                    - {{ $expense->notes ?? 'No notes' }} 
                    - <strong>{{ $expense->category->name }}</strong>
                    - <span style="color: {{ $expense->category->hex_color }}">{{ $expense->category->hex_color }}</span>
                    <a href="{{ route('expenses.show', $expense->id) }}">View</a>
                    <a href="{{ route('expenses.edit', $expense->id) }}">Edit</a>
                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <footer>
        <p>&copy; 2025 My Application</p>
    </footer>
</body>
</html>
