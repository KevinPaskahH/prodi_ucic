<?php

namespace App\Filament\User\Resources\Employabilities;

use App\Filament\User\Resources\Employabilities\Pages\CreateEmployability;
use App\Filament\User\Resources\Employabilities\Pages\EditEmployability;
use App\Filament\User\Resources\Employabilities\Pages\ListEmployabilities;
use App\Filament\User\Resources\Employabilities\Schemas\EmployabilityForm;
use App\Filament\User\Resources\Employabilities\Tables\EmployabilitiesTable;
use App\Models\Employability;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EmployabilityResource extends Resource
{
    protected static ?string $model = Employability::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Profile';

    /**
     * 🔒 USER PANEL:
     * User hanya bisa melihat affiliatenya sendiri
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Filament::auth()->id());
    }


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
