<?php

namespace App\Filament\User\Resources\Dosens\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;

class DosenForm
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
                    ->default(fn () => Filament::auth()->user()?->user_id)
                    ->required()
                    ->dehydrated(),

                Select::make('level_id')
                    ->relationship(
                        name: 'level',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) =>
                            $query->where(
                                'id',
                                Filament::auth()->user()?->level_id
                            )
                    )
                    ->label('Level')
                    ->required(),

                Select::make('unit_id')
                    ->relationship(
                        name: 'unit',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) =>
                            $query->where(
                                'id',
                                Filament::auth()->user()?->unit_id
                            )
                        )
                    ->label('Unit')
                    ->required(),
                
                TextInput::make('nidn')
                    ->label('NIDN')
                    ->required(),
                
                TextInput::make('name')
                    ->label('Nama Dosen')
                    ->required(),
                
                TextInput::make('jabatan')
                    ->label('Jabatan')
                    ->required(),

                FileUpload::make('foto')
                    ->label('Foto Dosen')
                    ->directory('Dosen-foto')
                    ->image()
                    ->required(),
            ]);
    }
}
