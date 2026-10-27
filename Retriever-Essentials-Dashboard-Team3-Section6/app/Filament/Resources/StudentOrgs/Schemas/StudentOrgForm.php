<?php

namespace App\Filament\Resources\StudentOrgs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentOrgForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Organization Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required(),
                TextInput::make('OrgID')
                    ->label('Student Organization ID')
                    ->required(),
                TextInput::make('attendance')
                    ->numeric(),
                TextInput::make('department'),
            ]);
    }
}
