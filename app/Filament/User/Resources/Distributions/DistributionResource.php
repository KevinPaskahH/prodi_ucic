<?php

namespace App\Filament\User\Resources\Distributions;

use App\Filament\User\Resources\Distributions\Pages\CreateDistribution;
use App\Filament\User\Resources\Distributions\Pages\EditDistribution;
use App\Filament\User\Resources\Distributions\Pages\ListDistributions;
use App\Filament\User\Resources\Distributions\Schemas\DistributionForm;
use App\Filament\User\Resources\Distributions\Tables\DistributionsTable;
use App\Models\Distribution;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DistributionResource extends Resource
{
    protected static ?string $model = Distribution::class;

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
        return DistributionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DistributionsTable::configure($table);
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
            'index' => ListDistributions::route('/'),
            'create' => CreateDistribution::route('/create'),
            'edit' => EditDistribution::route('/{record}/edit'),
        ];
    }
}
