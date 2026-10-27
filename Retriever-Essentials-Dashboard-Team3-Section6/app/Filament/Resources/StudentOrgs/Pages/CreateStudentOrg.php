<?php

namespace App\Filament\Resources\StudentOrgs\Pages;

use App\Filament\Resources\StudentOrgs\StudentOrgResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentOrg extends CreateRecord
{
    protected static string $resource = StudentOrgResource::class;
}
