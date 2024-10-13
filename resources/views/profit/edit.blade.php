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
            <label for="income">Income</label>
            <input type="number" id="income" name="income" class="form-control" step="any" value={{$profit->income}} required>
            @error('income')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" id="total" name="total" class="form-control" step="any" value={{$profit->total}} required>
            @error('total')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value={{$profit->date}} required>
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
