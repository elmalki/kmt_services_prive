<?php

namespace App\Filament\Resources\Qualities;

use App\Filament\Resources\Qualities\Pages\CreateQuality;
use App\Filament\Resources\Qualities\Pages\EditQuality;
use App\Filament\Resources\Qualities\Pages\ListQualities;
use App\Filament\Resources\Qualities\Schemas\QualityForm;
use App\Filament\Resources\Qualities\Tables\QualitiesTable;
use App\Models\Quality;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class QualityResource extends Resource
{
    use Translatable;
    protected static ?string $model = Quality::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'quality';


    public static function form(Schema $schema): Schema
    {
        return QualityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QualitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getTranslatableLocales(): array
    {
        return [ 'fr', 'ar'];
    }
    public static function getPages(): array
    {
        return [
            'index' => ListQualities::route('/'),
            'create' => CreateQuality::route('/create'),
            'edit' => EditQuality::route('/{record}/edit'),
        ];
    }
}
