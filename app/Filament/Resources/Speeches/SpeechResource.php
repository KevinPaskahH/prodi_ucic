<?php

namespace App\Filament\Resources\Speeches;

use App\Filament\Resources\Speeches\Pages\CreateSpeech;
use App\Filament\Resources\Speeches\Pages\EditSpeech;
use App\Filament\Resources\Speeches\Pages\ListSpeeches;
use App\Filament\Resources\Speeches\Schemas\SpeechForm;
use App\Filament\Resources\Speeches\Tables\SpeechesTable;
use App\Models\Speech;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SpeechResource extends Resource
{
    protected static ?string $model = Speech::class;
    
    protected static string | \UnitEnum | null $navigationGroup = 'Profile';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

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
