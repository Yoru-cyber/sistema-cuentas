<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema cuentas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    @include('header')
    <div class="flex flex-col h-screen w-screen justify-center items-center">
        <h1 class="text-3xl text-zinc-800 tracking-tighter font-semibold mb-2">Acciones rápidas</h1>
        <ul class="flex flex-row space-x-3">
            <li><a href={{ route('expense.new') }} class="btn btn-outline btn-primary w-fit p-2">Nuevo gasto</a></li>
            <li><a class="btn btn-outline btn-secondary w-fit p-2">Nuevo entrada</a></li>
            <li><a class="btn btn-outline btn-accent w-fit p-2" href="/profit/new">Nuevo Mes</a></li>
        </ul>
    </div>
</body>

</html>
