<?php

namespace App\Filament\User\Resources\Distributions\Pages;

use App\Filament\User\Resources\Distributions\DistributionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDistribution extends CreateRecord
{
    protected static string $resource = DistributionResource::class;
}
