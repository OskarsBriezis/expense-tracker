<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Expense Tracker')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <h1>@yield('header', 'Welcome to Expense Tracker')</h1>
        <nav>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('expenses.index') }}">Expenses</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Expense Tracker</p>
    </footer>
</body>
</html>
