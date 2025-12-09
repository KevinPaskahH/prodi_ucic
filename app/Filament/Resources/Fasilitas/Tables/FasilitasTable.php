<?php

namespace App\Filament\Resources\Fasilitas\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class FasilitasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto Fasilitas')
                    ->square()
                    ->height(50),
                
                TextColumn::make('name')
                    ->label('Nama Fasilitas')
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
