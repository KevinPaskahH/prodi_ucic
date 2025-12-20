<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class UserForm
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
                    ->label('Username')
                    ->required(),
                
                TextInput::make('email')
                    ->label('Nama Alumni')
                    ->required(),
                
                TextInput::make('password')
                    ->password()
                    ->required(fn ($record) => $record === null) // wajib saat create
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state)) // hanya simpan kalau diisi
                    ->label('Password'),
                
                Select::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Admin',
                        'user'  => 'User',
                        ])
                    ->default('user')
                    ->required(),
            ]);
    }
}
