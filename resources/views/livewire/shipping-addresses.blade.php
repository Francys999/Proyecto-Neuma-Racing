<div>
    <section class="bg-white rounded-lg shadow overflow-hidden">

        <header class="bg-black px-4 py-2">
            <h2 class="text-white text-lg">
                Direcciones de envío guardadas
            </h2>
        </header>

        <div class="p-4">

            @if ($newAddress)
                
                <div class="grid grid-cols-4 gap-4">

                    {{-- Tipo de dirección --}}

                    <div class="col-span-1">
                        <x-select wire:model="createAddress.type">

                            <option value="">
                                Tipo de dirección
                            </option>

                            <option value="1">
                                Domicilio
                            </option>

                            <option value="2">
                                Oficina
                            </option>

                        </x-select>
                    </div>

                    {{-- Descripción --}}

                    <div class="col-span-3">
                        <x-input wire:model="createAddress.description" 
                            class="w-full" 
                            type="text" 
                            placeholder="Nombre de la dirección" />
                    </div>

                    {{-- Distrito --}}

                    <div class="col-span-2">
                        <x-input wire:model="createAddress.district" 
                            class="w-full"
                            type="text"
                            placeholder="Distrito" />
                    </div>

                    {{-- Referencia --}}

                    <div class="col-span-2">
                        <x-input wire:model="createAddress.reference"
                            class="w-full"
                            type="text"
                            placeholder="Referencia" />
                    </div>
                </div>

                <hr class="my-4">

                <div>
                    <p class="font-semibold mb-2">
                        ¿Quién recibirá el pedido?
                    </p>

                    <div class="flex space-x-2 mb-4">
                        <label class="flex items-center">
                            <input type="radio" value="1" class="mr-1">
                            Seré yo
                        </label>

                        <label class="flex items-center">
                            <input type="radio" value="1" class="mr-1">
                            Otra persona
                        </label>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <x-input class="w-full" 
                                placeholder="Nombres" />
                        </div>
                        <div>
                            <x-input class="w-full" 
                                placeholder="Apellidos" />
                        </div>
                        <div>

                            <div class="flex space-x-2">

                                <x-select>

                                    @foreach (\App\Enums\TypeOfDocuments::cases() as $item)
                                        <option value="{{ $item->value }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach

                                </x-select>

                                <x-input class="w-full" 
                                    placeholder="Número de documento" />

                            </div>

                        </div>
                        <div>
                            <x-input class="w-full" 
                                placeholder="Teléfono" />
                        </div>
                        <div>
                            <button class="btn btn-outline-gray w-full">
                                Cancelar
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-red w-full">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            @else
                @if ($addresses->count())
                
                @else
                    <p class="text-center">No se ha encontrado direcciones</p>
                @endif

                <button class="btn btn-outline-gray w-full flex items-center justify-center mt-4"
                    wire:click="$set('newAddress', true)">
                    Agregar <i class="fa-solid fa-plus ml-2"></i>
                </button>
            
            @endif
        </div>

    </section>
</div>
