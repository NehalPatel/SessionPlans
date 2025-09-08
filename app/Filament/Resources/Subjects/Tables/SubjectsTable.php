<?php

namespace App\Filament\Resources\Subjects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SubjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Subject Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('short_name')
                    ->label('Short Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('stream.name')
                    ->label('Stream')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('stream')
                    ->label('Stream')
                    ->relationship('stream', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
