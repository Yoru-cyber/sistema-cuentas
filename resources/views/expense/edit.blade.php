<x-layout.main>
    <x-slot:title>Actualizar Gasto</x-slot:title>
    <div class="flex flex-col justify-center items-center w-screen h-screen">
        <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="value">Valor</label>
            <input type="number" id="value" name="value" class="form-control" value={{ $expense->value }}
                required>
            @error('value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="profit_id">Mes</label>
            <input type="number" id="profit_id" name="profit_id" class="form-control" value={{ $expense->profit->id }}
                required>
            @error('profit_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" id="date" name="date" class="form-control" value={{ $expense->date }}
                required>
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</x-layout.main>
