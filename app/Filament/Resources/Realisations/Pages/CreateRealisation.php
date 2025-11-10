<?php

namespace App\Filament\Resources\Realisations\Pages;

use App\Filament\Resources\Realisations\RealisationResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateRealisation extends CreateRecord
{
    use Translatable;
    protected static string $resource = RealisationResource::class;
    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
