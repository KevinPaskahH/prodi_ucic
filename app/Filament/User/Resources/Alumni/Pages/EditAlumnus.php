<?php

namespace App\Filament\User\Resources\Alumni\Pages;

use App\Filament\User\Resources\Alumni\AlumnusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAlumnus extends EditRecord
{
    protected static string $resource = AlumnusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
