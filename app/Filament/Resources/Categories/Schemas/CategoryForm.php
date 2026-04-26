<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;

class CategoryForm
{
    public static function configure($schema)
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->unique('categories', 'slug')
                    ->maxLength(255),
            ]);
    }
}