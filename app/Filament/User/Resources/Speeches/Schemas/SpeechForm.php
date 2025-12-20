<?php

namespace App\Filament\User\Resources\Speeches\Schemas;

use Filament\Schemas\Schema;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class SpeechForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                /**
                 * 🔐 user_id otomatis
                 * user TIDAK bisa pilih user lain
                 */
                Hidden::make('user_id')
                    ->default(fn () => Filament::auth()->id())
                    ->required()
                    ->dehydrated(),

                Select::make('level_id')
                    ->relationship('level', 'name')
                    ->label('Level')
                    ->required(),

                Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->label('Unit')
                    ->required(),
                
                FileUpload::make('foto')
                    ->label('Foto Kaprodi')
                    ->directory('Kaprodi-foto')
                    ->image()
                    ->required(),
                
                RichEditor::make('sambutan')
                    ->label('Kata Sambutan')
                    ->required(),
            ]);
    }
}
