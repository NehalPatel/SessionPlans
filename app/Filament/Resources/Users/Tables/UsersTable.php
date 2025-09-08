<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->icon(Heroicon::Envelope)
                    ->iconColor('secondary')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('roles.name')
                    ->badge(),
                TextColumn::make('email_verified_at')
                    ->label('Email Verified At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->relationship('roles', 'name')
                    ->preload(),
            ])
            ->recordActions([
                EditAction::make()
                    ->hidden(!Auth::user()->hasPermission('user_edit')),
                DeleteAction::make()
                    ->hidden(!Auth::user()->hasPermission('user_delete')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->hidden(!Auth::user()->hasPermission('user_delete')),
                ]),
            ]);
    }
}
