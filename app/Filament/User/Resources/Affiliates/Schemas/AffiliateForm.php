<?php

namespace App\Filament\User\Resources\Affiliates\Schemas;

use Filament\Schemas\Schema;

use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\Builder;


class AffiliateForm
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

                Select::make('user_id')
                    ->relationship(
                        name: 'user',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) =>
                            $query->where(
                                'user_id',
                                Filament::auth()->user()?->user_id
                            )
                    )
                    ->label('Penulis')
                    ->required(),

                TextInput::make('name')
                    ->label('Nama Perusahaan')
                    ->required()
                    ->live(onBlur: true),
                
                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->directory('news-thumbnails')
                    ->image()
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
