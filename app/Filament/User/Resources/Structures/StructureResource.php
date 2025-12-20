<?php

namespace App\Filament\User\Resources\Structures;

use App\Filament\User\Resources\Structures\Pages\CreateStructure;
use App\Filament\User\Resources\Structures\Pages\EditStructure;
use App\Filament\User\Resources\Structures\Pages\ListStructures;
use App\Filament\User\Resources\Structures\Schemas\StructureForm;
use App\Filament\User\Resources\Structures\Tables\StructuresTable;
use App\Models\Structure;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class StructureResource extends Resource
{
    protected static ?string $model = Structure::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Profile';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    /**
     * 🔒 USER PANEL:
     * User hanya bisa melihat affiliatenya sendiri
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Filament::auth()->id());
    }

    protected static ?string $recordTitleAttribute = 'foto';

    public static function form(Schema $schema): Schema
    {
        return StructureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StructuresTable::configure($table);
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
            'index' => ListStructures::route('/'),
            'create' => CreateStructure::route('/create'),
            'edit' => EditStructure::route('/{record}/edit'),
        ];
    }
}
