<?php

namespace App\Filament\User\Resources\Prestasis\Schemas;

use Filament\Schemas\Schema;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;

class PrestasiForm
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
                
                TextInput::make('name')
                    ->label('Nama Dosen')
                    ->required(),
                
                Select::make('prestasi')
                    ->label('Prestasi Mahasiswa')
                    ->options([
                        'akademik' => 'Akademik',
                        'nonakademik' => 'Non Akademik',
                    ])
                    ->default('akademik')
                    ->required(),
                
                RichEditor::make('juara')
                    ->label('Nama Prestasi')
                    ->required(),

                FileUpload::make('foto')
                    ->label('Foto')
                    ->directory('prestasi-foto')
                    ->image()
                    ->required(),

                DateTimePicker::make('tanggal')
                    ->label('Tanggal Juara')
                    ->nullable(),
            ]);
    }
}
