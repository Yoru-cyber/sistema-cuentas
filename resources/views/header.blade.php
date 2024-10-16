<nav class="flex flex-row flex-wrap justify-center items-center space-x-5 p-2 text-zinc-800 border-solid border-2 shadow-sm rounded-lg mb-5">
    <a class="inline-flex items-center text-lg tracking-tighter font-semibold" href={{ route('index') }}>Sistema de
        cuentas <x-heroicon-o-home class="w-8 h-8  mx-2" /></a>
    <a href="{{ route('expense.index') }}" class="inline-flex justify-center items-center font-medium tracking-tighter">
        Gastos<x-heroicon-o-shopping-bag class="w-8 h-8  mx-2" />
    </a>
    <a href="{{ route('income.index') }}" class="inline-flex justify-center items-center font-medium tracking-tighter">
        Entradas<x-heroicon-o-currency-dollar class="w-8 h-8 mx-2" />
    </a>
    <a class="inline-flex justify-center items-center font-medium tracking-tighter" href="{{ route('month.index') }}">
        Meses<x-heroicon-o-calendar class="w-8 h-8 " />
    </a>
</nav>
