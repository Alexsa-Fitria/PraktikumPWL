<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class PostsTable
{
    public static function configure(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('slug'),
                TextColumn::make('category.name'),
                ColorColumn::make('color'),
                ImageColumn::make('image')
                    ->disk('public')
                    ->width(50)
                    ->height(50)
                    ->square(),
                IconColumn::make('published')
                    ->boolean()
                    ->label('Published'),
            ]);
    }
}