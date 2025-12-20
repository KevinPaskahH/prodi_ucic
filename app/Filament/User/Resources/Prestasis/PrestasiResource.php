<?php

namespace App\Filament\User\Resources\Prestasis;

use App\Filament\User\Resources\Prestasis\Pages\CreatePrestasi;
use App\Filament\User\Resources\Prestasis\Pages\EditPrestasi;
use App\Filament\User\Resources\Prestasis\Pages\ListPrestasis;
use App\Filament\User\Resources\Prestasis\Schemas\PrestasiForm;
use App\Filament\User\Resources\Prestasis\Tables\PrestasisTable;
use App\Models\Prestasi;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Kemahasiswaan';

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
        return PrestasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrestasisTable::configure($table);
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
            'index' => ListPrestasis::route('/'),
            'create' => CreatePrestasi::route('/create'),
            'edit' => EditPrestasi::route('/{record}/edit'),
        ];
    }
}
