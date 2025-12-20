<?php

namespace App\Filament\User\Resources\Luarans\Pages;

use App\Filament\User\Resources\Luarans\LuaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLuaran extends EditRecord
{
    protected static string $resource = LuaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
