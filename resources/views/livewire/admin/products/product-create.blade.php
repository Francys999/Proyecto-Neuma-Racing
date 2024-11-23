<div>
    <form wire:submit="store">
        <figure class="mb-4 relative w-full h-[900px]"> <!-- Establece una altura fija -->
            <div class="absolute top-8 right-8">
                <label class="flex items-center px-4 py-2 rounded-lg bg-white cursor-pointer">
                    <i class="fa-solid fa-camera-retro mr-2"></i>
                    Actualizar imagen
                    <input type="file" class="hidden" accept="image/*" wire:model="image">
                </label>
            </div>

            <img class="w-full h-full object-cover object-center"
                src="{{ $image ? $image->temporaryUrl() : asset('images/notavailable.jpeg') }}" alt="">
        </figure>

    <!-- Errores de Validación -->
    <x-validation-errors class="mb-4" />

    <!-- Tarjeta -->
    <div class="card p-4 md:p-6 space-y-4 bg-white shadow-md rounded-lg">
        <!-- Código -->
        <div>
            <x-label class="mb-1">Código</x-label>
            <x-input wire:model="product.sku" class="w-full" placeholder="Por favor ingrese el código del producto" />
        </div>

        <!-- Nombre -->
        <div>
            <x-label class="mb-1">Nombre</x-label>
            <x-input wire:model="product.name" class="w-full" placeholder="Por favor ingrese el nombre del producto" />
        </div>

        <!-- Descripción -->
        <div>
            <x-label class="mb-1">Descripción</x-label>
            <x-textarea wire:model="product.description" class="w-full" placeholder="Por favor ingrese la descripción del producto" />
        </div>

        <!-- Categorías -->
        <div>
            <x-label class="mb-1">Categorías</x-label>
            <x-select class="w-full" wire:model.live="product.category_id">
                <option value="" disabled>Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-select>
        </div>

        <!-- Precio -->
        <div>
            <x-label class="mb-1">Precio</x-label>
            <x-input type="number" step="0.01" wire:model="product.price" class="w-full" placeholder="Por favor ingrese el precio del producto" />
        </div>

        <!-- Botón -->
        <div class="flex justify-end">
            <x-button>
                Crear producto
            </x-button>
        </div>
    </div>
</form>
