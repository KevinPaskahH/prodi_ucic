<?php

namespace App\Filament\Resources\Speeches\Pages;

use App\Filament\Resources\Speeches\SpeechResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSpeech extends EditRecord
{
    protected static string $resource = SpeechResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
