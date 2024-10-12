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
    <a href="/profit/new">Nueva mes</a>
</body>
@if (!$profits->isEmpty())
    @foreach ($profits as $profit)
        <h1>{{ $profit->id }}</h1>
        <h1>{{ $profit->total }}</h1>
        <h1>{{ $profit->income }}</h1>
        <h1>{{ $profit->date }}</h1>
    @endforeach
@endif

</html>
