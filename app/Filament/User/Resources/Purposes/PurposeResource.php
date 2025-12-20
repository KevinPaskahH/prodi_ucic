<?php

namespace App\Filament\User\Resources\Purposes;

use App\Filament\User\Resources\Purposes\Pages\CreatePurpose;
use App\Filament\User\Resources\Purposes\Pages\EditPurpose;
use App\Filament\User\Resources\Purposes\Pages\ListPurposes;
use App\Filament\User\Resources\Purposes\Schemas\PurposeForm;
use App\Filament\User\Resources\Purposes\Tables\PurposesTable;
use App\Models\Purpose;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PurposeResource extends Resource
{
    protected static ?string $model = Purpose::class;

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

    public static function form(Schema $schema): Schema
    {
        return PurposeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PurposesTable::configure($table);
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
            'index' => ListPurposes::route('/'),
            'create' => CreatePurpose::route('/create'),
            'edit' => EditPurpose::route('/{record}/edit'),
        ];
    }
}
