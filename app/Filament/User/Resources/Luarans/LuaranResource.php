<?php

namespace App\Filament\User\Resources\Luarans;

use App\Filament\User\Resources\Luarans\Pages\CreateLuaran;
use App\Filament\User\Resources\Luarans\Pages\EditLuaran;
use App\Filament\User\Resources\Luarans\Pages\ListLuarans;
use App\Filament\User\Resources\Luarans\Schemas\LuaranForm;
use App\Filament\User\Resources\Luarans\Tables\LuaransTable;
use App\Models\Luaran;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LuaranResource extends Resource
{
    protected static ?string $model = Luaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * 🔒 USER PANEL:
     * User hanya bisa melihat affiliatenya sendiri
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Filament::auth()->id());
    }

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
