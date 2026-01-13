<?php

namespace App\Filament\Resources\Calendars\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class CalendarForm
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

                FileUpload::make('foto')
                    ->label('Foto Kalender Akademik')
                    ->directory('Kalender-foto')
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
                            ->scaleDown(width: 1200); // ideal untuk thumbnail besar

                        $filename = Str::uuid() . '.webp';
                        $path = storage_path(
                            'app/public/Kalender-foto/' . $filename
                        );

                        $image
                            ->toWebp(80) // quality jernih + ringan
                            ->save($path);

                        return 'Kalender-foto/' . $filename;
                    })
                    ->required(),
            ]);
    }
}
