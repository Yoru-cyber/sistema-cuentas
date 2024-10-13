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

<body>
    @include('header')
    <div class="flex flex-col p-5 w-screen h-screen" id="content">
        @if (!$profits->isEmpty())
            <div class="grid grid-cols-4 gap-4">
                @foreach ($profits as $profit)
                    <div>
                        <a href={{ '/profit/' . $profit->id }}>
                            <div class="card bg-[#212121] w-80 shadow-xl" id={{ $profit->id }}>
                                <div class="card-body text-center">
                                    <h2 class="text-2xl">
                                        {{ \Carbon\Carbon::parse($profit->date)->locale('es')->isoFormat('MMMM YYYY') }}
                                    </h2>
                                    <p>Entrada del mes: {{ $profit->income }}</p>
                                    <p>Total restante: {{ $profit->total }}</p>
                                    <div class="card-actions justify-end">
                                        <ul class="flex flex-row space-x-5 justify-center">
                                            <li>
                                                <a class="btn btn-outline btn-warning" href={{route('profit.edit', $profit->id)}}><x-heroicon-o-pencil-square
                                                        class="w-6 h-6" /></a>
                                            </li>
                                            <li>
                                                <form action={{ route('profit.destroy', $profit->id) }} method="POST">
                                                    @csrf
                                                    <button class="btn btn-outline btn-error"
                                                        onclick="return confirm('¿Está seguro de borrar este elemento?\nEsta acción es irreversible.')"><x-heroicon-o-trash
                                                            class="w-6 h-6" /></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col h-full w-full justify-center">
                <h1 class="text-3xl text-center">No hay entradas actualmente</h1>
            </div>
        @endif
      
            {{ $profits->links() }}
     

    </div>
        <a href="/profit/new" class="btn btn-outline btn-success fixed w-36 bottom-0 right-0 mb-5 m-2">Nuevo mes
            <x-heroicon-o-document-plus class="w-6 h-6" /></a>
</body>

</html>
