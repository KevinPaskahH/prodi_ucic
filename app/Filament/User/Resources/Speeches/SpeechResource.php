<?php

namespace App\Filament\User\Resources\Speeches;

use App\Filament\User\Resources\Speeches\Pages\CreateSpeech;
use App\Filament\User\Resources\Speeches\Pages\EditSpeech;
use App\Filament\User\Resources\Speeches\Pages\ListSpeeches;
use App\Filament\User\Resources\Speeches\Schemas\SpeechForm;
use App\Filament\User\Resources\Speeches\Tables\SpeechesTable;
use App\Models\Speech;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SpeechResource extends Resource
{
    protected static ?string $model = Speech::class;
    
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
        return SpeechForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpeechesTable::configure($table);
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
            'index' => ListSpeeches::route('/'),
            'create' => CreateSpeech::route('/create'),
            'edit' => EditSpeech::route('/{record}/edit'),
        ];
    }
}
