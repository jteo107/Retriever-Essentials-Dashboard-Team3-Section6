<?php

namespace App\Filament\Resources\StudentOrgs;

use App\Filament\Resources\StudentOrgs\Pages\CreateStudentOrg;
use App\Filament\Resources\StudentOrgs\Pages\EditStudentOrg;
use App\Filament\Resources\StudentOrgs\Pages\ListStudentOrgs;
use App\Filament\Resources\StudentOrgs\Pages\ViewStudentOrg;
use App\Filament\Resources\StudentOrgs\Schemas\StudentOrgForm;
use App\Filament\Resources\StudentOrgs\Schemas\StudentOrgInfolist;
use App\Filament\Resources\StudentOrgs\Tables\StudentOrgsTable;
use App\Models\StudentOrg;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\StudentOrgs\RelationManagers\StudentsRelationManager;
use App\Filament\Widgets\StudentStatsOverview;

class StudentOrgResource extends Resource
{
    protected static ?string $model = StudentOrg::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return StudentOrgForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StudentOrgInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentOrgsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            StudentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudentOrgs::route('/'),
            'create' => CreateStudentOrg::route('/create'),
            'view' => ViewStudentOrg::route('/{record}'),
            'edit' => EditStudentOrg::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            StudentStatsOverview::class,
        ];
    }
}
