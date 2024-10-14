<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Meses</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    @include('header')
    <div class="flex flex-col h-screen w-screen items-center">
        <ul class="grid grid-cols-4 gap-5 text-zinc-800 m-2 w-fit">
            @foreach ($months as $month)
                <li class="p-5 shadow-lg bg-zinc-100 text-xl rounded-lg">
                    <a href={{ '/expense?date='.\Carbon\Carbon::parse($month->formatted_date)->locale('es')->isoFormat('YYYY-MM')}}>{{ \Carbon\Carbon::parse($month->formatted_date)->locale('es')->isoFormat('MMMM YYYY')  }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
