<?php

namespace App\Filament\Resources\Students\RelationManagers;

use App\Filament\Resources\StudentOrgs\StudentOrgResource;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class StudentOrgsRelationManager extends RelationManager
{
    protected static string $relationship = 'studentOrgs';

    protected static ?string $relatedResource = StudentOrgResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),

                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('department'),
            ])
            ->headerActions([
                AttachAction::make(),
            ])
            ->recordActions([
                DetachAction::make(),
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->email(),

                Forms\Components\TextInput::make('org_id'),

                Forms\Components\TextInput::make('department'),
            ]);
    }
}