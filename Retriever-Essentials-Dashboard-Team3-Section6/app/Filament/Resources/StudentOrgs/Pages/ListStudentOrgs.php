<?php

namespace App\Filament\Resources\StudentOrgs\Pages;

use App\Filament\Resources\StudentOrgs\StudentOrgResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudentOrgs extends ListRecords
{
    protected static string $resource = StudentOrgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
