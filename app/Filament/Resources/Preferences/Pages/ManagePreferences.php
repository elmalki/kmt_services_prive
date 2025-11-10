<?php

namespace App\Filament\Resources\Preferences\Pages;

use App\Filament\Resources\Preferences\PreferenceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePreferences extends ManageRecords
{
    protected static string $resource = PreferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
