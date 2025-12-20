<?php

namespace App\Filament\User\Resources\Promotions\Pages;

use App\Filament\User\Resources\Promotions\PromotionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePromotion extends CreateRecord
{
    protected static string $resource = PromotionResource::class;
}
