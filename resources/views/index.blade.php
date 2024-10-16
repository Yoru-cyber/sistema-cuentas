<x-layout.main>
    <div class="flex flex-col h-screen w-screen justify-center items-center">
        <h1 class="text-3xl text-zinc-800 tracking-tighter font-semibold mb-2">Acciones rápidas</h1>
        <ul class="flex flex-row space-x-3">
            <li><a href="{{ route('expense.new') }}" class="btn btn-outline btn-primary w-fit p-2">Nuevo gasto</a></li>
            <li><a href="{{route('income.new')}}" class="btn btn-outline btn-secondary w-fit p-2">Nuevo entrada</a></li>
        </ul>
    </div>
</x-layout.main>
