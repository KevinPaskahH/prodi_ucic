<?php

namespace App\Filament\User\Resources\Alumni\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;

class AlumniTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto Alumni')
                    ->square()
                    ->height(50),
                
                TextColumn::make('name')
                    ->label('Nama Alumni')
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

                TextColumn::make('graduate')
                    ->label('Tahun Lulus')
                    ->sortable(),
                
                TextColumn::make('ipk')
                    ->label('IPK')
                    ->sortable()
                    ->searchable()
                    ->alignment('center')
                    ->formatStateUsing(fn ($state) => number_format($state, 2)),
                
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
