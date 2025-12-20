<?php

namespace App\Filament\User\Resources\Alumni;

use App\Filament\User\Resources\Alumni\Pages\CreateAlumnus;
use App\Filament\User\Resources\Alumni\Pages\EditAlumnus;
use App\Filament\User\Resources\Alumni\Pages\ListAlumni;
use App\Filament\User\Resources\Alumni\Schemas\AlumnusForm;
use App\Filament\User\Resources\Alumni\Tables\AlumniTable;
use App\Models\Alumnus;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AlumnusResource extends Resource
{
    protected static ?string $model = Alumnus::class;

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

    /**
     * 📝 FORM
     */
    public static function form(Schema $schema): Schema
    {
        return AlumnusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AlumniTable::configure($table);
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
            'index' => ListAlumni::route('/'),
            'create' => CreateAlumnus::route('/create'),
            'edit' => EditAlumnus::route('/{record}/edit'),
        ];
    }
}
