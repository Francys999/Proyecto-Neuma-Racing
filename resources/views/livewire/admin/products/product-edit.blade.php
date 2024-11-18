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
                src="{{ $image ? $image->temporaryUrl() : Storage::url($productEdit['image_path'])}}" alt="">
        </figure>

        <x-validation-errors class="mb-4" />

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">Código</x-label>
                <x-input wire:model="productEdit.sku" class="w-full"
                    placeholder="Por favor ingrese el código del producto" />
            </div>

            <div class="mb-4">
                <x-label class="mb-1">Nombre</x-label>
                <x-input wire:model="productEdit.name" class="w-full"
                    placeholder="Por favor ingrese el nombre del producto" />
            </div>

            <div class="mb-4">
                <x-label class="mb-1">Descripción</x-label>
                <x-textarea wire:model="productEdit.description" class="w-full"
                    placeholder="Por favor ingrese la descripción del producto" />
            </div>

            <div class="mb-4">
                <x-label class="mb-1">Categorias</x-label>
                <x-select class="w-full" wire:model.live="productEdit.category_id">
                    <option value="" disabled>Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Precio
                </x-label>

                <x-input type="number" step="0.01" wire:model="productEdit.price" class="w-full"
                    placeholder="Por favor ingrese el precio del producto" />
            </div>

            @empty($product->variants->count() > 0)

                <div class="mb-4">
                    <x-label class="mb-1">
                        Stock
                    </x-label>

                    <x-input type="number" wire:model="productEdit.stock" class="w-full"
                        placeholder="Por favor ingrese el stock del producto" />
                </div>

            @endempty

            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>

                <x-button class="ml-2">
                    Actualizar
                </x-button>
            </div>

        </div>
    </form>

    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" id="delete-form">

        @csrf

        @method('DELETE')

    </form>

    @push('js')
        <script>
            function confirmDelete() {
    
                Swal.fire({
                    title: "¿Estas seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, bórralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        /*Swal.fire({
                            title: "¡Eliminado!",
                            text: "Su archivo ha sido eliminado.",
                            icon: "success"
                        });*/

                        document.getElementById("delete-form").submit();
                    }
                });
            }
        </script>
    @endpush
</div>
