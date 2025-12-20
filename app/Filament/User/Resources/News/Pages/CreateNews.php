<?php

namespace App\Filament\User\Resources\News\Pages;

use App\Filament\User\Resources\News\NewsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;
}
