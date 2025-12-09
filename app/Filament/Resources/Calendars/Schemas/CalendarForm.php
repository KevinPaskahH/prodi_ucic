<?php

namespace App\Filament\Resources\Calendars\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class CalendarForm
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

                FileUpload::make('foto')
                    ->label('Foto Kalender Akademik')
                    ->directory('Kalender-foto')
                    ->image()
                    ->required(),
            ]);
    }
}
