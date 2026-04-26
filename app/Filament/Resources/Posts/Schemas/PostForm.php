<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // J1: VALIDASI
                // Title: minimal 5 karakter
                TextInput::make('title')
                    ->required()
                    ->rules('min:5')
                    ->validationMessages([
                        'required' => 'Title wajib diisi.',
                        'min' => 'Title minimal 5 karakter.',
                    ]),
                
                // Slug: unik & minimal 3 karakter
                TextInput::make('slug')
                    ->required()
                    ->rules('min:3|unique:posts,slug')
                    ->validationMessages([
                        'required' => 'Slug wajib diisi.',
                        'min' => 'Slug minimal 3 karakter.',
                        'unique' => 'Slug harus unik.',
                    ]),
                
                // Category: wajib dipilih
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->validationMessages([
                        'required' => 'Category wajib dipilih.',
                    ]),
                
                ColorPicker::make('color'),
                
                MarkdownEditor::make('body')
                    ->label('Content')
                    ->required()
                    ->validationMessages([
                        'required' => 'Content wajib diisi.',
                    ]),
                
                // Image: wajib diupload
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('post')
                    ->image()
                    ->required()
                    ->validationMessages([
                        'required' => 'Image wajib diupload.',
                    ]),
                
                TagsInput::make('tags')
                    ->placeholder('Add tags')
                    ->separator(','),
                
                Checkbox::make('published')
                    ->label('Published')
                    ->default(false),
                
                DatePicker::make('published_at')
                    ->label('Publish Date')
                    ->nullable(),
            ]);
    }
}