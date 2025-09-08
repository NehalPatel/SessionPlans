<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->prefixIcon(Heroicon::User)
                    ->prefixIconColor('success')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->prefixIcon(Heroicon::Envelope)
                    ->prefixIconColor('success')
                    ->required(),
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required()
                    ->visibleOn('create'),
                TextInput::make('password_confirmation')
                    ->label('Confirm Password')
                    ->password()
                    ->required()
                    ->same('password')
                    ->visibleOn('create'),
            ]);
    }
}
