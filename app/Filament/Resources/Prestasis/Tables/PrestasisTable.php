<?php

namespace App\Filament\Resources\Prestasis\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class PrestasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->square()
                    ->height(50),
                
                TextColumn::make('name')
                    ->label('Nama')
                    ->limit(80)
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('juara')
                    ->label('Judul')
                    ->limit(80)
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('prestasi')
                    ->label('Prestasi')
                    ->sortable()
                    ->toggleable(false),
                
                TextColumn::make('tanggal')
                    ->label('Tanggal Juara')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('level.name')
                    ->label('Level')
                    ->sortable(),

                TextColumn::make('unit.name')
                    ->label('Unit')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                    DeleteBulkAction::make()
                    ->label('Delete')
            ]);
    }
}
