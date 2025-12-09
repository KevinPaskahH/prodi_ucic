<?php

namespace App\Filament\Resources\Employabilities\Pages;

use App\Filament\Resources\Employabilities\EmployabilityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmployabilities extends ListRecords
{
    protected static string $resource = EmployabilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
