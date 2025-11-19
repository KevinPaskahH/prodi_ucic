<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Level')
                    ->required()
                    ->maxLength(100),
            ]);
    }
}
