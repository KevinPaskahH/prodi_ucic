<?php

namespace App\Filament\Resources\Employabilities;

use App\Filament\Resources\Employabilities\Pages\CreateEmployability;
use App\Filament\Resources\Employabilities\Pages\EditEmployability;
use App\Filament\Resources\Employabilities\Pages\ListEmployabilities;
use App\Filament\Resources\Employabilities\Schemas\EmployabilityForm;
use App\Filament\Resources\Employabilities\Tables\EmployabilitiesTable;
use App\Models\Employability;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EmployabilityResource extends Resource
{
    protected static ?string $model = Employability::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Profile';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return EmployabilityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmployabilitiesTable::configure($table);
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
            'index' => ListEmployabilities::route('/'),
            'create' => CreateEmployability::route('/create'),
            'edit' => EditEmployability::route('/{record}/edit'),
        ];
    }
}
