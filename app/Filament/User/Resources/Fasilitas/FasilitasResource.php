<?php

namespace App\Filament\User\Resources\Fasilitas;

use App\Filament\User\Resources\Fasilitas\Pages\CreateFasilitas;
use App\Filament\User\Resources\Fasilitas\Pages\EditFasilitas;
use App\Filament\User\Resources\Fasilitas\Pages\ListFasilitas;
use App\Filament\User\Resources\Fasilitas\Schemas\FasilitasForm;
use App\Filament\User\Resources\Fasilitas\Tables\FasilitasTable;
use App\Models\Fasilitas;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Facility';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'foto';

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
        return FasilitasForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FasilitasTable::configure($table);
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
            'index' => ListFasilitas::route('/'),
            'create' => CreateFasilitas::route('/create'),
            'edit' => EditFasilitas::route('/{record}/edit'),
        ];
    }
}
