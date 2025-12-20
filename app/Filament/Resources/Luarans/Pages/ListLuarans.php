<?php

namespace App\Filament\Resources\Luarans\Pages;

use App\Filament\Resources\Luarans\LuaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLuarans extends ListRecords
{
    protected static string $resource = LuaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
