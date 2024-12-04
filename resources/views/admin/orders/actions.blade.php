<div class="flex flex-col space-y-2">

    @switch($order->status)
        @case(\App\Enums\OrderStatus::Pendiente)
            <button wire:click="markAsProcessing({{ $order->id }})" class="underline text-blue-500 hover:no-underline">
                Listo para despachar
            </button>
        @break

        @case(\App\Enums\OrderStatus::Procesado)
            <button wire:click="assignDriver({{ $order->id }})" class="underline text-blue-500 hover:no-underline">
                Asignar repartidor
            </button>
        @break

        @case(\App\Enums\OrderStatus::Fallado)
            <button wire:click="markAsRefunded({{ $order->id }})" class="underline text-blue-500 hover:no-underline">
                Marcar como devuelto
            </button>
        @break

        @case(\App\Enums\OrderStatus::Reintegrado)
            <button wire:click="assignDriver({{ $order->id }})" class="underline text-blue-500 hover:no-underline">
                Asignar repartidor
            </button>
        @break

        @default
    @endswitch
    @if ($order->status != \App\Enums\OrderStatus::Cancelado)
        <button wire:click="cancelOrder({{ $order->id }})" class="underline text-blue-500 hover:no-underline">
            Cancelar
        </button>
    @endif
</div>
