<?php

namespace App\Filament\User\Resources\Categories\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms;
use Filament\Schemas\Schema;

class CategoryForm
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

                Forms\Components\TextInput::make('type')
                    ->label('Tipe Berita')
                    ->required()
                    ->maxLength(100),
            ]);
    }
}
