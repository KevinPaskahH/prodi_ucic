<?php

namespace App\Filament\User\Resources\Employabilities\Pages;

use App\Filament\User\Resources\Employabilities\EmployabilityResource;
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
