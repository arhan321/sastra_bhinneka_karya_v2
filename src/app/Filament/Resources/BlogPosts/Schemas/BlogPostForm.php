<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;


class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('title')
                ->label('Judul Artikel')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->columnSpanFull(),

            TextInput::make('author')
                ->label('Penulis')
                ->maxLength(255),

            Select::make('category')
                ->label('Kategori')
                ->options(fn() => BlogCategory::where('is_active', true)
                    ->pluck('title', 'slug')
                    ->toArray())
                ->multiple()
                ->searchable()
                ->preload(),

            TextInput::make('tags')
                ->label('Tags (pisahkan dengan koma)')
                ->placeholder('konstruksi, lingkungan, hot news')
                ->maxLength(255),

            DateTimePicker::make('published_at')
                ->label('Tanggal Publish')
                ->seconds(false),

            Toggle::make('is_published')
                ->label('Publish')
                ->default(false),

            FileUpload::make('thumbnail')
                ->label('Foto / Thumbnail')
                ->image()
                ->disk('public')
                ->directory('blog')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(5120)
                ->acceptedFileTypes([
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                    'image/jpg',
                ])
                ->downloadable()
                ->openable()
                ->columnSpanFull(),

            Textarea::make('excerpt')
                ->label('Ringkasan Singkat')
                ->rows(3)
                ->columnSpanFull(),

            RichEditor::make('content')
                ->label('Konten Artikel')
                ->toolbarButtons([
                    'attachFiles',
                    'blockquote',
                    'bold',
                    'underline',
                    'codeBlock',
                    'h1',
                    'h2',
                    'h3',
                    'h4',
                    'h5',
                    'h6',
                    'italic',
                    'link',
                    'orderedList',
                    'bulletList',
                    'redo',
                    'strike',
                    'undo',
                ])
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsDirectory('blog/content')
                ->fileAttachmentsVisibility('public')
                ->columnSpanFull(),

        ]);
    }
}
