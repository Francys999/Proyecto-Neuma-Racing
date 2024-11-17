<div>

    <form wire:submit="addFeature" class="flex space-x-4">

        <div class="flex-1">
            <x-label class="mb-1">
                Valor
            </x-label>

            @switch($option->type)
                @case(1)
                    <x-input wire:model="newFeature.value" class="w-full" placeholder="Ingrese el valor de la opción" />
                @break

                @case(2)
                    <input type="color" wire:model="newFeature.value">
                @break

                @default
            @endswitch
        </div>

        <div class="flex-1">
            <x-label class="mb-1">
                Descripción
            </x-label>

            <x-input wire:model="newFeature.description" class="w-full" placeholder="Ingrese una descripción" />
        </div>

        <div class="pt-7">
            <x-button>
                Agregar
            </x-button>
        </div>

    </form>

</div>
