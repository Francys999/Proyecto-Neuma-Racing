<div class="card">

    <div class="mb-4">
        <x-label class="mb-1">
            Código
        </x-label>

        <x-input wire:model="product.sku" class="w-full" placeholder="Por favor ingrese el código del producto" /> 
    </div>

    <div class="mb-4">
        <x-label class="mb-1">
            Nombre
        </x-label>

        <x-input wire:model="product.name" class="w-full" placeholder="Por favor ingrese el nombre del producto" />
    </div>

    <div class="mb-4">
        <x-label class="mb-1">
            Descripción
        </x-label>
        
        <x-textarea wire:model="product.description" class="w-full" placeholder="Por favor ingrese la descripción del producto" />
    </div>

    <div class="mb-4">
        <x-label class="mb-1">
            Categorias
        </x-label>

        <x-select class="w-full">
            
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }} 
                </option>
            @endforeach

        </x-select>
    </div>

</div>

