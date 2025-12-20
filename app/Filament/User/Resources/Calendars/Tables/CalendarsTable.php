<?php

namespace App\Filament\User\Resources\Calendars\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class CalendarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                
                ImageColumn::make('foto')
                    ->label('Struktur Akademik')
                    ->square()
                    ->height(50),
                
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
