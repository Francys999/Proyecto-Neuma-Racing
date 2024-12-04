<?php

namespace App\Livewire\Admin\Orders;

use App\Enums\OrderStatus;
use App\Enums\ShipmentStatus;
use App\Models\Driver;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class OrderTable extends DataTableComponent
{
    protected $model = Order::class;

    public $drivers;

    public $new_shipment = [
        'openModal' => false,
        'order_id' => '',
        'driver_id' => '',
    ];

    public function mount()
    {
        $this->drivers = Driver::all();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("N° orden", "id")
                ->sortable(),

            Column::make("Ticket")
                ->label(function ($row) {
                    return view('admin.orders.ticket', ['order' => $row]);
                }),

            Column::make("F. orden", "created_at")
                ->format(function ($value) {
                    return $value->format('d/m/Y');
                })
                ->sortable(),
            Column::make("total")
                ->format(function ($value) {
                    return "S/" . number_format($value, 2);
                })
                ->sortable(),

            Column::make("Cantidad", "content")
                ->format(function ($value) {
                    return count($value);
                })
                ->sortable(),

            Column::make("Estado", "status")
                ->format(function ($value) {
                    return $value->name;
                })
                ->sortable(),

            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.orders.actions', ['order' => $row]);
                }),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('status')
                ->options([
                    '' => 'Todos',
                    1 => 'Pendiente',
                    2 => 'Procesado',
                    3 => 'Enviado',
                    4 => 'Completado',
                    5 => 'Fallado',
                    6 => 'Reintegrado',
                    7 => 'Cancelado',
                ])->filter(function($query, $value){
                    $query->where('status', $value);
                }),
        ];
    }

    public function dowloadTicket(Order $order)
    {
        return FacadesStorage::download($order->pdf_path);
    }

    public function markAsProcessing(Order $order)
    {
        $order->status = OrderStatus::Procesado;
        $order->save();
    }

    public function assignDriver(Order $order)
    {
        $this->new_shipment['order_id'] = $order->id;
        $this->new_shipment['openModal'] = true;
    }

    public function saveShipment()
    {
        $this->validate([
            'new_shipment.driver_id' => 'required|exists:drivers,id',
        ]);

        $order = Order::find($this->new_shipment['order_id']);

        $order->status = OrderStatus::Enviado;
        $order->save();

        $order->shipments()->create([
            'driver_id' => $this->new_shipment['driver_id']
        ]);

        $this->reset('new_shipment');
    }

    public function markAsRefunded(Order $order)
    {
        $order->status = OrderStatus::Reintegrado;
        $order->save();

        $shipment = $order->shipments->last();
        $shipment->refunded_at = now();
        $shipment->save();
    }

    public function cancelOrder(Order $order)
    {
        if ($order->status == OrderStatus::Enviado) {
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => 'No se puede cancelar la orden',
                'text' => 'La orden tiene envíos pendientes',
            ]);

            return;
        }

        if ($order->status == OrderStatus::Fallado) {
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => 'No se puede cancelar la orden',
                'text' => 'El pedido no ha sido retornado por el delivery',
            ]);

            return;
        }

        $order->status = OrderStatus::Cancelado;
        $order->save();
    }


    public function customView(): string
    {
        return 'admin.orders.modal';
    }
}
