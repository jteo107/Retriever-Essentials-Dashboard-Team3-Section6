<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->label('Student Name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email Address')
                    ->searchable(),
                TextColumn::make('studentID')
                    ->label('Student ID')
                    ->searchable(),
                TextColumn::make('ethnicity')
                    ->label('Ethnicity'),
                TextColumn::make('race')
                    ->label('Race'),
                TextColumn::make('age')
                    ->numeric()
                    ->label('Age')
                    ->sortable(),
                TextColumn::make('major')
                    ->label('Major'),
                IconColumn::make('transfer_status')
                    ->label('Transfer Status')
                    ->boolean(),
                IconColumn::make('first_gen')
                    ->label('First Gen Status')
                    ->boolean(),
                IconColumn::make('international')
                    ->label('International Status')
                    ->boolean(),
                IconColumn::make('student_class')
                    ->label('Student Class')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
