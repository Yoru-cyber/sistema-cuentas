<nav class="flex flex-row bg-stone-900 space-x-5 p-2 text-white border-solid border-2 border-zinc-600 rounded-lg">
    <a class="text-lg tracking-tighter font-semibold text-zinc-100" href={{ route('index') }}>Sistema de
        cuentas</a>
    <a href="/">
        <x-heroicon-o-home class="w-8 h-8 text-white" />
    </a>
    <a href={{ route('expenses.index') }}>
        <x-heroicon-o-currency-dollar class="w-8 h-8 text-white" />
    </a>
    <a href={{ route('profit.index') }}>
        <x-heroicon-o-calendar class="w-8 h-8 text-white" />
    </a>
</nav>
