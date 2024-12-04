<?php

namespace App\Livewire\Admin\Shipments;

use App\Enums\OrderStatus;
use App\Enums\ShipmentStatus;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Shipment;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ShipmentTable extends DataTableComponent
{
    protected $model = Shipment::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("N° ", "order_id")
                ->sortable(),
            Column::make("Conductor", "driver.user.name")
                ->sortable(),
            Column::make("Placa", "driver.plate_number")
                ->sortable(),
            Column::make("Estado", "status")
                ->format(function($value){
                    return $value->name;
                })
                ->sortable(),
            Column::make('Acciones')
                ->label(function($row){
                    return view('admin.shipments.actions', [
                        'shipment' => $row
                    ]);
                })
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('status')
                ->options([
                    '' => 'Todos',
                    1 => 'Pendiente',
                    2 => 'Completado',
                    3 => 'Fallado',
                ])->filter(function($query, $value){
                    $query->where('status', $value);
                }),
        ];
    }

    public function markAsCompleted(Shipment $shipment)
    {   
        $shipment->status = ShipmentStatus::Completado;
        $shipment->delivered_at = now();
        $shipment->save();

        $order = $shipment->order;
        $order->status = OrderStatus::Completado;
        $order->save();
    }

    public function markAsFailed(Shipment $shipment)
    {
        $shipment->status = ShipmentStatus::Fallado;
        $shipment->save();

        $order = $shipment->order;
        $order->status = OrderStatus::Fallado;
        $order->save(); 
    }
}