<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Student Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('studentID')
                    ->label('Student ID')
                    ->required(),
                TextInput::make('ethnicity')
                    ->label('Ethnicity'),
                TextInput::make('race')
                    ->label('Race'),
                TextInput::make('age')
                    ->label('Age')
                    ->numeric(),
                TextInput::make('major')
                    ->label('Major'),
                Select::make('student_class')
                    ->label('Student Class')
                    ->options([
                        'freshman' => 'Freshman',
                        'sophomore' => 'Sophomore',
                        'junior' => 'Junior',
                        'senior' => 'Senior'
                    ]),
                Checkbox::make('transfer_status')
                    ->label('Transfer Student'),
                Checkbox::make('first_gen')
                    ->label('First Gen Student?'),
                Checkbox::make('international')
                    ->label('International Student?'),
            ]);
    }
}
