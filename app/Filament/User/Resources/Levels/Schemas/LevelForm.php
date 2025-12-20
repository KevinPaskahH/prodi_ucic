<?php

namespace App\Filament\User\Resources\Levels\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;

class LevelForm
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

                Forms\Components\TextInput::make('name')
                    ->label('Nama Level')
                    ->required()
                    ->maxLength(100),
            ]);
    }
}
