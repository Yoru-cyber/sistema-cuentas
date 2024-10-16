@php use Carbon\Carbon; @endphp
<x-layout.main>
    <x-slot:title>Entradas</x-slot:title>
    <h1 class="text-3xl text-zinc-800 font-semibold tracking-tighter text-center">Entradas</h1>
    <div class="flex flex-col justify-center items-center w-full">
        <form action="" method="GET" class="flex flex-col sm:flex-row flex-wrap justify-center w-fit sm:space-x-3">
            <div class="form-group">
                <label class="input input-bordered flex items-center gap-2 bg-white" for="name">
                    <x-heroicon-o-magnifying-glass class="w-6 h-6"/>
                    <input type="text" id="name" name="name" class="grow" placeholder="Nombre"/>
                </label>
            </div>
            <div class="form-group">

                <label class="input input-bordered flex items-center gap-2 bg-white" for="date">
                    <x-heroicon-o-calendar class="w-6 h-6"/>
                    <input type="text" id="date" name="date" class="grow" placeholder="Fecha"/>
                </label>
            </div>

            <button class="btn btn-outline btn-info order-1" type="submit">
                <x-heroicon-o-magnifying-glass
                    class="w-6 h-6"/>
                Buscar
            </button>

        </form>
    </div>
    <div id="content" class="flex flex-col items-center w-screen h-screen mt-5">
        <div
            class="overflow-x-auto bg-white border-solid border-2 lg:w-3/6 w-screen border-zinc-200 shadow-2xl text-zinc-700 rounded-lg">
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
                @foreach ($incomes as $income)
                    <tr id={{ $income->id }}>
                        <th>{{ $income->id }}</th>
                        <td>{{ $income->name }}</td>
                        <td>{{ $income->value }}</td>
                        <td>{{ Carbon::parse($income->date)->locale('es')->isoFormat('DD MMMM YYYY') }}
                        </td>
                        <th>
                            <ul class="flex flex-row space-x-5 justify-center">
                                <li>
                                    <a class="btn btn-outline btn-warning"
                                       href="{{ route('income.edit', $income->id) }}">
                                        <x-heroicon-o-pencil-square
                                            class="w-6 h-6"/>
                                    </a>
                                </li>
                                <li>
                                    <form action={{ route('income.destroy', $income->id) }} method="POST">
                                        @csrf
                                        <button class="btn btn-outline btn-error"
                                                onclick="return confirm('¿Está seguro de borrar este elemento?\nEsta acción es irreversible.')">
                                            <x-heroicon-o-trash
                                                class="w-6 h-6"/>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $incomes->links() }}
        </div>
    </div>
    <a href="{{ route('income.new') }}"
       class="btn btn-outline btn-success fixed w-fit bottom-0 right-0 mb-10 sm:mb-5 m-2 p-2">Nueva Entrada
        <x-heroicon-o-document-plus class="w-6 h-6"/>
    </a>
</x-layout.main>
