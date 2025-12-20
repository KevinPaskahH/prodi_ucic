<?php

namespace App\Filament\User\Resources\Histories\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;

class HistoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('level.name')
                    ->label('Level')
                    ->sortable(),

                TextColumn::make('unit.name')
                    ->label('Unit')
                    ->sortable(),
                
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->toggleable(false),

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
