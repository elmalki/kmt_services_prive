<?php

namespace App\Filament\Resources\Qualities\Pages;

use App\Filament\Resources\Qualities\QualityResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateQuality extends CreateRecord
{
    use Translatable;
    protected static string $resource = QualityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }
}
