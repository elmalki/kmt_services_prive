<?php

namespace App\Filament\Resources\Realisations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RealisationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                Toggle::make('is_active'),
                TextInput::make('url')->url(),
                RichEditor::make('description')->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('images')->multiple()->reorderable()->columnSpanFull(),
            ]);
    }
}
