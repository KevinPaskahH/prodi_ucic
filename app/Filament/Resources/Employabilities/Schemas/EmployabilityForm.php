<?php

namespace App\Filament\Resources\Employabilities\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;

class EmployabilityForm
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

                RichEditor::make('skill')
                    ->label('Profil Lulusan')
                    ->required(),
                
                RichEditor::make('prospect')
                    ->label('Prospek Lulusan')
                    ->required(),
            ]);
    }
}
