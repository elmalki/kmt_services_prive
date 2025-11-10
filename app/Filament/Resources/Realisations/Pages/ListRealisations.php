<?php

namespace App\Filament\Resources\Realisations\Pages;

use App\Filament\Resources\Realisations\RealisationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\ListRecords\Concerns\Translatable;

class ListRealisations extends ListRecords
{
    use Translatable;
    protected static string $resource = RealisationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            CreateAction::make(),
        ];
    }
}
