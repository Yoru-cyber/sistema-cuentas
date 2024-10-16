<x-layout.main>
    <x-slot:title>Meses</x-slot:title>
    <div class="flex flex-col h-screen w-screen items-center p-2">
        <ul class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-zinc-800 w-fit">
            @foreach ($months as $month)
                <li class="p-5 shadow-lg bg-zinc-100 text-xl rounded-lg text-center">
                    <a
                        href={{ '/expense?date=' .\Carbon\Carbon::parse($month->formatted_date)->locale('es')->isoFormat('YYYY-MM') }}>{{ \Carbon\Carbon::parse($month->formatted_date)->locale('es')->isoFormat('MMMM YYYY') }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout.main>
