<?php

namespace App\Filament\Resources\Dosens\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;

class DosensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto Dosen')
                    ->square()
                    ->height(50),

                TextColumn::make('nidn')
                    ->label('NIDN')
                    ->limit(80)
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('name')
                    ->label('Nama Dosen')
                    ->limit(80)
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->limit(80)
                    ->wrap()
                    ->searchable()
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
