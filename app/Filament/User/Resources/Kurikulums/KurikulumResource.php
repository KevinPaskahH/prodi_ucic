<?php

namespace App\Filament\User\Resources\Kurikulums;

use App\Filament\User\Resources\Kurikulums\Pages\CreateKurikulum;
use App\Filament\User\Resources\Kurikulums\Pages\EditKurikulum;
use App\Filament\User\Resources\Kurikulums\Pages\ListKurikulums;
use App\Filament\User\Resources\Kurikulums\Schemas\KurikulumForm;
use App\Filament\User\Resources\Kurikulums\Tables\KurikulumsTable;
use App\Models\Kurikulum;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class KurikulumResource extends Resource
{
    protected static ?string $model = Kurikulum::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Akademik';

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
        return KurikulumForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KurikulumsTable::configure($table);
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
            'index' => ListKurikulums::route('/'),
            'create' => CreateKurikulum::route('/create'),
            'edit' => EditKurikulum::route('/{record}/edit'),
        ];
    }
}
