<?php

namespace App\Filament\Resources\StudentOrgs\Pages;

use App\Filament\Resources\StudentOrgs\StudentOrgResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStudentOrg extends ViewRecord
{
    protected static string $resource = StudentOrgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
