<?php

namespace App\Filament\Resources\Alumni\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;

class AlumnusForm
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
                    ->label('Nama Alumni')
                    ->required(),
                
                TextInput::make('graduate')
                    ->label('Tahun Lulus')
                    ->required(),
                
                TextInput::make('ipk')
                    ->label('IPK:')
                    ->numeric()
                    ->step('0.01')
                    ->required(),

                FileUpload::make('foto')
                    ->label('Foto Alumni')
                    ->directory('Alumni-foto')
                    ->image()
                    ->required(),
            ]);
    }
}
