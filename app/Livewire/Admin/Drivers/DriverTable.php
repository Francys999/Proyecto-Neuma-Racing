<?php

namespace App\Livewire\Admin\Drivers;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Driver;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class DriverTable extends DataTableComponent
{
    protected $model = Driver::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Tipo", "type")
                ->format(function ($value) {

                    $type = match ($value) {
                        1 => "Motocicleta",
                        2 => "Automóvil",
                        default => "Unknown"
                    };

                    return $type;
                })
                ->sortable(),

            Column::make("N° de placa", "plate_number")
                ->sortable(),

            Column::make("Nombre", "user.name")
                ->sortable(),

            LinkColumn::make("Acciones")
                ->title(fn($row) => "Editar")
                ->location(fn($row) => route('admin.drivers.edit', $row))
        ];
    }
}
