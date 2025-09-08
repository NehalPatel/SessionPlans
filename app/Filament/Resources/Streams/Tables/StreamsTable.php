<?php

namespace App\Filament\Resources\Streams\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StreamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //write columns here
                TextColumn::make('name')->label('Stream Name')->sortable()->searchable(),
                TextColumn::make('department')->label('Department')->sortable()->searchable(),
                TextColumn::make('hod')->label('Head of Department')->sortable()->searchable(),

            ])
            ->filters([
                //
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
