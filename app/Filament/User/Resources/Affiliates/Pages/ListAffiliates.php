<?php

namespace App\Filament\User\Resources\Affiliates\Pages;

use App\Filament\User\Resources\Affiliates\AffiliateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAffiliates extends ListRecords
{
    protected static string $resource = AffiliateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
