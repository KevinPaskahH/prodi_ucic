<?php

namespace App\Filament\Resources\Prestasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class PrestasiForm
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
                            'app/public/prestasi-foto/' . $filename
                        );

                        $image
                            ->toWebp(80) // jernih + ringan
                            ->save($path);

                        return 'prestasi-foto/' . $filename;
                    })
                    ->required(),

                DateTimePicker::make('tanggal')
                    ->label('Tanggal Juara')
                    ->nullable(),
            ]);
    }
}
