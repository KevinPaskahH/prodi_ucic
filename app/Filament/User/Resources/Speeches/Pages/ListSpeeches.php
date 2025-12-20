<?php

namespace App\Filament\User\Resources\Speeches\Pages;

use App\Filament\User\Resources\Speeches\SpeechResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpeeches extends ListRecords
{
    protected static string $resource = SpeechResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
