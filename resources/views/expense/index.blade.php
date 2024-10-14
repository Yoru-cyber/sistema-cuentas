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

<body>
    <h1 class="text-3xl text-zinc-800 font-semibold tracking-tighter text-center">Gastos</h1>
    <div id="content" class="flex flex-col items-center w-screen h-screen mt-5">
        <div class="overflow-x-auto bg-white border-solid border-2 w-3/6 border-zinc-200 shadow-2xl text-zinc-700 rounded-lg">
            <table class="table table-sm">
                <!-- head -->
                <thead class="text-lg text-zinc-600 text-center">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Valor</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($expenses as $expense)
                        <tr id={{ $expense->id }}>
                            <th>{{ $expense->id }}</th>
                            <td>{{ $expense->name }}</td>
                            <td>{{ $expense->value }}</td>
                            <td>{{ \Carbon\Carbon::parse($expense->date)->locale('es')->isoFormat('DD MMMM YYYY') }}
                            </td>
                            <th>
                                <ul class="flex flex-row space-x-5 justify-center">
                                    <li>
                                        <a class="btn btn-outline btn-warning"
                                            href={{ route('expense.edit', $expense->id) }}><x-heroicon-o-pencil-square
                                                class="w-6 h-6" /></a>
                                    </li>
                                    <li>
                                        <form action={{ route('expense.destroy', $expense->id) }} method="POST">
                                            @csrf
                                            <button class="btn btn-outline btn-error"
                                                onclick="return confirm('¿Está seguro de borrar este elemento?\nEsta acción es irreversible.')"><x-heroicon-o-trash
                                                    class="w-6 h-6" /></button>
                                        </form>
                                    </li>
                                </ul>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                 {{ $expenses->links() }}
            <a href={{ route('expense.new') }}
                class="btn btn-outline btn-success fixed w-36 bottom-0 right-0 mb-5 m-2 p-2">Nuevo Gasto
                <x-heroicon-o-document-plus class="w-6 h-6" /></a>
        </div>
</body>

</html>