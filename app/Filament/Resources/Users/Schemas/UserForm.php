<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;

class UserForm
{
    public static function configure($schema)
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique('users', 'email'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(6),
            ]);
    }
}