<?php

namespace App\Filament\Resources\Prestasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
class PrestasiForm
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
                
                Select::make('prestasi')
                    ->label('Prestasi Mahasiswa')
                    ->options([
                        'akademik' => 'Akademik',
                        'nonakademik' => 'Non Akademik',
                    ])
                    ->default('akademik')
                    ->required(),
                
                RichEditor::make('juara')
                    ->label('Nama Prestasi')
                    ->required(),

                FileUpload::make('foto')
                    ->label('Foto')
                    ->directory('prestasi-foto')
                    ->image()
                    ->required(),

                DateTimePicker::make('tanggal')
                    ->label('Tanggal Juara')
                    ->nullable(),
            ]);
    }
}
