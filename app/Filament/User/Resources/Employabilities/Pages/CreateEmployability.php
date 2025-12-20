<?php

namespace App\Filament\User\Resources\Employabilities\Pages;

use App\Filament\User\Resources\Employabilities\EmployabilityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployability extends CreateRecord
{
    protected static string $resource = EmployabilityResource::class;
}
