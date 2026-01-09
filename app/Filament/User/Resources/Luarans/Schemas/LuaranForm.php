<?php

namespace App\Filament\User\Resources\Luarans\Schemas;

use Filament\Schemas\Schema;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\Builder;

class LuaranForm
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
                    ->label('Nama Kegiatan / Judul')
                    ->required()
                    ->maxLength(255),

                Select::make('luaran')
                    ->label('Jenis Luaran')
                    ->options([
                        'buku'   => 'Buku',
                        'jurnal' => 'Jurnal',
                        'haki'   => 'HAKI',
                    ])
                    ->required(),

                Textarea::make('judul')
                    ->label('Judul')
                    ->rows(3)
                    ->required(),

                FileUpload::make('foto')
                    ->label('Foto')
                    ->directory('luaran-foto')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->nullable(),

                DateTimePicker::make('tanggal')
                    ->label('Tanggal')
                    ->nullable(),
            ]);
    }
}
