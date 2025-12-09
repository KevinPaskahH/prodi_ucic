<?php

namespace App\Filament\Resources\Employabilities\Pages;

use App\Filament\Resources\Employabilities\EmployabilityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEmployability extends EditRecord
{
    protected static string $resource = EmployabilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
