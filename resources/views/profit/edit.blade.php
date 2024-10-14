<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Expenses</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="w-screen h-screen">
    @include('header')
    <form action="" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="number" id="name" name="name" class="form-control" step="any"
                value={{ $expense->name }} required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="value">Valor</label>
            <input type="number" id="value" name="value" class="form-control" step="any"
                value={{ $expense->value }} required>
            @error('value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="profit_id">Mes y Año</label>
            <input type="number" id="profit_id" name="profit_id" class="form-control" step="any"
                value={{ $expense->profit_id }} required>
            @error('profit_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value={{ $expense->date }} required>
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
