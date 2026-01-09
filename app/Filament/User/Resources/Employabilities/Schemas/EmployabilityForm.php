<?php

namespace App\Filament\User\Resources\Employabilities\Schemas;

use Filament\Schemas\Schema;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;

class EmployabilityForm
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

                RichEditor::make('skill')
                    ->label('Profil Lulusan')
                    ->required(),
                
                RichEditor::make('prospect')
                    ->label('Prospek Lulusan')
                    ->required(),
            ]);
    }
}
