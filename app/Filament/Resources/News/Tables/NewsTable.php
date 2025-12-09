<?php

namespace App\Filament\Resources\News\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;

class NewsTable
{
    public static function configure(Table $table): Table
    {
         return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumb')
                    ->square()
                    ->height(50),

                TextColumn::make('title')
                    ->label('Judul')
                    ->limit(80)
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('category.type')
                    ->label('Tipe Berita')
                    ->sortable(),

                TextColumn::make('level.name')
                    ->label('Level')
                    ->sortable(),

                TextColumn::make('unit.name')
                    ->label('Unit')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Penulis')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->toggleable(false),

                TextColumn::make('published_at')
                    ->label('Tayang')
                    ->dateTime()
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

