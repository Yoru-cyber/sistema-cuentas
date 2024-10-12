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
@include('header')
<body class="h-screen">
            <h1 class="text-3xl text-white font-semibold tracking-tighter text-center">Gastos</h1>
    <div id="content" class="flex flex-col justify-center items-center w-full h-full">
        <div class="overflow-x-auto bg-stone-950 text-white rounded-lg">
        <table class="table table-lg">
            <!-- head -->
            <thead class="text-lg text-zinc-300">
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr id={{$expense->id}}>
                        <th>{{ $expense->id }}</th>
                        <td>{{ $expense->name }}</td>
                        <td>{{ $expense->value }}</td>
                        <td>{{ $expense->date }}</td>
                        <th>
                                    <ul class="flex flex-row space-x-5 justify-center">
                                        <li>
                                            <a class="btn btn-outline btn-warning"><x-heroicon-o-pencil-square class="w-6 h" /></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-outline btn-error"><x-heroicon-o-trash class="w-6 h-6" /></a>
                                        </li>
                                    </ul>
                                </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h1>Total: {{$total}}</h1>
</body>

</html>
{{-- <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $expense->id }}</th>
                                <th>{{ $expense->name }}</th>
                                <th>{{ $expense->value }}</th>
                                <th>{{ $expense->date }}</th>
                                <th>
                                    <ul class="flex flex-row space-x-5 justify-center">
                                        <li>
                                            <button class="btn btn-outline btn-warning">Editar</button>
                                        </li>
                                        <li>
                                            <button class="btn btn-outline btn-error">Eliminar</button>
                                        </li>
                                    </ul>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
