<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('level_id')
                    ->relationship('level', 'name')
                    ->label('Level')
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->label('Nama Unit')
                    ->required()
                    ->maxLength(150),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(150),
            ]);
    }
}
