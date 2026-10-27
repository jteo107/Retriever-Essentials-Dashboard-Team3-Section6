<?php

namespace App\Filament\Resources\StudentOrgs\Pages;

use App\Filament\Resources\StudentOrgs\StudentOrgResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStudentOrg extends EditRecord
{
    protected static string $resource = StudentOrgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
