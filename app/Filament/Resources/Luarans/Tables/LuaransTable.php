<?php

namespace App\Filament\Resources\Luarans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class LuaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('foto')
                    ->label('Foto')
                    ->square()
                    ->height(50)
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Nama')
                    ->limit(50)
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('luaran')
                    ->label('Jenis')
                    ->badge()
                    ->colors([
                        'primary' => 'buku',
                        'success' => 'jurnal',
                        'warning' => 'haki',
                    ])
                    ->sortable(),
                
                TextColumn::make('judul')
                    ->label('Judul')
                    ->limit(60)
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('level.name')
                    ->label('Level')
                    ->sortable(),

                TextColumn::make('unit.name')
                    ->label('Unit')
                    ->sortable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
