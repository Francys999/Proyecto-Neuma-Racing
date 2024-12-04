<div class="flex flex-col space-y-2">

    @switch($order->status)
        @case(\App\Enums\OrderStatus::Pendiente)
            <button 
                wire:click="markAsProcessing({{ $order->id }})"
                class="underline text-blue-500 hover:no-underline">
                Listo para despachar
            </button>
        @break

        @case(\App\Enums\OrderStatus::Procesado)
            <button class="underline text-blue-500 hover:no-underline">
                Asignar repartidor
            </button>
        @break

        @default
    @endswitch

    <button class="underline text-blue-500 hover:no-underline">
        Cancelar
    </button>

</div>
