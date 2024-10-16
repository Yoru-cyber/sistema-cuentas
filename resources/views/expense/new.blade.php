<x-layout.main>
    <x-slot:title>Nuevo Gasto</x-slot:title>
    <div class="flex flex-col w-screen h-screen justify-center items-center">
        <form action="" method="POST" class="w-[90vw] sm:w-3/12 p-5 space-y-5 bg-slate-100  shadow-lg  text-zinc-800">
            <div class="flex flex-col w-full justify-center">
                <div class="inline-flex justify-center items-center">
                    <h1 class="text-center text-xl text-zinc-800">Nuevo Gasto</h1>
                    <x-heroicon-o-shopping-bag  class="w-8 h-8  mx-2" />
                </div>
            </div>
            @csrf

            <div class="form-group">
                <label class="input input-bordered flex items-center gap-2 bg-white" for="name">
                    <x-heroicon-o-pencil-square class="w-6 h-6" />
                    <input type="text" id="name" name="name" class="grow" placeholder="Nombre" required />
                </label>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="input input-bordered flex items-center gap-2 bg-white" for="value">
                    <x-heroicon-o-currency-dollar class="w-6 h-6" />
                    <input type="number" id="value" name="value" class="grow" inputmode="numeric"
                        placeholder="Valor" required />
                </label>
                @error('value')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="input input-bordered flex items-center gap-2 bg-white" for="profit_id">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                    </svg>
                    <input type="number" id="profit_id" name="profit_id" class="grow" placeholder="Mes" required />
                </label>
                @error('profit_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">

                <label class="input input-bordered flex items-center gap-2 bg-white" for="date">
                    <x-heroicon-o-calendar class="w-6 h-6" />
                    <input type="date" id="date" name="date" class="grow" value="Fecha" required />
                </label>
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col w-full justify-center items-center">
                <button type="submit" class="btn btn-outline btn-success">Agregar
                    <x-heroicon-o-document-plus class="w-6 h-6" /></button>
            </div>
        </form>
    </div>
</x-layout.main>
