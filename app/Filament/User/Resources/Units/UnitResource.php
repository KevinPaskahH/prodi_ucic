<?php

namespace App\Filament\User\Resources\Units;

use App\Filament\User\Resources\Units\Pages\CreateUnit;
use App\Filament\User\Resources\Units\Pages\EditUnit;
use App\Filament\User\Resources\Units\Pages\ListUnits;
use App\Filament\User\Resources\Units\Pages\ViewUnit;
use App\Filament\User\Resources\Units\Schemas\UnitForm;
use App\Filament\User\Resources\Units\Schemas\UnitInfolist;
use App\Filament\User\Resources\Units\Tables\UnitsTable;
use App\Models\Unit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Unit Akademik';

    protected static ?string $navigationLabel = 'Units';

    protected static string | \BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return UnitForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UnitInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnitsTable::configure($table);
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
            'index' => ListUnits::route('/'),
            'create' => CreateUnit::route('/create'),
            'view' => ViewUnit::route('/{record}'),
            'edit' => EditUnit::route('/{record}/edit'),
        ];
    }
}
