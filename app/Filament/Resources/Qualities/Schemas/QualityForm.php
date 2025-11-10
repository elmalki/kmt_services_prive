<?php

namespace App\Filament\Resources\Qualities\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QualityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('quality')
                    ->required(),
                Select::make('icon')
                    ->label('Icon')
                    ->options(fn () => collect(config('heroicons'))->toArray())
                    ->searchable()
                    ->reactive()
                    ->prefixIcon(fn (?string $state): ?string => $state
                        ? "heroicon-o-{$state}" // Filament automatically resolves heroicon-o-* classes
                        : null
                    )
                    ->prefixIconColor('primary')

                    ->helperText('Choose a Heroicon to represent this item.'),
            ]);
    }
}
