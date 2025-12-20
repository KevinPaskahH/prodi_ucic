<?php

namespace App\Filament\User\Resources\Histories\Schemas;

use Filament\Schemas\Schema;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;

class HistoryForm
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

                Select::make('level_id')
                    ->relationship('level', 'name')
                    ->label('Level')
                    ->required(),

                Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->label('Unit')
                    ->required(),

                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Penulis')
                    ->required(),

                RichEditor::make('history')
                    ->label('Sejarah Singkat')
                    ->required(),
                
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'menunggu' => 'Menunggu',
                        'revisi' => 'Revisi',
                        'disetujui' => 'Disetujui',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('draft')
                    ->required(),

                DateTimePicker::make('published_at')
                    ->label('Tanggal Publish')
                    ->nullable(),
            ]);
    }
}
