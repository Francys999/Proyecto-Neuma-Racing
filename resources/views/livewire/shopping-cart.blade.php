<div class="container mx-auto p-6">
    <!-- Sección principal -->
    <div class="grid grid-cols-1 lg:grid-cols-7 gap-6">
        <!-- Carrito de compras -->
        <div class="lg:col-span-5 bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4 border-b pb-2">
                <h1 class="text-xl font-semibold text-gray-800">
                    Carrito de compras ({{ Cart::count() }} productos)
                </h1>
                <button class="text-sm font-medium text-gray-500 hover:text-red-500 underline"
                    wire:click="destroy()">
                    Limpiar carro
                </button>
            </div>

            <div class="space-y-6">
                <ul class="space-y-4">
                    @forelse (Cart::content() as $item)
                        <li class="flex items-center space-x-4 {{ $item->qty > $item->options['stock'] ? 'text-red-600' : ''}}">
                            <img class="w-24 h-24 object-cover rounded shadow"
                                src="{{ $item->options->image }}" alt="Producto">

                            <div class="flex-1">
                                @if ($item->qty > $item->options['stock'])
                                    <p class="font-semibold text-red-600"> 
                                        Stock insuficiente
                                    </p>
                                @endif
                                <a href="{{ route('products.show', $item->id) }}" class="text-sm font-medium text-gray-800 hover:text-red-500">
                                    {{ $item->name }}
                                </a>
                                <button
                                    class="mt-2 text-xs font-semibold text-red-600 bg-red-100 px-3 py-1 rounded hover:bg-red-200"
                                    wire:click="remove('{{ $item->rowId }}')">
                                    <i class="fa-solid fa-xmark"></i> Quitar
                                </button>
                            </div>

                            <p class="text-lg font-medium text-gray-800">
                                S/. {{ $item->price }}
                            </p>

                            <div class="flex items-center space-x-2">
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded"
                                    wire:click="decrease('{{ $item->rowId }}')">
                                    -
                                </button>
                                <span class="w-8 text-center text-sm font-medium text-gray-800">
                                    {{ $item->qty }}
                                </span>
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded"
                                    wire:click="increase('{{ $item->rowId }}')"
                                    wire:loading.attr="disabled"
                                    wire:target="increase('{{ $item->rowId }}')"
                                    @disabled($item->qty >= $item->options['stock'])>
                                    +
                                </button>
                            </div>
                        </li>
                    @empty
                        <p class="text-center text-gray-500">
                            No hay productos en el carrito
                        </p>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Resumen de compra -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <div class="flex justify-between items-center text-gray-800 font-medium mb-2">
                    <p>Total:</p>
                    <p class="text-lg font-bold">S/. {{ $this->subtotal }}</p>
                </div>
                <a href="{{ route('shipping.index') }}" class="bg-red-500 hover:bg-red-600 text-white text-center font-medium py-2 px-4 rounded block w-full">
                    Continuar compra
                </a>
            </div>
        </div>
    </div>

    <!-- Sección de relleno -->
    <div class="mt-10 bg-gray-100 py-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <!-- Testimonios -->
            <div class="group bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out">
                <div class="flex justify-center items-center w-16 h-16 bg-red-500 text-white rounded-full mx-auto mb-4">
                    <i class="fas fa-star text-2xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-red-500 transition duration-300">
                    ¿Por qué elegirnos?
                </h2>
                <p class="text-sm text-gray-600">
                    En Neuma Racing ofrecemos productos de alta calidad y un servicio excepcional para todos nuestros clientes.
                </p>
            </div>

            <!-- Garantía -->
            <div class="group bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out">
                <div class="flex justify-center items-center w-16 h-16 bg-green-500 text-white rounded-full mx-auto mb-4">
                    <i class="fas fa-shield-alt text-2xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-green-500 transition duration-300">
                    Garantía de satisfacción
                </h2>
                <p class="text-sm text-gray-600">
                    Compra con confianza. Nuestros productos están respaldados por una garantía de satisfacción total.
                </p>
            </div>

            <!-- Promoción -->
            <div class="group bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out">
                <div class="flex justify-center items-center w-16 h-16 bg-blue-500 text-white rounded-full mx-auto mb-4">
                    <i class="fas fa-tags text-2xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-blue-500 transition duration-300">
                    Promociones exclusivas
                </h2>
                <p class="text-sm text-gray-600">
                    ¡Regístrate ahora y recibe ofertas especiales directamente en tu correo!
                </p>
            </div>
        </div>
    </div>
</div>
