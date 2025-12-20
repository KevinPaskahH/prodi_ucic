<?php

namespace App\Filament\User\Resources\Units\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UnitInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('level.name')->label('Level'),
                TextEntry::make('name')->label('Nama Unit'),
                TextEntry::make('slug'),
            ]);
    }
}
