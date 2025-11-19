<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('level_id')
                    ->label('Level')
                    ->relationship('level', 'name')
                    ->required(),

                TextInput::make('name')
                    ->label('Nama Unit')
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required(),
            ]);
    }
}
