<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('studentID')
                    ->required(),
                TextInput::make('ethnicity'),
                TextInput::make('race'),
                TextInput::make('age')
                    ->numeric(),
                TextInput::make('major'),
                Toggle::make('transfer_status'),
                Toggle::make('first_gen')
                    ->required(),
                Toggle::make('international')
                    ->required(),
                Toggle::make('student_class'),
            ]);
    }
}
