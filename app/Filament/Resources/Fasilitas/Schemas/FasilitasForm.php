<?php

namespace App\Filament\Resources\Fasilitas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class FasilitasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('level_id')
                    ->relationship('level', 'name')
                    ->label('Level')
                    ->required(),

                Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->label('Unit')
                    ->required(),

                TextInput::make('name')
                    ->label('Nama Dosen')
                    ->required(),
                
                FileUpload::make('foto')
                    ->label('Foto Fasilitas')
                    ->directory('Fasilitas-foto')
                    ->image()
                    ->required(),
                
                RichEditor::make('deskripsi')
                    ->label('Deskripsi Fasilitas')
                    ->required(),
            ]);
    }
}
