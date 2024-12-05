<div>
    <h1 class="text-xl text-gray-600 mb-2">
        {{ $product->name }}
    </h1>

    <div class="flex items-center space-x-2 mb-4">
        <ul class="flex space-x-1 text-sm">
            <li>
                <i class="fa-solid fa-star text-yellow-400"></i>
            </li>
            <li>
                <i class="fa-solid fa-star text-yellow-400"></i>
            </li>
            <li>
                <i class="fa-solid fa-star text-yellow-400"></i>
            </li>
            <li>
                <i class="fa-solid fa-star text-yellow-400"></i>
            </li>
            <li>
                <i class="fa-solid fa-star text-yellow-400"></i>
            </li>
        </ul>

        <p class="text-sm text-gray-700">4.7 (55)</p>
    </div>

    <p class="font-semibold text-2xl text-gray-600 mb-4">
        S/ {{ $product->price }}
    </p>

    <div class="flex items-center space-x-6 mb-6" x-data="{
        qty: @entangle('qty')
    }">

        <button class="btn btn-black" x-on:click="qty = qty - 1" x-bind:disabled="qty == 1">
            -
        </button>

        <span x-text="qty" class="inline-block w-2 text-center">

        </span>

        <button class="btn btn-black" x-on:click="qty = qty + 1">
            +
        </button>

    </div>

    <div class="flex flex-wrap">

        @foreach ($product->options as $option)
            <div class="mr-4 mb-4">
                <p class="font-semibold text-lg mb-2">
                    {{ $option->name }}
                </p>

                <ul class="flex items-center space-x-4">
                    @foreach ($option->pivot->features as $feature)
                        <li>
                            {{-- {{ $feature["value"] }} --}}
                            <button
                                class="px-4 py-2 font-semibold uppercase text-sm rounded-lg {{ $selectedFeatures[$option->id] == $feature['id'] ? 'bg-red-500 text-white' : 'border border-gray-200 text-gray-700' }}"
                                wire:click = "$set('selectedFeatures.{{ $option->id }}', {{ $feature['id'] }})">
                                {{ $feature['value'] }}
                            </button>

                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>

    <button class="btn btn-red w-full mb-6" wire:click="add_to_cart" wire:loading.attr="disabled">
        Agregar al carrito
    </button>

    <h2 class="text-lg font-bold mb-2">Descripción del producto</h2>
    <div class="text-sm mb-4">
        {{ $product->description }}
    </div>

    <div class="text-gray-700 flex items-center space-x-4">
        <i class="fa-solid fa-truck-fast text-2xl"></i>
        <p>Despacho a domicilio</p>
    </div>

</div>
