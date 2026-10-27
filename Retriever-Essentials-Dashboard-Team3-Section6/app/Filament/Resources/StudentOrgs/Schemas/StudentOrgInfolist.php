<?php

namespace App\Filament\Resources\StudentOrgs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentOrgInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('name')
                    ->label('Organization Name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('OrgID')
                    ->label('Organization ID'),
                TextEntry::make('attendance')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('department')
                    ->placeholder('-'),
            ]);
    }
}
