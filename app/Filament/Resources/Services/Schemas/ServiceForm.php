<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('icon')
                    ->label('Icon')
                    ->options(fn () => collect(config('heroicons'))->toArray())
                    ->searchable()
                    ->prefixIcon(fn (?string $state): ?string => $state
                        ? "heroicon-o-{$state}" // Filament automatically resolves heroicon-o-* classes
                        : null
                    )
                    ->prefixIconColor('primary')
                    ->helperText('Choose a Heroicon to represent this item.'),
                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull()
                    ->required(),
               ]);
    }
}
