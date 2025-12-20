<?php

namespace App\Filament\Resources\Luarans;

use App\Filament\Resources\Luarans\Pages\CreateLuaran;
use App\Filament\Resources\Luarans\Pages\EditLuaran;
use App\Filament\Resources\Luarans\Pages\ListLuarans;
use App\Filament\Resources\Luarans\Schemas\LuaranForm;
use App\Filament\Resources\Luarans\Tables\LuaransTable;
use App\Models\Luaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LuaranResource extends Resource
{
    protected static ?string $model = Luaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LuaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LuaransTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLuarans::route('/'),
            'create' => CreateLuaran::route('/create'),
            'edit' => EditLuaran::route('/{record}/edit'),
        ];
    }
}
