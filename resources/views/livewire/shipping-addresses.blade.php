<div class="container mx-auto p-6">
    <!-- Sección principal -->
    <section class="bg-white rounded-lg shadow overflow-hidden">
        <header class="bg-black px-4 py-3">
            <h2 class="text-white text-lg font-semibold">Direcciones de envío guardadas</h2>
        </header>

        <div class="p-6">
            @if ($newAddress)
                <x-validation-errors class="mb-6" />

                <div class="grid grid-cols-4 gap-4">
                    <!-- Tipo de dirección -->
                    <div class="col-span-1">
                        <x-select wire:model="createAddress.type" class="w-full">
                            <option value="">Tipo de dirección</option>
                            <option value="1">Domicilio</option>
                            <option value="2">Oficina</option>
                        </x-select>
                    </div>

                    <!-- Descripción -->
                    <div class="col-span-3">
                        <x-input wire:model="createAddress.description" class="w-full" type="text"
                            placeholder="Nombre de la dirección" />
                    </div>

                    <!-- Distrito -->
                    <div class="col-span-2">
                        <x-input wire:model="createAddress.district" class="w-full" type="text"
                            placeholder="Distrito" />
                    </div>

                    <!-- Referencia -->
                    <div class="col-span-2">
                        <x-input wire:model="createAddress.reference" class="w-full" type="text"
                            placeholder="Referencia" />
                    </div>
                </div>

                <hr class="my-6">

                <div x-data="{
                    receiver: @entangle('createAddress.receiver'),
                    receiver_info: @entangle('createAddress.receiver_info')
                }">
                    <p class="font-semibold mb-4 text-gray-800">¿Quién recibirá el pedido?</p>

                    <div class="flex space-x-4 mb-6">
                        <label class="flex items-center cursor-pointer">
                            <input x-model="receiver" type="radio" value="1" class="mr-2 text-red-500">
                            <span class="text-gray-700">Seré yo</span>
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <input x-model="receiver" type="radio" value="2" class="mr-2 text-red-500">
                            <span class="text-gray-700">Otra persona</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <x-input x-bind:disabled="receiver == 1" x-model="receiver_info.name" class="w-full"
                            placeholder="Nombres" />
                        <x-input x-bind:disabled="receiver == 1" x-model="receiver_info.last_name" class="w-full"
                            placeholder="Apellidos" />
                        <div class="flex space-x-2">
                            <x-select x-model="receiver_info.document_type" class="w-1/2">
                                @foreach (\App\Enums\TypeOfDocuments::cases() as $item)
                                    <option value="{{ $item->value }}">{{ $item->name }}</option>
                                @endforeach
                            </x-select>
                            <x-input x-model="receiver_info.document_number" class="w-full"
                                placeholder="Número de documento" />
                        </div>
                        <x-input x-model="receiver_info.phone" class="w-full" placeholder="Teléfono" />
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <button class="btn btn-outline-gray w-full flex items-center justify-center mt-4 transition duration-300 ease-in-out bg-white border border-gray-300 rounded-lg hover:bg-black hover:text-white hover:border-black"
                            wire:click="$set('newAddress', false)">
                            Cancelar
                        </button>
                        <button wire:click="store()" class="btn btn-red w-full hover:bg-red-600">
                            Guardar
                        </button>
                    </div>
                </div>
            @else
                <!-- Si no se está creando nueva dirección -->
                @if ($addresses->count())
                    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($addresses as $address)
                            <li
                                class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition duration-300 ease-in-out">
                                <div class="flex items-center mb-2">
                                    <i class="fa-solid fa-house text-red-500 text-xl mr-2"></i>
                                    <p class="text-gray-700 font-semibold">{{ $address->district }}</p>
                                </div>
                                <p class="text-sm text-gray-600">{{ $address->description }}</p>
                                <p class="text-sm text-gray-500">{{ $address->receiver_info['name'] }}</p>

                                <div class="mt-4 flex space-x-2">
                                    <button wire:click="setDefaultAddress({{ $address->id }})"
                                        class="text-gray-500 hover:text-red-500">
                                        <i class="fa-solid fa-star"></i>
                                    </button>
                                    <button wire:click="edit({{ $address->id }})"
                                        class="text-gray-500 hover:text-yellow-500">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button wire:click="deleteAddress({{ $address->id }})"
                                        class="text-gray-500 hover:text-red-500">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center text-gray-500">No se ha encontrado direcciones</p>
                @endif

                <button
                    class="btn btn-outline-gray w-full flex items-center justify-center mt-4 transition duration-300 ease-in-out bg-white border border-gray-300 rounded-lg hover:bg-black hover:text-white hover:border-black"
                    wire:click="$set('newAddress', true)">
                    Agregar <i class="fa-solid fa-plus ml-2"></i>
                </button>
            @endif
        </div>
    </section>

    <!-- Sección de relleno -->
    <div class="mt-10 bg-gray-100 py-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out group">
                <i class="fa-solid fa-map-location-dot text-red-500 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-red-500 transition duration-300">
                    Envíos a Todo el País
                </h3>
                <p class="text-sm text-gray-600">
                    Gestiona múltiples direcciones y recibe tus pedidos donde prefieras.
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out group">
                <i class="fa-solid fa-clock text-blue-500 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-blue-500 transition duration-300">
                    Entrega Rápida
                </h3>
                <p class="text-sm text-gray-600">
                    Garantizamos la entrega en el menor tiempo posible para que no tengas que esperar.
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out group">
                <i class="fa-solid fa-user-shield text-green-500 text-4xl mb-4"></i>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-green-500 transition duration-300">
                    Protección al Cliente
                </h3>
                <p class="text-sm text-gray-600">
                    Seguridad y confianza en cada transacción realizada.
                </p>
            </div>
        </div>
    </div>
</div>
