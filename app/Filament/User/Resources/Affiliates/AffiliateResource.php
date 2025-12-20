<?php

namespace App\Filament\User\Resources\Affiliates;

use App\Filament\User\Resources\Affiliates\Pages\CreateAffiliate;
use App\Filament\User\Resources\Affiliates\Pages\EditAffiliate;
use App\Filament\User\Resources\Affiliates\Pages\ListAffiliates;
use App\Filament\User\Resources\Affiliates\Schemas\AffiliateForm;
use App\Filament\User\Resources\Affiliates\Tables\AffiliatesTable;
use App\Models\Affiliate;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AffiliateResource extends Resource
{
    protected static ?string $model = Affiliate::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

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
        return AffiliateForm::configure($schema);
    }

    /**
     * 📊 TABLE
     */
    public static function table(Table $table): Table
    {
        return AffiliatesTable::configure($table);
    }

    /**
     * 🔗 RELATIONS
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * 📄 PAGES
     */
    public static function getPages(): array
    {
        return [
            'index'  => ListAffiliates::route('/'),
            'create' => CreateAffiliate::route('/create'),
            'edit'   => EditAffiliate::route('/{record}/edit'),
        ];
    }
}
