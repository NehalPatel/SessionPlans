<?php

namespace App\Filament\Resources\Streams\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class StreamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Stream Name')
                    ->prefixIcon(Heroicon::AcademicCap)
                    ->prefixIconColor('success')
                    ->required(),

                Select::make('department')
                    ->label('Department')
                    ->prefixIcon(Heroicon::BuildingOffice2)
                    ->prefixIconColor('success')
                    ->options(config('constants.DEPARTMENTS'))
                    ->searchable(),

                TextInput::make('hod')
                    ->label('Head of Department')
                    ->prefixIcon(Heroicon::User)
                    ->prefixIconColor('success'),
            ]);
    }
}
