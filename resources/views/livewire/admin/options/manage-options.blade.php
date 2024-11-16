<div>
    
    <section class="rounded-lg bg-white shadow-lg">
        
        <header class="border-b border-gray-200 px-6 py-2">

            <div class="flex justify-between">
                <h1 class="text-lg font-semibold text-gray-700">
                    Opciones
                </h1>

                <x-button wire:click="$set('openModal', true)">
                    Nuevo
                </x-button>

            </div>

        </header>

        <div class="p-6">

            <div class="space-y-6">

                @foreach ($options as $option)

                    <div class="p-6 rounded-lg border border-gray-200 relative">
                        
                        <div class="absolute -top-3 px-4 bg-white">
                            <span>
                                {{ $option->name }}
                            </span>
                        </div>

                        <div class="flex flex-wrap">

                            @foreach ($option->features as $feature)

                                @switch($option->type)
                                    @case(1)
                                        
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        {{
                                            $feature->value
                                        }}
                                    </span>
                                        @break

                                    @default
                                        
                                @endswitch

                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

    <x-dialog-modal wire:model="openModal">

        <x-slot name="title">
            Crear nueva opción
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-2 gap-6 mb-4">

                <div>
                    <x-label class="mb-1">
                        Nombre
                    </x-label>

                    <x-input
                        wire:model="newOption.name"
                        class="w-full"
                        placeholder="Por ejemplo: Tamaño, Medida, etc"/>
                </div>

                <div>

                    <x-label class="mb-1">
                        Tipo
                    </x-label>

                    <x-select
                        wire:model="newOption.type"
                        class="w-full">

                        <option value="1">Texto</option>
                    </x-select>

                </div>

            </div>

            <div class="flex items-center mb-4">
                <hr class="flex-1">

                <span class="mx-4">
                    Valores
                </span>

                <hr class="flex-1">
            </div>

            <div class="mb-4">
                @foreach ($newOption["features"] as $index => $feature)
                    <div class="p-6 rounded-lg border border-gray-200">

                        <div class="grid grid-cols-2 gap-6">
                            
                            <div>
                                <x-label class="mb-1">
                                    Valor
                                </x-label>
            
                                <x-input
                                    wire:model="newOption.features.{{ $index }}.value"
                                    class="w-full"
                                    placeholder="Ingrese el valor de la opción"/>
                            </div>

                            <div>
                                <x-label class="mb-1">
                                    Descripción
                                </x-label>
            
                                <x-input
                                    wire:model="newOption.features.{{ $index }}.description"                            
                                    class="w-full"
                                    placeholder="Ingrese una descripción"/>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

            <div class="flex justify-end">
                <x-button 
                    wire:click="addFeature">
                    Agregar valor
                </x-button>
            </div>

        </x-slot>

        <x-slot name="footer">
        </x-slot>

    </x-dialog-modal>

</div>
