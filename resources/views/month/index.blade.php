<x-layout.main>
    <x-slot:title>Meses</x-slot:title>
    <div class="flex flex-col h-screen w-screen items-center">
        <ul class="grid grid-cols-4 gap-5 text-zinc-800 m-2 w-fit">
            @foreach ($months as $month)
                <li class="p-5 shadow-lg bg-zinc-100 text-xl rounded-lg">
                    <a
                        href={{ '/expense?date=' .\Carbon\Carbon::parse($month->formatted_date)->locale('es')->isoFormat('YYYY-MM') }}>{{ \Carbon\Carbon::parse($month->formatted_date)->locale('es')->isoFormat('MMMM YYYY') }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout.main>
