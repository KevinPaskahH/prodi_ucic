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
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

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
                    ->acceptedFileTypes([
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                    ])
                    ->saveUploadedFileUsing(function ($file) {
                        $manager = new ImageManager(new Driver());

                        $image = $manager
                            ->read($file)
                            ->scaleDown(width: 800); // ideal foto profil

                        $filename = Str::uuid() . '.webp';
                        $path = storage_path(
                            'app/public/luaran-foto/' . $filename
                        );

                        $image
                            ->toWebp(80) // jernih + ringan
                            ->save($path);

                        return 'luaran-foto/' . $filename;
                    })
                    ->imagePreviewHeight('150')
                    ->nullable(),

                DateTimePicker::make('tanggal')
                    ->label('Tanggal')
                    ->nullable(),
            ]);
    }
}
