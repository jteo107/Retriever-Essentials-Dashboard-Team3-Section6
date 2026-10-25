<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentInfolist
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
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('studentID'),
                TextEntry::make('ethnicity')
                    ->placeholder('-'),
                TextEntry::make('race')
                    ->placeholder('-'),
                TextEntry::make('age')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('major')
                    ->placeholder('-'),
                IconEntry::make('transfer_status')
                    ->boolean()
                    ->placeholder('-'),
                IconEntry::make('first_gen')
                    ->boolean(),
                IconEntry::make('international')
                    ->boolean(),
                IconEntry::make('student_class')
                    ->boolean()
                    ->placeholder('-'),
            ]);
    }
}
